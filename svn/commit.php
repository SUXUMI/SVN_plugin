<?php
// ------------------------------------------------------------------
// SVN Commit for ICEcoder v1.0 by Last Mile Synergy, LLC
// Will commit the selected file/folder to SVN Server
// ------------------------------------------------------------------
include("../../lib/settings.php");
include("svn.php");

$files = str_replace("|","/",strClean($_GET['f']));

if($_SESSION['loggedIn']) {
	$svn = new IceSvn();
	echo '<script>top.ICEcoder.serverMessage("<b>SVN Commit</b>");</script>';
	$commit = $svn->commit($files);
	echo '<script>';
	echo !$commit
		? 'alert("Problem with SVN Commit!");'
		: 'setTimeout(function(){top.ICEcoder.serverMessage();top.ICEcoder.serverQueue("del",0);},500);';
	echo '</script>';
}
?>
