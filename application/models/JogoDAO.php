<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JogoDAO extends CI_Model {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function insert($dados=NULL) {

        if($dados) {
            $this->db->insert('jogo', $dados);
        }

    }

    public function fetchall($sort='id', $order='asc') {

        $this->db->order_by($sort, $order);
        $query = $this->db->get('jogo');

        if($query->num_rows() > 0) {
            return $query->result_array();
        }

        return null;

    }

    public function get($id) {

        $query = $this->db->get_where('jogo', ['id'=>$id]);

        if($query->num_rows() > 0) {
            return $query->result_array()[0];
        }
        return null;

    }

    public function update($dados = null) {

        if($dados != null) {
            $this->db->where('id', $dados['id']);
            $this->db->update('jogo', $dados);
        }

    }

    public function delete($id) {

        if($id) {
            $this->db->delete('jogo', ['id'=>$id]);
        }

    }

}
