<?php
$total = 0;
$totalPlaceF = 0;
$totalPlaceEndW = 0;
$totalSurePlace = 0;
$totalPlaceW = 0;
$HV = ["20240207", "20240215", "20240221", "20240228", "20240306", "20240313", "20240320", "20240327", "20240410", "20240417", "20240424", "20240501", "20240508", 
        "20240515", "20240522", "20240605", "20240612", "20240626", "20240704", "20240710", "20240911", "20240918", "20240925", "20241009",
    ];
$ST = ["20240212", "20240218", "20240225", "20240303", "20240310", "20240316", "20240324", "20240331", "20240403", "20240407", "20240414", "20240420", "20240428", 
       "20240505", "20240511", "20240519", "20240526", "20240529", "20240602", "20240608", "20240615", "20240623", "20240701", "20240706", "20240714", "20240908", 
       "20240915", "20240922", "20240928", "20241001", "20241006", "20241013",
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
        $contents = array_slice($contents, -6);
        $parts = explode(": ", $contents[0]);
        $totalPlaceF += (float)$parts[1];
        $parts = explode(": ", $contents[1]);
        $totalPlaceEndW += (float)$parts[1];
        $parts = explode(": ", $contents[2]);
        $totalPlaceW += (float)$parts[1];
        $parts = explode(": ", $contents[3]);
        $totalSurePlace += (float)$parts[1];
        $parts = explode(": ", $contents[4]);
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
echo "Total place end favorites: " . $totalPlaceF . "\n";
echo "Total place end wp: " . $totalPlaceEndW . "\n";
echo "Total place wp: " . $totalPlaceW . "\n";
echo "Total sure place: " . $totalSurePlace . "\n";
echo "Total Shatin: " . $totalST . "\n";
echo "Total Happy Valley: " . $totalHV . "\n";
echo "Total: " . $total . "\n";
?>