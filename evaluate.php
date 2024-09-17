<?php
$total = 0;
$totalMajorPlaceF = 0;
$totalMajorPlaceW = 0;
$totalSurePlace = 0;
$HV = ["20240207", "20240215", "20240221", "20240228", "20240306", "20240313", "20240320", "20240327", "20240410", "20240417", "20240424", "20240501", "20240508", 
        "20240515", "20240522", "20240605", "20240612", "20240626", "20240704", "20240710", "20240911",
    ];
$ST = ["20240212", "20240218", "20240225", "20240303", "20240310", "20240316", "20240324", "20240331", "20240403", "20240407", "20240414", "20240420", "20240428", 
       "20240505", "20240511", "20240519", "20240526", "20240529", "20240602", "20240608", "20240615", "20240623", "20240701", "20240706", "20240714", "20240908", 
       "20240915",  
    ];
$totalHV = 0;
$totalST = 0;
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
        $parts = explode(": ", $contents[2]);
        $totalSurePlace += (float)$parts[1];
        $parts = explode(": ", $contents[3]);
        $total += (float)$parts[1];
        if(in_array($fileinfo->getFilename(), $HV)) $totalHV += (float)$parts[1];
        elseif(in_array($fileinfo->getFilename(), $ST)) $totalST += (float)$parts[1];
        else echo "Missing Venue information \n";
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
echo "Total sure place: " . $totalSurePlace . "\n";
echo "Total Shatin: " . $totalST . "\n";
echo "Total Happy Valley: " . $totalHV . "\n";
echo "Total: " . $total . "\n";
?>