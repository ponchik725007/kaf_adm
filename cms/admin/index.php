﻿<!DOCTYPE html>
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
		if($_POST['add']):
			$obj->add_content($_POST);
		elseif ($_POST['update']):
			$obj->update_content($_POST);
		endif;
		?>
</div>

</body>
</html>