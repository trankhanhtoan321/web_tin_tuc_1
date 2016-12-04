<?php
require("config.php");
$sql="SELECT * FROM baiviet ORDER BY idbv DESC";
$result = mysqli_query($conn,$sql);
$f=fopen("sitemap.xml","w");
fwrite($f,"<?xml version='1.0' encoding='UTF-8'?><urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">");
fwrite($f,"<url><loc>$homeurl</loc><lastmod>2015-11-1T00:00:00Z</lastmod></url>");
while($row=mysqli_fetch_assoc($result))
{
	$url=$homeurl."/".$row['idbv']."-".rewrite($row['subject']).".html";
	$date=$row['date_add']."T00:00:00Z";
	$s="<url><loc>".$url."</loc><lastmod>".$date."</lastmod></url>";
	fwrite($f,$s);
}
fwrite($f,"</urlset>");
fclose($f);
mysqli_close($conn);
?>