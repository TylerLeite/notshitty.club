<?php

$sites = array('pornhub', 'porn', 'xhamster', 'tnaflix', 'redtube', 'xnxx', 'ixxx', 'xvideos', 'youporn', 'motherless');

$len = count($sites)-1;
$i = rand(0, $len);

header('Location:http://' . $sites[$i] . '.com');

?>
