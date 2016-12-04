<div class="header">Xem Nhiều</div>
<?php
$sql="SELECT * FROM baiviet ORDER BY views DESC LIMIT ".$maxpage;
if($result=mysqli_query($conn,$sql))
while($row=mysqli_fetch_assoc($result))
{
?>
<a href="<?php echo $row['idbv']; ?>-<?php echo rewrite($row['subject']); ?>.html">
<table class="list1">
	<tr>
		<td width="50px">
			<img style="width:50px;height:50px" src="<?php echo $row['image_bv']; ?>"/>
		</td>
		<td>
			<font style="font-size:16px"><?php echo $row['subject']; ?></font>
		</td>
	</tr>
</table>
</a>
<hr/>
<?php
}
?>