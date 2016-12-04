<div class="header">edit menu footer</div>
<?php
if(isset($_POST['submit_edit_menu_footer']))
{
	$f=fopen("../function/menu_footer.php","w");
	fwrite($f,$_POST['edit_menu_footer']);
	fclose($f);
	echo "đã cập nhật thành công";
}
?>
<form action="" method="post">
<textarea style="height:500px;width:100%" name="edit_menu_footer">
<?php
$f=fopen("../function/menu_footer.php","r");
if(filesize("../function/menu_footer.php")>0) 
	echo fread($f,filesize("../function/menu_footer.php"));
fclose($f);
?>
</textarea>
<input type="submit" name="submit_edit_menu_footer" value="cập nhật"/>
</form>