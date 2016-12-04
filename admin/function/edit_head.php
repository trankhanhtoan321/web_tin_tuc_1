<div class="header">edit meta-header</div>
<?php
if(isset($_POST['submit_edit_meta-header']))
{
	$f=fopen("../function/meta-header.php","w");
	fwrite($f,$_POST['edit_meta-header']);
	fclose($f);
	echo "đã cập nhật thành công";
}
?>
<form action="" method="post">
<textarea style="height:500px;width:100%" name="edit_meta-header">
<?php
$f=fopen("../function/meta-header.php","r");
if(filesize("../function/meta-header.php")>0)
	echo fread($f,filesize("../function/meta-header.php"));
fclose($f);
?>
</textarea>
<input type="submit" name="submit_edit_meta-header" value="cập nhật"/>
</form>