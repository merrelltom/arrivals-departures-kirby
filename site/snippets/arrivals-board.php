<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'oauth.php';
$token = getToken();


$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://localhost:44444/arrivals/webBoard',
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
        <li class="names-list-item" id=" ">
            <div class="board-item-wrapper">
                <span class="date col-md-3" id="a-board-date-<?=$board_line;?>">
                    <?php 
                        $letters = str_split($result["date"]); 
                        foreach ($letters as $letter){
                            echo '<span class="letter-'. $letter_no .'">'. $letter .'</span>';
                            $letter_no++;
                        }
                    ?>
                </span>
            </div>
            <div class="board-item-wrapper">
                <span class="name col-md-9" id="a-board-name-<?=$board_line;?>">
                    <?php 
                        $letters = str_split($result["name"]); 
                        foreach ($letters as $letter){
                            echo '<span class="letter-'. $letter_no .'">'. $letter .'</span>';
                            $letter_no++;
                        }
                    ?>
                </span>
            </div>
    </li>
<?php 
    $board_line += 1;
    } 
?>