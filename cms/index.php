<!DOCTYPE html>
<?php
include 'cms_class.php';

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
<link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8">
</head>
<body>
<div id="page-wrap">
<?php
		include'admin/nav.php';
		?>
	<?php
		if(isset($_GET['id'])):
			$obj->get_content($_GET['id']);
		else:
			$obj->get_content();
		endif;	
		?>
</div>

</body>
</html>