<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    $dominator = getLeader($A);
    if ($dominator == -1) {
        return -1;
    } else {
        foreach ($A as $key => $item) {
            if ($item == $dominator) {
                return $key;
            }
        }
    }
}

function getLeader($A) {
    sort($A);

    $value = null;
    $size = 0;
    foreach ($A as $item) {
        if ($size == 0) {
            $value = $item;
            $size++;
        } else {
            if ($item == $value) {
                $size++;
            } else {
                $size--;
            }
        }
    }

    if (!$size) {
        return -1;
    }

    $count = 0;
    foreach ($A as $item) {
        if ($item == $value) {
            $count++;
        }
    }

    if ($count > count($A)/2) {
        return $value;
    } else {
        return -1;
    }
}