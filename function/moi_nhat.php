<div class="header">Mới Nhất</div>
<?php
$sql1="SELECT * FROM baiviet ORDER BY idbv DESC LIMIT 5";
if($result1=mysqli_query($conn,$sql1))
while($row1=mysqli_fetch_assoc($result1))
{
?>
<a href="<?php echo $row1['idbv']; ?>-<?php echo rewrite($row1['subject']); ?>.html">
<table class="list1">
	<tr>
		<td width="50px">
			<img style="width:50px;height:50px" src="<?php echo $row1['image_bv']; ?>"/>
		</td>
		<td>
			<font style="font-size:16px"><?php echo $row1['subject']; ?></font>
		</td>
	</tr>
</table>
</a>
<hr/>
<?php
}
?>