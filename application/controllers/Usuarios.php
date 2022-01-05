<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	// método construtor
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Usuarios_model', 'Model');
	}

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
		echo json_output('200', $dados);
	}
	
	/**
	 * [getUsers description]
	 *
	 * @return  [type]  [return description]
	 */
	public function getUsers()
	{
		http_response_code(200);
		$dados = [
			'message' => 'Usuarios',
			'status' => '1'
		];
		echo json_output('200', $dados);
	}
	
	/**
	 * [getName description]
	 *
	 * @return  [type]  [return description]
	 */
	public function getName($id = null)
	{	
		$fields = "id, nome, email";
		if($id){
			$response = $this->Model->getById(["id" => $id], $fields);
		}else{
			$response = $this->Model->getAll([], $fields);
		}
		echo json_output('200', $response);
	}

	public function postUser()
	{
		$dados = json_decode(file_get_contents('php://input'), true);

		// print_r($dadosArray);
		// exit;
		$response = $this->Model->insert($dados	);
		$httpStatus = $response['status'] ? '200' : '400';
		echo json_output($httpStatus, $response);
	}
}
