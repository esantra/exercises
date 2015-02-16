<?php
$s = array();
$counter = 0;
$counter2 = 0;
$counter3 = 0;
$counter4 = 0;
$reverse = array();

//1. how many numbers divisible by 19 in S
for ($i=1;$i<100000;$i++){
if(0==($i%19)){
  $s[]=$i;
  $counter++;
}//end if 

}//end for

//print_r($s);
echo '1 ... ' .$counter, PHP_EOL;

//2. How many numbers in S have a square that end in 1
foreach ($s as &$value) {
    //see if the square ends in 1
    /*If the last digit of a number is 1 or 9, its square ends in 1 and the number formed by its preceding digits must be divisible by four.*/
    $stdigit = substr($value, -1); // returns the last digit
  
    if (1 == $stdigit or 9 == $stdigit){
	$counter2 ++;
        //echo $stdigit, PHP_EOL;
        //echo $value;
    }//end if
}
echo '2 ...' .$counter2, PHP_EOL;

//3. How many numbers in S have a reflection that is also in S? (The reflection of 145 is 541)
//create an array of the numbers
foreach($s as &$value){
	$reverse[]=$value;
}//end foreach


foreach ($s as &$value) {
   $rev = strrev($value);
   //trim zeros when reversed 
   $rev = ltrim($rev, '0');
   foreach ($reverse as $v){
	   if ($v == $rev){
		   //echo $v . ' ... '. $rev . PHP_EOL;
		   $counter3++;
	   }//end if
   }//end foreach
	
	
}//end foreach

echo '3 ... ' . $counter3;
//How many numbers in S can be multiplied by some other number in S to produce a//third number in S?

foreach ($s as &$value3) { 
	$copys = $s;
	foreach($copys as &$value2){
	$product = $value3 * $value2;
			if(($product%19==0) && ($product < 100000)) {
			    echo "value2 " . $value2 . " value3  " . $value3  . PHP_EOL;
                        $counter4++;
                  
			}//end if 
	}//end for each
}//end foreach




echo '4 ... '.$counter4;


