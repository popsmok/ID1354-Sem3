<?php
class pages_model extends CI_model {
	public function __construct() //construct: skapar databasanslutningen
		{
			$this->load->database();
		}
	public function get_user($user = FALSE, $password = FALSE)
	{
			if($user === FALSE)
			{ //hämtar alla users
				$query = $this->db->get('user');
				return $query->result_array();
			}
			$query = $this->db->get_where('user', array(
				'username' => $user,
				'password' => $password)); 
			//Select * FROM user WHERE username = $user AND password = $password
	     	return $query->row_array(); //return alla i en array.
	    }
	public function set_user() //skapar en ny användare.
		{
			$usr = html_escape($this->input->post('username'));
			$pas = html_escape($this->input->post('password'));
			
			$data = array(
				'username' => $usr,
				'password' => password_hash($pas, PASSWORD_DEFAULT)
			);
			return $this->db->insert('user', $data);
		}
	public function login_user($username,$password)
		{

			$query = $this->db->get_where('user',array(
				'username'=>$username,

			));
			if($query->num_rows()==1)
			{
				$pwd = $query->row(0)->password;
				if(password_verify($password, $pwd))
				{
					$userdata = array(
						'user' => $username,
						'login' => TRUE
							);
					$this->session->set_userdata($userdata);
				}
				else
				{
					redirect('/login');
				}
			}

			else
					{
						redirect('/login');
					}
			
		
		}
	public function logout_user()
		{
			if(session_destroy())
			    {
					redirect('/home');
			    }
		}
}