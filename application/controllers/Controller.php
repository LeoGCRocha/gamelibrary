<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/controller
	 *	- or -
	 * 		http://example.com/index.php/controller/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/controller/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()	{
		$this->load->view('index');
	}

	// Rota post pra efetuar o cadastro
	public function do_cadastro() {

		$this->load->library('session');
		$this->load->helper('url');

		// fazer alguma coisa somente quando rota vier por post e se ou não houver ninguém logado
		// ou caso quem esteja logado seja adm
		if($this->input->post() && (!$this->session->user || $this->session->is_adm)) {

			// validação guy
			$this->load->library('form_validation');

			$this->form_validation->set_rules('nome', 'Nome', 'required|trim|max_length[500]');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|max_length[100]|valid_email');
			$this->form_validation->set_rules('senha', 'Senha', 'required');
			$this->form_validation->set_rules('sexo', 'Sexo', 'required|in_list[masculino,feminino]');
			$this->form_validation->set_rules('telefone', 'Telefone', 'required|trim|max_length[13]|numeric');

			// pra uso no elements()
			$user_infos = ['nome', 'email', 'senha', 'sexo', 'telefone'];

			// se um adm estiver logado, é possível que ele cadastre um novo adm. nesse caso, considerar
			// o possível campo 'super' (suposto que seja uma checkbox ou switch (materialize))
			if(isset($this->session->is_adm)) {
				$user_infos []= 'super';
			}

			// se houver um valor pra super, bota logo true
			$user_data = elements($user_infos, $this->input->post());
			if($user_data['super']) {
				$user_data['super'] = true;
			}

			// sha256 guy
			$this->load->helper('security');
			$user_data['senha'] = do_hash($user_data['senha'], 'sha256');

			// taca
			$this->UsuarioDAO->insert($dados);

			// entregue ;)
			redirect('controller/login');

		} else {

			// no no
			redirect('controller/index');

		}

	}

	// PRIVATE

	/** Recebe um array de strings $what e um array associativo $who;
	 *  Retorna um array associativo semelhante a $who, mas somente com os valores cujas
	 *  keys existam em $what.
	 *  Exemplo: elements([ "um", "tres" ], [ "um"=>1, "dois"=>2, "tres"=>3 ])
	 *           retornaria: [ "um"=>1, "tres"=>3 ]
	**/
	private function elements($what, $who){
		$new = [];
		foreach($who as $key=>$val){
			if(in_array($key, $what)){
				$new[$key] = $val;
			}
		}
		return $new;
	}

}
