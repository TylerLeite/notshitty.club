
<!DOCTYPE html>
<html>
<head>
	<title>Fuck Jon</title>

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato', sans-serif;
        }
        h1 {
            text-align: center;
            font-size: 10vmin;
        }
        a:link, a:visited {
            text-decoration: none;
            color: blue;
            font-size: 5vmin;
        }
        ul {
            list-style: none;
        }
        li {
            display: inline-block;
            margin: 0 2%;            
        }
    </style>
</head>

<body>
	<h1>Fuck <?php $choices = array('new jon', 'your hand', 'off', 'your day up', 'blitman', 'the shindig', 'go', 'Jon, he needs it', 'me up good bb', 'her right in the pussy', 'spotify', 'bitchez get money', 'local singles near you', 'web', 'default web styling', 'Jon', 'RPI', 'chess', 'time', 'sanitization', 'your mom', 'da police', 'weird shit'); $ct = count($choices) - 1; echo $choices[rand(0, $ct)]; ?></h1>

    <ul>
        <?php
            $dirs = glob($somePath . './*' , GLOB_ONLYDIR);
            foreach ($dirs as $dir) {
                $dirname = str_replace('-', ' ', explode('/', $dir)[1]);
                echo '<li><a href="' . $dir . '">' . $dirname . '</a></li>'; 
            }

        ?>
    </ul>
</body>

</html>

