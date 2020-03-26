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
      $email_text = snippet('get_email',['type'=>$any], true);
      // return response with correct header type
      return new Kirby\Cms\Response($email_text, 'application/json');
    }
  ]
]
];
?>