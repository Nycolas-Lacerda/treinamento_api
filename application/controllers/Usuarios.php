<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	// METODO CONSTRUTOR
	public function __construct()
    {
        parent::__construct();

        $this->load->model('Usuarios_model', 'Model');
        // $this->load->model('Clientes_model', 'ClientesModel');
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
		echo json_encode($dados);
	}

	/**
	 * [getUsers description]
	 *
	 * @return  [type]  [return description]
	 */
	public function getUsers($id = null)
	{
		if ($id) {
			$response = $this->Model->getById(['id' => $id]);
		} else {
			$response = $this->Model->getAll();
		}
		echo json_output("200", $response);
	}

	/**
	 * [getName description]
	 *
	 * @return  [type]  [return description]
	 */
	public function getName($id = null)
	{
		$fields = 'id, nome';
		if ($id) {
			$response = $this->Model->getById(['id' => $id], $fields);
		} else {
			$response = $this->Model->getAll([], $fields);
		}
		echo json_output("200", $response);
	}

	/**
	 * [postUsers description]
	 *
	 * @return  [type]  [return description]
	 */
	public function postUsers()
	{
		$body = json_decode(file_get_contents("php://input"),1);
		
		$response = $this->Model->insert($body);
		echo json_output("200", $response);
	}
	
	
}
