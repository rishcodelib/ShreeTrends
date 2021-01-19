<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

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



	public function login()
	{
		// $this->form_validation->set_rules('login', 'login', 'required');
		// $this->form_validation->set_rules('password', 'password', 'required');
		$submit = $this->input->post('login');
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');

		if (isset($submit)) {
			$result = $this->Model->login($data);
			$this->session->set_userdata('user', $result);
			$this->session->set_flashdata("Success", "Login Successful");

			$type = $result->type;

			switch ($type) {
				case "Vendor":
					// $this->session->set_userdata($result);
					$this->session->set_userdata('user', $result);
					// $this->Model->GenerateBill();
					redirect('/User/market');
				case "Admin":
					$this->session->set_userdata('user', $result);
					// $this->Model->GenerateBill();
					redirect('/User/Home');
					break;
				default:
					redirect("/");
					break;
			}
		} else {
			$this->session->set_flashdata("InvalidAccess", "Invalid Access ");
			redirect("/");
		}
	}


	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->sess_destroy();
		redirect("/");
	}

}
