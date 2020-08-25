<?php
/*
--- Part Two ---
"Good, the new computer seems to be working correctly! 
Keep it nearby during this mission - you'll probably use it again. 
Real Intcode computers support many more features than your new one, 
but we'll let you know what they are as you need them."

"However, your current priority should be to complete your gravity assist around the Moon. 
For this mission to succeed, we should settle on some terminology for the parts you've already built."

Intcode programs are given as a list of integers; 
these values are used as the initial state for the computer's memory. 
When you run an Intcode program, make sure to start by initializing memory to the program's values. 
A position in memory is called an address (for example, the first value in memory is at "address 0").

Opcodes (like 1, 2, or 99) mark the beginning of an instruction. 
The values used immediately after an opcode, if any, are called the instruction's parameters. 
For example, in the instruction 1,2,3,4, 1 is the opcode; 2, 3, and 4 are the parameters. 
The instruction 99 contains only an opcode and has no parameters.

The address of the current instruction is called the instruction pointer; 
it starts at 0. After an instruction finishes, 
the instruction pointer increases by the number of values in the instruction; 
until you add more instructions to the computer, 
this is always 4 (1 opcode + 3 parameters) for the add and multiply instructions. 
(The halt instruction would increase the instruction pointer by 1, but it halts the program instead.)

"With terminology out of the way, we're ready to proceed. 
To complete the gravity assist, you need to determine what pair of inputs produces the output 19690720."

The inputs should still be provided to the program by replacing the values at addresses 1 and 2, just like before. 
In this program, the value placed in address 1 is called the noun, 
and the value placed in address 2 is called the verb. 
Each of the two input values will be between 0 and 99, inclusive.

Once the program has halted, its output is available at address 0, also just like before. 
Each time you try a pair of inputs, make sure you first reset the computer's 
memory to the values in the program (your puzzle input) - 
in other words, don't reuse memory from a previous attempt.

Find the input noun and verb that cause the program to produce the output 19690720. 
What is 100 * noun + verb? (For example, if noun=12 and verb=2, the answer would be 1202.)

Your puzzle answer was 9507.

Both parts of this puzzle are complete! They provide two gold stars: **

*/

function startProgram($x, $y, $z){

	// Puzzle data
	$numbers = '1,0,0,3,1,1,2,3,1,3,4,3,1,5,0,3,2,1,6,19,1,19,5,23,2,13,23,27,1,10,27,31,2,6,31,35,1,9,35,39,2,10,39,43,1,43,9,47,1,47,9,51,2,10,51,55,1,55,9,59,1,59,5,63,1,63,6,67,2,6,67,71,2,10,71,75,1,75,5,79,1,9,79,83,2,83,10,87,1,87,6,91,1,13,91,95,2,10,95,99,1,99,6,103,2,13,103,107,1,107,2,111,1,111,9,0,99,2,14,0,0';

	// Put the data into an array
	$numbers = explode(',', $numbers);

	// Overwrite the two specified positions with the supplied arguments
	$numbers[1] = $x;
	$numbers[2] = $y;

	// Initialize a starting position
	$i = 0;

	// Start the program	
	do {
		// If the opcode at current position is 1
		if ($numbers[$i] == 1){
			// Reassign a new value to the one three positions up: The new value shall be the SUM of the values found 1 position up and 2 positions up from the current one
			$numbers[$numbers[$i + 3]] = $numbers[$numbers[$i + 1]] + $numbers[$numbers[$i + 2]];
		// If the opcode at current position is anything else (it can only be 2)
		} else {
			// Reassign a new value to the one three positions up: The new value shall be the PRODUCT of the values found 1 position up and 2 positions up from the current one
			$numbers[$numbers[$i + 3]] = $numbers[$numbers[$i + 1]] * $numbers[$numbers[$i + 2]];
		// Increment the current position by 4 
		} $i += 4; 
	// Keep the program running as long as the op-code is not 99
	} while ($numbers[$i] != 99);

	// If the two supplied values produce 19690720 at position 0
	if ($numbers[0] == 19690720){
		echo '<br>';
		// halt the program and reveal the values
		echo '<p>After '.$z." attempts, the numbers ".$x.' and '.$y.' were found to produce the number 19690720 at position [0]. ';
		echo 'The final answer to the question is '.(($x * 100) + $y).'</p>';
	// If they don't, restart the program with two new values and increment the number of tries so far
	} else {
		$x = rand(0,99);
		$y = rand(0,99);
		$z++;

		startProgram($x,$y,$z);
	}
}

$x = rand(0,99);
$y = rand(0,99);
$z = 1;

startProgram($x,$y,$z);

?>