<?php
/**
 * Class: Email.php
 *
 */

namespace app\classes;

// use app\templates\Template;
use PHPMailer\PHPMailer\PHPMailer;

class Email {

	private $data;
	private $template;

	// metodo para pegar o dados de configuração do email do arquivo /config.php
	private function config() {
		return (object) Load::file('/config.php');
	}

	// Recebe os dados validados do form e devolve um objeto.
	public function data(array $data) {
		$this->data = (object) $data;

		return $this;
	}

	// $template
	public function template(Template $template) {

		if (!isset($this->data)) {
			throw new \Exception("Antes de chamar o template, passe os dados atravez do metodo data");
		}

		$this->template = $template->run($this->data);

		return $this;
	}

	// Envia o email.
	public function send() {

		//verifica se foi enviando um template
		if (!isset($this->template)) {
			throw new \Exception("Antes de enviar o email, escolha um template com o método template");
		}

		$mailer = new PHPMailer(True);

		$config = (object) $this->config()->email;

		try {
			//Server settings
			$mailer->isSMTP(); // Set mailer to use SMTP
			$mailer->Host = $config->host; // Specify main and backup SMTP servers
			$mailer->SMTPAuth = true; // Enable SMTP authentication
			$mailer->Username = $config->username; // SMTP username
			$mailer->Password = $config->password; // SMTP password
			$mailer->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
			$mailer->Port = $config->port; // TCP port to connect to
			$mailer->CharSet = "utf-8";

			//Recipients
			$mailer->setFrom($this->data->fromEmail, $this->data->fromName);
			$mailer->addAddress($this->data->toEmail, $this->data->toName); // Add a recipient

			//Content
			$mailer->isHTML(true); // Set emailer format to HTML
			$mailer->Subject = $this->data->assunto;
			$mailer->Body = $this->template;
			$mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mailer->send();
			return true;

		} catch (\Exception $e) {
			// echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			return false;
		}
	}
}

?>