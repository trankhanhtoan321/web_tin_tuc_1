<?php include "header.php"; ?>
<table style="width:100%">
	<tr>
		<td style="vertical-align:top;width:75%">
			<div class="header">profile page</div>
<?php
if(isset($_SESSION['uid']))
{
$uid=$_SESSION['uid'];
$sql="SELECT * FROM users WHERE uid=$uid";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
//chúc sinh nhật user
$a=getdate_now();
$b=$row['birthday'];
$a=substr($a,5);
$b=substr($b,5);
if($a==$b)
{
?>
	<div style="text-align:center">
	<h1> chúc mừng sinh nhật <?php echo $row['username']; ?></h1><br/>
	<img src="css/images/chuc-sinh-nhat.png"/>
	</div>
<?php
}
//edit thông tin
if(isset($_GET['edit']))
{
	$edit=$_GET['edit'];
	if($edit=="username") include "function/edit_username.php";
	else if($edit=="email") include "function/edit_email.php";
	else if($edit=="birthday") include "function/edit_birthday.php";
	else if($edit=="password") include "function/edit_password.php";
	else if($edit=="avatar") include "function/edit_avatar.php";
	else if($edit=="gender") include "function/edit_gender.php";
}
//hien thi thong tin user
?>
<div class="table_profile">
	<table>
		<tr>
			<th width="10%">title</th>
			<th width="60%">info</th>
			<th width="30%">edit</th>
		</tr>
		<tr>
			<td><b>avatar</b></td>
			<td><img style="width:200px" src="<?php echo $homeurl; ?>/<?php echo $row['avatar']; ?>"/></td>
			<td><a title="edit avatar" href="?edit=avatar"><img style="width:80px;height:80px" src="css/images/user.png"/></a></td>
		</tr>
		<tr>
			<td><b>username</b></td>
			<td><?php echo $row['username']; ?></td>
			<td><a title="edit username" href="?edit=username"><img style="width:80px;height:80px" src="css/images/edit.png"/></a></td>
		</tr>
		<tr>
			<td><b>password</b></td>
			<td>**********</td>
			<td><a title="edit password" href="?edit=password"><img style="width:80px;height:80px" src="css/images/process.png"/></a></td>
		</tr>
		<tr>
			<td><b>email</b></td>
			<td><?php echo $row['email']; ?></td>
			<td><a title="edit email" href="?edit=email"><img style="width:80px;height:80px" src="css/images/email.png"/></a></td>
		</tr>
		<tr>
			<td><b>birthday</b></td>
			<td><?php echo $row['birthday']; ?></td>
			<td><a title="edit birthday" href="?edit=birthday"><img style="width:80px;height:80px" src="css/images/id_card.png"/></a></td>
		</tr>
		<tr>
			<td><b>gender</b></td>
			<td><?php echo $row['gender']; ?></td>
			<td><a title="edit gender" href="?edit=gender"><img style="width:80px;height:80px" src="css/images/info.png"/></a></td>
		</tr>
	</table>
</div>
<?php } ?>
		</td>
<?php include "footer.php"; ?>