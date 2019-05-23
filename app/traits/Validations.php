<?php

namespace app\traits;

// flash -> é uma função de helpers.
// error -> é uma função de helpers.

trait Validations {

	private $errors = [];

	protected function required($field) {

		// Campo vazio
		if (empty($_POST[$field])) {
			// errors[$field][] pois um campo pode ter mais de um erro.
			$this->errors[$field][] = flash($field, error('Esse campo é obrigatório'));
		}
	}

	protected function email($field) {

		// validando e-mail
		if (!filter_var($_POST[$field], FILTER_VALIDATE_EMAIL)) {
			// errors[$field][] pois um campo pode ter mais de um erro.
			$this->errors[$field][] = flash($field, error('Esse campo tem que ter um e-mail válido'));
		}
	}

	protected function phone($field) {

		// trabalhando com regex https://regex101.com/
		if (!preg_match("/[0-9]{5}\-[0-9]{4}/", $_POST[$field])) {
			// errors[$field][] pois um campo pode ter mais de um erro.
			$this->errors[$field][] = flash($field, error('Esse formato é inválido, por favor utilize XXXXX-XXXX'));
		}
	}

	protected function unique($field, $model) {

		$model = "app\\models\\" . ucfirst($model);

		$model = new $model();

		// $find = $model->find($field, $_POST[$field]);
		$find = $model->select()->where($field, $_POST[$field])->first();

		// se não encontro o registro e não está vazio.
		if ($find and !empty($_POST[$field])) {
			$this->errors[$field][] = flash($field, error('Essa informação já está cadastrada no banco de dados'));
		}
	}

	protected function max($field, $max) {
		if (strlen($_POST[$field]) > $max) {
			$this->errors[$field][] = flash($field, error("O número de caracteres não pode ser maior que {$max}"));
		}
	}

	protected function image($field) {
		// validando campo vasio.
		$file = $_FILES[$field]['name'];

		if (empty($file)) {
			$this->errors[$field][] = flash($field, error("Esse campo é obrigatório"));
		}

		// validando extensão
		$extension = pathinfo($file, PATHINFO_EXTENSION);
		if (!in_array($extension, [
			'png', 'jpg',
		])) {
			$this->errors[$field][] = flash($field, error("Não aceitamos arquivos com a extensão {$extension}"));
		}
	}

	public function hasErrors() {
		// Se $errors[] estiver vazio retorna False.
		return !empty($this->errors);
	}

	// public function errors() {
	// 	dd($this->errors);
	// }
}