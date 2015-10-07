<?php namespace Classes\Helpers;

use DOMPDF as Dom;

class Pdf{
	
	protected static $configured = false;

	public static function configure()
	{
		if(static::$configured) return;

		// disable DOMPDF's internal autoloader if you are using Composer
		define('DOMPDF_ENABLE_AUTOLOAD', false);

		// include DOMPDF's default configuration
		require_once '../vendor/dompdf/dompdf/dompdf_config.inc.php';

		static::$configured = true;
	}

	public static function render($file, $html)
	{	
		static::configure();

		$dompdf = new Dom();
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream("$file.pdf");
	}
}