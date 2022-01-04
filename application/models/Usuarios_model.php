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
}
