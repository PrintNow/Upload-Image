# Upload-Image
图床，将图片上传至第三方，不占用本地空间，暂时仅支持上传到搜狗

# 下载
[Click on me to download | 点击我下载](https://github.com/PrintNow/Upload-Image/archive/master.zip)

# Usage | 使用
参照 `example.php` 文件

```php
<?php
require_once __DIR__."/Upload.Image.php";

$upload = new Upload_Image();

$upload->setPath(__DIR__."/img/example-1.png");
print_r($upload->sogou());//上传 /img/example-1.png 图片并打印结果
/*
输出结果
Array
(
    [code] => 0
    [msg] => success
    [url] => img02.sogoucdn.com/app/a/100520146/9d280afd3d42a606b5af530d55ae3f11
    [total_time] => 0.496954
)
*/

$upload->setPath(__DIR__."/img/example-2.png");
print_r($upload->sogou());//上传 /img/example-2.png 图片并打印结果
/*
输出结果
Array
(
    [code] => 0
    [msg] => success
    [url] => img02.sogoucdn.com/app/a/100520146/aaaea08136223002dbda7ba3f3e87e24
    [total_time] => 0.18407
)
*/
```
> 注意：`url` 前面可以加 `http://` 或 `https://`

# LICENSE
MIT