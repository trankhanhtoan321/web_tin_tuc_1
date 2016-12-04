<div class="header">add function</div>
<?php
if(isset($_POST['submit_edit_function']))
{
	$f=fopen("../function/function.php","w");
	fwrite($f,$_POST['edit_function']);
	fclose($f);
	echo "đã cập nhật thành công";
}
?>
<form action="" method="post">
<textarea style="height:500px;width:100%" name="edit_function">
<?php
$f=fopen("../function/function.php","r");
if(filesize("../function/function.php")>0)
	echo fread($f,filesize("../function/function.php"));
fclose($f);
?>
</textarea>
<input type="submit" name="submit_edit_function" value="cập nhật"/>
</form>