<?php

return [
    // add font registration here
    'font_path' => public_path('fonts/'),
    'font_data' => [
        'cairo' => [
            'R' => 'Cairo-Regular.ttf',
            'B' => 'Cairo-Bold.ttf',
            'M' => 'Cairo-Medium.ttf',
            'L' => 'Cairo-Light.ttf',
            'EB' => 'Cairo-ExtraBold.ttf',
            'BL' => 'Cairo-Black.ttf',
        ],
    ],

	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Laravel Pdf',
	'display_mode'          => 'fullpage',
	'tempDir'               => base_path('../temp/'),
	'pdf_a'                 => true,
	'pdf_a_auto'            => false,
	'icc_profile_path'      => ''
];
