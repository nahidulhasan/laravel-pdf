<?php

namespace NahidulHasan\Html2pdf;

/**
 * Laravel htm2pdf: convert html into pdf
 *
 * @package laravel-html2pdf
 * @author Nahidul Hasan <nahidul.cse@gmail.com>
 */
class Pdf
{

    /**
     * Convert html into pdf
     *
     * @param $input
     * @return bool|string
     */
    public function generatePdf($input)
    {
        $key = time() . '-' . rand(10000, 99999);

        $htmlFile = '../storage/page-' . $key . '.html';
        $pdfFile = '../storage/page-' . $key . '.pdf';


        file_put_contents($htmlFile, $input);

        if (shell_exec("xvfb-run wkhtmltopdf {$htmlFile} {$pdfFile}")) {

            return file_get_contents($pdfFile);

        } elseif (shell_exec("wkhtmltopdf {$htmlFile} {$pdfFile}")) {

            return file_get_contents($pdfFile);

        }

       // shell_exec("rm {$htmlFile}");
       // shell_exec("rm {$pdfFile}");

    }


    /**
     * Make the PDF downloadable by the user
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download()
    {
        $file = public_path(). "/page.pdf";

        if (!is_file($file)) {
            echo("404 File not found!");
            exit();
        }

        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' =>  'attachment; filename="'.'filename.pdf'.'"',
        ];

        return response()->download($file, 'filename.pdf', $headers);
    }


    /**
     * Open PDF in the browser
     */
    public function stream()
    {
        $file = public_path(). "/page.pdf";

        if (!is_file($file)) {
            echo("404 File not found!");
            exit();
        }

        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . 'filename.pdf' . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        echo file_get_contents($file);

    }
}
