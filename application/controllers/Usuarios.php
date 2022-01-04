<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	/**
	 * [index Index Page for this controller.]
	 *
	 * @param   [array]  $dados  [$dados com seus indices de message e status]
	 *
	 * @return  [array]         [return json]
	 */
	public function index()
	{
		http_response_code(200);
		$dados = [
			'message' => 'Usuarios',
			'status' => '1'
		];
		echo json_encode($dados);
	}

	public function getUsers()
	{
		
	}
}
