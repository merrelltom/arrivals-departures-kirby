<?php
return [
    'languages' => true,
    'debug' => true,
    'routes' => [
  [
    'pattern' => 'get_map.xml',
    'action'  => function() {
        $content = snippet('get_map',[], true);

        // return response with correct header type
        return new Kirby\Cms\Response($content, 'application/xml');
    }
  ],
  [
    'pattern' => 'email_text/(:any)',
    'action'  => function($any) {
      $email = site()->children()->findByURI('email');
      if ($any == 'confirm' ) {
        $email_text = array(
            "subject"=> strip_tags($email->confirmsubject()->kt()),
            "text"=>$email->confirmtext()->kt(),
            "plain_text"=>str_replace("\n", ' ', strip_tags($email->confirmtext()->kt()))
                );
      } elseif ($any == 'moderate') {
        $email_text = array(
            "subject"=>strip_tags($email->moderationsubject()->kt()),
            "text"=>$email->moderationtext()->kt(),
            "plain_text"=>str_replace("\n", ' ', strip_tags($email->moderationtext()->kt()))
                );
      } elseif ($any == 'display') {
        $email_text = array(
            "subject"=>strip_tags($email->displaysubject()->kt()),
            "text"=>$email->displaytext()->kt(),
            "plain_text"=>str_replace("\n", ' ', strip_tags($email->displaytext()->kt()))
                );
      } elseif ($any == 'reject') {
        $email_text = array(
            "subject"=>strip_tags($email->rejectsubject()->kt()),
            "text"=>$email->rejecttext()->kt(),
            "plain_text"=>str_replace("\n", ' ', strip_tags($email->rejecttext()->kt()))
                );
      } else {
        $email_text = NULL;   
      }
      $email_text = json_encode($email_text);
      // return response with correct header type
      return new Kirby\Cms\Response($email_text, 'application/json');
    }
  ]
]
];
?>