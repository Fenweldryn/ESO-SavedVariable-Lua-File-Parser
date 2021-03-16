<?php
$file = file_get_contents('GuildToolsByFen.lua');
$file = str_replace("[", "", $file);
$file = str_replace("]", "", $file);
$file = str_replace("=", ":", $file);
$file = preg_replace('/\s\s+/', '', $file);
$file = preg_replace('/(\d+)\s/', "\"$1\" ", $file);
$file = preg_replace('/(\d+)\,/', "\"$1\",", $file);
$file = preg_replace('/\,\}/', "}", $file);
if ($file[strlen($file) - 1] == ",") {
    $file[strlen($file) - 1] = ' ';
}
$file = "{" . $file . "}";
$file = preg_replace('/\{(\w+)/', "{\"$1\"", $file);
$file = preg_replace('/\}(\w+)/', "},\"$1\"", $file);

$array = json_decode($file, true);
echo '<pre>';
print_r($array);
