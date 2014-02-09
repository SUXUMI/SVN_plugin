<?php
// ------------------------------------------------------------------
// SVN Commit for ICEcoder v1.0 by Last Mile Synergy, LLC
// Will commit the selected file/folder to SVN Server
// ------------------------------------------------------------------


Class IceSvn {
	 function __construct() {
		svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_USERNAME,'gwfran');
		svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_PASSWORD,'Fossil@308007');
	}

	public function update($files) {
		if (is_string($files)) {
			$path =  $_SERVER['DOCUMENT_ROOT'] . $files;
			return(svn_update($path));
		} elseif (is_array($files)) {
			foreach ($files as $file) {
				$path = $_SERVER['DOCUMENT_ROOT'] . $file;
				svn_update($path);
			}
			return(1);
		}
		return(0);
	}

	public function commit($files, $comment) {
		if (is_string($files)) {
			$file = $files;
			$files = array();
			$files[0] = $file;
		}
		if (is_array($files)) {
			$file_array = array();
			foreach ($files as $file) {
				svn_add($_SERVER['DOCUMENT_ROOT'] . $file, true, true);
				array_push($file_array, $_SERVER['DOCUMENT_ROOT'] . $file);
			}
			svn_commit($comment, $file_array, true);
			return(1);
		}
		return(0);
	}

	public function delete($files, $comment) {
		if (is_string($files)) {
			$file = $files;
			$files = array();
			$files[0] = $file;
		}
		if (is_array($files)) {
			$file_array = array();
			foreach ($files as $file) {
				svn_delete($_SERVER['DOCUMENT_ROOT'] . $file, true);
				array_push($file_array, $_SERVER['DOCUMENT_ROOT'] . $file);
			}
			svn_commit($comment, $file_array, true);
			return(1);
		}
		return(0);
	}

	public function parseHtmlEntities($str) {
  	  	return html_entity_decode($str);
	}
}
?>
