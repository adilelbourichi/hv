<?php
$searchType = "place";

$outFile = __DIR__ . DIRECTORY_SEPARATOR . "historyracesall.php";

$outtext = "<?php\n";
$outtext .= "return [\n";

$history = [];
for($r = 1; $r <= 11; $r++){
    $history[$r] = [];
    for($f = 1; $f <= 14; $f++){
        $history[$r][$f] = ['history' => []];
    }
}

$dir = new DirectoryIterator(__DIR__);
foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot() && $fileinfo->isDir() && preg_match("/^[0-9]+$/", $fileinfo->getFilename())) {
        $betsFile = __DIR__ . DIRECTORY_SEPARATOR . $fileinfo->getFilename() . DIRECTORY_SEPARATOR . "bets.php";
        $betsData = include($betsFile);
        foreach($betsData as $raceNumber => $data){
            if(!isset($data['official win']) || empty($data['official win'])) continue;
            $bets = $data['bets'];
            if(!empty($bets)){
                foreach($bets as $key => $details){
                    if(strpos($key, $searchType) === 0){
                        $history[$raceNumber][$details]['history'][] = $data['official win'];
                    }
                }
            }
        }
    }
}
for($r = 1; $r <= 11; $r++){
    for($f = 1; $f <= 14; $f++){
        if(!empty($history[$r][$f]['history'])){
            $winners = [];
            $first2 = [];
            $first3 = [];
            foreach($history[$r][$f]['history'] as $selected){
                $results = explode(", ", $selected);
                if(!in_array($results[0], $winners)) $winners[] = $results[0];
                $first2 = array_values(array_unique(array_merge($first2, array_slice($results, 0, 2))));
                $first3 = array_values(array_unique(array_merge($first3, array_slice($results, 0, 3))));
            }
            sort($winners);
            sort($first2);
            sort($first3);
            $history[$r][$f]['winners'] = implode(", ", $winners);
            $history[$r][$f]['first2'] = implode(", ", $first2);
            $history[$r][$f]['first3'] = implode(", ", $first3);
        }
    }
}
for($r = 1; $r <= 11; $r++){
    $outtext .= "\t$r => [\n";
    for($f = 1; $f <= 14; $f++){
        sort($history[$r][$f]['history']);
        $outtext .= "\t\t$f => [\n";
        $outtext .= "\t\t\t'history' => [\n";
        foreach($history[$r][$f]['history'] as $mystring) $outtext .= "\t\t\t\t'" . $mystring . "',\n";
        $outtext .= "\t\t\t],\n";
        if(isset($history[$r][$f]['winners'])) $outtext .= "\t\t\t'winners' => '" . $history[$r][$f]['winners'] . "',\n";
        if(isset($history[$r][$f]['first2'])) $outtext .= "\t\t\t'first2'  => '" . $history[$r][$f]['first2'] . "',\n";
        if(isset($history[$r][$f]['first3'])) $outtext .= "\t\t\t'first3'  => '" . $history[$r][$f]['first3'] . "',\n";
        $outtext .= "\t\t],\n";
    }
    $outtext .= "\t],\n";
}
$outtext .= "];\n?>\n";
file_put_contents($outFile, $outtext);

?>