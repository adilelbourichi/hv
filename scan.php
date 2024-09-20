<?php
if(isset($argv[1])) $type = trim($argv[1]);
else $type = "favorites";
$searchType = "place(end-$type";

$outFile = __DIR__ . DIRECTORY_SEPARATOR . "history$type.php";

$outtext = "<?php\n";
$outtext .= "return [\n";

$history = [];
for($f = 1; $f <= 14; $f++){
    $history[$f] = ['history' => []];
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
                        $history[$details]['history'][] = $data['official win'];
                    }
                }
            }
        }
    }
}
for($f = 1; $f <= 14; $f++){
    if(!empty($history[$f]['history'])){
        $winners = [];
        $first2 = [];
        $first3 = [];
        foreach($history[$f]['history'] as $selected){
            $results = explode(", ", $selected);
            if(!in_array($results[0], $winners)) $winners[] = $results[0];
            $first2 = array_values(array_unique(array_merge($first2, array_slice($results, 0, 2))));
            $first3 = array_values(array_unique(array_merge($first3, array_slice($results, 0, 3))));
        }
        sort($winners);
        sort($first2);
        sort($first3);
        $history[$f]['winners'] = implode(", ", $winners);
        $history[$f]['first2'] = implode(", ", $first2);
        $history[$f]['first3'] = implode(", ", $first3);
    }
}
for($f = 1; $f <= 14; $f++){
    sort($history[$f]['history']);
    $outtext .= "\t$f => [\n";
    $outtext .= "\t\t'history' => [\n";
    foreach($history[$f]['history'] as $mystring) $outtext .= "\t\t\t'" . $mystring . "',\n";
    $outtext .= "\t\t],\n";
    if(isset($history[$f]['winners'])) $outtext .= "\t\t'winners' => '" . $history[$f]['winners'] . "',\n";
    if(isset($history[$f]['first2'])) $outtext .= "\t\t'first2'  => '" . $history[$f]['first2'] . "',\n";
    if(isset($history[$f]['first3'])) $outtext .= "\t\t'first3'  => '" . $history[$f]['first3'] . "',\n";
    $outtext .= "\t],\n";
}
$outtext .= "];\n?>\n";
file_put_contents($outFile, $outtext);

?>