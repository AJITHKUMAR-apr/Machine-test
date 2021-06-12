<?php
require '../config/config.php';
require '../includes/database.php';
require '../includes/common.php';

$findName = clean(request('search'));
$searchQuery = ($findName == '') ? "false" : "(`Name` LIKE('%$findName%'))";
$outputData = [];
try {
    $queryResult = $db->query("SELECT * FROM `table 1` WHERE $searchQuery");
    if ($db->num_rows($queryResult) > 0) {
        $i = 0;
        while ($dbdata = $db->fetch_array($queryResult)) {
            $name = GetArrayValue($dbdata, 'Name');
            $currentmarketPrice = GetArrayValue($dbdata, 'Current Market Price');
            $outputData[$i] = [
                "name" => $name,
                "currentMarketPrice" => $currentmarketPrice
            ];
            $i++;
        }
    }
} catch (Exception $ex) {
    Response(200, "failed", "something went wrong");
}
Response(200, "success", $outputData);