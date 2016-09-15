<?php

function resize($src) {  
    list($wdt, $hgt, $type) = getimagesize($src);
    switch ($type) {
        case IMAGETYPE_GIF:
            $srcImg = imagecreatefromgif($src);
            break;
        case IMAGETYPE_JPEG:
            $srcImg = imagecreatefromjpeg($src);
            break;
		case IMAGETYPE_JPG:
			$srcImg = imagecreatefromjpeg($src);
			break;
        case IMAGETYPE_PNG:
            $srcImg = imagecreatefrompng($src);
            break;
    }
    
    if ($srcImg === false) {
        return false;
    }
    
    $srcAspectRatio = $wdt / $hgt;
    $thumbAspectRatio = 1;
    if ($wdt <= 200 && $hgt <= 200) {
        $thumbWdt = $wdt;
        $thumbHgt = $hgt;
    } else if ($thumbAspectRatio > $srcAspectRatio) {
        $thumbWdt = (int) (200 * $srcAspectRatio);
        $thumbHgt = 200;
    } else {
        $thumbWdt = 200;
        $thumbHgt = (int) (200 / $srcAspectRatio);
    }
    
    $thumbImg = imagecreatetruecolor($thumbWdt, $thumbHgt);
    imagecopyresampled($thumbImg, $srcImg, 0, 0, 0, 0, $thumbWdt, $thumbHgt, $wdt, $hgt);
    
    unlink($src);
    $fname = explode('.', $src);
    $src = $fname[0] . '.png';
    
    imagepng($thumbImg, $src);
    imagedestroy($srcImg);
    imagedestroy($thumbImg);
    
    return $src;
}
//*
  $name = preg_replace("/[^a-z0-9.]+/i", "", $_POST['uname']); //fuck sanitization
  $dir = 'uploads/' . $name . '/';
  
  if (!file_exists($dir)) {
    mkdir($dir);
  }

  
  $name = $_FILES['pic']['name'];
  $parts = explode('.', $name);
  $ext = end($parts);
  $name = $parts[0] . '.' . $ext;
  $actualName = $parts[0];
  $originalName = $actualName;
  
  $i = 1;
  while (file_exists($dir . $actualName . '.png')) {       
      $actualName = $originalName . $i;
      $name = $actualName . '.' . $ext;
      $i++;
  }
//*/
  $newFName = $dir.basename($name);
      
  //make sure input isnt too big and is an image
  //actually dont, let it braeak
  $validated = true;
  move_uploaded_file($_FILES['pic']['tmp_name'], $newFName);
  $newName = resize($newFName);
  header("Location:index.php?uname=" . $_POST['uname']);
?>
