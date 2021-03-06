<?php
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
require_once('./roots.php');
require('../../include/helpers/inc_environment_global.php');
/**
* CARE2X Integrated Hospital Information System Deployment 2.1 - 2004-10-02
* GNU General Public License
* Copyright 2002,2003,2004,2005 Elpidio Latorilla
* elpidio@care2x.org, 
*
* See the file "copy_notice.txt" for the licence notice
*/
define('MODULE','cafeteria');
define('LANG_FILE_MODULAR','cafeteria.php');
$local_user='ck_cafenews_user';
require_once($root_path.'include/helpers/inc_front_chain_lang.php');

$breakfile='cafenews.php'.URL_APPEND;

if(isset($cafeopt)&&!empty($cafeopt)) {
    switch($cafeopt)
    {
	    case "price":	header('Location: cafenews-edit-price-select.php'.URL_REDIRECT_APPEND.'&cafeopt=price');
						     break;
	    case "menu":	header('Location: cafenews-edit-menu-select-week.php'.URL_REDIRECT_APPEND);
						    break;
	    case "news":	header('Location: cafenews-edit-select-art.php'.URL_REDIRECT_APPEND);
						    break;
    }
} else {
    $cafeopt='';
}
?>
<html>
<!-- Generated by AceHTML Freeware http://freeware.acehtml.com -->
<!-- Creation date: 21.12.2001 -->
<head>

<title></title>

<script language="javascript">
function chkForm(d)
{
	if((d.cafeopt[0].checked)||(d.cafeopt[1].checked)||(d.cafeopt[2].checked)) return true;
		else return false;
}
</script>

</head>
<body>
<FONT  SIZE=8 COLOR="#cc6600" FACE="verdana,Arial">
<img <?php echo createComIcon($root_path,'basket.gif','0') ?>><b><?php echo $LDCafeNews ?></b></FONT>
<hr>
<form name="selectform" action="cafenews-edit-select.php" onSubmit="return chkForm(this)" method="post">
<table border=0>
  <tr>
    <td colspan=2><FONT FACE="verdana,Arial"><FONT  SIZE=5 COLOR="#000066" FACE="verdana,Arial"><?php echo $LDWhatToDo ?></font><p>
			<font size=2><?php echo $LDPlsMarkSelection ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td bgcolor="ccffff" colspan=2><FONT FACE="verdana,Arial"><p><br>
		<input type="radio" name="cafeopt" value="menu"> <a href="#" onClick="document.selectform.cafeopt[0].checked=true"><?php echo $LDMenuEdit ?></a><br>
    	<input type="radio" name="cafeopt" value="price"> <a href="#" onClick="document.selectform.cafeopt[1].checked=true"><?php echo $LDPriceEdit ?></a><br>
    	<input type="radio" name="cafeopt" value="news"> <a href="#" onClick="document.selectform.cafeopt[2].checked=true"><?php echo $LDNewsEdit ?></a><br><p>
  </td>
  </tr>

  <tr>
    <td><p><br>
	<a href="<?php echo $breakfile ?>" class="button icon arrowleft">Back</a>
	</td>
    <td><p><br>
<input type="image" <?php echo createLDImgSrc($root_path,'continue.gif','0') ?>>
        </td>
    <td align=right><p><br><FONT FACE="verdana,Arial">
  &nbsp;</td>
  </tr>
</table>
<input type="hidden" name="sid" value="<?php echo $sid ?>">
<input type="hidden" name="title" value="<?php echo strtr($LDCafeNews," ","+") ?>">
<input type="hidden" name="lang" value="<?php echo $lang ?>">
</form></body>
</html>
