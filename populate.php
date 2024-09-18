<?php

$outFile = __DIR__ . DIRECTORY_SEPARATOR . "history.php";
$outtext = "<?php\n";
$outtext .= "return [\n";

$history = [];
for($r = 1; $r <= 11; $r++){
    $history[$r] = [];
    for($f = 1; $f <= 14; $f++){
        $history[$r][$f] = ["win" => [], "qin" => [], "trio" => []];
    }
}

$dir = new DirectoryIterator(__DIR__);
foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot() && $fileinfo->isDir() && preg_match("/^[0-9]+$/", $fileinfo->getFilename())) {
        $betsFile = __DIR__ . DIRECTORY_SEPARATOR . $fileinfo->getFilename() . DIRECTORY_SEPARATOR . "bets.php";
        $bets = include($betsFile);
        foreach($bets as $raceNumber => $data){
            $favorites = explode(", ", $data['favorites']);
            if(!isset($data['official win']) || empty($data['official win'])) continue;
            $winners = explode(", ", $data['official win']);
            foreach($favorites as $favorite){
                $history[$raceNumber][$favorite]["win"] = array_values(array_unique(array_merge($history[$raceNumber][$favorite]["win"], array_slice($winners, 0, 1))));
                $history[$raceNumber][$favorite]["qin"] = array_values(array_unique(array_merge($history[$raceNumber][$favorite]["qin"], array_slice($winners, 0, 2))));
                $history[$raceNumber][$favorite]["trio"] = array_values(array_unique(array_merge($history[$raceNumber][$favorite]["trio"], array_slice($winners, 0, 3))));
                sort($history[$raceNumber][$favorite]["win"]);
                sort($history[$raceNumber][$favorite]["qin"]);
                sort($history[$raceNumber][$favorite]["trio"]);
            }
        }
    }
}
for($r = 1; $r <= 11; $r++){
    $outtext .= "\t$r => [\n";
    for($f = 1; $f <= 14; $f++){
        $outtext .= "\t\t$f => [\n";
        $outtext .= "\t\t\t'win' => [" . implode(", ", $history[$r][$f]["win"]) . "],\n";
        $outtext .= "\t\t\t'qin' => [" . implode(", ", $history[$r][$f]["qin"]) . "],\n";
        $outtext .= "\t\t\t'trio' => [" . implode(", ", $history[$r][$f]["trio"]) . "],\n";
        $outtext .= "\t\t],\n";
    }
    $outtext .= "\t],\n";
}
$outtext .= "];\n?>\n";
file_put_contents($outFile, $outtext);

?>
