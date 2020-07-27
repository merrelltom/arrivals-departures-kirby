<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$token = getToken();


$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://localhost:44444/departures',
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
$letter_no = 1;
foreach ($results as $result) { ?>
        <li class="archive-list-item">
            <div class="row">
                <div class="archive-date col-xs-12 col-md-3">
                    <?php 
                        echo $result["date"];
                    ?>
                </div>
                <div class="archive-name col-xs-12 col-md-9">
                    <?php 
                        echo $result["name"];
                    ?>
                </div>
                <?php if ($result["story_mod"] == 1) { ?>
                <div>
                    <a href="./stories#<?php echo $result["ID"];?>">
                        Story
                    </a>
                </div>
                <?php } ?>
            </div>
        </li>
<?php 
    $board_line += 1;
    } 
?>