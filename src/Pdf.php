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

        $htmlFile = storage_path() . '/page-' . $key . '.html';
        $pdfFile = storage_path() . '/page-' . $key . '.pdf';

        file_put_contents($htmlFile, $input);

        $generatedFile = $this->executeCommand($htmlFile, $pdfFile);

        $file = $generatedFile ? : '';

        return $this->removeAndReturnFile($htmlFile, $pdfFile, $file);

    }


    /**
     * Make the PDF downloadable by the user
     *
     * @param $input
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */

    public function download($input)
    {
        $file = $this->generatePdf($input);

        return $file;


    }


    /**
     * Open PDF in the browser
     * @param $input
     */
    public function stream($input)
    {
        $file = $this->generatePdf($input);

        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . 'filename.pdf' . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        echo $file;

    }

    /**
     * Removed generated file and return
     *
     * @param $htmlFile
     * @param $pdfFile
     * @param $file
     * @return mixed
     */
    public function removeAndReturnFile($htmlFile, $pdfFile, $file)
    {
        shell_exec("rm {$htmlFile}");
        shell_exec("rm {$pdfFile}");

        return $file;
    }

    /**
     * @param $htmlFile
     * @param $pdfFile
     * @return bool|string
     */
    public function executeCommand($htmlFile, $pdfFile)
    {
        if (shell_exec("xvfb-run wkhtmltopdf {$htmlFile} {$pdfFile}")) {
            $generatedFile = file_get_contents($pdfFile);
        } elseif (shell_exec("wkhtmltopdf {$htmlFile} {$pdfFile}")) {
            $generatedFile = file_get_contents($pdfFile);
        } else {
            $generatedFile = '';
        }
        return $generatedFile;
    }
}
