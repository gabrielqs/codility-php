// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    $return = 0;
    
    $N = count($A);
    $left = [];
    $right = [];
    
    for ($i=0; $i<$N; $i++) {
        $left[] = $A[$i] + $i;
        $right[] = -($A[$i] - $i);
    }
    
    sort($left);
    sort($right);
    
    var_dump($left);
    var_dump($right);
    
    for($i=0; $i<$N-1; $i++) {
        $val = $left[$i];
        $pos = binary_search($val, $right);
        var_dump($val);
        var_dump($pos);
        var_dump($N - $pos - 1);
        print "---\n\n";
        $return += $N - $pos - 1;
    }
    
    return $return;
}


function binary_search ($needle, $haystack) {
    $return = null;
    
    $high = count($haystack)-1;
    $low = 0;
    
    while($high >= $low) {
        $middle = (int) floor(($high-$low)/2) + $low;
        
        $elm = $haystack[$middle];
        if ($needle < $elm) {
            $high = $middle - 1;
            $return = $middle;
        } else if ($needle > $elm) {
            $low = $middle + 1;
            $return = $middle + 1;
        } else {
            # Element found, looking for duplicates
            while($haystack[$middle] == $needle) {
                $middle--;
            }
            $return = $middle;
            break;
        }
    }
    return $return;
}