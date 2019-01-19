<?php
require_once __DIR__."/Upload.Image.php";

$upload = new Upload_Image();

$upload->setPath(__DIR__."/img/example-1.png");
print_r($upload->sogou());//上传 /img/example-1.png 图片并打印结果

$upload->setPath(__DIR__."/img/example-2.png");
print_r($upload->sogou());//上传 /img/example-2.png 图片并打印结果
