<?php
// ------------------------------------------------------------------
// SVN Update for ICEcoder v1.0 by Last Mile Synergy, LLC
// Will update the selected file/folder from SVN Server
// ------------------------------------------------------------------
include("../../lib/settings.php");
include("svn.php");

$files = str_replace("|","/",strClean($_GET['f']));

if($_SESSION['loggedIn']) {
	$svn = new IceSvn();
	echo '<script>top.ICEcoder.serverMessage("<b>SVN Update</b>");</script>';
	$update = $svn->update($files);
	echo '<script>';
	echo !$update
		? 'alert("Problem with SVN Update!");'
		: 'setTimeout(function(){top.ICEcoder.serverMessage();top.ICEcoder.serverQueue("del",0);},500);';
	echo '</script>';
}
?>
