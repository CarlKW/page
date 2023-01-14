<?php
// get the array of used pictures from the request parameter
$used = json_decode($_POST['used']);

// Change this to the path of your image folder
$imageFolder = 'bilderMatte';

// Read the contents of the image folder
$files = scandir($imageFolder);

// Filter the list of files to only include png files and not already used pictures
$pngFiles = array_filter($files, function($file) use ($used) {
  return strtolower(pathinfo($file, PATHINFO_EXTENSION)) === 'png' && !in_array($file, $used);
});

// Choose a random png file
$randomFile = $pngFiles[array_rand($pngFiles)];

// Output the file path of the random picture
echo $imageFolder . '/' . $randomFile;

?>
