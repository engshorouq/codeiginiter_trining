<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 02/07/16
 * Time: 10:24 ص
 */

class Admin_model extends MY_Model {

    public $package;
    public $procedure;

    function iud($data){

        $params = array();

        $this->_extract_data($params,$data);

        $result = $this->conn->excuteProcedures($this->package,$this->procedure,$params);


        return $result['MSG_OUT'];
    }

    function insert($data){

       return $this->iud($data);
    }

    function update($data){

        return $this->iud($data);

    }
    function get_post(){
        $cursor = $this->db->get_cursor();
        $params = array(
            array('name'=>':GET_ROW_LOG','value'=>$cursor,'type'=>OCI_B_CURSOR),
            array('name'=>':MSG_OUT','value'=>'MSG_OUT','type'=>SQLT_CHR,'length'=>-1)
        );
        $result = $this->conn->excuteProcedures($this->package,$this->procedure,$params);

        return $result[$cursor];
    }

    function delete($id){
        $cursor = $this->db->get_cursor();
        $params = array(
            array('name'=>':ID','value'=>$id,'type'=>'','length'=>-1),
            array('name'=>':MSG_OUT','value'=>'MSG_OUT','type'=>SQLT_CHR,'length'=>500)
        );
        $result = $this->conn->excuteProcedures($this->package,$this->procedure,$params);

        return $result['MSG_OUT'];

    }

    function delete_all(){

        $params = array(

            array('name'=>':MSG_OUT','value'=>'MSG_OUT','type'=>SQLT_CHR,'length'=>500)
        );
        $result = $this->conn->excuteProcedures($this->package,$this->procedure,$params);

        return $result['MSG_OUT'];

    }

    function get($id){

        $cursor = $this->db->get_cursor();
        $params = array(
            array('name'=>':ID','value'=>$id,'type'=>'','length'=>-1),
            array('name'=>':GET_ROW_LOG','value'=>$cursor,'type'=>OCI_B_CURSOR),
            array('name'=>':MSG_OUT','value'=>'MSG_OUT','type'=>SQLT_CHR,'length'=>-1)
        );
        $result = $this->conn->excuteProcedures($this->package,$this->procedure,$params);

        return $result[$cursor];
    }
    function get_group_user($id){

        $cursor = $this->db->get_cursor();
        $params = array(
            array('name'=>':USERID_IN','value'=>$id,'type'=>SQLT_CHR,'length'=>-1),
            array('name'=>':GET_ROW_LOG','value'=>$cursor,'type'=>OCI_B_CURSOR),
            array('name'=>':MSG_OUT','value'=>'MSG_OUT','type'=>SQLT_CHR,'length'=>-1)
        );
        $result = $this->conn->excuteProcedures($this->package,$this->procedure,$params);

        return $result[$cursor];

    }

    function get_group($id,$group_id){

        $cursor = $this->db->get_cursor();
        $params = array(
            array('name'=>':ID','value'=>$id,'type'=>'','length'=>-1),
            array('name'=>':GROUPID_IN','value'=>$group_id,'type'=>SQLT_CHR,'length'=>-1),
            array('name'=>':GET_ROW_LOG','value'=>$cursor,'type'=>OCI_B_CURSOR),
            array('name'=>':MSG_OUT','value'=>'MSG_OUT','type'=>SQLT_CHR,'length'=>-1)
        );
        $result = $this->conn->excuteProcedures($this->package,$this->procedure,$params);

        return $result[$cursor];

    }
    function get_media_tree($parentid,$id){

        $cursor = $this->db->get_cursor();
        $params = array(
            array('name'=>':POSTID_IN','value'=>$id,'type'=>SQLT_CHR,'length'=>-1),
            array('name'=>':PARENTID','value'=>$parentid,'type'=>'','length'=>-1),
            array('name'=>':GET_ROW_LOG','value'=>$cursor,'type'=>OCI_B_CURSOR),
            array('name'=>':MSG_OUT','value'=>'MSG_OUT','type'=>SQLT_CHR,'length'=>-1)
        );
        $result = $this->conn->excuteProcedures($this->package,$this->procedure,$params);

        return $result[$cursor];
    }

    /*for display in apperance*/
    function get_posts_tree($id,$source_id){

        $cursor = $this->db->get_cursor();
        $params = array(

            array('name'=>':PARENTID','value'=>$id,'type'=>'','length'=>-1),
            array('name'=>':SOURCE_ID','value'=>$source_id,'type'=>SQLT_CHR,'length'=>-1),
            array('name'=>':GET_ROW_LOG','value'=>$cursor,'type'=>OCI_B_CURSOR),
            array('name'=>':MSG_OUT','value'=>'MSG_OUT','type'=>SQLT_CHR,'length'=>-1)
        );
        $result = $this->conn->excuteProcedures($this->package,$this->procedure,$params);

        return $result[$cursor];
    }
    function get_user_sys_menus($id_user,$parent_id){

        $cursor = $this->db->get_cursor();
        $params = array(
            array('name'=>':ID','value'=>$id_user,'type'=>SQLT_CHR,'length'=>-1),
            array('name'=>':PARENTID_IN','value'=>$parent_id,'type'=>'','length'=>-1),
            array('name'=>':GET_ROW_LOG','value'=>$cursor,'type'=>OCI_B_CURSOR),
            array('name'=>':MSG_OUT','value'=>'MSG_OUT','type'=>SQLT_CHR,'length'=>-1)
        );
        $result = $this->conn->excuteProcedures($this->package,$this->procedure,$params);

        return $result[$cursor];
    }

    function get_media(){

        $cursor = $this->db->get_cursor();
        $params = array(
            array('name'=>':GET_ROW_LOG','value'=>$cursor,'type'=>OCI_B_CURSOR),
            array('name'=>':MSG_OUT','value'=>'MSG_OUT','type'=>SQLT_CHR,'length'=>-1)
        );
        $result = $this->conn->excuteProcedures($this->package,$this->procedure,$params);

        return $result[$cursor];
    }
    function getList($sql,$offset,$row){

        $cursor = $this->db->get_cursor();
        $params = array(
            array('name'=>':INXSQL','value'=>$sql,'type'=>'','length'=>-1),
            array('name'=>':offset','value'=>$offset,'type'=>'','length'=>-1),
            array('name'=>':row','value'=>$row,'type'=>'','length'=>-1),
            array('name'=>':GET_ROW_LOG','value'=>$cursor,'type'=>OCI_B_CURSOR),
            array('name'=>':MSG_OUT','value'=>'MSG_OUT','type'=>SQLT_CHR,'length'=>-1)
        );
        $result = $this->conn->excuteProcedures($this->package,$this->procedure,$params);

        return $result[$cursor];
    }

}