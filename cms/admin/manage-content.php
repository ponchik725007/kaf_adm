<!DOCTYPE html>
<?php
include '../cms_class.php';

 $obj=new modernCMS();
 $obj->host='localhost';
 $obj->username='root';
 $obj->password='p3ieIMsc';
 $obj->db='moderncms';
 
 $obj->connect();
?>
<head>
<title>My cms
</title>
<link rel="stylesheet" href="../style.css" type="text/css" media="screen" charset="utf-8">
</head>
<body>
<div id="page-wrap">
<?php
		include'nav.php';
		?>
	<?php
		if($_GET['delete']):
			$obj->delete_content($_GET['delete']);
		endif;
		?>
	<?php
		$obj->manage_content();
		?>
</div>

</body>
</html>