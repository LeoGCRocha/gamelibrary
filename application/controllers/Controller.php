<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

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

	// PUBLIC

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
		$this->load->library('session');
		$this->load->model('JogoDAO', 'jdao');
		$v_data = [];
		$v_data['user'] = $this->session->user;
		$v_data['is_admin'] = $this->session->is_admin;
		$v_data['exhib'] = $this->jdao->fetchall();
		$this->load->view('index',$v_data);
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
			$user_data = $this->elements($user_infos, $this->input->post());
			if(isset($user_data['super'])) {
				$user_data['super'] = true;
			}

			// sha256 guy
			$this->load->helper('security');
			$user_data['senha'] = do_hash($user_data['senha'], 'sha256');

			// taca
			$this->load->model('UsuarioDAO', 'udao');
			$this->udao->insert($user_data);

			// configs email
			$config = Array(
			    'protocol' =>  'smtp',
			    'smtp_host' => 'ssl://smtp.googlemail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'webdevelopertdeveloper@gmail.com',
			    'smtp_pass' => 'webdeveloper123',
			    'mailtype'  => 'html',
					'smtp_timeout' => '4',
			    'charset'   => 'utf-8'
			);
			$this->load->library('email',$config);
			$this->email->set_newline("\r\n");
			// enviando o email
			$this->email->from('webdevelopertdeveloper@gmail.com','admin');
			$this->email->to($user_data['email']);
			$this->email->subject('Mensagem Automática: Inscrição Gamelibray');
			$this->email->message('Obrigado por ser registrar em nosso site. ');
			if ($this->email->send()){
				// entregue ;)
				redirect('controller/index');
			} else{
				echo $this->email->print_debugger();
			}
		} else {
			// o redirect eh o mesmo, mas poderia ser diferente...
			redirect('controller/index');
		}
	}

	public function do_login(){
		$this->load->helper('url');
		$this->load->library('session');
		if ($this->input->post() && (!$this->session->user && !$this->session->is_admin )){
			$this->load->library('form_validation');
			$user_info = $this->input->post();
			// validação formulario
			$this->form_validation->set_rules('email', 'Email', 'required|trim|max_length[100]|valid_email');
			$this->form_validation->set_rules('senha', 'Senha', 'required');
			// carregando usuarios
			$this->load->model('UsuarioDAO', 'udao');
			$data = $this->udao->fetchall();
			/* Verifica senha digita e verifica se é um ADM ou USUARIO  */
			foreach ($data as $userAt) {
				if ($userAt['email'] == $user_info['email']){
					$this->load->helper('security');
					$user_info['pass'] = do_hash($user_info['pass'], 'sha256');
					if ($user_info['pass'] == $userAt['senha']){
						if ($userAt['super']) $this->session->is_admin = $userAt;
						else $this->session->user = $userAt;
					}
				}
			}
			redirect('controller/index');
		}else{
			redirect('controller/index');
		}
	}

	public function logout(){
		$this->load->helper('url');
		$this->load->library('session');
		// desloga, se estivar logado ;)
		if($this->session->user) $this->session->unset_userdata('user');
		elseif ($this->session->is_admin){
			$this->session->unset_userdata('is_admin');
		}
		redirect('controller/index');
	}

	public function admin(){
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('JogoDAO', 'jdao');
		$this->load->model('UsuarioDAO', 'udao');
		$aux['exhib'] = [];
		$aux['exhib2'] = $this->udao->fetchall();
		$aux['admin'] = $this->session->is_admin;
		if($this->session->is_admin )	$this->load->view('admin',$aux);
		else redirect('controller/index');
	}

	public function salvar(){
		$this->load->library('session');
		$this->load->helper('url');
		if ($this->input->post() && $this->session->is_admin){
			$this->load->library("form_validation");
			$this->form_validation->set_rules('nome', 'Nome', 'required|trim|max_length[500]');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|max_length[100]|valid_email');
			$this->form_validation->set_rules('senha', 'Senha', 'required');
			$this->form_validation->set_rules('sexo', 'Sexo', 'required|in_list[masculino,feminino]');
			$this->form_validation->set_rules('telefone', 'Telefone', 'required|trim|max_length[13]|numeric');

			$this->load->model('UsuarioDAO', 'udao');
			$user_data = $this->input->post();
			$this->udao->update($user_data);
		}
		redirect('controller/logout');
	}
	public function deletarUsuario($userId){
		$this->load->helper('url');
		$this->load->model('UsuarioDAO', 'udao');
		$this->udao->delete($userId);
		redirect('controller/index');
	}
	public function editar_usuario(){
		$this->load->helper('url');
		$this->load->library('session');
		if ($this->input->post() && $this->session->is_admin){
			$this->load->library("form_validation");
			$this->form_validation->set_rules('nome', 'Nome', 'required|trim|max_length[500]');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|max_length[100]|valid_email');
			$this->form_validation->set_rules('sexo', 'Sexo', 'required|in_list[masculino,feminino]');
			$this->form_validation->set_rules('telefone', 'Telefone', 'required|trim|max_length[13]|numeric');

			$this->load->model('UsuarioDAO', 'udao');
			$user_data = $this->input->post();
			$this->udao->update($user_data);
		}
		redirect('controller/index');
	}
}
