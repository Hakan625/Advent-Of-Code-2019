<?php

/*
-- Part Two --

* During the second Go / No Go poll, 
* the Elf in charge of the Rocket Equation Double-Checker stops the launch sequence. 
* Apparently, you forgot to include additional fuel for the fuel you just added.
* 
* Fuel itself requires fuel just like a module - take its mass, divide by three, 
* round down, and subtract 2. However, that fuel also requires fuel, 
* and that fuel requires fuel, and so on. Any mass that would require negative 
* fuel should instead be treated as if it requires zero fuel; the remaining mass, 
* if any, is instead handled by wishing really hard, which has no mass and is outside 
* the scope of this calculation.
* 
* So, for each module mass, calculate its fuel and add it to the total. 
* Then, treat the fuel amount you just calculated as the input mass and repeat the process, 
* continuing until a fuel requirement is zero or negative. 
* 
* For example:
* 
* A module of mass 14 requires 2 fuel. 
* This fuel requires no further fuel (2 divided by 3 and rounded down is 0, 
* which would call for a negative fuel), so the total fuel required is still just 2.
* 
* At first, a module of mass 1969 requires 654 fuel. 
* Then, this fuel requires 216 more fuel (654 / 3 - 2). 
* 216 then requires 70 more fuel, which requires 21 fuel, 
* which requires 5 fuel, which requires no further fuel. 
* So, the total fuel required for a module of mass 1969 is 
* 654 + 216 + 70 + 21 + 5 = 966.
* 
* The fuel required by a module of mass 100756 and its fuel is: 
* 33583 + 11192 + 3728 + 1240 + 411 + 135 + 43 + 12 + 2 = 50346.
* 
* What is the sum of the fuel requirements for all of the modules on your spacecraft 
* when also taking into account the mass of the added fuel? 
* (Calculate the fuel requirements for each module separately, 
* then add them all up at the end.)
* 
* Your puzzle answer was 5142043.
*/

// Put the input data in an array
$masses = explode(' ', '102777 107296 131207 116508 99009 120098 83121 87846 126604 79906 63668 143932 51829 106383 121354 138556 123426 111544 84395 147066 61897 133724 75867 106697 67782 86191 50666 138928 118740 136863 123108 85168 138487 115656 104811 114986 147241 73860 99186 134657 98379 59914 144863 119851 82549 93564 79437 70761 134303 108109 116208 80702 111018 131996 119367 74305 65905 116871 102184 101880 100453 111281 103134 129529 133885 76153 56890 86262 52804 139907 131360 80009 121015 74438 54470 73386 112961 116283 81353 80610 142522 64946 125652 61688 58367 118930 89711 115239 66403 92405 114593 112818 75964 126093 139781 144801 88725 125958 116869 119676');

$total = 0;

// Loop through the array
foreach ($masses as $mass) {
	// 9 is the minimum amount of fuel which will require additional fuel. Anything smaller than that will equate to 0.
	while ($mass >= 9){
		// Perform the specified calculation to determine the required additional fuel
		$mass = (floor($mass / 3)) - 2;
		// And add it to the total 
		$total += $mass;
	}
}

echo "<pre>";
print_r($total);
echo "</pre>";
	
?>