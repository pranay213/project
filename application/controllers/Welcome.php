<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['date']=date("Y-m-d");
		$this->load->model('Result');
		$res=$this->Result->insert_data($data['date']);
		
		$data['msg']=$this->Result->get_data();
		
		$this->load->view('user/index',$data);
	}
	public function update_db()
	{
		if($this->input->post('text')=='srirama')
		{
			$this->load->model('Result');
			echo $this->Result->update_count();
		}
	}
	public function update_content()
	{
		$data['date']=date("Y-m-d");
		$this->load->model('Result');
		$res=$this->Result->insert_data($data['date']);
		
		$data['msg']=$this->Result->get_data();
		$this->load->view('user/update-content',$data);
	}
}
?>
