<?php

if (preg_match('#apply#', $_SERVER['REQUEST_URI'])) {
    $mainSection = '/';
    $country = null;
    $city = null;
    $specialty = null;
    $page = null;
    $sections = explode('/', $_SERVER['REQUEST_URI']);
    $newUrn = '/';
    foreach ($sections as $key => $section) {
        if ($section == 'doctors') {
            $mainSection = '/doctors/';
        } elseif ($section == 'clinics') {
            $mainSection = '/clinics/';
        }
        if ($section == 'country-is-ua') $country = 'ua/';
        if (preg_match('#city-is-#', $section)) $city = str_replace('city-is-', '', $section) . '/';
        if (preg_match('#specialty-is-#', $section)) $specialty = str_replace('specialty-is-', '', $section) . '/';
        if (preg_match('#page\d+#', $section)) $page = $section . '/';
    }
    $newUrn = $mainSection . $country . $city . $specialty . $page;
    header("Location: $newUrn");
}

