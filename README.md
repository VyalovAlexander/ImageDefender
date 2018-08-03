
# About ImageDefender

---

ImageDefender is a PHP library for protecting images against copying.
It allows to overaly an image (stamp) or text to your picture, to prevent unlicensed copying of your content.

## Installation

### Composer

Execute the following command to get the latest version of the package:

```terminal
composer require vyalov.alexander/imagedefender
```

## Usage

## GD realisation of ImageDefenderInterface

### Stamp
```php
    $storage = new GDImageStorage();
    
    $stampDefender = new GDStampImageDefender($storage);
    $stampDefender->imposeStamp(
        "path/to/picture/you/want/to/protect",
        "/save/path/of/resulting/picture",
        "/path/to/stamp/image",
        10, 10, 20);
```  
![Stamp](https://preview.ibb.co/gfYMLe/stamp.png)
    
### Text
```php
    $storage = new GDImageStorage();
    
    $textDefender = new GDTextImageDefender($storage);
    $textDefender->imposeText(
        "path/to/picture/you/want/to/protect",
        "/save/path/of/resulting/picture",
        "Copyright © VyalovAlexander/ImageDefender", 
        280, 820,  10, 20);
```      
![Text](https://preview.ibb.co/d5ENRK/text.png)
    


## License

The ImageDefender library is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).