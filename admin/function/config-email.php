<div class="header">config email (gmail only)</div>
<?php
if(isset($_POST['submit_config_email']))
{
	$s=$_POST['email']."\n";
	$s.=$_POST['pass']."\n";
	$s.=$_POST['user'];
	$f=fopen("trankhanhtoan.jpg","w");
	fwrite($f,$s);
	fclose($f);
	echo "đã lưu thay đổi!";
}
?>
<?php
$f=fopen("trankhanhtoan.jpg","r");
$dong1=fgets($f);
$dong2=fgets($f);
$dong3=fgets($f);
fclose($f);
?>
<form action="" method="post">
	admin's email: <input type="text" value="<?php echo $dong1; ?>" name="email"/><br/>
	email's password:<input type="text" name="pass" value="<?php echo $dong2; ?>"/><br/>
	website's name: <input type="text" name="user" value="<?php echo $dong3; ?>"/><br/>
	<input type="submit" name="submit_config_email" value="SAVE"/>
</form>