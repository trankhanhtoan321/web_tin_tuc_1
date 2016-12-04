<?php
function list_files($directory = '.')
{
	$a=array();
    if ($directory != '.')
    {
        $directory = rtrim($directory, '/') . '/';
    }
    if ($handle = opendir($directory))
    {
        while (false !== ($file = readdir($handle)))
        {
            if ($file != '.' && $file != '..') $a[]=$file;
        }
        closedir($handle);
    }
    return $a;
}
$dir="uploads/images/slide/";
$a=list_files($dir);
$n=count($a);
?>
<div class="container">
	<div id="featured"> 
<?php
for($i=1;$i<=$n;$i++)
{
?>
<img id="img_slide<?php echo $i; ?>" src="/<?php echo $dir; ?><?php echo $a[$i-1]; ?>"/>
<?php
}
?>
	</div>
</div>
<script>
var i;
for(i=1;i<=<?php echo $n; ?>;i++)
{
	var x=document.getElementById("img_slide"+i);
	x.style.width=(screen.width*-17)+"p"+"x";
	x.style.height=((screen.width-17)/4)+"p"+"x";
}
</script>
