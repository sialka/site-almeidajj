<?php
/**
 * Controller: HomeController.php
 *
 */

namespace app\controllers\site;

use app\controllers\Controller;
use app\classes\Load;

class HomeController extends Controller {

	public function index() {
		
		$images_carrousel = Load::file('/app/data/home-image.php')['image'];	

		$units = $this->url('/app/data/subsidiary.php','unidade','url');		

		$masters = $this->url('/app/data/master.php','nome', 'url');		
		
		$athletes = $this->url('/app/data/athlete.php','nome', 'url');

		$this->view('site.1-home', [
			'title' => 'Jiu Jitsu Almeida',
			'images' => $images_carrousel,
			'mestres' => $masters,
			'athletes' => $athletes,
			'units' => $units,	
			'css_file' => [
				'all.css',
				'text-effect.css',
				'partials-home-header.css',
				'partials-home-services.css'
			]								
		]);
	}

	public function destroy() {

		$units_name = $this->unit_name('/app/data/subsidiary.php');

		$units_url = $this->unit_url('/app/data/subsidiary.php');

		$this->view('site.404', [
			'title' => 'Jiu Jitsu Almeida',
			'units_name' => $units_name,
			'units_url' => $units_url,

		]);
	}

}