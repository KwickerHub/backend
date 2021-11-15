<?php

function generate_strings($length){
	$alhpa_nums = array(0 => '0', 1 => '1',  2 => '2', 3 => '3', 4 => '4', 5 => '5', 6 => '6', 7 => '7', 8 => '8', 9 => '9');
	$alhpa_lets = array(0 => 'a', 1 => 'b',  2 => 'c', 3 => 'd', 4 => 'e', 5 => 'f', 6 => 'g', 7 => 'h', 8 => 'i', 9 => 'j', 10 => 'k', 11 => 'l',  12 => 'm', 13 => 'n', 14 => 'o', 15 => 'p', 16 => 'q', 17 => 'r', 18 => 's', 19 => 't', 20 => 'u', 21 => 'v',  22 => 'w', 23 => 'x', 24 => 'y', 25 => 'z');
}

function generator_uniquecode($length){
	#should always generate code that can did not exist in the database before....
}

function generate_integers($length){
	$num = 0;
	for ($i=0; $i < $length; $i++) { 
		$num = $num . random_int (0, 9);
	}
	return $num;
}

function generate_faster(){
	$num = 0;
	$verify1 = random_int (100, 999);
	$verify2 = random_int (100, 999);
	$num = $verify1 . $verify2;
	return $num;
}

?>