<?php
/*
* --- Day 4: Secure Container ---
* You arrive at the Venus fuel depot only to discover it's protected by a password. 
* The Elves had written the password on a sticky note, but someone threw it out.
* However, they do remember a few key facts about the password:
* 
* It is a six-digit number.
* The value is within the range given in your puzzle input.
* Two adjacent digits are the same (like 22 in 122345).
* Going from left to right, the digits never decrease; 
* they only ever increase or stay the same (like 111123 or 135679).
* Other than the range rule, the following are true:
* 
* 111111 meets these criteria (double 11, never decreases).
* 223450 does not meet these criteria (decreasing pair of digits 50).
* 123789 does not meet these criteria (no double).
* How many different passwords within the range given in your puzzle input meet these criteria?
*
* Your puzzle input is 168630-718098
* 
* Your puzzle answer was 1686.
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

// Define a starting point from which to check numbers
$number = '168630';

// Prepare an array for passed numbers
$passed = [];

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

echo "<pre>";
// Count the number of passes
echo count($passed)."<br>";
// Display the passes
print_r($passed);

?>