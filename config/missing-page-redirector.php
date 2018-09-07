<?php

return [
    /*
     * This is the class responsible for providing the URLs which must be redirected.
     * The only requirement for the redirector is that it needs to implement the
     * `Spatie\MissingPageRedirector\Redirector\Redirector`-interface
     */
    'redirector' => \Spatie\MissingPageRedirector\Redirector\ConfigurationRedirector::class,

    /*
     * By default the package will only redirect 404s. If you want to redirect on other
     * response codes, just add them to the array. Leave the array empty to redirect
     * always no matter what the response code.
     */
    'redirect_status_codes' => [
        \Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND,
    ],

    /*
     * When using the `ConfigurationRedirector` you can specify the redirects in this array.
     * You can use Laravel's route parameters here.
     */
    'redirects' => [
//        '/non-existing-page' => '/existing-page',
//        '/old-blog/{url}' => '/new-blog/{url}',
        '/dragos-bakimevi-adresi.html' => '/page/subelerimiz/dragos-hatice-satoglu-yasam-evi-26',
        '/kiziltoprak-bakimevi-adresi.html' => '/page/subelerimiz/kiziltoprak-klinik-evi-25',
        '/doga-nin-farki.html' => '/page/doga/doganin-farki-23',
        '/subelerimiz/sancaktepe-yasli-bakim-merkezi.html' => '/page/subelerimiz/sancaktepe-yasli-bakim-merkezi-24',
        '/iletisim/ulasim-formu.html' => '/ulasim-formu',
        '/hizmetlerimiz/klinik-beslenme.html' => '/page/hizmetlerimiz/yaslilar-icin-klinik-beslenme-19',
        '/hizmetlerimiz/yasli-saglik-hizmetleri.html' => '/page/hizmetlerimiz/yasli-saglik-hizmetleri-14',
        '/hizmetlerimiz/yasli-doktor-hizmetleri.html' => '/page/hizmetlerimiz/yaslilar-icin-doktor-hizmetleri-16',
        '/hizmetlerimiz/yasli-refakat-hizmetleri.html' => '/page/hizmetlerimiz/yaslilar-icin-refakat-hizmetleri-18',
        '/hizmetlerimiz/yasli-bakim-hizmetleri.html' => '/page/hizmetlerimiz/yasli-bakim-hizmetleri-12',
        '/hizmetlerimiz/yasli-hemsirelik-hizmetleri.html' => '/page/hizmetlerimiz/yaslilar-icin-hemsirelik-hizmetleri-17',
        '/kiziltoprak-yasli-bakim-merkezi.html' => '/page/subelerimiz/kiziltoprak-klinik-evi-25',
        '/subelerimiz/kiziltoprak-klinik-evi.html' => '/page/subelerimiz/kiziltoprak-klinik-evi-25',
        '/dragos-bakimevi-adresi.html?id=47' => '/page/subelerimiz/dragos-hatice-satoglu-yasam-evi-26',
        '/subelerimiz/dragos-hatice-satoglu-huzurevi.html' => '/page/subelerimiz/dragos-hatice-satoglu-yasam-evi-26',
        '/kiziltoprak-bakimevi-adresi.html?id=47' => '/page/subelerimiz/kiziltoprak-klinik-evi-25',
        '/hizmetlerimiz/yogun-bakim-sonrasi-hasta-bakimi.html' => '/page/hizmetlerimiz/yogun-bakim-sonrasi-hasta-bakimi-13',
    ],

];
