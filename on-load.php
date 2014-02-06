<!--
Purpose:	This file is run when ICEcoder has loaded
Langs:		Anything - PHP, JS etc
Example:
//-->
<script>
top.document.getElementById("fileMenu").innerHTML += '<div onMouseOver="ICEcoder.showFileMenu()" style="padding: 2px 0"><hr></div><a href="javascript:top.ICEcoder.checkout(top.ICEcoder.rightClickedFile)" onMouseOver="ICEcoder.showFileMenu()">SVN Checkout</a><a href="javascript:top.ICEcoder.commit(top.ICEcoder.rightClickedFile)" onMouseOver="ICEcoder.showFileMenu()">SVN Commit</a>';

// Pass target file/folder to SVN Checkout
top.ICEcoder.checkout = function(tgt) {
		tgt=tgt.replace(/\//g,"|");
		top.ICEcoder.filesFrame.contentWindow.frames['fileControl'].location.href="plugins/svn/checkout.php?f="+tgt;
}

// Pass target file/folder to SVN Commit
top.ICEcoder.commit = function(tgt) {
		tgt=tgt.replace(/\//g,"|");
		top.ICEcoder.filesFrame.contentWindow.frames['fileControl'].location.href="plugins/svn/commit.php?f="+tgt;
}
</script>
