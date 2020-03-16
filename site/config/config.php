<?php
return [
    'debug' => true,
    'routes' => [
  [
    'pattern' => 'get_map.xml',
    'action'  => function() {
        $content = snippet('get_map', true);

        // return response with correct header type
        return new Kirby\Cms\Response($content, 'application/xml');
    }
  ],
  [
    'pattern' => 'sitemap',
    'action'  => function() {
      return go('get_map.xml', 301);
    }
  ]
]
];
?>