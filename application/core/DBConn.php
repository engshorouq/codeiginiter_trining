<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Modified by ..
 * User: Ahmed Barakat
 * Date: 6/7/14
 * Time: 1:20 PM
 */
class DBConn
{
    // private $ip   = '192.168.1.5' ;
    public $user = 'WEBSITE';
    private $pass = 'WEB2010';
    private $instance = 'orcl';
    private $encode = 'AL32UTF8';
    private $decode='utf8';
    private $CI;
    private $conn = '';
    private $output = array();
    private $lob = array();
    private $cur_ref = array('cur', 'cr', 'cursor', 'refcursor', SQLT_RSET);

    function __construct()
    {
        $this->CI =& get_instance();


        $this->conn = oci_new_connect($this->user, $this->pass, $this->instance, $this->encode) or die ('حدث مشكلة أثناء عملية الإتصال - تأكد من صحة البيانات');

    }

    function getCI()

    {
        return $this->CI;
    }

    function close()
    {
        oci_close($this->conn);
    }


    function excuteProcedures($package, $procedure, $params)
    {

        $package = $package == '' ? '' : $package . '.';
        $sql = "begin $package$procedure(";
        foreach ($params as $param) {
            $sql .= $param['name'] . ",";
        }
        $sql = trim($sql, ",") . "); end;";


        $stmt = oci_parse($this->conn, $sql);
        $refcur = $this->bind_params($stmt, $params);
        $exc = @oci_execute($stmt, OCI_DEFAULT);
        if (!$exc)
            $this->error_handeling($exc, $stmt);
        if (count($refcur) > 0) {
            $this->excuteCursor($params, $refcur);
        }

        if (count($this->lob) > 0) {
            $this->excuteBLOB($params, $this->lob);
        }
        oci_commit($this->conn);

        return $this->output;
    }


    function bind_params($stmt, $params)
    {
        $i = 0;
        $outCount = 0;
        $this->output = array();
        $refcur = '';
        $lob_counter = 0;
        foreach ($params as $param) {
            if (!in_array($param['type'], $this->cur_ref) && $param['type'] != 'wblob' && $param['type'] != 'rblob' && $param['type'] != 'sblob') {
                if (!is_array($param['value'])) {
                    $this->output[$param['value']] = $param['value'];
                    $bind = @oci_bind_by_name($stmt, $param['name'], $this->output[$param['value']], $param['length'], ($param['type'] == '') ? NULL : $param['type']);
                    $this->error_handeling($bind, $stmt);
                } else {
                    $size = count($param['value']) == 0 ? 500 : count($param['value']);
                    $item_length = count($param['value']) == 0 ? 500 : -1;
                    $bind = @oci_bind_array_by_name($stmt, $param['name'], $param['value'], $size, $item_length, ($param['type'] == '') ? NULL : $param['type']);


                    $this->error_handeling($bind, $stmt);
                }
            } else if ($param['type'] == 'wblob' || $param['type'] == 'rblob' || $param['type'] == 'sblob') {
                $this->lob[$lob_counter] = oci_new_descriptor($this->conn, OCI_D_LOB);
                $bind = @oci_bind_by_name($stmt, $param['name'], $this->lob[$lob_counter], -1, OCI_B_BLOB);
                $this->error_handeling($bind, $stmt);
                $lob_counter++;
            } else {
                $refcur[$i] = ocinewcursor($this->conn);
                $bind = @oci_bind_by_name($stmt, $param['name'], $refcur[$i], -1, OCI_B_CURSOR);
                $this->error_handeling($bind, $stmt);
                $i++;
            }
        }

        return $refcur;
    }

    function excuteCursor($params, $refcur)
    {
        $cursorCounter = 0;
        foreach ($params as $param) {
            if (in_array($param['type'], $this->cur_ref)) {
                $exc = @oci_execute($refcur[$cursorCounter], OCI_DEFAULT);
                //$this->error_handeling($exc,$refcur[$cursorCounter]);
                if ($exc) {
                    $fetch = @oci_fetch_all($refcur[$cursorCounter], $this->output[$param['value']], null, null, OCI_FETCHSTATEMENT_BY_ROW);
                } else
                    $this->output[$param['value']] = array();
                //$this->error_handeling($fetch,$refcur[$cursorCounter]);
                $cursorCounter++;
            }
        }
    }

    function excuteBLOB($params, $lob)
    {
        $lobCounter = 0;
        foreach ($params as $param) {
            if ($param['type'] == 'wblob' || $param['type'] == 'rblob' || $param['type'] == 'sblob') {
                if ($param['type'] == 'wblob' && $param['value'] != '') {
                    $this->lob[$lobCounter]->savefile($param['value']);
                } else if ($param['type'] == 'sblob' && $param['value'] != '')
                    $this->lob[$lobCounter]->save($param['value']);
                else
                    $this->output[$param['value']] = $this->lob[$lobCounter];
                $lobCounter++;
            }
        }
    }

    function error_handeling($exc, $stmt)
    {
        if (!$exc) {
            $controller = $this->CI->router->class;
            $err = oci_error($stmt);
            $res = array(
                'success' => 0,
                'err_msg' => $err['message']
            );
            $this->output['success'] = 0;
            $this->output['err_msg'] = $err['message'];

            if ($controller == 'ajax_handler') {
                header('Content-type: text/json');
                echo json_encode($this->output);
            } else {
                //echo '<pre>';
                print_r($res['err_msg']);
                //   echo '<pre/>';

                return $res['err_msg'];
            }
            // exit;
        }
    }
}