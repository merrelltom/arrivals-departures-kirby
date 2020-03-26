<?php

$email = $site->children()->findByURI('email');

if ($type == 'confirm' ) {
    $email_text = $email->confirmtext()->kt();
    return json_encode($email_text);
} elseif ($type == 'moderate') {
    $email_text = $email->moderationtext()->kt();
    return json_encode($email_text);
} elseif ($type == 'display') {
    $email_text = $email->displaytext()->kt();
    return json_encode($email_text);
} elseif ($type == 'reject') {
    $email_text = $email->rejecttext()->kt();
    return json_encode($email_text);
} else {
    $email_text = NULL;
    return json_encode($email_text);
}

