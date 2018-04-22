# Laravel-Html2Pdf


[![Latest Stable Version](https://poser.pugx.org/nahidulhasan/html2pdf/v/stable)](https://packagist.org/packages/nahidulhasan/html2pdf)
[![Total Downloads](https://poser.pugx.org/nahidulhasan/html2pdf/downloads)](https://packagist.org/packages/nahidulhasan/html2pdf)
[![Latest Unstable Version](https://poser.pugx.org/nahidulhasan/html2pdf/v/unstable)](https://packagist.org/packages/nahidulhasan/html2pdf)
[![License](https://poser.pugx.org/nahidulhasan/html2pdf/license)](https://packagist.org/packages/nahidulhasan/html2pdf)



> A Simple package for easily generating PDF documents from HTML.This package is specially for laravel but you can use this without laravel.


## Installation

#### Install wkhtmltopdf 

This was tested on:

- Ubuntu 14.04 x64
- Ubuntu 16.04 x64

```sh
sudo apt-get update
sudo apt-get install xvfb libfontconfig wkhtmltopdf
```

#### For docker 
```
RUN apt-get update && apt-get install xvfb libfontconfig wkhtmltopdf
```

#### Upddate Composer
```
composer require nahidulhasan/html2pdf
```

If laravel version < 5.5, add the ServiceProvider to the providers array in config/app.php

    NahidulHasan\Html2pdf\Html2pdfServiceProvider::class,

You can optionally use the facade for shorter code. Add this to your facades:

    'Pdf'  => NahidulHasan\Html2pdf\Facades\Pdf::class,

## Basic Usage

To create PDF add something like this to one of your controllers.

```php
use NahidulHasan\Html2pdf\Facades\Pdf;

$document = Pdf::generatePdf('<h1>Test</h1>');

```

You can also create PDF from directly calling laravel blade file. Suppose you have a mail template named greeting in view/mails folder and want to send parameter then you have to call generatePdf method as described in below

```php

<!-- mail template stored in resources/views/mails/greeting.blade.php -->

$document =  Pdf::generatePdf(view('mails.greeting', ['name' => 'James', 'testVar' => 'demo']));


```

Now If you want to send mail to your client attaching pdf then you can follow this code

```php
/**
 * Build the message.
 *
 * @return $this
 */
public function build()
{
    return $this->from('username@gmail.com')
                ->view('mails.demo')
                ->attachData($document, 'Invoice.pdf');
}
  
```

### Other Usage 

It is also possible to use the following methods :

``` pdf::download ``` Download the PDF file

``` pdf::stream  ```  Open the PDF file in browser 

 
### Running without Laravel

You can use this library without using Laravel.

Example:

```
use NahidulHasan\Html2pdf\Pdf;

$obj = new Pdf();
$document = $obj->generatePdf('<h1>Test</h1>');
```

### License

Html2PDF for Laravel is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
