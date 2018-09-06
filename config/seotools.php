<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Doğa Huzurevi ve Bakımevi - İstanbul", // set false to total remove
            'description'  => 'İstanbul\'da bulunan 3 şubemizde 55 yaş üzeri kişilerin huzurlu, güvenli ve sağlıklı bir şekilde misafir etmekteyiz.', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['huzurevi', 'istanbul', 'bakimevi', 'yasli', 'klinik', 'beslenme', 'doktor', 'istanbulda', 'yaslievi', 'kadikoy', 'sancaktepe'],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Doğa Huzurevi ve Bakımevi - İstanbul', // set false to total remove
            'description' => 'İstanbul\'da bulunan 3 şubemizde 55 yaş üzeri kişilerin huzurlu, güvenli ve sağlıklı bir şekilde misafir etmekteyiz.', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
          //'card'        => 'summary',
          //'site'        => '@LuizVinicius73',
        ],
    ],
];
