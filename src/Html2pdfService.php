<?php

namespace NahidulHasan\Html2pdf;


/**
 * Laravel htm2pdf: convert html into pdf
 *
 * @package laravel-html2pdf
 * @author Nahidul Hasan <nahidul.cse@gmail.com>
 */
class Html2pdfService
{

    /**
     * Convert html into pdf
     *
     * @param $input
     * @return bool|string
     */
    public static function generatePdf($input)
    {
        file_put_contents('page.html', $input);

        shell_exec('xvfb-run wkhtmltopdf page.html page.pdf');

        return file_get_contents('page.pdf');

    }

}
