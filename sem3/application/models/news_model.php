<?php
	//placeholder??!?! för något
class news_model extends CI_model {
	public function __construct()
		{
		$this->load->database(); //laddar och sätter upp connection till databasen.
	}
	public function get_news($slug = FALSE) { //$slug får värdet FALSE om den är tom
	        if ($slug === FALSE) // om $slug är FALSE, kör if-satsen
	        {
	                $query = $this->db->get('news');
	                return $query->result_array();
	                // Select * from news. and Return.
	        }

	        $query = $this->db->get_where('news', array('slug' => $slug)); //Select * slug i news där värdet i $slug.
	        return $query->row_array(); //return alla dem.
	}
	public function set_news(){
	    $this->load->helper('url');

	    $slug = url_title($this->input->post('title'), 'dash', TRUE);

	    $data = array(
	        'title' => $this->input->post('title'),
	        'slug' => $slug,
	        'text' => $this->input->post('text')
	    );

   	 return $this->db->insert('news', $data);
	}
}

/*
public function get_user($username != pajas){
	if ($username !== pajas){
		$query = $this->db->get('user');
		return $query->result_array();
	}
	$query = $this->db->get_where('user',array('username' => $username));
	return $query->row_array();
}
*/