<?php
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
require('./roots.php');
require('../../include/helpers/inc_environment_global.php');
/**
* CARE2X Integrated Hospital Information System Deployment 2.1 - 2004-10-02
* GNU General Public License
* Copyright 2002,2003,2004,2005 Elpidio Latorilla
* elpidio@care2x.org, 
*
* See the file "copy_notice.txt" for the licence notice
*/
//define('LANG_FILE','doctors.php');
if($_SESSION['sess_user_origin']=='staff_admin'){
	$local_user='aufnahme_user';
}else{
	$local_user='ck_op_dienstplan_user';
}
require_once($root_path.'include/helpers/inc_front_chain_lang.php');

require_once($root_path.'modules/staff_admin/model/class_staff.php');
$pers_obj=new staff;
$pers_obj->useAssignmentTable();
$data=array();

//$db->debug=true;

if($mode!='delete'){
	$data['staff_nr']=$nr;
	$data['role_nr']=16; // 16 = nurse (role person)
	$data['location_type_nr']=1; // 1 = dept (location type)
	$data['location_nr']=$dept_nr;
	$data['date_start']=date('Y-m-d');
}

$data['modify_id']=$_SESSION['sess_user_name'];

switch($mode){
	case 'save':
					$data['history']="Add: ".date('Y-m-d H:i:s')." = ".$_SESSION['sess_user_name']."\n";
					$data['create_id']=$_SESSION['sess_user_name'];
					$data['create_time']=date('YmdHis');
					$pers_obj->setDataArray($data);
					if(!$pers_obj->insertDataFromInternalArray())  echo "$obj->sql<br>$LDDbNoSave";
					break;
	case 'update':
					$data['history']=$pers_obj->ConcatHistory("Update: ".date('Y-m-d H:i:s')." = ".$_SESSION['sess_user_name']."\n");
					$pers_obj->setDataArray($data);
					$data['modfiy_id']=$_SESSION['sess_user_name'];
					$data['modify_time']=date('YmdHis');
					if(!$pers_obj->updateDataFromInternalArray($item_nr))  echo "$obj->sql<br>$LDDbNoUpdate";
					break;
	case 'delete':
					$data['status']='deleted';
					$data['date_end']=date('Y-m-d');
					$data['history']=$pers_obj->ConcatHistory("Deleted: ".date('Y-m-d H:i:s')." = ".$_SESSION['sess_user_name']."\n");
					$data['modfiy_id']=$_SESSION['sess_user_name'];
					$data['modify_time']=date('YmdHis');
					$pers_obj->setDataArray($data);
					if(!$pers_obj->updateDataFromInternalArray($item_nr))  echo "$obj->sql<br>$LDDbNoUpdate";
}
header("location:nursing-or-roster-staff-list.php".URL_REDIRECT_APPEND."&saved=1&retpath=$retpath&ipath=$ipath&dept_nr=$dept_nr&nr=$nr");
exit;
?>