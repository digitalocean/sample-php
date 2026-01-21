<?php
require __DIR__ . '/vendor/autoload.php';

use Cowsayphp\Farm;

header('Content-Type: text/plain');

$text = "This is a cow";
if(isset($_GET['message']) && $_GET['message'] != '') {
	$text = htmlspecialchars($_GET['message']);
}

$cow = Farm::create(\Cowsayphp\Farm\Cow::class);
echo $cow->say($text);
