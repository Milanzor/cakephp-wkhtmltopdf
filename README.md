[![Packagist](https://img.shields.io/packagist/v/milanzor/cakephp-wkhtmltopdf.svg)](https://packagist.org/packages/milanzor/cakephp-wkhtmltopdf)
![license](https://img.shields.io/github/license/milanzor/cakephp-wkhtmltopdf.svg)

# WkHtmlToPdf in CakePHP 2

Provides a View and a Component for generating PDF's through view's in Cake 2. Uses WkHtmlToPdf.

Currently only supports WkHtmlToPdf AMD64!


### How to use

- `composer require milanzor/cakephp-wkhtmltopdf`
- Load the plugin in Cake
- Enable parsing of extension `pdf` in your routes: `Router::parseExtensions('pdf');`
- Enable the RequestHandler to handle `.pdf` requests using the following snippet in your `(App)Controller`:

```php
  public $components = [
         'RequestHandler' => [
             'viewClassMap' => [
                 'pdf' => 'CakephpWkhtmltopdf.Pdf',
             ],
         ],
     ];
 ```
 
 
Now when you call a page, e.g. http://yoursite.local/invoices/view.pdf, the RequestHandler will offhand the request to this plugin's PdfView.
Resulting in your view + layout files to be rendering into a PDF.

### Available options

In your Controller methods, you can set the following viewVars:


- To force a file download: `$this->set('_download', 'filename-without-.pdf-extension');`        
- To stream the pdf to the browser: `$this->set('_stream', true);`        
- Save the file: `$this->set('_save', '/full/path/to/file.pdf');`        
- Additional WkHtmlToPdf options can be passed to the WkHtmlToPdf PHP instance using: `$this->set('WkHtmlToPdf_options', []);`
 For these options, see https://github.com/mikehaertl/phpwkhtmltopdf



### Questions?
Feel free to make an issue or PR!
