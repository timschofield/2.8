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
define('MODULE','tools');
define('LANG_FILE_MODULAR','tools.php');
//$local_user='ck_admin_user';
define('NO_2LEVEL_CHK',1);
require_once($root_path.'include/helpers/inc_front_chain_lang.php');

$breakfile='config_options.php'.URL_APPEND;

$thisfile=basename(__FILE__);

if(isset($mode)&&$mode=='save'){
	// Save to user config table

	$config_new['template_theme']=$gui_theme;
	
	include_once($root_path.'include/core/class_userconfig.php');
	
	$user=new UserConfig;

	if($user->getConfig($_COOKIE['ck_config'])){

		$config=&$user->getConfigData();
	
		$config=array_merge($config,$config_new);

		if($user->saveConfig($_COOKIE['ck_config'],$config)){
			header('location:'.basename(__FILE__).URL_REDIRECT_APPEND.'&saved=1');
			exit;
		}
	}
}

# Start Smarty templating here
 /**
 * LOAD Smarty
 */
 # Note: it is advisable to load this after the inc_front_chain_lang.php so
 # that the smarty script can use the user configured template theme

 require_once(CARE_BASE.'/include/helpers/smarty_care.class.php');
 $smarty = new smarty_care('system_admin');

# Title in toolbar
 $smarty->assign('sToolbarTitle',$LDUserConfigOpt);
$smarty->assign('LDBack', $LDBack);
 $smarty->assign('LDHelp', $LDHelp);
 $smarty->assign('LDClose', $LDClose);
 # href for help button
$smarty->assign('pbHelp',CARE_GUI . "modules/" . MODULE . "/help/" . $lang . "/config_guitheme.html"); 
 # href for close button
 $smarty->assign('breakfile',$breakfile);

 # Window bar title
 $smarty->assign('sWindowTitle',$LDUserConfigOpt);

 # Body Onload js
 if(isset($saved)&&$saved) $smarty->assign('sOnLoadJs','onLoad="reloadParent();"');

# Collect js code

ob_start();
?>
 <?php if($rows) : ?>
<script language="javascript" src="<?php echo $root_path; ?>js/check_menu_item_same_item.js"></script>
<?php endif ?>
<script language="javascript">
<!-- Script Begin
function reloadParent() {
	if(confirm("The browser needs to be refreshed to see the changes.\n Do you like to refresh it now?")) window.parent.location.reload();

}
//  Script End -->
</script>

<?php

$sTemp = ob_get_contents();
ob_end_clean();
$smarty->append('JavaScript',$sTemp);

# Buffer page output

ob_start();

?>
<ul>

<FONT  color="#000066"  size=4><?php echo $LDGUITheme; ?></font>
<br>

<form method="post">
<?php if (isset($saved)&&$saved) { 
	echo '';	
?>
<FONT class="prompt"><?php echo $LDChangeSaved ?></font><br>
<?php } ?>
<table border=0 cellspacing=1 cellpadding=2>  

  <tr >
    <td colspan=3>&nbsp;</td>
  </tr>
  
  <tr class="wardlisttitlerow">
    <td><b></b></td>
    <td><b><?php echo $LDTheme; ?></b></td>
  </tr>
  
  <tr >
    <td colspan=3><br><input type="image" <?php echo createLDImgSrc($root_path,'savedisc.gif','0'); ?> border=0></td>
  </tr>
  </table>
<?php
if($not_trans_id){
?>
<input type="hidden" name="sid" value="<?php echo $sid; ?>">
<?php
}
?>
<input type="hidden" name="max_items" value="<?php echo ($i-1); ?>">
<input type="hidden" name="lang" value="<?php echo $lang; ?>">
<input type="hidden" name="mode" value="save">
</form>

</ul>

<?php

$sTemp = ob_get_contents();
ob_end_clean();

# Assign page output to the mainframe template

$smarty->assign('sMainFrameBlockData',$sTemp);
 /**
 * show Template
 */
 $smarty->display(CARE_BASE . 'main/view/mainframe.tpl');

?>