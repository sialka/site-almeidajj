<?php
/**
 * Controller: HomeController.php
 *
 */

namespace app\controllers\site;

use app\classes\Load;
use app\controllers\Controller;

class TeacherController extends Controller {

	public function index($request, $response, $args) {

		$name = $args['name'];

		# Validação
		$validation = ['jorge', 'gustavo'];
		if (!in_array($name, $validation)) {
			redirect('/404');
		}

		$teacher = (object) Load::file('/app/data/teacher.php');

		$this->view('site.teacher', [
			'title' => 'Almeida JJ Itaquera',
			'name' => $teacher->$name['nome'],
			'about' => $teacher->$name['sobre'],
			'photo' => $teacher->$name['foto'],
			'belt' => $teacher->$name['faixa'],
			'championships' => $teacher->$name['titulos'],
		]);
	}

}