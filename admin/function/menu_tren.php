<div class="header">menu trên</div>
<?php
if(isset($_GET['act']))
{
	if($_GET['act']=="del")
	{
		$id=$_GET['id'];
		$sql="DELETE FROM menu_tren WHERE id=$id";
		if(mysqli_query($conn,$sql)) echo "đã xóa thành công";
		else echo "có lỗi xảy ra";
		$sql=NULL;
	}
	else if($_GET['act']=="edit")
	{
		$id=$_GET['id'];
		///////////////xu ly///////////////////////////////////////
		if(isset($_POST['submit_edit_menu_tren']))
		{
			$title=$_POST['title'];
			$link=$_POST['link'];
			$sql="UPDATE menu_tren SET title='$title',link='$link' WHERE id=$id";
			if(mysqli_query($conn,$sql)) echo "đã cập nhật thành công";
			else echo "có lỗi xảy ra";
			$sql=NULL;
		}
		/////////////////////////////////////////////////////////////
		$sql="SELECT * FROM menu_tren WHERE id=$id";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		$sql=NULL;$result=NULL;
?>
<form action="" method="post">
	title: <input type="text" name="title" value="<?php echo $row['title']; ?>"/><br/>
	link: <input type="url" name="link" value="<?php echo $row['link']; ?>"/><br/>
	<input type="submit" name="submit_edit_menu_tren" value="edit"/>
</form>
<?php
	}
	else if($_GET['act']=="add")
	{
?>
<?php
if(isset($_POST['submit_add_menu_tren']))
{
	$title=$_POST['title'];
	$link=$_POST['link'];
	$sql="INSERT INTO menu_tren(title,link) VALUES('$title','$link')";
	if(mysqli_query($conn,$sql)) echo "đã add thành công";
	else echo "có lỗi xảy ra";
	$sql=NULL;
}
?>
<form action="" method="post">
	title: <input type="text" name="title"/><br/>
	link: <input type="url" name="link"/><br/>
	<input type="submit" name="submit_add_menu_tren" value="ADD"/>
</form>
<?php
	}
}
?>
<div class="list-baiviet">
<table>
	<tr>
		<th>title</th>
		<th>link</th>
		<th>action</th>
	</tr>
<?php
$sql="SELECT * FROM menu_tren";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{
?>
<tr>
	<td><?php echo $row['title']; ?></td>
	<td><?php echo $row['link']; ?></td>
	<td>
		<a href="?frame=menu_tren&act=del&id=<?php echo $row['id']; ?>">
			<img src="css/images/delete.png"/>
		</a>
		<a href="?frame=menu_tren&act=edit&id=<?php echo $row['id']; ?>">
			<img src="css/images/edit.png"/>
		</a>
	</td>
</tr>
<?php
}
$sql=NULL;
$result=NULL;
$row=NULL;
?>
</table>
</div>
<a href="?frame=menu_tren&act=add">
	<img src="css/images/add.png"/>
</a>