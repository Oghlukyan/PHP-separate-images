<?php

$dir_path = 'folder';
checkFolder($dir_path . '/');

function checkFolder ($dir_path) {
    $files = scandir($dir_path);
    for ($i = 0; $i < count($files); $i++) {
        if ($files[$i] === '.' || $files[$i] === '..')
            continue;
        $file = pathinfo($files[$i]);
        $current_path = $dir_path . $file['basename'];
        if (is_dir($current_path)) {
            checkFolder($current_path . '/');
        } else {
            $mimeType = (filesize($current_path) > 11) ? (exif_imagetype($current_path)) : (false);
            if ($mimeType)
                echo "<img src='$current_path' style='width: 800px'>";
        }
    }
}

?>

<html>
    <head></head>
    <body></body>
</html>
