# Upload-Image
图床，将图片上传至第三方，不占用本地空间，暂时仅支持上传到搜狗

# 下载
[https://github.com/PrintNow/Upload-Image/archive/master.zip](Click on me to download | 点击我下载)

# Usage | 使用
参照 `example.php` 文件

```php
<?php
require_once __DIR__."/Upload.Image.php";

$upload = new Upload_Image();

$upload->setPath(__DIR__."/img/example-1.png");
print_r($upload->sogou());//上传 /img/example-1.png 图片并打印结果

$upload->setPath(__DIR__."/img/example-2.png");
print_r($upload->sogou());//上传 /img/example-2.png 图片并打印结果
```

# LICENSE
MIT