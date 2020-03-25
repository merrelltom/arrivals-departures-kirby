<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://localhost:44444/arrivals/moderation',
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "authorization: Bearer " . $token),
]);
$results = json_decode(curl_exec($curl), true);
curl_close($curl);

$board_line = 1;
if (count($results) == 0) {
    echo("<div class='row'><h2 class='col-xs-12 section-title'><hr>No Arrivals to moderate</h2></div>");
 }else{
    echo("<div class='row'><h2 class='col-xs-12 section-title'><hr>Arrivals:</h2></div>");
}
foreach ($results as $result) { ?>
    <form method="post" action="./moderation" class="row moderation-row" id="board-line-<?php echo($board_line);?>">
        <div class="colxs-12"><hr></div>
        <div class="col-xs-12 col-md-2"><?php echo($result["date"]);?></div>
        <div class="col-xs-12 col-md-4"><?php echo($result["name"]);?></div>        
        <input type="hidden" value="arrival" name="type" id="type">
        <input type="hidden" value="<?php echo($result["ID"]);?>" name="ID" id="ID">
        <div class="radio-wrapper col-xs-12 col-md-2">
            <div>
                <input type="radio" id="delete" name="update" value="delete">
                <label for="delete"><span class="label">Delete</span></label>
            </div>
        </div>
        <div class="radio-wrapper col-xs-12 col-md-2">
            <div>
                <input type="radio" id="accept" name="update" value="accept">
                <label for="accept"><span class="label">Accept</span></label>
            </div>
        </div>
        <div class="col-xs-12 col-md-2">
            <input type="submit" value="Update">
        </div>
    </form>
<?php $board_line += 1;
} ?> 