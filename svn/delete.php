<?php
// ------------------------------------------------------------------
// SVN Delete for ICEcoder v1.0 by Last Mile Synergy, LLC
// Will delete the selected file/folder to SVN Server
// ------------------------------------------------------------------
include("../../lib/settings.php");
include("svn.php");

$files = str_replace("|","/",strClean($_GET['f']));

if($_SESSION['loggedIn']) {
	$svn = new IceSvn();
	$comment = $svn->parseHtmlEntities($_GET['c']);
	echo '<script>top.ICEcoder.serverMessage("<b>SVN Delete</b>");</script>';
	$commit = $svn->delete($files, $comment);
	echo '<script>';
	echo !$commit
		? 'alert("Problem with SVN Delete!");'
		: 'setTimeout(function(){top.ICEcoder.serverMessage();top.ICEcoder.serverQueue("del",0);},500);';
	echo '</script>';
}
?>
