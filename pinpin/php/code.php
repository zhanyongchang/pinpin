<?php
session_start(); //记录session
getCode(4,120,26); 
 
function getCode($num,$w,$h) { 
    $code = ""; 
    for ($i = 0; $i < $num; $i++) { 
        $code .= rand(0, 9); 
    } 
    //4位验证码也可以用rand(1000,9999)直接生成 
    //将生成的验证码写入session，备验证时用 
    $_SESSION["code"] = $code; 
    //创建图片，定义颜色值 
    header("Content-type: image/PNG"); 
    $im = imagecreate($w, $h); 
    $r = rand(0,255);
    $g = rand(0,255);
    $b = rand(0,255);
    $black = imagecolorallocate($im, $r, $g, $b); 
    $gray = imagecolorallocate($im, 237, 247, 255); 
    $bgcolor = imagecolorallocate($im, 237, 247, 255); 
    //填充背景 
    imagefill($im, 0, 0, $gray); 
 
    //画边框 
    // imagerectangle($im, 0, 0, $w-1, $h-1, $black); 
 
    //随机绘制两条虚线，起干扰作用 
    $style = array ($black,$black,$black,$black,$black, 
        $gray,$gray,$gray,$gray,$gray 
    ); 
    imagesetstyle($im, $style); 
    $y1 = rand(0, $h); 
    $y2 = rand(0, $h); 
    $y3 = rand(0, $h); 
    $y4 = rand(0, $h); 
    imageline($im, 0, $y1, $w, $y3, IMG_COLOR_STYLED); 
    imageline($im, 0, $y2, $w, $y4, IMG_COLOR_STYLED); 
 
    //在画布上随机生成大量黑点，起干扰作用; 
    // for ($i = 0; $i < 80; $i++) { 
    //     imagesetpixel($im, rand(0, $w), rand(0, $h), $black); 
    // } 
    //将数字随机显示在画布上,字符的水平间距和位置都按一定波动范围随机生成 
    $strx = rand(20, 30); 
    for ($i = 0; $i < $num; $i++) { 
        $strpos = rand(1, 6); 
        imagestring($im, 5, $strx, $strpos, substr($code, $i, 1), $black); 
        $strx += rand(20, 30); 
    } 
    imagepng($im);//输出图片 
    imagedestroy($im);//释放图片所占内存 
} 
?>