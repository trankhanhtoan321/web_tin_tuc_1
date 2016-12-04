<div class="header">edit homepage</div>
<?php
if(isset($_POST['submit_edit_homepage']))
{
	$f=fopen("../function/homepage2.php","w");
	fwrite($f,$_POST['edit_homepage']);
	fclose($f);
	echo "đã cập nhật thành công";
}
?>
<form action="" method="post">
<textarea style="height:500px;width:100%" name="edit_homepage">
<?php
$f=fopen("../function/homepage2.php","r");
if(filesize("../function/homepage2.php")>0)
	echo fread($f,filesize("../function/homepage2.php"));
fclose($f);
?>
</textarea>
<input type="submit" name="submit_edit_homepage" value="cập nhật"/>
</form>