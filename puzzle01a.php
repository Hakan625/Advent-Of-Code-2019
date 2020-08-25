<?php

/*
* --- Day 1: The Tyranny of the Rocket Equation ---
* Santa has become stranded at the edge of the Solar System 
* while delivering presents to other planets! 
* To accurately calculate his position in space, 
* safely align his warp drive, and return to Earth in time to save Christmas, 
* he needs you to bring him measurements from fifty stars.
* 
* Collect stars by solving puzzles. 
* Two puzzles will be made available on each day in the Advent calendar; 
* the second puzzle is unlocked when you complete the first. Each puzzle grants one star. 
* Good luck!
* 
* The Elves quickly load you into a spacecraft and prepare to launch.
* 
* At the first Go / No Go poll, 
* every Elf is Go until the Fuel Counter-Upper. 
* They haven't determined the amount of fuel required yet.
* 
* Fuel required to launch a given module is based on its mass. 
* Specifically, to find the fuel required for a module, 
* take its mass, divide by three, round down, and subtract 2.
* 
* For example:
* 
* For a mass of 12, divide by 3 and round down to get 4, then subtract 2 to get 2.
* For a mass of 14, dividing by 3 and rounding down still yields 4, so the fuel required is also 2.
* For a mass of 1969, the fuel required is 654.
* For a mass of 100756, the fuel required is 33583.
* The Fuel Counter-Upper needs to know the total fuel requirement. 
* To find it, individually calculate the fuel needed for the mass 
* of each module (your puzzle input), then add together all the fuel values.
* 
* What is the sum of the fuel requirements for all of the modules on your spacecraft?
* 
* Your puzzle answer was 3429947.
*
*/

$massas = explode(' ', '102777 107296 131207 116508 99009 120098 83121 87846 126604 79906 63668 143932 51829 106383 121354 138556 123426 111544 84395 147066 61897 133724 75867 106697 67782 86191 50666 138928 118740 136863 123108 85168 138487 115656 104811 114986 147241 73860 99186 134657 98379 59914 144863 119851 82549 93564 79437 70761 134303 108109 116208 80702 111018 131996 119367 74305 65905 116871 102184 101880 100453 111281 103134 129529 133885 76153 56890 86262 52804 139907 131360 80009 121015 74438 54470 73386 112961 116283 81353 80610 142522 64946 125652 61688 58367 118930 89711 115239 66403 92405 114593 112818 75964 126093 139781 144801 88725 125958 116869 119676');

echo '<pre>';
print_r($massas);

$totaal = 0;


foreach ($massas as $massa) {
	$totaal += floor(($massa / 3) - 2);
}

print_r($totaal);

?>