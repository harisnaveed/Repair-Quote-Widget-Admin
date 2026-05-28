<?php

return [

    'platform-login' => [
        'title' => 'Login',
        'js' => [
            'js/custom.js',
        ],
        'seo' => [
            'page_title' => 'Login',
            'meta' => [
                ['name' => 'keywords', 'content' => config('theme.app_name').' is a modern admin dashboard template built with Bootstrap 5. Featuring a clean and responsive design, it provides a range of customizable components and tools to efficiently manage and oversee various administrative tasks.'],
                ['name' => 'author', 'content' => config('theme.author')],
                ['name' => 'robots', 'content' => 'index, follow'],
                ['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],
                ['name' => 'description', 'content' => config('theme.app_name').' is a modern admin dashboard template built with Bootstrap 5. Featuring a clean and responsive design, it provides a range of customizable components and tools to efficiently manage and oversee various administrative tasks.'],
            ],
        ],
    ],

];
