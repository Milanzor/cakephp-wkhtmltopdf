<?php

App::uses('View', 'View');

use h4cc\WKHTMLToPDF\WKHTMLToPDF;
use mikehaertl\wkhtmlto\Pdf;

/**
 * Class PdfView
 */
class PdfView extends View {

    public $subDir = 'pdf';

    public function render($view = null, $layout = null) {

        # Render the view
        $pdfContents = parent::render($view, $layout);

        # Initialize the pdf with the rendered view
        $pdf = new Pdf($pdfContents);

        # Set the binary
        $pdf->binary = WKHTMLToPDF::PATH;

        # Set WkHtmlToPdf_options to pdf if we have them
        if (isset($this->viewVars['WkHtmlToPdf_options'])) {
            $pdf->setOptions($this->viewVars['WkHtmlToPdf_options']);
        }

        if (isset($this->viewVars['_save'])) {
            $pdf->saveAs($this->viewVars['_save']);
        } else {

            # Type
            $this->response->type('pdf');

            # Disable cache
            $this->response->disableCache();

            if (isset($this->viewVars['_download'])) {
                $pdf->send($this->viewVars['_download'] . '.pdf');
            }

            if (isset($this->viewVars['_stream'])) {
                $pdf->send();
            }
        }

        return true;
    }
}
