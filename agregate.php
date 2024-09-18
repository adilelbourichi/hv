<?php

if(!isset($argv[1])) die("Race Date Not Entered!!\n");
$raceDate = trim($argv[1]);

$currentDir = __DIR__ . DIRECTORY_SEPARATOR . $raceDate;
$outFile = $currentDir . DIRECTORY_SEPARATOR . "agregate.php";

if(file_exists($outFile)) $oldData = include($outFile);

$mainBetsFile = $currentDir . DIRECTORY_SEPARATOR . "bets.php";
$mainData = include($mainBetsFile);
$numberOfRaces = count($mainData);
$outtext = "<?php\n\n";
$outtext .= "return [\n";

$bets = [];
$placesFav = [];
$placesWP = [];
$places = [];
for($raceNumber = 1; $raceNumber <= $numberOfRaces; $raceNumber ++) $bets[$raceNumber] = ['favorites' => '(F) ' . $mainData[$raceNumber]['favorites']];
$dir = new DirectoryIterator($currentDir); 
foreach ($dir as $fileinfo) {
    if(!$fileinfo->isDot()&& preg_match("/(bets)/", $fileinfo->getFilename())) {
        $fullFilePath = $currentDir . DIRECTORY_SEPARATOR . $fileinfo->getFilename();
        $fileContents = include($fullFilePath);
        foreach($fileContents as $raceNumber => $data){
            if(isset($oldData[$raceNumber]['places'])) $oldPlaces = explode(", ", $oldData[$raceNumber]['places']);
            else $oldPlaces = [];
            if(!isset($placesWP[$raceNumber])) $placesWP[$raceNumber] = [];
            if(!isset($placesFav[$raceNumber])) $placesFav[$raceNumber] = [];
            if(isset($data['bets'])) {
                foreach($data['bets'] as $key => $value){
                    if(!in_array($value, $bets[$raceNumber])) {
                        $bets[$raceNumber][$key] = $value;
                    }
                    if(strpos($key, "place(end-wp") === 0 && !in_array($value, $placesWP[$raceNumber])) $placesWP[$raceNumber][] = $value;
                    if(strpos($key, "place(end-fa") === 0 && !in_array($value, $placesFav[$raceNumber])) $placesFav[$raceNumber][] = $value;
                }
            }
            $places = array_intersect($placesFav[$raceNumber], $placesWP[$raceNumber]);
            $oldPlaces = array_values(array_unique(array_merge($oldPlaces, $placesFav[$raceNumber], $placesWP[$raceNumber])));
            if(!empty($places)) $bets[$raceNumber]['sure place'] = implode(", ", $places);
            sort($oldPlaces);
            if(!empty($oldPlaces)) $bets[$raceNumber]['places'] = implode(", ", $oldPlaces);
        }
    }
}
foreach($bets as $raceNumber => $data){
    if(!empty($data)){
        $racetext = "\t'$raceNumber' => [\n";
        $racetext .= "\t\t/**\n";
        $racetext .= "\t\tRace $raceNumber\n";
        $racetext .= "\t\t*/\n";
        foreach($data as $betDescription => $betContent) $racetext .= "\t\t'$betDescription' => '$betContent',\n";
        $racetext .= "\t],\n";
        $outtext .= $racetext;
    }
}
$outtext .= "];\n";
file_put_contents($outFile, $outtext);
?>