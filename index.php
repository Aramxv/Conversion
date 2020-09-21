<?php 

function numberTowords($num)
{ 
	$ones = array( 
	1 => "One", 
	2 => "Two", 
	3 => "Three", 
	4 => "Four", 
	5 => "Five", 
	6 => "Six", 
	7 => "Seven", 
	8 => "Eight", 
	9 => "Nine", 
	10 => "Ten", 
	11 => "Eleven", 
	12 => "Twelve", 
	13 => "Thirteen", 
	14 => "Fourteen", 
	15 => "Fifteen", 
	16 => "Sixteen", 
	17 => "Seventeen", 
	18 => "Eighteen", 
	19 => "Nineteen" 
	); 
	$tens = array( 
	2 => "Twenty", 
	3 => "Thirty", 
	4 => "Forty", 
	5 => "Fifty", 
	6 => "Sixty", 
	7 => "Seventy", 
	8 => "Eighty", 
	9 => "Ninety" 
	); 
	$hundreds = array( 
	"Hundred", 
	"Thousand", 
	"Million", 
	"Billion", 
	"Trillion", 
	"Quadrillion" 
	); 

	//limit t quadrillion 
	$num = number_format($num,2,".",","); 
	$num_arr = explode(".",$num); 
	$wholenum = $num_arr[0]; 
	$decnum = $num_arr[1]; 
	$whole_arr = array_reverse(explode(",",$wholenum)); 
	krsort($whole_arr); 
	$nwords = ""; 
	foreach($whole_arr as $key => $i){ 
		if ($i < 20){ 
			$nwords .= $ones[$i]; 
		} elseif ($i < 100){ 
			$nwords .= $tens[substr($i, 0, 1)]; 
			$nwords .= " ".$ones[substr($i, 1, 1)]; 
		} else { 
			$nwords .= $ones[substr($i, 0, 1)]." ".$hundreds[0]; 
			$nwords .= " ".$tens[substr($i, 1, 1)]; 
			$nwords .= " ".$ones[substr($i, 2, 1)]; 
		} 
		if ($key > 0){ 
			$nwords .= " ".$hundreds[$key]." "; 
		} 
	} 
	if ($decnum > 0){ 
	$nwords .= " and "; 
		if ($decnum < 20){ 
			$nwords .= $ones[$decnum]; 
	} elseif ($decnum < 100){ 
		$nwords .= $tens[substr($decnum, 0, 1)]; 
		$nwords .= " ".$ones[substr($decnum, 1, 1)]; 
		} 
	} 
	return $nwords; 
	} 
	extract($_POST);
	if(isset($convert)) {
		echo "<p class='answer' align='center'>".numberTowords("$num")."</p>";
	}

?>
<html>
	<head>
		<title>Conver Number to Words in PHP</title>
		<link rel="stylesheet" href="index.css">
	</head>
	<body>
		<form method="post">
			<table class="center-table" colspan="2">
				<tr>
				<td id="enter">Enter Your Numbers</td>
				<td><input id="inputNum" type="text" name="num" value="<?php if(isset($num)){echo $num;}?>"/></td>
				</tr>
				<tr>
				<td></td> 
				<td class="data" colspan="1">
				<input class="submit" type="submit" value="Convert the Number to Words" name="convert"/>
				</td>
				</tr>
			</table>
		</form>
	</body>
</html>
