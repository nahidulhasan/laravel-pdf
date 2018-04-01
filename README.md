## Install wkhtmltopdf on Ubuntu

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

## Using

Now you can create a pdf file in following way :
     
     use NahidulHasan\Html2pdf\Html2pdfService;
     Html2pdfService::generatePdf('<h1>Test</h1>');
