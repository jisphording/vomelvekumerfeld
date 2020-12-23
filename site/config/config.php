<?php

return [
    // give me some more information while developing
    'debug' => true,

    // custom page routing
    'routes' => [
        [
        // rerouting the news entries from the panel
        // bcs. news entries do not have their own page
        'pattern' => 'news/(:any)',
        'action'  => function () {
            return site()->visit('news');
        }
        ],
    ]
];

?>