<?php


class modernCMS{
	var $host;
	var $username;
	var $password;
	var $db;
	
	function connect(){
		$con=mysql_connect($this->host, $this->username, $this->password)or die(msql_error());
		mysql_select_db($this->db,$con) or die(msql_error());
		
	}
	function get_content($id=''){
		if($id!=""):
			$id=mysql_real_escape_string($id);
			$sql="SELECT *FROM cms_content WHERE id='$id'";
			$return='<p><a href="index.php"> Вернуться назад</a></p>';
		else:
			$sql="SELECT id,time,title,main FROM cms_content ORDER BY time DESC";
		endif;	
		
		
		$res=mysql_query($sql) or die(mysql_error());
		if (mysql_num_rows($res)!=0):
		while($row=mysql_fetch_assoc($res)){
			if ($id==0){
			echo'<h1><a href="index.php?id=' .$row['id'].'">'.$row['title'].'</a></h1>';
			echo'<font size="2"><p>'.$row['time'].'</p></font>';
			echo '<p>'.$row['main'].'</p>';
			echo'<font color="black"><u><p><a href="index.php?id=' .$row['id'].'">Читать дальше</a></p></u></font>';
			}else{
			echo'<h1><a href="index.php?id=' .$row['id'].'">'.$row['title'].'</a></h1>';
			echo'<font size="2"><p>'.$row['time'].'</p></font>';
			echo '<p>'.$row['body'].'</p>';
			}
		}
		else:
			echo'<p>NOt exist</p>';
			endif;
			echo $return;
	}

	function add_content($p){
	$title=mysql_real_escape_string($p['title']);
	$body=mysql_real_escape_string($p['body']);
	$time=mysql_real_escape_string($p['time']);
	$main=mysql_real_escape_string($p['main']);
	
	if (!$title||!$body):
		if(!$title):
		echo"<p>The title is required</p>";
		endif;
		if(!$body):
			echo"<p>The body is requed</p>";
		endif;	
		echo'<a href="add-content.php">Try again</a>';
	else:
		$sql="INSERT INTO cms_content VALUES(null,NOW(),'$title','$main','$body')";
		$res=mysql_query($sql) or  die(mysql_error());
		
		echo"ЗАпись добавлена";
	endif;
	}
	
	function manage_content(){
		echo'<div id="manage">';
		$sql="SELECT*FROM cms_content";
		$res=mysql_query($sql) or die(mysql_error());
		while($row=mysql_fetch_assoc($res)):
	
	?>
		<div>
			<p><h3 class="title"><?=$row['title']?></h3></p>
		
			<div class="actions"><a href="update-content.php?id=<?=$row['id']?>">редактировать</a>|<a href="?delete=<?=$row['id'];?>">Удалить</a>		</div>
		</div>
	<?php
		endwhile;
		echo'</div>';
	}
	
	function delete_content($id){
		if(!$id){
			return false;
		}else{
			$id=mysql_real_escape_string($id);
			$sql="DELETE FROM cms_content WHERE id='$id'";
			$res=mysql_query($sql) or die(mysql_error());
			echo"Запись удалена!";
		}
	}
	
	function update_content_form($id){
		$id=mysql_real_escape_string($id);
		$sql="SELECT *FROM cms_content WHERE id='$id'";
		$res=mysql_query($sql) or die(mysql_error());
		$row=mysql_fetch_assoc($res);
		?>
			<form method="post" action="index.php">
			
		<input type="hidden" name="update" value="true">
		<input type="hidden" name="id" value="<?=$row['id']?>">
			<div>
				<label for="title"> Заголовок:</label>
				<input type="text" name="title" id="title" value="<?=$row['title']?>" style="width:300%">
			</div>
			<div>
				<label for="time"> Время:</label>
				<input type="text" name="time" id="time" value="<?=$row['time']?>">
			</div>
			<div>
				<label for="main"> Главное:</label>
				<textarea name="main" id="main" rows="15" cols="100"><?=$row['main']?></textarea>
			</div>
<div>			
	<label for="body">Основной текст:</label>
	<textarea name="body" id="body" rows="15" cols="100"><?=$row['body']?></textarea>
</div>	
	<input type="submit" name="submit" value="Обновить">	
		</form>
		<?php
	}
	
	function update_content($p){
	$title=mysql_real_escape_string($p['title']);
	$body=mysql_real_escape_string($p['body']);
	$id=mysql_real_escape_string($p['id']);
	$main=mysql_real_escape_string($p['main']);
	$time=mysql_real_escape_string($p['time']);
	if (!$title||!$body):
		if(!$title):
		echo"<p>The title is required</p>";
		endif;
		if(!$body):
			echo"<p>The body is requed</p>";
		endif;	
		echo'<a href="update-content.php?id='.$id.'">Try again</a>';
	else:
		$sql="UPDATE cms_content SET time='$time', title='$title', main='$main',body='$body' WHERE id='$id'";
		$res=mysql_query($sql) or  die(mysql_error());
		echo"Запись отредактирована";
	endif;
	}
}
?>