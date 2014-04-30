#Image manipulation

##Description

The image package allows you to perform simple image manipulation using either GD, Imagick or ImageMagick (CLI).

**Please note**: this is not the original repository. The original project was deleted and, as our application depended on this package, I created a mirror.

##Methods

###factory(string $file [, string $library = 'GD'])

Creating an image object is done by using the factory method. The first parameter is the path to the image you want to edit and the optional second parameter specifies the image library you want to use ('GD', 'Imagick' or 'ImageMagick').

    $image = Image::factory('original.png'); // No need to specify the image library if you want to use 'gd'

###rotate(int $degrees)

You can rotate images using the rotate method.

    $image->rotate(90); // Rotates the image 90 degrees

###resize(int $width [, int $height = null [, int $aspectRatio]])

Resizing is done using the resize method.

    // Resizes the image to 50% of the original size
     
    $image->resize(50);
     
    // Resizes the image to a dimension of 300x300 pixels while ignoring the aspect ratio
     
    $image->resize(300, 300);
     
    // Resizes the image to a dimension of 300x300 pixels while ignoring the aspect ratio
     
    $image->resize(300, 300, Image::IGNORE);
     
    // Resizes the image to the smalles possible dimension while maintaining aspect ratio
     
    $image->resize(300, 300, Image::AUTO);
     
    // Resizes the image using the height to maintain aspect ratio
     
    $image->resize(300, 300, Image::HEIGHT);
     
    // Resizes the image using the width to maintain aspect ratio
     
    $image->resize(300, 300, Image::WIDTH);

###crop(int $width int $height int $x, int $y)

Cropping an image is done using the crop method.

    $image->crop(100, 100, 10, 60);

###flip([int $direction = null])

Flipping an image is done by using the flip method.

    $image->flip(); // Flips the image horizontally
     
    $image->flip(Image::HORIZONTAL); // Flips the image horizontally
     
    $image->flip(Image::VERTICAL); // Flips the image vertically

###watermark(string $file [, int $position = null [, int $opacity = 100]])

You can add watermarks to your images using the watermark method.

    $image->watermark('watermark.png'); // Add a watermark in the top left corner
     
    $image->watermark('watermark.png', Image::TOP_LEFT); // Add a watermark in the top left corner
     
    $image->watermark('watermark.png', Image::TOP_RIGHT); // Add a watermark in the top right corner
     
    $image->watermark('watermark.png', Image::BOTTOM_LEFT); // Add a watermark in the bottom right corner
     
    $image->watermark('watermark.png', Image::BOTTOM_RIGHT); // Add a watermark in the bottom right corner
     
    $image->watermark('watermark.png', Image::CENTER, 60); //Add a watermark in the center and set its opacity to 60%

###greyscale()

You can convert your image to greyscale using the greyscale method.

    $image->greyscale();

###colorize(string $colour)

You can colorize your image using the colorize method.

    $image->colorize('#ff0000');

###border([string $colour = '#000' [, int $thickness = 5]])

You can add a border to your image using the border method.

    $image->border(); // Will add a black 5 px border
     
    $image->border('#fff'); // Will add a white 5 px border
     
    $image->border('#ffffff', 1); // Will add a white 1px border

###save(string $file [, int $quality = 85])

Saving the edited image is done by using the save method.

    $image->save('edited.png'); // Saves the image using the default 85% quality
     
    $image->save('edited.png', 90); // Saves the image in 90% quality

##Examples

In the example below we take an image and resize it to 80% of its original size, rotate it 45 degrees, add a watermark in the bottom right corner and save it.

    $image = Image::factory('original.png');
     
    $image->resize(80);
     
    $image->rotate(45);
     
    $image->watermark('watermark.png', Image::BOTTOM_RIGHT);
     
    $image->save('edited.png');

The image class also allows method chaining.

    Image::factory('original.png')
    ->resize(80)
    ->rotate(45)
    ->watermark('watermark.png', Image::BOTTOM_RIGHT)
    ->save('edited.png');
