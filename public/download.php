<?php
// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
//use Classes\Core\View\Template;
//use Classes\Helpers\Pdf;

require '../vendor/autoload.php';

$data = array(
	'name' => 'Juan Pablo',
	'course' => 'Curso de laravel'
);

$html = Classes\Template::render('pdf/certificate', $data);

Classes\Helpers\Pdf::render('certificate', $html);

?>

