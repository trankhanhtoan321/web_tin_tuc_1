
<?php
function snt($n)
{
	if($n<2) return 0;
	if($n==2) return 1;
	for($i=2;$i<sqrt($n);$i++)
		if($n%$i==0) return 0;
	return 1;
}
if(isset($_POST['submit_snt']))
{
	if(snt($_POST['songuyento']))
		echo "<b>".$_POST['songuyento']."</b> là số nguyên tố";
	else echo "<b>".$_POST['songuyento']."</b> không phải là số nguyên tố";
}
?>
<br/><br/>
<form action="" method="post">
	<input type="number" name="songuyento" min="0" max="1000000000"/>
	<input type="submit" name="submit_snt" value="kiểm tra"/>
</form>
<br/>
<div class="header">bảng số nguyên tố 0->1000</div>
<table border="1px solid black">
	<tr>
<?php
$dem=1;
for($i=0;$i<1000;$i++)
{
	if(snt($i))
	{
		if($dem==15)
		{
			echo "</tr><tr>";
			$dem=1;
		}
		echo "<td>&nbsp;&nbsp;$i&nbsp;&nbsp;</td>";
		$dem++;
	}

}
?>
</tr>
</table>