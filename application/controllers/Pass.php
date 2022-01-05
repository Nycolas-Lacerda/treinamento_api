<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pass extends CI_Controller
{
    private $_base = 'pass/';
 
    //CONSTRUTOR
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * [index - pagina inicial do controller]
     *
     * @param   [int]       $id     [$id - passando parametro para identificação do registro]
     *
     * @return  [view]              [return página chamada]
     */
     public function index($id = null)
    {
        $dados = [];
        if ($id) { 
            $dados['name'] = geraCripto($this->input->post('name'));
        } 
        
        $this->load->view($this->_base . 'index', $dados);
    }
}
