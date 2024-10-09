<?php

require 'functions.php';

$outFile = __DIR__ . DIRECTORY_SEPARATOR . "favhistory.php";
$outtext = "<?php\n";
$outtext .= "return [\n";

$history = [];
for($r = 1; $r <=11; $r++) $history[$r] = [];

$dir = new DirectoryIterator(__DIR__);
foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot() && $fileinfo->isDir() && preg_match("/^[0-9]+$/", $fileinfo->getFilename())) {
        $betsFile = __DIR__ . DIRECTORY_SEPARATOR . $fileinfo->getFilename() . DIRECTORY_SEPARATOR . "bets.php";
        $bets = include($betsFile);
        foreach($bets as $raceNumber => $data){
            $favorites = explode(", ", $data['favorites']);
            $_2sets = get2Sets($favorites);
            if(!isset($data['official win']) || empty($data['official win'])) continue;
            $winners = explode(", ", $data['official win']);
            foreach($_2sets as $example){
                if(!isset($history[$raceNumber][$example])){
                    $history[$raceNumber][$example] = [
                            "win" => array_slice($winners, 0, 1),
                            "qin" => array_slice($winners, 0, 2),
                            "trio" => array_slice($winners, 0, 3),
                    ];
                    sort($history[$raceNumber][$example]["qin"]);
                    sort($history[$raceNumber][$example]["trio"]);
                }
                else{
                    $history[$raceNumber][$example]["win"] = array_values(array_unique(array_merge($history[$raceNumber][$example]["win"], array_slice($winners, 0, 1))));
                    $history[$raceNumber][$example]["qin"] = array_values(array_unique(array_merge($history[$raceNumber][$example]["qin"], array_slice($winners, 0, 2))));
                    $history[$raceNumber][$example]["trio"] = array_values(array_unique(array_merge($history[$raceNumber][$example]["trio"], array_slice($winners, 0, 3))));
                    sort($history[$raceNumber][$example]["win"]);
                    sort($history[$raceNumber][$example]["qin"]);
                    sort($history[$raceNumber][$example]["trio"]);
                }
            }
        }
    }
}

foreach($history as $r => $racecontents){
    ksort($racecontents);
    $outtext .= "\t'$r' => [\n";
    foreach($racecontents as $favs => $contents){
        $outtext .= "\t\t'$favs' => [\n";
        $outtext .= "\t\t\t'win' => [" . implode(", ", $contents["win"]) . "],\n";
        $outtext .= "\t\t\t'qin' => [" . implode(", ", $contents["qin"]) . "],\n";
        $outtext .= "\t\t\t'trio' => [" . implode(", ", $contents["trio"]) . "],\n";
        $outtext .= "\t\t],\n";
    }
    $outtext .= "\t],\n";
}
$outtext .= "];\n?>\n";
file_put_contents($outFile, $outtext);

?>