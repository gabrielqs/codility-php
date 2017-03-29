<?php
function solution($H) {
    $stack = [];
    $count = 0;
    foreach ($H as $height) {
        while (!empty($stack) && (end($stack) > $height)) {
            array_pop($stack);
        }
        if (empty($stack) || (end($stack) < $height)) {
            array_push($stack, $height);
            $count++;
        }
    }
    return $count;
}