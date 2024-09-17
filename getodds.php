<?php

if(!isset($argv[1])) die("Race Date Not Entered!!\n");

$raceDate = trim($argv[1]);

if(isset($argv[2])) $revision = trim($argv[2]);
else $revision = "";

$step = "bets$revision";
$history = include(__DIR__ . DIRECTORY_SEPARATOR . "history$revision.php");

function factorial($n){
    if($n <= 0) return 1;
    $fact = 1;
    for($i = 1; $i <= $n; $i++) $fact *= $i;
    return $fact;
}
function combination($p, $n){
    if($n < $p) return 0;
    return factorial($n) / (factorial($p) * factorial($n - $p));
}

$total = 0;
$totalMajorPlaceF = 0;
$totalMajorPlaceW = 0;
$totalMinorPlace = 0;

$currentDir = __DIR__ . DIRECTORY_SEPARATOR . $raceDate;

$oddsFile = $currentDir . DIRECTORY_SEPARATOR . "odds.php";
$winOddsFile = $currentDir . DIRECTORY_SEPARATOR . "winodds.php";
if(file_exists($winOddsFile)) $allWinOdds = include($winOddsFile);
$allRacesOdds = include($oddsFile);
$outFile = $currentDir . DIRECTORY_SEPARATOR . "$step.php";

if(file_exists($outFile)){
    $oldData = include($outFile);
}

$numberOfRaces = count($allRacesOdds);

$outtext = "<?php\n\n";
$outtext .= "return [\n";

$totalBets = [];
$totalRace = [];

for ($raceNumber = 1; $raceNumber <= $numberOfRaces; $raceNumber++) {
    $totalBets[$raceNumber] = 0;
    $totalRace[$raceNumber] = 0;
    if(isset($oldData)){
        if(isset($oldData[$raceNumber]['favorites'])) $oldFavorites = explode(", ", $oldData[$raceNumber]['favorites']);
        if(isset($oldData[$raceNumber]['official win'])) $officialWin = explode(", ", $oldData[$raceNumber]['official win']);
        if(isset($oldData[$raceNumber]['win amount'])) $winAmount = $oldData[$raceNumber]['win amount'];
        if(isset($oldData[$raceNumber]['qin amount'])) $qinAmount = $oldData[$raceNumber]['qin amount'];
        if(isset($oldData[$raceNumber]['trio amount'])) $trioAmount = $oldData[$raceNumber]['trio amount'];
        if(isset($oldData[$raceNumber]['place amount'])) $placeAmount = $oldData[$raceNumber]['place amount'];
    }
    if(isset($oldFavorites)) $favorites = $oldFavorites;
    else $favorites = [];
    $winsArray = $allRacesOdds[$raceNumber];
    asort($winsArray);
    $runners = array_keys($winsArray);
    $favorite = $runners[0];
    if(!in_array($favorite, $favorites)) $favorites[] = $favorite;
    $favorites = array_intersect($favorites, $runners);
    sort($favorites);
    sort($runners);
    $racetext = "";
    $racetext .= "\t'$raceNumber' => [\n";
    $racetext .= "\t\t/**\n";
    $racetext .= "\t\tRace $raceNumber\n";
    $racetext .= "\t\t*/\n";
    $racetext .= "\t\t'favorites' => '" . implode(", ", $favorites) . "',\n"; 
    $racetext .= "\t\t'runners' => '" . implode(", ", $runners) . "',\n"; 
    foreach($runners as $runner){
        if(!is_array($history)) {
            var_dump($history);
            var_dump($raceNumber);
            die();
        }
        if(!isset($history[$raceNumber][$runner])) $history[$raceNumber][$runner] =  ["win" => [], "qin" => [], "trio" => []];
    }
    if(isset($officialWin)){
        $racetext .= "\t\t'official win' => '" . implode(", ", $officialWin) . "',\n"; 
    }
    if(isset($winAmount)){
        $racetext .= "\t\t'win amount' => " . $winAmount . ",\n"; 
    }
    if(isset($qinAmount)){
        $racetext .= "\t\t'qin amount' => " . $qinAmount . ",\n"; 
    }
    if(isset($trioAmount)){
        $racetext .= "\t\t'trio amount' => " . $trioAmount . ",\n"; 
    }
    if(isset($placeAmount)){
        $racetext .= "\t\t'place amount' => [\n";
        foreach($placeAmount as $place => $amount){
            $racetext .= "\t\t\t$place => $amount,\n";
        }
        $racetext .= "\t\t],\n"; 
    }
    $intersections = [];
    $firstSet = true;
    foreach($favorites as $F){
        $wincandidates = array_intersect($history[$raceNumber][$F]["win"], $runners);
        if($firstSet) {
            $winInter = $wincandidates;
            $firstSet = false;
        }
        else {
            $winInter = array_intersect($winInter, $wincandidates);
        }
    }
    sort($winInter);
    $racetext .= "\t\t'win inter' => '" . implode(", ", $winInter) . "',\n";
    $unitBet = 100;
    $allValues = [];
    foreach($runners  as $one){
        foreach($runners as $two){
            if($two > $one){
                foreach($runners as $three){
                    if($three > $two){
                        $set = [$one, $two, $three];
                        $temp = array_intersect($history[$raceNumber][$one]["win"], $history[$raceNumber][$two]["win"], $history[$raceNumber][$three]["win"], $runners);
                        $temp = array_intersect($set, $temp);
                        foreach($runners as $four){
                            if($four > $three){
                                $set = [$one, $two, $three, $four];
                                $temp = array_intersect($temp, $history[$raceNumber][$four]["win"]);
                                $temp = array_intersect($set, $temp);
                                if(count($temp) >= 2){
                                    $allValues = array_values(array_unique(array_merge($allValues, $set)));
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    sort($allValues);
    $racetext .= "\t\t'allValues' => '" . implode(", ", $allValues) . "',\n";
    $racetext .= "\t\t'bets' => [\n";
    if(count($favorites) >= 3 && in_array(count($winInter), [3, 4, 5])){
        $racetext .= "\t\t\t'place(end-favorites $revision, $" . $unitBet . ")' => '" .  end($favorites)  . "',\n"; 
        $totalBets[$raceNumber] += $unitBet;
        $totalMajorPlaceF -= $unitBet;
        if(isset($officialWin) && in_array(end($favorites), array_slice($officialWin, 0, 3)) && isset($placeAmount[end($favorites)])){
            $totalRace[$raceNumber] += 1/10 * $unitBet * $placeAmount[end($favorites)];
            $racetext .= "\t\t\t'1 won(place bet)' => " . 1/10 * $unitBet * $placeAmount[end($favorites)] . ",\n";
            $totalMajorPlaceF += 1/10 * $unitBet * $placeAmount[end($favorites)];
        }
    }
    $wp = array_intersect($allValues, $favorites);
    if(count($wp) === 3){
        $racetext .= "\t\t\t'place(end-wp $revision, $" . $unitBet . ")' => '" . end($wp) . "',\n"; 
        $totalBets[$raceNumber] += $unitBet;
        $totalMajorPlaceW -= $unitBet;
        if(isset($officialWin) && in_array(end($wp), array_slice($officialWin, 0, 3)) && isset($placeAmount[end($wp)])){
            $totalRace[$raceNumber] += (1 * $unitBet / 10) * $placeAmount[end($wp)];
            $racetext .= "\t\t\t'2 won(place bet)' => " . (1 * $unitBet / 10) * $placeAmount[end($wp)] . ",\n";
            $totalMajorPlaceW += (1 * $unitBet / 10) * $placeAmount[end($wp)];
        }
    }
    if(count($favorites) >= 3 && count(array_intersect($winInter, $favorites)) >= 3) {
        $racetext .= "\t\t\t'super sure bet' => 'super sure place " . end($wp) . "',\n" ;
    }
    $racetext .= "\t\t],\n";
    $racetext .= "\t\t'total bets' => $totalBets[$raceNumber],\n";
    $totalRace[$raceNumber] -= $totalBets[$raceNumber];
    if(isset($officialWin) && $totalBets[$raceNumber] > 0){
        $racetext .= "\t\t'total won in race $raceNumber' => " . $totalRace[$raceNumber] . ",\n";
        $total += $totalRace[$raceNumber];
    }
    $racetext .= "\t],\n";
    unset($oldFavorites);
    unset($favorites);
    $outtext .= $racetext;
}
$outtext .= "];\n";
$outtext .= "//total major place favorites: $totalMajorPlaceF\n";
$outtext .= "//total major place wp: $totalMajorPlaceW\n";
$outtext .= "//total minor place: $totalMinorPlace\n";
$outtext .= "//total: $total\n";
file_put_contents($outFile, $outtext);