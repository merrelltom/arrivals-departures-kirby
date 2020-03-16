<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

snippet('oauth');
$token = getToken();

function parseToXML($htmlStr) {
    $xmlStr = str_replace('<', '&lt;', $htmlStr);
    $xmlStr = str_replace('>', '&gt;', $xmlStr);
    $xmlStr = str_replace('"', '&quot;', $xmlStr);
    $xmlStr = str_replace("'", '&#39;', $xmlStr);
    $xmlStr = str_replace("&", '&amp;', $xmlStr);
    return $xmlStr;
}

$arr_curl = curl_init();
curl_setopt_array($arr_curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://localhost:44444/arrivals/map',
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "authorization: Bearer " . $token),
]);
$arr_geo = json_decode(curl_exec($arr_curl), true);
curl_close($arr_curl);

$dep_curl = curl_init();
curl_setopt_array($dep_curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://localhost:44444/departures/map',
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "authorization: Bearer " . $token),
]);
$dep_geo = json_decode(curl_exec($dep_curl), true);
curl_close($dep_curl);

// Start XML file, create parent node
//$dom = new DOMDocument("1.0");
//$node = $dom->createElement("markers");
//$parnode = $dom->appendChild($node);

header("Content-type: text/xml");

echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;

foreach ($arr_geo as $arr_row) {
//  $node = $dom->createElement("marker");
//  $newnode = $parnode->appendChild($node);
//  $newnode->setAttribute("name", $arr_row['name']);
//  $newnode->setAttribute("date", $arr_row['date']);
//  $latlng = explode(',',  $arr_row['geo']);
//  $newnode->setAttribute("lat", $latlng[0]);
//  $newnode->setAttribute("lng", $latlng[1]);
//  $newnode->setAttribute("type", 'arrival');
    
  echo '<marker ';
  echo 'name="' . parseToXML($arr_row['name']) . '" ';
  echo 'date="' . parseToXML($arr_row['date']) . '" ';
  $latlng = explode(',',  $arr_row['geo']);
  echo 'lat="' . $latlng[0] . '" ';
  echo 'lng="' . $latlng[1] . '" ';
  echo 'type="arrival" ';
  echo '/>';
  $ind = $ind + 1;
}

foreach ($dep_geo as $dep_row) {
//  $node = $dom->createElement("marker");
//  $newnode = $parnode->appendChild($node);
//  $newnode->setAttribute("name", $dep_row['name']);
//  $newnode->setAttribute("date", $dep_row['date']);
//  $latlng = explode(',',  $dep_row['geo']);
//  $newnode->setAttribute("lat", $latlng[0]);
//  $newnode->setAttribute("lng", $latlng[1]);
//  $newnode->setAttribute("type", 'departure');
  echo '<marker ';
  echo 'name="' . parseToXML($dep_row['name']) . '" ';
  echo 'date="' . parseToXML($dep_row['date']) . '" ';
  $latlng = explode(',',  $dep_row['geo']);
  echo 'lat="' . $latlng[0] . '" ';
  echo 'lng="' . $latlng[1] . '" ';
  echo 'type="departure" ';
  echo '/>';
  $ind = $ind + 1;
}

echo '</markers>';
//echo $dom->saveXML();
