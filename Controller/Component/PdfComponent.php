<?php

App::uses('PdfView', 'CakephpWkhtmltopdf.View');

/**
 * Class PdfComponent
 *
 * @property Controller $Controller
 */
class PdfComponent extends Component {

    public function __construct(ComponentCollection $collection, $settings = []) {
        $settings = array_merge($this->settings, (array) $settings);

        # Load Controller
        $this->Controller = $collection->getController();
        parent::__construct($collection, $settings);
    }


    public function generate($file_path, $WkHtmlToPdf_options = []) {
        $view = new PdfView($this->Controller, false);

        $view->set('WkHtmlToPdf_options', $WkHtmlToPdf_options);
        $view->set('_save', $file_path);

        return $view->render($this->Controller->view, $this->Controller->layout, false);
    }
}
