<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Status extends CI_Controller
{

	/**
	 * [index Index Page for this controller.]
	 *
	 * @param   [array]  $dados  [$dados com seus indices de message e status]
	 *
	 * @return  [array]         [return json]
	 */
	public function index()
	{
		
		$dados = [
			'message' => 'Data ' . date('d-m-Y H:i:s'),
			'status' => 'API ativa e operante!'
		];
		echo json_output(200, $dados);
	}

	/**
	 * [error description]
	 *
	 * @param   [type]  $dados  [$dados description]
	 *
	 * @return  []              [return description]
	 */
	public function error()
	{
		$dados = [
			'codigo' => '9999',
			'mensagem' => 'Erro Inesperado'
		];
		echo json_output(500, $dados);
	}

	public function unauthorized()
	{
		$dados = [
			'codigo' => '9991',
			'mensagem' => 'Não autorizado, token inválido'
		];
		echo json_output(498, $dados);
	}

	public function not_found()
	{
		$dados = [
			'codigo' => '0201',
			'mensagem' => 'Dados não encontrados, Cliente não cadastrado!'
		];
		echo json_output(400, $dados);
	}
}
