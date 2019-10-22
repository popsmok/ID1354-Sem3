<?php
class Comments Extends CI_controller
{
	public function __construct()
	{
	 	Parent::__construct();
	 	$this->load->model('comment_model');
	}


	public function createComment() //create a new comment
	{
		if($this->input->post('comment') == html_escape($this->input->post('comment')))
		{
		 	$this->load->library('form_validation');

		 	$this->form_validation->set_rules('comment', 'comment', 'required');
		 	if ($this->form_validation->run() === FALSE)
		 	{
		 		$this->load->view('templates/header', $data);
	            $this->load->view('templates/nav', $data);
	            $this->load->view('pages/'.$page, $data);
	            $this->load->view('pages/readComment');
	            $this->load->view('templates/footer');
		 	}
		 	else
		 	{
		 		$this->comment_model->create_comment();
		 		redirect($_SERVER['HTTP_REFERER'], 'refresh');
		 	}
		 }
		 else
		 {
		 	redirect('/'.$this->input->post('page'))
		 }
	}
	public function deleteComment()
	{
		$this->comment_model->delete_comment();
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
		
	}
}
?>