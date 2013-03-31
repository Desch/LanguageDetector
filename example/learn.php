<?php

require __DIR__ . '/../lib/LanguageDetector/autoload.php';

ini_set('memory_limit', '1G');

$config = new LanguageDetector\Config;

$c = new LanguageDetector\Learn($config);
foreach (glob(__DIR__ . '/samples/*') as $file) {
    $c->addSample(basename($file), file_get_contents($file));
}
$c->addStepCallback(function($lang, $status) {
    echo "Learning {$lang}: $status\n";
});
$c->save(__DIR__ . '/datafile.php');
