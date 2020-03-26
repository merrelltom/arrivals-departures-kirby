<?php

if ($type == 'confirm' ) {
    $email_text = $email->confirmtext()->kt();
    echo json_encode($email_text);
} elseif ($type == 'moderate') {
    $email_text = $email->moderationtext()->kt();
    echo json_encode($email_text);
} elseif ($type == 'display') {
    $email_text = $email->displaytext()->kt();
    echo json_encode($email_text);
} elseif ($type == 'reject') {
    $email_text = $email->rejecttext()->kt();
    echo json_encode($email_text);
} else {
    $email_text = NULL;
    echo json_encode($email_text);
}

