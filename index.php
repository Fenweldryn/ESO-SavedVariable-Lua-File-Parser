<?php
$file = file_get_contents('GuildToolsByFen.lua');
$file = str_replace("[", "", $file);
$file = str_replace("]", "", $file);
$file = str_replace("=", ":", $file);
$file = trim(preg_replace('/\s\s+/', '', $file));
$file = trim(preg_replace('/(\d+)\s/', "\"$1\" ", $file));
$file = trim(preg_replace('/(\d+)\,/', "\"$1\",", $file));
$file = trim(preg_replace('/\,\}/', "}", $file));
if ($file[strlen($file) - 1] == ",") {
    $file[strlen($file) - 1] = ' ';
}
$file = "{" . $file . "}";
$file = trim(preg_replace('/\{(\w+)/', "{\"$1\"", $file));
$file = trim(preg_replace('/\}(\w+)/', "},\"$1\"", $file));
echo '<pre>';

$array = json_decode($file, true);
print_r($array);