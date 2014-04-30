<?php

// Map classes

mako\ClassLoader::mapClasses(array
(
	'mako\Image'             => __DIR__ . '/classes/Image.php',
	'mako\image\Adapter'     => __DIR__ . '/classes/image/Adapter.php',
	'mako\image\GD'          => __DIR__ . '/classes/image/GD.php',
	'mako\image\ImageMagick' => __DIR__ . '/classes/image/ImageMagick.php',
	'mako\image\Imagick'     => __DIR__ . '/classes/image/Imagick.php',
));