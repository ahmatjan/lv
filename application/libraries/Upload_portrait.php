<?php
/**
* 保存二进制base64图像
*/
class Upload_portrait{
// 用来处理上传的数据流代码
public function imgsave(){
        //方式一：电脑上传文件
        $image = $_FILES["photo"]["tmp_name"];
        $fp = fopen($image, "r");
        $file = fread($fp, $_FILES["photo"]["size"]); //二进制数据流
        //保存地址
        $imgDir = './Uploads/';
        //要生成的图片名字
        $filename = date("Ym")."/".md5(time().mt_rand(10, 99)).".png"; //新图片名称
        $newFilePath = $imgDir.$filename;
        $data = $file;
        $newFile = fopen($newFilePath,"w"); //打开文件准备写入
        fwrite($newFile,$data); //写入二进制流到文件
        fclose($newFile); //关闭文件
    }
}