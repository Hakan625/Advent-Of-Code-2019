<?php

/*
* --- Part Two ---
* An Elf just remembered one more important detail: 
* the two adjacent matching digits are not part of a larger group of matching digits.
* 
* Given this additional criterion, but still ignoring the range rule, the following are now true:
* 
* 112233 meets these criteria because the digits never decrease and all repeated digits are exactly two digits long.
* 123444 no longer meets the criteria (the repeated 44 is part of a larger group of 444).
* 111122 meets the criteria (even though 1 is repeated more than twice, it still contains a double 22).
* How many different passwords within the range given in your puzzle input meet all of the criteria?
* Your puzzle input is 168630-718098
* 
* Your puzzle answer was 1145.
* 
* Both parts of this puzzle are complete! They provide two gold stars: **

*/

// Checks whether any two adjacent digits are the same
function checkDoubles($number){
	if ($number[0] === $number[1] || 
		$number[1] === $number[2] || 
		$number[2] === $number[3] || 
		$number[3] === $number[4] || 
		$number[4] === $number[5]){
		return true;
	}
}

// Checks whether a digit to the right of any given digit is greater or equal to it
function checkIncrease($number){
	if ($number[0] <= $number[1] && 
		$number[1] <= $number[2] && 
		$number[2] <= $number[3] && 
		$number[3] <= $number[4] && 
		$number[4] <= $number[5]){
		return true;
	}
}

// PHP performs automatic typecasting. A string consisting of only numbers is automatically type casted to integers
// Any subsequent manipulation or analysis of the number must be preceded by a typecast back to (string)

// Prepare an array for passed numbers
$passed = [];

// Define a starting point from which to check numbers
$number = '168630';

// Define an endpoint
while ($number != '718098'){
	// Typecast the number to string
	$number = (string)$number;
	// If it passes the checks
	if (checkDoubles($number) && checkIncrease($number)){
		// add it to the array
		$passed[] = $number;
	}
	// Increment the number
	$number++;
}

// Prepare another array
$doublePassed = [];

// Loop through the array of passed numbers
foreach ($passed as $candidate) {
	// Typecast the number to string
	$candidate = (string)$candidate;
	if (
		// Perform another check on the number, with the specified criteria
		($candidate[0] == $candidate[1] && $candidate[0] != $candidate[2]) ||
		($candidate[1] == $candidate[2] && $candidate[0] != $candidate[1] && $candidate[2] != $candidate[3]) ||
		($candidate[2] == $candidate[3] && $candidate[1] != $candidate[2] && $candidate[3] != $candidate[4]) ||
		($candidate[3] == $candidate[4] && $candidate[2] != $candidate[3] && $candidate[4] != $candidate[5]) ||
		($candidate[4] == $candidate[5] && $candidate[3] != $candidate[4])
	){ // If it passes the check, add it to the array
		$doublePassed[] = $candidate;}
}


echo "<pre>";
// Count the number of passes
echo count($doublePassed)."<br>";
// Display the passes
print_r($doublePassed);