<?php

$sentence = "sit on a potato pan, otis";

// have 2 variables to compare the sentence forward and backwards
$front = '';
$back = '';
$len = strlen($sentence);

//populate the variables - use a loop to go through the sentence

for ($i = 0; $i < $len; $i++) {
    // echo $sentence[$i];
    //going forward with each character and skipping spaces and commas
    if ($sentence[$i] == " " || $sentence[$i] == ",") {
        continue;
    } else {
        $front .= $sentence[$i];
    }
}
// outputs the sentence without spaces and commas
// echo $front;

//going backwards with each character and skipping spaces and commas

for ($i = $len - 1; $i >= 0; $i--) {
    if ($sentence[$i] == " " || $sentence[$i] == ",") {
        continue;
    } else {
        $back .= $sentence[$i];
    }
}
// outputs the sentence without spaces and commas
// echo $back;

//compare the two variables to see if they are the same
if ($front == $back) {
    echo $sentence . ". " . "The sentence is a palindrome.";
} else {
    echo $sentence . ". " . "The sentence is not a palindrome.";
}
