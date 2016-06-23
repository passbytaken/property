<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if(!function_exists('page_list_url'))
	{
		/**
		 * 列表url规则
		 *  ...
		 * @param int $typeid
		 * @param int $catid
		 * @param int $areaid
		 * @param int $pageno
		 */
		function page_list_url($base_url,$use_baseurl=false)
		{
			if($use_baseurl)
			return SITE_URL. $base_url . '/{$page}' ;
			else
			return SITE_URL. $base_url  ;
		}
	}

	
	if(!function_exists('clear_zero'))
	{
		function clear_zero($v)
		{
			return $v==0?'0':$v;
		}
	}
	
	
	if(!function_exists('order_status'))
	{
		function order_status($k)
		{
			$arr = array(ORDER_STATUS_UNPAY=>'未处理',ORDER_STATUS_PAID=>'已处理',ORDER_STATUS_FINISH=>'处理完成');
			return isset($arr)?$arr[$k]:"";
		}
	}
	
	if(!function_exists('order_status_select'))
	{
		function order_status_select($defaultvalue=0)
		{
			$arr = array(ORDER_STATUS_UNPAY=>'未处理',ORDER_STATUS_PAID=>'已处理');
			$html="";
			foreach($arr as $k=>$v)
			{
				$html.="<option  value='".$k."' ".($defaultvalue==$k?"selected='selected' ":' ')." >".$v."</option>";
			}
			return $html;
		}
	}
	
	if(!function_exists('pay_radio_options'))
	{
		function pay_radio_options($defaultvalue,$str)
		{
			$_arr = array(1=>'货到付款');
			$html="";
			foreach($_arr as $k=>$v)
			{
				$s="";
				if(stristr($defaultvalue,$v)) $s= 'checked="checked"' ;
				$html .=' <label> <input type="radio" '.$str.' value="'.$v.'" ' .$s.' > '.$v.' </label>';
			}
			return $html;
		}
	}
	
	if(!function_exists('is_mobile'))
	{
		function is_mobile($mobile=''){
			
			if (strlen ( $mobile ) != 11 || ! preg_match ( '/^1[2|3|4|5|8|6|7|8|9][0-9]\d{4,8}$/', $mobile )) {  
				return false;  
			} else {  
				return true;  
			}  
			
		}
	}
	
	if(!function_exists('isset_trim'))
	{
		function isset_trim($var)
		{
			if(!isset($var))return false;
			if(trim($var)=="")return false;
			return true;
		}
	}
	
	if(!function_exists('form_select'))
	{
		/**
		 * 下拉选择框
		 */
		function form_select($array = array(), $id = 0, $str = '', $default_option = '') {
			$string = '<select '.$str.'>';
			$default_selected = (empty($id) && $default_option) ? 'selected' : '';
			if($default_option) $string .= "<option value='' $default_selected>$default_option</option>";
			if(!is_array($array) || count($array)== 0) return false;
			$ids = array();
			if(isset($id)) $ids = explode(',', $id);
			foreach($array as $key=>$value) {
				$selected = in_array($key, $ids) ? 'selected' : '';
				$string .= '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
			}
			$string .= '</select>';
			return $string;
		}
	}
	
	if(!function_exists('form_radio'))
	{
	
		/**
		 * 单选框
		 * 
		 * @param $array 选项 二维数组
		 * @param $id 默认选中值
		 * @param $str 属性
		 */
		function form_radio($array = array(), $id = 0, $str = '', $width = 0, $field = '') {
			$string = '';
			foreach($array as $key=>$value) {
				$checked = trim($id)==trim($key) ? 'checked' : '';
				if($width) $string .= '<label class="ib" style="width:'.$width.'px">';
				$string .= '<input type="radio" '.$str.' id="'.$field.'_'.htmlspecialchars($key).'" '.$checked.' value="'.$key.'"> '.$value;
				if($width) $string .= '</label>';
			}
			return $string;
		}
	}
	
