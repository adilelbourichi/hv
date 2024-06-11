<?php

$favoritesWin = [];
$favoritesQin = [];
$favoritesTrio = [];
$nonFavoritesWin = [];
$nonFavoritesQin = [];
$nonFavoritesTrio = [];
$biggestFavoriteWin = [];
$biggestFavoritePlace = [];
$place = [];
$placeKeys = [];
for($k = 1; $k <= 14; $k ++) $place[$k] = [];

$outFile = __DIR__ . DIRECTORY_SEPARATOR . "condition.php";
$outtext = "<?php\n\n\n";

$dir = new DirectoryIterator(__DIR__);
foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot() && $fileinfo->isDir() && preg_match("/^[0-9]+$/", $fileinfo->getFilename())) {
        $betsFile = __DIR__ . DIRECTORY_SEPARATOR . $fileinfo->getFilename() . DIRECTORY_SEPARATOR . "bets.php";
        $bets = include($betsFile);
        foreach($bets as $raceNumber => $data){
            if(!isset($data['official win']) || empty($data['official win'])) continue;
            $favorites = array_filter(explode(", ", $data['favorites']));
            $runners = array_filter(explode(", ", $data['runners']));
            $nonFavorites = array_diff($runners, $favorites);
            $winInter = array_filter(explode(", ", $data['win inter']));
            $qinInter = array_filter(explode(", ", $data['qin inter']));
            $winPivots = array_filter(explode(", ", $data['win pivots']));
            $qinPivots = array_filter(explode(", ", $data['qin pivots']));
            $trioPivots = array_filter(explode(", ", $data['trio pivots']));
            $expr = count($winInter) . count($qinInter) . count($winPivots) . count($qinPivots) . count($trioPivots);
            $winners = array_filter(explode(", ", $data['official win']));
            if(in_array($winners[0], $favorites)){
                if(!isset($favoritesWin[$expr])) $favoritesWin[$expr] = true;
            }
            else $favoritesWin[$expr] = false;
            if(in_array($winners[0], $nonFavorites)){
                if(!isset($nonFavoritesWin[$expr])) $nonFavoritesWin[$expr] = true;
            }
            else $nonFavoritesWin[$expr] = false;
            if($winners[0] == end($favorites)){
                if(!isset($biggestFavoriteWin[$expr])) $biggestFavoriteWin[$expr] = true;
            }
            else $biggestFavoriteWin[$expr] = false;
            if(in_array(end($favorites), array_slice($winners, 0, 3))){
                if(!isset($biggestFavoritePlace[$expr])) $biggestFavoritePlace[$expr] = true;
            }
            else $biggestFavoritePlace[$expr] = false;
            if(count(array_intersect($favorites, array_slice($winners, 0, 2))) === 2) {
                if(!isset($favoritesQin[$expr])) $favoritesQin[$expr] = true;
            }
            else $favoritesQin[$expr] = false;
            if(count(array_intersect($favorites, array_slice($winners, 0, 3))) === 3) {
                if(!isset($favoritesTrio[$expr])) $favoritesTrio[$expr] = true;
            }
            else $favoritesTrio[$expr] = false;
            if(count(array_intersect($nonFavorites, array_slice($winners, 0, 2))) === 2) {
                if(!isset($nonFavoritesQin[$expr])) $nonFavoritesQin[$expr] = true;
            }
            else $nonFavoritesQin[$expr] = false;
            if(count(array_intersect($nonFavorites, array_slice($winners, 0, 3))) === 3) {
                if(!isset($nonFavoritesTrio[$expr])) $nonFavoritesTrio[$expr] = true;
            }
            else $nonFavoritesTrio[$expr] = false;
            for($k = 1; $k <= 14; $k++){
                if(in_array($k, array_slice($winners, 0, 3))){
                    if(!isset($place[$k][$expr])) $place[$k][$expr] = true;
                }
                else $place[$k][$expr] = false;
            }
        }
    }
}

for($k = 1; $k <= 14; $k++){
    foreach($place[$k] as $key => $value){
        if($value === false) unset($place[$k][$key]);
    }
}
foreach($favoritesWin as $key => $value){
    if($value === false) unset($favoritesWin[$key]);
}
foreach($favoritesQin as $key => $value){
    if($value === false) unset($favoritesQin[$key]);
}
foreach($favoritesTrio as $key => $value){
    if($value === false) unset($favoritesTrio[$key]);
}
foreach($nonFavoritesWin as $key => $value){
    if($value === false) unset($nonFavoritesWin[$key]);
}
foreach($nonFavoritesQin as $key => $value){
    if($value === false) unset($nonFavoritesQin[$key]);
}
foreach($nonFavoritesTrio as $key => $value){
    if($value === false) unset($nonFavoritesTrio[$key]);
}
foreach($biggestFavoriteWin as $key => $value){
    if($value === false) unset($biggestFavoriteWin[$key]);
}
foreach($biggestFavoritePlace as $key => $value){
    if($value === false) unset($biggestFavoritePlace[$key]);
}
$favoritesWinKeys = array_keys($favoritesWin);
$favoritesQinKeys = array_keys($favoritesQin);
$favoritesTrioKeys = array_keys($favoritesTrio);
$nonFavoritesWinKeys = array_keys($nonFavoritesWin);
$nonFavoritesQinKeys = array_keys($nonFavoritesQin);
$nonFavoritesTrioKeys = array_keys($nonFavoritesTrio);
$biggestFavoriteWinKeys = array_keys($biggestFavoriteWin);
$biggestFavoritePlaceKeys = array_keys($biggestFavoritePlace);
for($k = 1; $k <= 14; $k++){
    $placeKeys[$k] = array_keys($place[$k]);
    sort($placeKeys[$k]);
}
sort($favoritesWinKeys);
sort($favoritesQinKeys);
sort($favoritesTrioKeys);
sort($nonFavoritesWinKeys);
sort($nonFavoritesQinKeys);
sort($nonFavoritesTrioKeys);
sort($biggestFavoriteWinKeys);
sort($biggestFavoritePlaceKeys);
$outtext .= '$favoriteWin = ' . "['" . implode("', '", $favoritesWinKeys) . "'];\n";
$outtext .= '$favoriteQin =' . " ['" . implode("', '", $favoritesQinKeys) . "'];\n";
$outtext .= '$favoriteTrio =' . " ['" . implode("', '", $favoritesTrioKeys) . "'];\n";
$outtext .= '$nonFavoriteWin = ' . "['" . implode("', '", $nonFavoritesWinKeys) . "'];\n";
$outtext .= '$nonFavoriteQin =' . " ['" . implode("', '", $nonFavoritesQinKeys) . "'];\n";
$outtext .= '$nonFavoriteTrio =' . " ['" . implode("', '", $nonFavoritesTrioKeys) . "'];\n";
$outtext .= '$biggestFavoriteWin =' . " ['" . implode("', '", $biggestFavoriteWinKeys) . "'];\n";
$outtext .= '$biggestFavoritePlace =' . " ['" . implode("', '", $biggestFavoritePlaceKeys) . "'];\n";
$outtext .= '$placeCondition' . " = [\n";
for($k = 1; $k <= 14; $k++) $outtext .= "\t$k => ['" . implode("', '", $placeKeys[$k]) . "'],\n";
$outtext .= "];\n";
$outtext .="\n?>\n";
file_put_contents($outFile, $outtext);
?>
