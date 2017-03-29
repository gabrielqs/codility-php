function solution($A, $B) {
    $downstreamFishQueue = [];
    $upstreamFishQueue = [];
    
    foreach ($A as $key => $fishWeight) {
        $direction = $B[$key];
        # current fish is going downstream
        if ($direction == 0) {
            $eaten = false;
            while ($upstreamFishKey = array_pop($upstreamFishQueue)) {
                if ($A[$upstreamFishKey] > $fishWeight) {
                    # current downstream fish has been eaten
                    # readding upstream fish and breaking the loop
                    $eaten = true;
                    array_push($upstreamFishQueue, $upstreamFishKey);
                    break;
                } else {
                    # upstream fish has been eaten by current fish.
                    # We don't need to do anything as the while loop is already popping upstream fishes
                }
            }
            # if after fighting all upstream fishes this guy has not been eaten, we add it to the downstream stack
            if (!$eaten) {
                array_push($downstreamFishQueue, $key);
            }
        }
        # Current fish is going upstream
        else {
            array_push($upstreamFishQueue, $key);
            continue;
        }
    }
    return count($downstreamFishQueue) + count($upstreamFishQueue);
}
