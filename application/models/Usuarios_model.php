<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of Usuario_model
 */
class Usuarios_model extends CI_Model
{
    private $table = 'usuarios';

    /**
     * [Método para retornar todos os dados]
     *
     * @param   [array]     $filtro     [$filtro Validações do where]
     * @param   [array]     $fields     [$fields Campos do banco a serem pesquisados pelo select]
     * @param   [number]    $limit      [$limit Limite inicial de quantos registros vão retornar]
     * @param   [number]    $offset     [$offset Limite final de quantos registros vão retornar]
     *
     * @return  [array]                 [return dados da tabela]
     */
    public function getAll($filtro = [], $fields = '*', $limit = 12, $offset = 0)
    {
        $this->db->select($fields)
            ->from($this->table)
            ->where($filtro);
        if ($limit != 0 || $offset != 0) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get()->result();
    }

    /**
     * [Método para retornar o dado por id]
     *
     * @param   [array]     $filtro     [$filtro Validações do where]
     * @param   [array]     $fields     [$fields Campos do banco a serem pesquisados pelo select]
     *
     * @return  [array]                 [return dados da tabela]
     */
    public function getById($filtro = [], $fields = '*')
    {
        $this->db->select($fields)
            ->from($this->table)
            ->where($filtro)
            ->limit(1);
        $r = $this->db->get()->result_array();
        if ($r) {
            return $r[0];
        } else {
            return [];
        }
    }

    /**
     * Método para inserir
     */
    function insert($dados)
    {
        if (!isset($dados)) {
            $response['status']  = false;
            $response['message'] = "Dados não informados.";
            $response['tipo'] = "danger";
        } else {
            $this->form_validation->set_data($dados);
            $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|min_length[3]|trim');

            if ($this->form_validation->run() === false) {
                $response['status']  = false;
                $response['message'] = validation_errors();
            } else {
                $status         = $this->db->insert($this->table, $dados);
                if ($status) {
                    $id = $this->db->insert_id();
                    $response['registro'] = [];
                    $response['status']   = true;
                    $response['message']  = "Usuário inserido com sucesso.";
                    $response['tipo'] = "success";
                } else {
                    $response['status']  = false;
                    $response['message'] = $this->db->error_message();
                    $response['tipo'] = "danger";
                }
            }
        }
        return $response;
    }

    /**
     * Método para o atualizar
     */
    public function update($filtro, $dados)
    {
        if (!isset($dados)) {
            $response['status']  = false;
            $response['message'] = "Dados não informados.";
            $response['tipo'] = "danger";
        } else {
            $this->db->where($filtro);
            $status = $this->db->update($this->table, $dados);
            if ($status) {
                $response['registro'] = $filtro['id'];
                $response['status']   = true;
                $response['message']  = "Usuário atualizado com sucesso.";
                $response['tipo'] = "success";
            } else {
                $response['status']  = false;
                $response['message'] = $this->db->error_message();
                $response['tipo'] = "danger";
            }
        }
        return $response;
    }

    /**
     * Método para excluir
     */
    function delete($field, $value)
    {
        if (is_null($field) || is_null($value)) {
            $response['status']  = false;
            $response['message'] = "Dados não informados.";
            $response['tipo'] = "danger";
        } else {
            $filtro = [
                $field => $value
            ];
            $this->db->where($filtro);
            $status = $this->db->delete($this->table);

            if ($status) {
                $response['status']  = true;
                $response['message'] = "Usuário removido com sucesso.";
                $response['tipo'] = "success";
            } else {
                $response['status']  = false;
                $response['message'] = $this->db->error_message();
                $response['tipo'] = "danger";
            }
        }
        return $response;
    }
}
