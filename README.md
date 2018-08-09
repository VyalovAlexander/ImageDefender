
# About ImageDefender

---

ImageDefender is a PHP library for protecting images against copying.
It allows to overaly an image (stamp) or text (sign) to your picture, to prevent unlicensed copying of your content.

## Installation

### Composer

Execute the following command to get the latest version of the package:

```terminal
composer require vyalov.alexander/imagedefender
```
Check you php.ini you must see, something like this:

GD Support            enabled  
GD Version            bundled (2.0.28 compatible)  

## Usage

## GD realisation of ImageDefenderInterface

```php

$factory = new \VyalovAlexander\ImageDefender\GD\GDImageDefenderFactory();

//Objects are ready to work
$signDefender = $factory->getSignImageDefender();
$stampDefender = $factory->getStampImageDefender();

```

### Stamp
```php

//you can configure your "stamp defender"
$stampDefender->setStamp('path/to/stmap/image.png')
    ->setStampHeight($height)
    ->setStampWidth($width)
    ->setStampMarginRight($marginRight)
    ->setStampMarginBottom($marginBottom)
    ->setStampTransparency($transparency);

$stampDefender->impose('path/to/picture/you/want/to/protect.png', "/save/path/of/resulting/picture.png");
```  
![Stamp](https://preview.ibb.co/gfYMLe/stamp.png)
    
### Sign
```php

//you can configure your "sign defender"
$signDefender->setFont('path/to/your/TTF/font.ttf')
        ->setSign($textYouWantToImpose)
        ->setSignAngle($textAngle)
        ->setSignColor($red, $green, $blue)
        ->setSignFontSize($fontSize)
        ->setSignMarginBottom($marginRight)
        ->setSignMarginRight($marginRight)
        ->setSignTransparency($textTransparency);

$signDefender->impose('path/to/picture/you/want/to/protect.png', "/save/path/of/resulting/picture.png");
```      
![Text](https://preview.ibb.co/d5ENRK/text.png)
    

## License

The ImageDefender library is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).