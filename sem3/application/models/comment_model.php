<?php
class comment_model extends CI_model 
{
	public function __construct() //construct: skapar databasanslutningen
		{
			$this->load->database();
		}

	public function create_comment() //skapar en nu kommentar
		{
			$data = array(
				'comment' => $this->input->post('comment'),
				'user' => $this->session->userdata('user'),
				'page' => $this->input->post('page')
				);
			return $this->db->insert('comment', $data);
		}
	Public function delete_comment()
		{
			$this->db->delete('comment', array(
				'timestamp' => $this->input->post('timestamp')));
		}
	public function read_comment($page)
		{
			$query = $this->db->get_where('comment', array('page' => $page));
			//hämta alla kommentarer med rätt "page"
			//$query = $this->db->get_where('comment',array('page' => $title));
			$data['kommentar'] = $query->result_array();
            return $data;
		}
}