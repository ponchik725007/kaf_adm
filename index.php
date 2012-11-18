<?php
  include_once('functions.php');
 
include 'cms/cms_class.php';

 $obj=new modernCMS();
 $obj->host='localhost';
 $obj->username='root';
 $obj->password='p3ieIMsc';
 $obj->db='moderncms';
 
 $obj->connect();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="keywords" content="МГТУ ГА, кафедра, прикладной математики, контакты, история" />
		<meta name="description" content="Информация о кафедре прикладной математики МГТУ ГА" />
		<link media="screen" rel="stylesheet" href="style.css"/>
		<title>Кафедра прикладной математики</title>
	</head>

	<body>
		
		<div id="container">
			<div id="header">
				<?hat();?>
			</div>
			<div id="lft">
				<?menu();?>
			</div>
			
			<div id="rght">
				<?kont();?>			
			</div> 
			<div id="cntr"> 
			<p><h2><u>
			Новости Кафедры
			</u></h2></p>
				<div id="std">
					<p>
		
	<?php
		if(isset($_GET['id'])):
			$obj->get_content($_GET['id']);
		else:
			$obj->get_content();
		endif;	
		?>
					</p>
				
					
					<span class="sss"><a href="#here">В начало</a></span><br>
				</div>	
			</div>
			
			<div id="footer">
				<?floorr();?>				
			</div>
		</div>
	</body>
</html>