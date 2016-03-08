<?php
// if ( ! function_exists('load_css'))
// {
// 	function load_css($file="",$attr=array(),$type="")
// 	{
// 		$query =  "<link href=".base_url('assets/'.$file)." rel='stylesheet'>";
// 		if ($type == 'url') {
// 			$query =  "<link href=".$file." rel='stylesheet'>";
// 		}

// 		return $query;
// 	}
// }


// if ( ! function_exists('load_js'))
// {
// 	function load_js($file="",$class="")
// 	{
// 		$query = "<script class='".$class."' src='".base_url('assets/'.$file)."'></script>";
// 		return $query;
// 	}
// }


if(!function_exists('getImg'))
{
	function getImg($file="",$width="",$height="auto",$class="",$type="")
	{
		$img = "<img src='".base_url('assets/images/'.$file)."' width='".$width."' height='".$height."' ".$class.">";
		if ($type == 'url') {
			$img = "<img src='".$file."' width='".$width."' height='".$height."' ".$class.">";
		}

		return $img;

	}
}

if (!function_exists('getModule')) {
	function getModule()
	{
		$CI = get_instance();
		$query = $CI->router->fetch_module();
		return $query;
	}
}

if (!function_exists('getController')) {
	function getController()
	{
		$CI = get_instance();
		$query = $CI->router->fetch_class();
		return $query;
	}
}

if (!function_exists('getFunction')) {
	function getFunction()
	{
		$CI = get_instance();
		$query = $CI->router->fetch_method();
		return $query;
	}
}

if(!function_exists('deleteDir')){
	function deleteDir($dirPath)
	{
		if(is_dir($dirPath)){
			$files = glob( $dirPath . '*', GLOB_MARK ); 
			foreach( $files as $file )
			{
				deleteDir( $file );      
			}

			rmdir( $dirPath );
		} elseif(is_file($dirPath)) {
			unlink( $dirPath );  
		}
	}
}

if ( ! function_exists('basic_select'))
{
	function basic_select($table="",$field="",$params="",$placeholder="",$required="")
	{
		$CI =& get_instance();

		$type = $CI->db->query( "SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'" )->row( 0 )->Type;
		preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
		$enum = explode("','", $matches[1]);
		$select = "<select class='form-control basic-chosen-select' name='".$field."' id='".$field."' style='color:black;' data-validation='".$required."' data-placeholder='".$placeholder."'>";
		$select .= "<option></option>";
		foreach ($enum as $key => $value) {
			$key = $key + 1;
			if($value==$params)
			{
				$select .= "<option value='".$key."' selected>".$value."</option>";
			}
			else{
				$select .= "<option value='".$key."'>".$value."</option>";
			}
		}
		$select .= "</select>";
		return $select;
	}
}

if ( ! function_exists('select_join'))
{
	function select_join($show="",$column="",$table="",$id="",$field="",$condition="",$params="",$required="",$placeholder="",$disabled="")
	{
		$CI =& get_instance();
		$CI->load->model('model','',FALSE);
		if (!empty($condition)) {
			$query = $CI->model->get($table,$column,$condition);
		}
		else{
			$query = $CI->model->get($table,$column);
		}		

		$select = "<select class='form-control search-select' '".$required."' data-placeholder='".$placeholder."' name='".$field."' id='".$field."' style='color:black;width:100%;' data-validation='".$required."' data-validation-error-msg='Anda belum mengisi field ini' $disabled>";
		$select .= "<option></option>";
		foreach ($query as $key => $value) {
			// $select .="<option value=''>No Select</option>";
			if($value[$id]==$params)
			{
				$select .= "<option value='".$value[$id]."' selected>".$value[$show]."</option>";
			}
			else {
				$select .= "<option value='".$value[$id]."'>".$value[$show]."</option>";

			}
		}

		$select .= "</select>";
		return $select;
	}
}

if (!function_exists('input_text_group')) {
	function input_text_group($name="",$label="",$value="",$placeholder="",$required="",$attr = array(),$help=""){
		$CI =& get_instance();
		$attribute = ' ';
		if(!empty($attr) OR is_array($attr))
		{
			foreach($attr as $key => $attrs)
			{
				$attribute .= ' '.$key.'="'.$attrs.'"';
			}
		}
		$query  = "<div class='form-group'>";
		$query .= "<label for='".$name."' class='col-lg-2 col-sm-2 control-label'>".$label."</label>";
		$query .= "<div class='col-sm-6'>";
		$query .= "<input type='text' name='".$name."' id=".$name." class='form-control' placeholder='".$placeholder."' value='".$value."' data-validation='".$required."' data-validation-error-msg='Anda belum mengisi field ini' '".$attribute."'>";
		if ($help) {
			$query .= "<span class='help-block'><small>".$help.".</small></span>";
		}
		$query .= "<div class='text-danger'>".form_error($name)."</div>";
		$query .= "</div>";
		$query .= "</div>";
		return $query;
	}
}

if (!function_exists('input_textarea_group')) {
	function input_textarea_group($name="",$label="",$value="",$placeholder="",$required="",$attr = array()){
		$CI =& get_instance();
		if(!empty($attr) OR is_array($attr))
		{
			$attribute = ' ';
			foreach($attr as $key => $attrs)
			{
				$attribute .= ' '.$key.'="'.$attrs.'"';
			}
		}
		$query  = "<div class='form-group'>";
		$query .= "<label for='".$name."' class='col-lg-2 col-sm-2 control-label'>".$label."</label>";
		$query .= "<div class='col-sm-6'>";
		$query .= "<textarea name='".$name."' placeholder='".$placeholder."' class='form-control' rows='6' data-validation='".$required."' data-validation-error-msg='Anda belum mengisi field ini' '".$attribute."'>".$value."</textarea>";
		$query .= "<div class='text-danger'>".form_error($name)."</div>";
		$query .= "</div>";
		$query .= "</div>";
		return $query;
	}
}

if (!function_exists('input_email_group')) {
	function input_email_group($name="",$label="",$value="",$placeholder="",$required="",$attr = array()){
		$CI =& get_instance();
		if(!empty($attr) OR is_array($attr))
		{
			$attribute = ' ';
			foreach($attr as $key => $attrs)
			{
				$attribute .= ' '.$key.'="'.$attrs.'"';
			}
		}
		$query  = "<div class='form-group'>";
		$query .= "<label for='".$name."' class='col-lg-2 col-sm-2 control-label'>".$label."</label>";
		$query .= "<div class='col-sm-6'>";
		$query .= "<input type='text' name='".$name."' id=".$name." class='form-control' placeholder='".$placeholder."' value='".$value."' data-validation='".$required." email' data-validation-error-msg-required='Anda belum mengisi field ini' data-validation-error-msg-email='Anda belum memberikan alamat email yang benar' '".$attribute."'>";
		$query .= "<div class='text-danger'>".form_error($name)."</div>";
		$query .= "</div>";
		$query .= "</div>";
		return $query;
	}
}

if (!function_exists('input_icon_group')) {
	function input_icon_group($name="",$label="",$value="",$placeholder="",$required="",$attr = array()){
		$CI =& get_instance();
		if(!empty($attr) OR is_array($attr))
		{
			$attribute = ' ';
			foreach($attr as $key => $attrs)
			{
				$attribute .= ' '.$key.'="'.$attrs.'"';
			}
		}
		$query  = "<div class='form-group'>";
		$query .= "<label for='".$name."' class='col-lg-2 col-sm-2 control-label'>".$label."</label>";
		$query .= "<div class='col-sm-6'>";
		$query .= "<input type='text' name='".$name."' id=".$name." class='form-control icp icp-auto' placeholder='".$placeholder."' value='".$value."' data-validation='".$required."' data-validation-error-msg='Anda belum mengisi field ini' '".$attribute."'>";
		$query .= "<div class='text-danger'>".form_error($name)."</div>";
		$query .= "</div>";
		$query .= "</div>";
		return $query;
	}
}

if (!function_exists('input_radio_group')) {
	function input_radio_group($name="",$label="",$val=array(),$params="",$required="")
	{
		$query  = "<div class='form-group'>";
		$query .= "<label for='".$name."' class='col-lg-2 col-sm-2 control-label'>".$label."</label>";
		$query .= "<div class='col-sm-6'>";
		foreach ($val as $key => $value) {
			$query .= "<div class='radio radio-primary radio-inline'>";
			if ($key==$params) {
				$query .= "<input type='radio' checked name='".$name."' value='".$key."' data-validation='".$required."' data-validation-error-msg='Anda harus memilih salah satu dari opsi yang ada' data-validation-error-msg-container='.error-radio-msg'>";
			}else{
				$query .= "<input type='radio' name='".$name."' value='".$key."' data-validation='".$required."' data-validation-error-msg='Anda harus memilih salah satu dari opsi yang ada' data-validation-error-msg-container='.error-radio-msg'>";
			}
			$query .= "<label for='".$name."'> ".$value." </label>";
			$query .= "</div>";
		}
		$query .= "</div>";
		$query .= "<div class='error-radio-msg col-sm-6'></div>";
		$query .= "</div>";
		return $query;
	}
}

if ( ! function_exists('select_join_group'))
{
	function select_join_group($show="",$column="",$table="",$id="",$field="",$label="",$condition="",$params="",$required="",$placeholder="",$disabled="")
	{
		$CI =& get_instance();
		$CI->load->model('model','',FALSE);
		if (!empty($condition)) {
			$query = $CI->model->get($table,$column,$condition);
		}
		else{
			$query = $CI->model->get($table,$column);
		}		

		$select  = "<div class='form-group'>";
		$select .= "<label for='".$field."' class='col-lg-2 col-sm-2 control-label'>".$label."</label>";
		$select .= "<div class='col-sm-6'>";
		$select .= "<select class='form-control search-select' '".$required."' data-placeholder='".$placeholder."' name='".$field."' id='".$field."' style='color:black;width:100%;' data-validation='".$required."' data-validation-error-msg='Anda belum mengisi field ini' $disabled>";
		$select .= "<option></option>";
		foreach ($query as $key => $value) {
			// $select .="<option value=''>No Select</option>";
			if($value[$id]==$params)
			{
				$select .= "<option value='".$value[$id]."' selected>".$value[$show]."</option>";
			}
			else {
				$select .= "<option value='".$value[$id]."'>".$value[$show]."</option>";

			}
		}

		$select .= "</select>";
		$select .= "<div class='text-danger'>".form_error($field)."</div>";
		$select .= "</div>";
		$select .= "</div>";
		return $select;
	}
}


if ( ! function_exists('select_join_multiple_group'))
{
	function select_join_multiple_group($show="",$column="",$table="",$id="",$field="",$label="",$condition="",$params="",$required="",$placeholder="",$disabled="")
	{
		$CI =& get_instance();
		$CI->load->model('model','',FALSE);
		if (!empty($condition)) {
			$query = $CI->model->get($table,$column,$condition);
		}
		else{
			$query = $CI->model->get($table,$column);
		}		

		$select  = "<div class='form-group'>";
		$select .= "<label for='".$field."' class='col-lg-2 col-sm-2 control-label'>".$label."</label>";
		$select .= "<div class='col-sm-6'>";
		$select .= "<select class='form-control search-select' '".$required."' data-placeholder='".$placeholder."' name='".$field."' id='".$field."' style='color:black;width:100%;' data-validation='".$required."' data-validation-error-msg='Anda belum mengisi field ini' $disabled multiple>";
		$select .= "<option></option>";
		foreach ($query as $key => $value) {
			// $select .="<option value=''>No Select</option>";
			if($value[$id]==$params)
			{
				$select .= "<option value='".$value[$id]."' selected>".$value[$show]."</option>";
			}
			else {
				$select .= "<option value='".$value[$id]."'>".$value[$show]."</option>";

			}
		}

		$select .= "</select>";
		$select .= "<div class='text-danger'>".form_error($field)."</div>";
		$select .= "</div>";
		$select .= "</div>";
		return $select;
	}
}

if ( ! function_exists('input_radio'))
{
	function input_radio($table="",$field="",$params="",$required="")
	{
		$CI =& get_instance();

		$type = $CI->db->query( "SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'" )->row( 0 )->Type;
		preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
		$enum = explode("','", $matches[1]);
		$no = 1;
		foreach ($enum as $key => $value) {
			$radio =  "<label class='radio-inline' style='color:#000000;'>";
			$key = $key + 1;

			if($value==$params)
			{
				$radio .= "<input type='radio' name='".$field."' value='".$key."' checked data-validation-error-msg='Pilih salah satu'  data-validation='".$required."' >".$value;
			}
			else{
				$radio .= "<input type='radio' name='".$field."' value='".$key."' data-validation='".$required."' data-validation-error-msg='Pilih salah satu' >".$value;
			}
			$radio .= "</label>";
			echo $radio;
		}
	}
}


function hash_password($string)
{
	$pengacak  = "3xP0r4D3v3L0p3R";
	$hash = md5($pengacak.md5($string).$pengacak);
	return $hash;
}

function range_years($start){
	$current_year = date('Y');
	for ($count = $current_year; $count >= $start; $count--)
	{
		$option = "<option value='{$count}'>{$count}</option>";
		echo $option;
	}	
}

if (!function_exists('count_all')) 
{
	function count_all($table="",$column="")
	{
		$CI =& get_instance();
		if ($column) {
			$CI->db->where($column);
		}
		$CI->db->from($table);
		return $CI->db->count_all_results(); 
	}
}

function getField($table="default",$field="",$params=""){

	$CI =& get_instance();

	$result = 0;	

	$CI->db->select($field);	
	if ($params) {
		$CI->db->where($params);
	}
	$query = $CI->db->get($table)->result_array();

	foreach($query as $row) {
		$result = $row[$field];
	}

	return $result;

}

function getMenu($field,$params="",$params2=""){

	$CI =& get_instance();

	empty($params) ? $params = getFunction() : $params = $params;
	empty($params2) ? $params2 = "" : $params2 = "/".$params2;

	// $kodeInduk =  $CI->model->get_where('master_menu',array('namaMenu'=>getController()));
	// $result = $CI->model->get_where('master_menu',array('kodeInduk'=>$kodeInduk[0]['idMenu'],'namaMenu'=>getFunction()));

	$result = $CI->model->get_where('master_menu',array('targetMenu'=>getModule()."/".getController()."/".$params.$params2));

	foreach($result as $row) {
		$result = $row[$field];
	}

	return $result;
}

function getCategory($field,$params=""){

	$CI =& get_instance();

	// $kodeInduk =  $CI->model->get_where('master_menu',array('namaMenu'=>getController()));
	// $result = $CI->model->get_where('master_menu',array('kodeInduk'=>$kodeInduk[0]['idMenu'],'namaMenu'=>getFunction()));

	$result = $CI->model->get_where('master_category',array('idMenu'=>$params));

	foreach($result as $row) {
		$result = $row[$field];
	}

	return $result;
}

function getBread(){
	$text = "
	<div class=\"row\">
		<div class=\"col-sm-12\">
			<h4 class=\"pull-left page-title\">".ucfirst(getModule())."</h4>
			<ol class=\"breadcrumb pull-right\">
				<li>".ucfirst(getModule())."</li>
				<li>".ucfirst(getController())."</li>
				<li class=\"active\">".ucfirst(getFunction())."</li>
			</ol>
		</div>
	</div>";

	return $text;
}

if(!function_exists('random_password'))
{
	function random_password()
	{		
		$alphabet = "ABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array();
		$alphaLength = strlen($alphabet) - 1; 
		for ($i = 0; $i < 4; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass);
	}
}

if(!function_exists('getMember'))
{
	function getMember($field="")
	{
		$CI =& get_instance();

		$query = $CI->model->join('user','*,
			user.idUser as id,
			master_provinsi.namaData as nama_provinsi,
			master_kota.namaData as nama_kota',array(
				array(
					'table'=>'user_info','parameter'=>'user.idUser=user_info.idUser'
					),
				array(
					'table'=>'master_data as master_provinsi','parameter'=>'user_info.provinsi=master_provinsi.idData'
					),
				array(
					'table'=>'master_data as master_kota','parameter'=>'user_info.kota=master_kota.idData'
					)
				),array('user.usernameUser'=>$CI->session->userdata('usernameUser')));

		return @$query[0][$field];
	}
}

if(!function_exists('setTanggal'))
{
	function setTanggal($string="")
	{

		$date = date('Y-m-d',strtotime($string));

		return $date;

	}
}

if(!function_exists('getTanggal'))
{
	function getTanggal($string="")
	{

		$date = date('d-m-Y',strtotime($string));

		return $date;

	}
}

if ( ! function_exists('input_price'))
{
	function input_price($name="",$value="",$placeholder="")
	{
		$query = "<input type='text' name='".$name."' value='".$value."' class='form-control' id='".$name."' placeholder='".$placeholder."' style='color:#000000;' onkeyup='nominal(this)'>";
		return $query;
	}
}

if ( ! function_exists('input_file_image'))
{
	function input_file_image($name="",$value="",$required="", $margin="")
	{
		$query = "<input type='file' name='".$name."' value='".$value."' id='".$name."' style='color:#000000; $margin' data-validation='".$required." mime size' data-validation-allowing='jpg, png, jpeg' data-validation-max-size='1M' data-validation-error-msg='Field ini wajib diisi' data-validation-error-msg-mime='Field ini wajib diisi foto' data-validation-error-msg-size='Maksimal ukuran gambar adalah 1MB' accept='image/jpg,image/png,image/jpeg'>";
		return $query;
	}
}