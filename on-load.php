<!--
Purpose:	This file is run when ICEcoder has loaded
Langs:		Anything - PHP, JS etc
Example:
//-->
<script>
top.document.getElementById("fileMenu").innerHTML += '<div onMouseOver="ICEcoder.showFileMenu()" style="padding: 2px 0"><hr></div><a href="javascript:top.ICEcoder.svnCheckout(top.ICEcoder.rightClickedFile)" onMouseOver="ICEcoder.showFileMenu()">SVN Checkout</a><a href="javascript:top.ICEcoder.svnCommit(top.ICEcoder.rightClickedFile)" onMouseOver="ICEcoder.showFileMenu()">SVN Commit</a><a href="javascript:top.ICEcoder.svnDelete(top.ICEcoder.rightClickedFile)" onMouseOver="ICEcoder.showFileMenu()">SVN Delete</a>';

// Pass target file/folder to SVN Checkout
top.ICEcoder.svnCheckout = function(tgt) {
	tgt=tgt.replace(/\//g,"|");
	top.ICEcoder.filesFrame.contentWindow.frames['fileControl'].location.href="plugins/svn/checkout.php?f="+tgt;
}

// Pass target file/folder to SVN Commit
top.ICEcoder.svnCommit = function(tgt) {
		tgt=tgt.replace(/\//g,"|");
   		var comments = prompt("Enter SVN comment: ", "");
		var encodedStr = comments.replace(/[\u00A0-\u99999<>\&]/gim, function(i) {
		   return '&#'+i.charCodeAt(0)+';';
		});
		top.ICEcoder.filesFrame.contentWindow.frames['fileControl'].location.href="plugins/svn/commit.php?f="+tgt+"&c="+comments;
}

// Pass target file/folder to SVN Delete
top.ICEcoder.svnDelete = function(tgt) {
		tgt=tgt.replace(/\//g,"|");
   		var comments = prompt("Enter SVN comment: ", "");
		var encodedStr = comments.replace(/[\u00A0-\u99999<>\&]/gim, function(i) {
		   return '&#'+i.charCodeAt(0)+';';
		});
		top.ICEcoder.filesFrame.contentWindow.frames['fileControl'].location.href="plugins/svn/delete.php?f="+tgt+"&c="+comments;
}
</script>