##About ImageDefender

---

ImageDefender is a PHP library for protecting images against copying.
It allows to overaly an image (stamp) or text to your picture, to prevent unlicensed copying of your content.

## Installation

### Composer

Execute the following command to get the latest version of the package:

```terminal
composer require vyalov.alexander/imagedefender
```
## Methods

### VyalovAlexander\ImageDefender\ImageDefenderInterface

- imposeStamp(string $pathToImage, string $savePath, string $pathToStamp, int $stampMarginRight, int $stampMarginBottom, int $stampTransparency, int $stampHeight = null, int $stampWidth = null)
- imposeText(string $pathToImage, string $savePath, string $text, int $textXPosition, int $textYPosition, int $textTransparency, int $fontSize, string $pathToTTFFont = null)

## Usage

##GD realisation of ImageDefenderInterface

Class VyalovAlexander\ImageDefender\Gd\GDImageDefender implements ImageDefenderInterface

###Stamp
```php
    $imageDefender = new \VyalovAlexander\ImageDefender\Gd\GDImageDefender();
    $imageDefender->imposeStamp("path/to/picture/you/want/to/protect", "/save/path/of/resulting/picture", "/path/to/stamp/image", 20, 20 ,50);
```  
![Stamp](https://image.ibb.co/cVcntz/newball1.png)
    
###Text
```php
    $imageDefender = new \VyalovAlexander\ImageDefender\Gd\GDImageDefender();
    $imageDefender->imposeText("path/to/picture/you/want/to/protect", "/save/path/of/resulting/picture", "Copyright © VyalovAlexander/ImageDefender", 280, 820,  10, 20);;
```      

![Text](https://image.ibb.co/ec3XRK/newball.png)
    


## License

The ImageDefender library is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).