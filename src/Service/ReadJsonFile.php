<?php

namespace App\Service;

use Symfony\Component\Finder\Finder;

class ReadJsonFile
{
    public function decode($jsonFile) {

        $finder = new Finder();
        $contents = null;
        $finder->files()->in(__DIR__)->name($jsonFile);

        foreach ($finder as $file) {
            $contents = $file->getContents();
        }

        return json_decode($contents);
    }

}