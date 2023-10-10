<?php
include $_SERVER['PWD'] . '/app/vendor/autoload.php';

$parseTags = new App\Test\Model\ParseTags;

$text = '[TAG_NAME:description]data[/TAG_NAME]';
$array = $parseTags->getParsedTags($text);
var_dump($array);
