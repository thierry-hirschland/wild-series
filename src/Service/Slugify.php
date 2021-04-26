<?php

namespace App\Service;

class Slugify
{
    public function generate(string $input) : string
    {
        // $input = strtolower($input);
        // $varString = preg_replace('#[^0-9a-z]+#i', '', $input);
        // $mots = array_map('trim', explode(' ', $input));
        // return implode('-', $mots);
        setlocale(LC_ALL, 'fr_FR');
        $chaine = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $input);
        $chaine = strtolower($chaine);
        $chaine = preg_replace('#[^0-9a-z]+#i', '-', $chaine);
        while (strpos($chaine, '--') !== false) {
            $chaine = str_replace('--', '-', $chaine);
        }
        $chaine = trim($chaine, '-');
        return $chaine;
    }
}
