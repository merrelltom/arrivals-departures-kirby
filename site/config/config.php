<?php
return [
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
            "subject"=>$email->confirmsubject()->kt(),
            "text"=>$email->confirmtext()->kt());
      } elseif ($any == 'moderate') {
        $email_text = array(
            "subject"=>$email->moderationsubject()->kt(),
            "text"=>$email->moderationtext()->kt());
      } elseif ($any == 'display') {
        $email_text = array(
            "subject"=>$email->displaysubject()->kt(),
            "text"=>$email->displaytext()->kt());
      } elseif ($any == 'reject') {
        $email_text = array(
            "subject"=>$email->rejectsubject()->kt(),
            "text"=>$email->rejecttext()->kt());
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