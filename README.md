## Install wkhtmltopdf on Ubuntu

This was tested on:

- Ubuntu 14.04 x64
- Ubuntu 16.04 x64

#### Installation

```sh
sudo apt-get update
sudo apt-get install xvfb libfontconfig wkhtmltopdf

#### Upddate Composer

composer require nahidulhasan/html2pdf

## Using

You can create a new DOMPDF instance and load a HTML string, file or view name. You can save it to a file, or stream (show in browser) or download.
     
     use NahidulHasan\Html2pdf\Html2pdfService;
     Html2pdfService::generatePdf('<h1>Test</h1>');
   
   
