<?php
/**
 * 上传图片到第三方图床类
 * @author NowTime <https://NowTime.cc>
 */
class Upload_Image
{
    private $filepath;

    public function setPath($filepath)
    {
        $this->filepath = $filepath;
    }

    public function filepath()
    {
        return $this->filepath;
    }

    /**
     * 上传至 搜狗
     * @return array
     */
    public function sogou()
    {
        if(class_exists('CURLFile')){
            //PHP 5.5 以上需要使用这种方法
            $data['pic_path'] = new \CURLFile(realpath($this->filepath()));
        }else{
            $data['pic_path'] = '@'.realpath($this->filepath());
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://pic.sogou.com/pic/upload_pic.jsp");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//上传图片
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36'
        ]);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);//

        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        $parse_url = parse_url($result);

        //上传成功
        if(in_array($parse_url['scheme'], array('http', 'https'))){
            return array(
                'code' => 0,
                'msg' => 'success',
                'url' => $parse_url['host'].$parse_url['path'],
                'total_time' => $info['total_time'],
                //'info' => $info,//调试信息
            );
        }

        return array(
            'code' => 500,
            'msg' => 'error',
            'total_time' => $info['total_time'],
            //'info' => $info,//调试信息
            'raw' => $result,
        );
    }
}
