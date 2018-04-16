<?php
$file = file_get_contents('./preambolo.html', FILE_USE_INCLUDE_PATH);
$file = str_replace('__USER__','admin',$file);
$file = str_replace('__NAME_PAGE__','Administrator',$file);
$file = str_replace('__STYLE__','private_style',$file);

echo $file;
?>