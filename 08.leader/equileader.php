<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    $n = count($A);
    $leader = getLeader($A);

    if ($leader == -1) {
        return 0;
    }

    $leaderCountFwd = [];
    for ($i=0; $i<$n; $i++) {
        $previousCount = array_key_exists($i-1, $leaderCountFwd) ? $leaderCountFwd[$i-1] : 0;
        if ($A[$i] == $leader) {
            $leaderCountFwd[$i] = $previousCount+1;
        } else {
            $leaderCountFwd[$i] = $previousCount;
        }
    }

    $leaderCountRwd = [];
    for ($i=$n-1; $i>=0; $i--) {
        $previousCount = array_key_exists($i+1, $leaderCountRwd) ? $leaderCountRwd[$i+1] : 0;
        if ($A[$i] == $leader) {
            $leaderCountRwd[$i] = $previousCount+1;
        } else {
            $leaderCountRwd[$i] = $previousCount;
        }
    }

    $equileaders = 0;
    for ($i=0; $i<($n-1); $i++) {
        $isLeftLeader = $leaderCountFwd[$i] > floor(($i+1)/2);
        $isRightLeader = $leaderCountRwd[$i+1] > floor(($n-($i+1))/2);
        if ($isLeftLeader && $isRightLeader) {
            $equileaders++;
        }
    }
    return $equileaders;
}

function getLeader($A) {
    sort($A);
    $size = 0;
    $value = null;
    foreach ($A as $item) {
        if ($size == 0) {
            $size++;
            $value = $item;
        } else {
            if ($item == $value) {
                $size++;
            } else {
                $size--;
            }
        }
    }

    if ($size == 0) {
        return -1;
    }

    $candidate = $value;
    $count = 0;
    foreach ($A as $item) {
        if ($item == $candidate) {
            $count++;
        }
    }

    if ($count > (count($A) + 1)/2) {
        return $candidate;
    } else {
        return -1;
    }
}