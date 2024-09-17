<?php

$outFile = __DIR__ . DIRECTORY_SEPARATOR . "statistics.php";
$outtext = "<?php\n";
$outtext .= "return [ ";


/**
 * return [ [$a, $b, $c, $d] => in_array(end($favorites), array_slice($officialwin, 0, 3)) ]
 */
 $statistics = [];
 $dir = new DirectoryIterator(__DIR__);
 foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot() && $fileinfo->isDir() && preg_match("/^[0-9]+$/", $fileinfo->getFilename())) {
        $betsFile = __DIR__ . DIRECTORY_SEPARATOR . $fileinfo->getFilename() . DIRECTORY_SEPARATOR . "bets.php";
        $bets = include($betsFile);
        foreach($bets as $raceNumber => $data){
            $favorites = explode(", ", $data['favorites']);
            $winInter = explode(", ", $data['win inter']);
            $last = end($favorites);
            if(!isset($data['official win']) || empty($data['official win'])) continue;
            $winners = explode(", ", $data['official win']);
            $a = count(array_diff($winInter, $favorites));
            $b = count(array_diff($favorites, $winInter));
            $c = count(array_intersect($favorites, $winInter));
            $compact = $a . "" . $b . "" . $c;
            if(in_array($last, array_slice($winners, 0, 3))){
                if(!isset($statistics[$compact])) $statistics[$compact] = true;
            }
            else $statistics[$compact] = false;
        }
    }
 }
 foreach($statistics as $key => $datum){
    if($datum === true) $outtext .= $key . ", ";
 }
$outtext .= "];\n?>\n";
file_put_contents($outFile, $outtext);

?>