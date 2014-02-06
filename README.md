SVN_plugin
==========

SVN Plugin for ICEcoder


INSTALLATION

1) Install the PECL SVN library for PHP (http://www.php.net/manual/en/svn.installation.php)
2) put the svn directory into the icecoder/plugins directory
3) cat the contents of on-load.php into ICEcoder's icecoder/processes/on-load.php file
4) Using the ICEcoder Terminal window, do an svn checkout of your code into a development directory
5) In icecoder/plugins/svn/svn.php, replace "username" and "password" with your SVN username/password 

USE

Right-click on a directory or file and select "SVN Update" to pull updates from the SVN server OR select "SVN Commit" to push your changes to the SVN server
