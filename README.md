## Install wkhtmltopdf

This was tested on:

- Ubuntu 14.04 x64
- Ubuntu 16.04 x64

#### Installation

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

If laravel version is less than 5.5 , add the ServiceProvider to the providers array in config/app.php

    NahidulHasan\Html2pdf\Html2pdfServiceProvider::class,

You can optionally use the facade for shorter code. Add this to your facades:

    'Pdf'  => NahidulHasan\Html2pdf\Facades\Pdf::class,

## Basic Usage

To create PDF add something like this to one of your controllers.

```php
use NahidulHasan\Html2pdf\Facades\Pdf;

$document = Pdf::generatePdf('<h1>Test</h1>');

```

You can also create PDF from directly calling laravel blade file . Suppose you have a mail template named greeting in view/mails folder and want to send parameter then you have to call generatePdf method as described in below

```php

$document =  Pdf::generatePdf(view('mails.greeting', ['name' => 'James', 'testVar' => 'demo']));


```

Now If you want to send mail to your client attaching pdf  then you can follow this code

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

### License

Html2PDF for Laravel is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
