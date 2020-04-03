<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://localhost:44444/badnames',
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

echo("<div class='row'><h2 class='col-xs-12 section-title moderation-title'><hr>Bad Names:</h2></div>");

foreach ($results as $result) { ?>
    <form method="post" action="./bad-names" class="row moderation-row" id="a-board-line-<?php echo($board_line);?>">
        <div class="col-xs-12"><hr></div>
        <div class="col-xs-12 col-md-2 large-text"><?php echo($result["name"]);?></div>
        <div class="col-xs-12 col-md-4 large-text"><?php echo($result["type"]);?></div>
        <input type="hidden" value="<?php echo($result["ID"]);?>" name="ID" id="ID">
        <input type="hidden" name="update" value="delete">
        <div class="col-xs-12 col-md-2">
            <input class="lg-button" type="submit" value="Delete">
        </div>
    </form>
<?php $board_line += 1;
} ?> 