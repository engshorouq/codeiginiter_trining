<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Ahmed Barakat
 * Date: 9/23/14
 * Time: 10:33 AM
 */

// mkilani- get ar desc of month
if (!function_exists('months')) {
    function months ($no=0,$name=null){
        switch($no){
            case 1: $name='يناير'; break;
            case 2: $name='فبراير'; break;
            case 3: $name='مارس'; break;
            case 4: $name='ابريل'; break;
            case 5: $name='مايو'; break;
            case 6: $name='يونيو'; break;
            case 7: $name='يوليو'; break;
            case 8: $name='اغسطس'; break;
            case 9: $name='سبتمبر'; break;
            case 10: $name='اكتوبر'; break;
            case 11: $name='نوفمبر'; break;
            case 12: $name='ديسمبر'; break;
            default:$name='';
        }
        return $name;
    }
}

 
  

// mkilani- generate password
if (!function_exists('generate_pass')) {
    function generate_pass (){
        return random_string('alnum', rand(2,4)).rand(0,9).substr(str_shuffle('@#$%.-_'), 0, rand(1,2)).random_string('alnum', rand(2,4));
    }
}

// mkilani- check identity number
if (!function_exists('check_identity')) {
    function check_identity ($id){
        if(preg_match ('/^[0-9]{9}$/',$id)){
            $id= str_split($id);
            $res= 0;
            for($i=1;$i<9;$i++){
                if($i % 2 == 0){
                    $total= $id[$i-1]*2;
                    if($total>=10)
                        $total= array_sum(str_split($total));
                }else{
                    $total= $id[$i-1];
                }
                $res+= $total;
            }

            //$last= 10- $res%10 ;
            $last= $res%10;
            if($last!=0)
                $last= 10- $last;

            if($last== $id[8])
                return true;
            else
                return false;
        }else
            return false;
    }
}


// mkilani- add % to char, for search in DB
if (!function_exists('add_percent_sign')) {
    function add_percent_sign ($char){
        return '%'.str_replace(' ','%',trim($char)).'%';
    }
}

// mkilani- sn for reports
if (!function_exists('report_sn')) {
    function report_sn(){
        return 'SN:'.date('ymd').get_curr_user()->id;
    }
}

// mkilani- char_to_time
if (!function_exists('char_to_time')) {
    function char_to_time($date=''){
        return strtotime( str_replace('/', '-', $date) );
    }
}

if (!function_exists('date_format_exp')) {
    function date_format_exp (){
        return '^(0[1-9]{1}|(1|2)\d{1}|(30|31))\/(0[1-9]{1}|1[0-2]{1})\/\d{4}';
    }
}

    if (!function_exists('datetime_format_exp')) {
        function datetime_format_exp (){
            return '^(0[1-9]{1}|(1|2)\d{1}|(30|31))\/(0[1-9]{1}|1[0-2]{1})\/\d{4}\s(0[1-9]{1}|1[0-2]{1}):(0[1-9]{1}|[0-5]{1}[1-9])';
        }
    }
if (!function_exists('float_format_exp')) {
    function float_format_exp (){
        return '^\$?([0-9]{1,3},([0-9]{3},)*[0-9]{3}|[0-9]+)(.[0-9]+)?$';
    }
}
 

if (!function_exists('replace_d_dsh')) {
    function replace_d_dsh ($str){

        $rs='';

        for($i = 0;$i <= strlen($str);$i++)
            $rs =$rs.'&nbsp;';


        return $rs;

    }
}
 

if (!function_exists('n_format')) {
    function n_format ($val){


        return number_format($val, 2, '.', ',');


    }
}

if (!function_exists('remove_decimal')) {
    function remove_decimal ($val){


        return  str_replace(',', '', $val);


    }
}

 

if (!function_exists('clear_url')) {
    function clear_url ($url){

        $url = preg_replace('/\s+/', '_', $url );
        $url = preg_replace('/[(]/', '_', $url );
        $url = preg_replace('/[)]/', '_', $url );
        $url = preg_replace('/[+%,()*&!@#^<>?]-/', '_', $url );
        $url = preg_replace('/[?+]/', '', $url );
        $url = preg_replace('/[,+]/', '', $url );
        return  $url;


    }
}


 

 

 

if (!function_exists('sort_dir')) {
    function sort_dir ($col ,$str){
        if (strpos(strtolower($str),strtolower($col)) !== false) {
            if(endsWith(trim(strtolower($str)), "desc") === true)
                return 'desc';
            else   if(endsWith(trim(strtolower($str)), "asc") === true)
                return 'asc';
            else '';
        }}
}

function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
}

 
function unique_multidim_array($array, $key) {
    $temp_array = array();
    $i = 0;
    $key_array = array();

    foreach($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
}