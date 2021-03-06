<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'oauth.php';
$token = getToken();

function test_alter(&$item1, $key, $prefix)
{
    $item1['type'] = "$prefix";
}

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://localhost:44444/arrivals/stories',
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "authorization: Bearer " . $token),
]);
$arrival_results = json_decode(curl_exec($curl), true);
array_walk($arrival_results, 'test_alter', 'arrival');
curl_close($curl);

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://localhost:44444/departures/stories',
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "authorization: Bearer " . $token),
]);
$departure_results = json_decode(curl_exec($curl), true);
array_walk($departure_results, 'test_alter', 'departure');
curl_close($curl);

$all_results = array_merge($arrival_results, $departure_results);
//arsort($all_results);
function compare_ID($a, $b)
  {
    return strnatcmp($a['date'], $b['date']);
  }
usort($all_results, 'compare_ID');
$results = array_reverse($all_results,true);
?>

<div id="arrival-stories" class="col-xs-12 col-md-6">
    <div class="grid">
        <?php
        foreach (array_reverse ($arrival_results) as $result) : ?>
            <div id="<?php echo($result['type'].$result['ID']);?>" class="col-xs-12 resource">
                 <div class="bg-yellow story <?= $result['type'];?>">
                     <div class="story-cat"><?php echo($result['type']);?></div>
                     <h2 class="story-name large-text"><?php echo($result['name']);?></h2>
                     <div class="story-date"><?php echo($result['date']);?></div>
                     <div class="story-text"><?php echo($result['story']);?></div>
                     <div class="story-cat"></div>
                 </div>
             </div>
        <?php
            endforeach;
        ?>
    </div>
</div>

<div id="departure-stories" class="col-xs-12 col-md-6">
    <div class="grid">
        <?php
        foreach (array_reverse ($departure_results) as $result) : ?>
            <div id="<?php echo($result['type'].$result['ID']);?>" class="col-xs-12 resource">
                 <div class="bg-yellow story <?= $result['type'];?>">
                     <div class="story-cat"><?php echo($result['type']);?></div>
                     <h2 class="story-name large-text"><?php echo($result['name']);?></h2>
                     <div class="story-date"><?php echo($result['date']);?></div>
                     <div class="story-text"><?php echo($result['story']);?></div>
                     <div class="story-cat"></div>
                 </div>
             </div>
        <?php
            endforeach;
        ?>
    </div>
</div>
