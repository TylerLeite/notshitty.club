<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
?>

<html>
<head>
	<meta charset="utf-8">
	<meta lang="en-us">
	<title>Picture Fixture</title>

    <style>
        a:link, a:visited {
            color: blue;
        }
		#gallery {
			width: 880px;
			display: block;
			margin: 0 auto;
		}

		#gallery .imghold {
			display: inline-block;
			margin: 10px;
			width: 200px;
			height: 200px;
        }

        #gallery .imghold.roulette {
            display: block;
            margin: 10vw auto 0 auto;
        }

        #gallery .imghold img {
            display: block;
            margin: 0 auto;
        }
	</style>
</head>

<body>

<?php
if (!isset($_GET['uname'])) {
?>
    <a href="..">Back to fucking jon</a>
	<h1>Upload a photo</h1>
	<form action="upload.php" method="post" enctype="multipart/form-data">
			File: <input type="file" name="pic" id="picIn">
            Your Username: <input type="text" name="uname" id="uName">
		<input type="submit" value="Upload Image" name="submit">
	</form>

	<h1>Or view others</h1>
    <a href="index.php?uname=roulette">roulette</a> <hr>

<?php
    $dirs = glob('uploads/*' , GLOB_ONLYDIR); 
	foreach ($dirs as $dir) {
		$dirname = explode('/', $dir)[1];
        if ($dirname === 'roulette') continue;
        $ct = count(array_diff(scandir($dir), array('.', '..')));
        if ($ct === 0) continue;
        echo '<a href="index.php?uname=' . $dirname . '">' . $dirname . ' (' . $ct  . ')' .  '</a><br>';
	}
} else {

?>
	<a href="index.php">Back</a>
	<div id="gallery">
<?php
		$dir = 'uploads/' . $_GET['uname'];
		$pix = array_diff(scandir($dir), array('.', '..'));
        
        if ($_GET['uname'] == 'roulette') {
            $today = date("Ymd");
            srand($today);
            $index = array_keys($pix)[rand() % count($pix)];
            echo '<div class="imghold roulette"><img src="' . $dir . '/' .  $pix[$index] . '"></div>';
        } else {
		    foreach ($pix as $pic) {
                echo '<div class="imghold"><img src="' . $dir . '/' .  $pic . '"></div>';
            }
        }
?>

	</div>
	
<?php
}
?>
</body>

</html>
