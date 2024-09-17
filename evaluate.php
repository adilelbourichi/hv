<?php
$total = 0;
$totalMajorPlaceF = 0;
$totalMajorPlaceW = 0;
$monthly = [];
$dir = new DirectoryIterator(__DIR__);
foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot() && $fileinfo->isDir() && preg_match("/^[0-9]+$/", $fileinfo->getFilename())) {
        $betsFile = __DIR__ . DIRECTORY_SEPARATOR . $fileinfo->getFilename() . DIRECTORY_SEPARATOR . "bets.php";
        $month = substr($fileinfo->getFilename(), 0, 6);
        $contents = file_get_contents($betsFile);
        $contents = explode("\n", $contents);
        $contents = array_slice($contents, -5);
        $parts = explode(": ", $contents[0]);
        $totalMajorPlaceF += (float)$parts[1];
        $parts = explode(": ", $contents[1]);
        $totalMajorPlaceW += (float)$parts[1];
        $parts = explode(": ", $contents[3]);
        $total += (float)$parts[1];
        if(!isset($monthly[$month])) $monthly[$month] = (float)$parts[1];
        else $monthly[$month] += (float)$parts[1];
    }
}
ksort($monthly);
foreach($monthly as $key => $value){
    echo "Total $key: $value \n";
}
echo "Total major place favorites: " . $totalMajorPlaceF . "\n";
echo "Total major place wp: " . $totalMajorPlaceW . "\n";
echo "Total: " . $total . "\n";
?>