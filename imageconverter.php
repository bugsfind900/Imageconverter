/*This code is created by sourabh devera .it use for educational purpose. you can change it as your requirement*/
<?php 
  $pathToImages='testimages/';//folder path of image
  $dir = opendir('testimages/'); // folder directory
  if (!is_dir($pathToImages.$pathToImages)) {
    mkdir($pathToImages.$pathToImages, 0777, true);        
}
 
  while (false !== ($fname = readdir( $dir ))) {
  
    $info = pathinfo($pathToImages . $fname);

    if ( strtolower($info['extension']) == 'jpg' ) 
    {
        $image = imagecreatefromjpeg("{$pathToImages}{$fname}");
        $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
        imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
        imagealphablending($bg, TRUE);
        imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
        imagedestroy($image);
        $quality =100; 
        imagewebp($bg, $pathToImages.$pathToImages.$info['filename'] . ".webp", $quality);
        imagedestroy($bg);
        
    }
    else if(strtolower($info['extension']) == 'png')
    {
        $image = imagecreatefrompng("{$pathToImages}{$fname}");
        $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
        imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
        imagealphablending($bg, TRUE);
        imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
        imagedestroy($image);
        $quality = 100; 
        imagewebp($bg, $pathToImages.$pathToImages.$info['filename'] . ".webp", $quality);
        imagedestroy($bg);
    }
    else
    {
        echo "add more image extension";
    }
    
  }
  
?>
