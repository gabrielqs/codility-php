<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A)
{
    $maxEndingHere = 0;
    $maxSoFar = -9999999999;
    $maxElement = -9999999999;
    foreach ($A as $item) {
        # Next line took me a while to understand.
        # It will set maxEndingHere value to 0whenever it decreases because of a negative number
        # The effect is that the sum will start again from that point. $maxSoFar will hold the
        # maximum value of all the slices
        $maxEndingHere = max([$maxEndingHere + $item, 0]);
        $maxSoFar = max([$maxSoFar, $maxEndingHere]);

        # This is a bit different from Kadane's algorithim. Kaldane's only accepts arrays with
        # At least one positive integer. We will need to store the max element, so in case there's
        # no positive integer, we will use the highest negative integer as a maximum slice sum (see below if)
        $maxElement = max([$maxElement, $item]);
    }

    if ($maxSoFar == 0) {
        $maxSoFar = $maxElement;
    }

    return (int) $maxSoFar;
}