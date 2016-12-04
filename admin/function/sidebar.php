<div class="header">edit sidebar</div>
<?php
if(isset($_POST['submit_edit_sidebar']))
{
	$f=fopen("../function/sidebar.php","w");
	fwrite($f,$_POST['edit_sidebar']);
	fclose($f);
	echo "đã cập nhật thành công";
}
?>
<form action="" method="post">
<textarea style="height:500px;width:100%" name="edit_sidebar">
<?php
$f=fopen("../function/sidebar.php","r");
if(filesize("../function/sidebar.php")>0)
	echo fread($f,filesize("../function/sidebar.php"));
fclose($f);
?>
</textarea>
<input type="submit" name="submit_edit_sidebar" value="cập nhật"/>
</form>