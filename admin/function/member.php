<div class="header">Danh Sách Thành Viên</div>
<?php
if(isset($_GET['del_uid']))
{
	$del_uid=$_GET['del_uid'];
	$sql="DELETE FROM users WHERE uid=$del_uid";
	if(mysqli_query($conn,$sql)) echo "đã xóa thành viên thành công";
	else echo "có lõi xảy ra";
	$sql=NULL;
}
//tìm số trang
$sql="SELECT * FROM users";
$result = mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
$nump=(int)($num/$maxpage);
if(($nump*$maxpage)<$num) $nump++;
if(isset($_POST['page'])) $p=$_POST['page'];
else $p=1;
?>
<!--hiển thị list page-->
<div class="listpage">
<?php for($i=1;$i<=$nump;$i++) 
{ 
	if($i==$p)
	{?>
		<form action="" method="post" style="display:inline-block">
			<input style="background:#000;color:#fff" type="submit" name="page" value="<?php echo $i; ?>"/>
		</form>
	<?php 
	} 
	else 
	{?>
		<form action="" method="post" style="display:inline-block">
			<input type="submit" name="page" value="<?php echo $i; ?>"/>
		</form>
<?php
	}
} ?>
</div>
<!--end lít page-->
<div class="list-baiviet">
<table>
	<tr>
		<th width="20%">username</th>
		<th width="30%">email</th>
		<th width="13%">birthday</th>
		<th width="10%">gender</th>
		<th width="20%">last login</th>
		<th width="7%">delete</th>
	</tr>
<?php
$sql=NULL;
$result=NULL;
$row=NULL;
$sql="SELECT * FROM users ORDER BY uid DESC LIMIT ".($p-1)*$maxpage.",".$maxpage;
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{
?>
<tr>
	<td><?php echo $row['username']; ?></td>
	<td><?php echo $row['email']; ?></td>
	<td><?php echo $row['birthday']; ?></td>
	<td><?php echo $row['gender']; ?></td>
	<td><?php echo date("H:i | d-m-Y",$row['lastlogin']); ?></td>
	<td style="text-align:center"><a href="?frame=member&del_uid=<?php echo $row['uid']; ?>"><img src="css/images/delete.png"/></a></td>
</tr>
<?php
}
$sql=NULL;
$result=NULL;
$row=NULL;
?>
</table>
</div>