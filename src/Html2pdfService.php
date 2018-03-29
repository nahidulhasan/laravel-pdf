<?php

namespace NahidulHasan\Html2pdf;


class Html2pdfService
{
    public static function generatePdf($input)
    {
        file_put_contents('page.html', $input);

        shell_exec('xvfb-run wkhtmltopdf page.html page.pdf');

        return file_get_contents('page.pdf');

    }

}
