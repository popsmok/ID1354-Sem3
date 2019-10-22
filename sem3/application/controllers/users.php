<?php
class users extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	public function signup() //skapar ny användare
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password','password','required');

		if ($this->form_validation->run() === FALSE) //om validation inte går igenom
		{
			echo "form validation == false";
			//va innan this load views...
		}
		else
		{
			$this->user_model->create_user();
			//skapa användaren i modellen
			$this->load->view('templates/header', $data);
            $this->load->view('templates/nav', $data);
            $this->load->view('news/success', $data);
            //tillfällig success page, länka till "föregående" sida sen.
            $this->load->view('templates/footer', $data);
            //laddar en view!
		}
	}
	
}
?>