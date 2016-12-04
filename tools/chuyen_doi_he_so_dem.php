<?php
function h_to_b($s)
{
	$h1=array("0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F");
	$h2=array("0000","0001","0010","0011","0100","0101","0110","0111","1000","1001","1010","1011","1100","1101","1110","1111");
	return str_replace($h1,$h2,$s);
}
function b_to_h($s)
{
	$a=array(
		"0000" => "0",
		"0001" => "1",
		"0010" => "2",
		"0011" => "3",
		"0100" => "4",
		"0101" => "5",
		"0110" => "6",
		"0111" => "7",
		"1000" => "8",
		"1001" => "9",
		"1010" => "A",
		"1011" => "B",
		"1100" => "C",
		"1101" => "D",
		"1110" => "E",
		"1111" => "F");
	switch(strlen($s)%4)
	{
		case 0:break;
		case 1: $s="000".$s;break;
		case 2: $s="00".$s;break;
		case 3: $s="0".$s; break;
	}
	$i=0;
	$kq="";
	while($i<strlen($s))
	{
		$z="";
		for($j=$i;$j<$i+4;$j++) $z.=$s[$j];
		$kq.=$a[$z];
		$i=$i+4;
	}
	return $kq;
}
function o_to_b($s)
{
	$o1=array("0","1","2","3","4","5","6","7");
	$o2=array("000","001","010","011","100","101","110","111");
	return str_replace($o1,$o2,$s);
}
function b_to_o($s)
{
	$a=array(
		"000" => "0",
		"001" => "1",
		"010" => "2",
		"011" => "3",
		"100" => "4",
		"101" => "5",
		"110" => "6",
		"111" => "7");
	switch(strlen($s)%3)
	{
		case 0:break;
		case 1: $s="00".$s;break;
		case 2: $s="0".$s;break;
	}
	$i=0;
	$kq="";
	while($i<strlen($s))
	{
		$z="";
		for($j=$i;$j<$i+3;$j++) $z.=$s[$j];
		$kq.=$a[$z];
		$i=$i+3;
	}
	return $kq;
}
function d_to_b($s)
{
	$s=(int)$s;
	$a="";
	while($s!=0)
	{
		$a.=$s%2;
		$s/=2;
		$s=(int)$s;
	}
	for($i=0;$i<strlen($a)/2;$i++)
	{
		$t=$a[$i];
		$a[$i]=$a[strlen($a)-1-$i];
		$a[strlen($a)-1-$i]=$t;
	}
	return $a;
}
function d_to_o($s)
{
	$s=(int)$s;
	$a="";
	while($s!=0)
	{
		$a.=$s%8;
		$s/=8;
		$s=(int)$s;
	}
	for($i=0;$i<strlen($a)/2;$i++)
	{
		$t=$a[$i];
		$a[$i]=$a[strlen($a)-1-$i];
		$a[strlen($a)-1-$i]=$t;
	}
	return $a;
}
function d_to_h($s)
{
	$s=(int)$s;
	$a="";
	while($s!=0)
	{
		$t=$s%16;
		$s/=16;
		$s=(int)$s;
		if($t>=10)
		{
			switch($t)
			{
				case 10: $t="A";break;
				case 11: $t="B";break;
				case 12: $t="C";break;
				case 13: $t="D";break;
				case 14: $t="E";break;
				case 15: $t="F";break;
			}
		}
		$a.=$t;
	}
	for($i=0;$i<strlen($a)/2;$i++)
	{
		$t=$a[$i];
		$a[$i]=$a[strlen($a)-1-$i];
		$a[strlen($a)-1-$i]=$t;
	}
	return $a;
}
function h_to_o($s)
{
	$s=h_to_b($s);
	$s=b_to_o($s);
	return $s;
}
function o_to_h($s)
{
	$s=o_to_b($s);
	$s=b_to_h($s);
	return $s;
}
function b_to_d($s)
{
	$kq=0;
	$d=0;
	for($i=strlen($s)-1;$i>=0;$i--,$d++)
	{
		$a=(int)$s[$i];
		$kq+=$a*pow(2,$d);
	}
	return $kq;
}
function o_to_d($s)
{
	$kq=0;
	$d=0;
	for($i=strlen($s)-1;$i>=0;$i--,$d++)
	{
		$a=(int)$s[$i];
		$kq+=$a*pow(8,$d);
	}
	return $kq;
}
function h_to_d($s)
{
	$kq=0;
	$d=0;
	for($i=strlen($s)-1;$i>=0;$i--,$d++)
	{
		if($s[$i]>='A' && $s[$i]<='F')
		{
			switch($s[$i])
			{
				case 'A': $a=10;break;
				case 'B': $a=11;break;
				case 'C': $a=12;break;
				case 'D': $a=13;break;
				case 'E': $a=14;break;
				case 'F': $a=15;break;
			}
		}
		else $a=(int)$s[$i];
		$kq+=$a*pow(16,$d);
	}
	return $kq;
}
?>
<form action="" method="post">
	nhập giá trị<br/>
	<input style="width:600px" type="text" name="so" value="<?php if(isset($_POST['convert'])) echo $_POST['so']; ?>"/><br/><br/>
	<select name="nguon">
		<option value="he2">hệ nhị phân (2)</option>
		<option value="he8">hệ bát phân (8)</option>
		<option value="he10">hệ thập phân (10)</option>
		<option value="he16">hệ thập lục phân (16)</option>
	</select>
	convert to =>
	<select name="dich">
		<option value="he2">hệ nhị phân (2)</option>
		<option value="he8">hệ bát phân (8)</option>
		<option value="he10">hệ thập phân (10)</option>
		<option value="he16">hệ thập lục phân (16)</option>
	</select>
	<br/><br/>
	<input type="submit" name="convert" value="Convert"/><br/><br/>
</form>
<?php
$kq="";
if(isset($_POST['convert']))
{
	$s=strtoupper($_POST['so']);
	switch($_POST['nguon'])
	{
		case "he2":
		switch($_POST['dich'])
		{
			case "he8": $kq=b_to_o($s);break;
			case "he10": $kq=b_to_d($s);break;
			case "he16": $kq=b_to_h($s);break;
		}
		break;

		case "he8":
		switch($_POST['dich'])
		{
			case "he2": $kq=o_to_b($s);break;
			case "he10": $kq=o_to_d($s);break;
			case "he16": $kq=o_to_h($s);break;
		}
		break;

		case "he10":
		switch($_POST['dich'])
		{
			case "he2": $kq=d_to_b($s);break;
			case "he8": $kq=d_to_o($s);break;
			case "he16": $kq=d_to_h($s);break;
		}
		break;

		case "he16":
		switch($_POST['dich'])
		{
			case "he2": $kq=h_to_b($s);break;
			case "he8": $kq=h_to_o($s);break;
			case "he10": $kq=h_to_d($s);break;
		}
		break;
	}
?>
<input style="width:600px" type="text" value="<?php echo $kq; ?>"/>
<?php
}
?>