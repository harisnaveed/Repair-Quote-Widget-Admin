<?php

$theme = require __DIR__.'/theme.php';

return [
    // platform pages
    'platform-login' => [
        'title' => 'Login',
        'js' => [
            'js/custom.js',
        ],
        'seo' => [
            'page_title' => 'Login',
            'meta' => [
                ['name' => 'keywords', 'content' => $theme['app_name'].' is a modern admin dashboard template built with Bootstrap 5. Featuring a clean and responsive design, it provides a range of customizable components and tools to efficiently manage and oversee various administrative tasks.'],
                ['name' => 'author', 'content' => $theme['author']],
                ['name' => 'robots', 'content' => 'index, follow'],
                ['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],
                ['name' => 'description', 'content' => $theme['app_name'].' is a modern admin dashboard template built with Bootstrap 5. Featuring a clean and responsive design, it provides a range of customizable components and tools to efficiently manage and oversee various administrative tasks.'],
            ],
        ],
    ],
    'platform-dashboard' => [
        'title' => 'Dashboard',
        'js' => [
            'js/custom.js',
        ],
        'seo' => [
            'page_title' => 'Dashboard',
            'meta' => [
                ['name' => 'keywords', 'content' => $theme['app_name'].' is a modern admin dashboard template built with Bootstrap 5. Featuring a clean and responsive design, it provides a range of customizable components and tools to efficiently manage and oversee various administrative tasks.'],
                ['name' => 'author', 'content' => $theme['author']],
                ['name' => 'robots', 'content' => 'index, follow'],
                ['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],
                ['name' => 'description', 'content' => $theme['app_name'].' is a modern admin dashboard template built with Bootstrap 5. Featuring a clean and responsive design, it provides a range of customizable components and tools to efficiently manage and oversee various administrative tasks.'],
            ],
        ],
    ],
    'platform-companies' => [
        'title' => 'Companies',
        'front-menu' => true,
        'css' => [
            'vendor/toastr/css/toastr.min.css',
        ],
        'js' => [
            'vendor/datatables/js/jquery.dataTables.min.js',
            'vendor/datatables/responsive/responsive.js',
            'js/plugins-init/datatables.init.js',
            'vendor/toastr/js/toastr.min.js',
            'js/custom.js',
            'bottom' => [
                'js/highlight.min.js',
            ],
        ],
        'seo' => [
            'page_title' => 'Companies',
            'meta' => [
                ['name' => 'keywords', 'content' => $theme['app_name'].' is a modern admin dashboard template built with Bootstrap 5. Featuring a clean and responsive design, it provides a range of customizable components and tools to efficiently manage and oversee various administrative tasks. Companies'],
                ['name' => 'author', 'content' => $theme['author']],
                ['name' => 'robots', 'content' => 'index, follow'],
                ['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],
                ['name' => 'description', 'content' => $theme['app_name'].' is a modern admin dashboard template built with Bootstrap 5. Featuring a clean and responsive design, it provides a range of customizable components and tools to efficiently manage and oversee various administrative tasks. Companies'],
            ],
        ],
    ],
    'platform-deleted-companies' => [
        'title' => 'Deleted Companies',
        'front-menu' => true,
        'css' => [
            'vendor/toastr/css/toastr.min.css',
        ],
        'js' => [
            'vendor/datatables/js/jquery.dataTables.min.js',
            'vendor/datatables/responsive/responsive.js',
            'js/plugins-init/datatables.init.js',
            'vendor/toastr/js/toastr.min.js',
            'js/custom.js',
            'bottom' => [
                'js/highlight.min.js',
            ],
        ],
        'seo' => [
            'page_title' => 'Deleted Companies',
            'meta' => [
                ['name' => 'keywords', 'content' => $theme['app_name'].' is a modern admin dashboard template built with Bootstrap 5. Featuring a clean and responsive design, it provides a range of customizable components and tools to efficiently manage and oversee various administrative tasks. Deleted Companies'],
                ['name' => 'author', 'content' => $theme['author']],
                ['name' => 'robots', 'content' => 'index, follow'],
                ['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],
                ['name' => 'description', 'content' => $theme['app_name'].' is a modern admin dashboard template built with Bootstrap 5. Featuring a clean and responsive design, it provides a range of customizable components and tools to efficiently manage and oversee various administrative tasks. Deleted Companies'],
            ],
        ],
    ],
    'view-all-locations' => [
        'title' => 'View all Locations',
        'front-menu' => true,
        'css' => [
            'vendor/toastr/css/toastr.min.css',
        ],
        'js' => [
            'vendor/datatables/js/jquery.dataTables.min.js',
            'vendor/datatables/responsive/responsive.js',
            'js/plugins-init/datatables.init.js',
            'vendor/toastr/js/toastr.min.js',
            'js/custom.js',
            'bottom' => [
                'js/highlight.min.js',
            ],
        ],
        'seo' => [
            'page_title' => 'View All Locations',
            'meta' => [
                ['name' => 'keywords', 'content' => $theme['app_name'].' is a modern admin dashboard template built with Bootstrap 5. Featuring a clean and responsive design, it provides a range of customizable components and tools to efficiently manage and oversee various administrative tasks. Companies'],
                ['name' => 'author', 'content' => $theme['author']],
                ['name' => 'robots', 'content' => 'index, follow'],
                ['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],
                ['name' => 'description', 'content' => $theme['app_name'].' is a modern admin dashboard template built with Bootstrap 5. Featuring a clean and responsive design, it provides a range of customizable components and tools to efficiently manage and oversee various administrative tasks. Companies'],
            ],
        ],
    ],
    // user pages
    'user-login' => [
        'title' => 'Login',
        'js' => [
            'js/custom.js',
        ],
        'seo' => [
            'page_title' => 'Login',
            'meta' => [
                ['name' => 'keywords', 'content' => $theme['app_name'].' is a modern admin dashboard template built with Bootstrap 5. Featuring a clean and responsive design, it provides a range of customizable components and tools to efficiently manage and oversee various administrative tasks.'],
                ['name' => 'author', 'content' => $theme['author']],
                ['name' => 'robots', 'content' => 'index, follow'],
                ['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],
                ['name' => 'description', 'content' => $theme['app_name'].' is a modern admin dashboard template built with Bootstrap 5. Featuring a clean and responsive design, it provides a range of customizable components and tools to efficiently manage and oversee various administrative tasks.'],
            ],
        ],
    ],
    'user-dashboard' => [
        'title' => 'Dashboard',
        'js' => [
            'js/custom.js',
        ],
        'seo' => [
            'page_title' => 'Dashboard',
            'meta' => [
                ['name' => 'keywords', 'content' => $theme['app_name'].' is a modern admin dashboard template built with Bootstrap 5. Featuring a clean and responsive design, it provides a range of customizable components and tools to efficiently manage and oversee various administrative tasks.'],
                ['name' => 'author', 'content' => $theme['author']],
                ['name' => 'robots', 'content' => 'index, follow'],
                ['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],
                ['name' => 'description', 'content' => $theme['app_name'].' is a modern admin dashboard template built with Bootstrap 5. Featuring a clean and responsive design, it provides a range of customizable components and tools to efficiently manage and oversee various administrative tasks.'],
            ],
        ],
    ],
];
