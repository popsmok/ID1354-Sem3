<?php
class Pages extends CI_controller {
        public function __construct()
        {
                parent::__construct();
                $this->load->model('pages_model');
                $this->load->model('comment_model');
        }

	public function view($page = 'home')
        {
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
            {
                // Whoops, we don't have a page for that!
                show_404();
            }
                $data['title'] = ucfirst($page); // Capitalize the first letter

                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('pages/'.$page, $data);
        if ( $page == 'pancakes' || $page == 'meatballs') // om page är något recept. load comments.
            {
                $data['kommentar'] = $this->comment_model->read_comment($data['title']);
                $this->load->view('pages/readComment', $data['kommentar']);

                if(isset($_SESSION['user'])) // om någon är inloggad, ladda kommentarsfält
                    {
                        $this->load->view('pages/createComment', $page);
                    }                
            }
                $this->load->view('templates/footer', $data);
                //laddar de olika viewsen för sidan: header|nav-menyn|den faktiska sidan|footer.
	}
        public function signup() //create a new user
        {
                    $this->load->library('form_validation');
                        //hämtar library, för forms.
                    $data['title'] = 'Signup';

                    $this->form_validation->set_rules('username', 'username', 'required');
                    $this->form_validation->set_rules('password', 'password', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('pages/meatballs');
                $this->load->view('templates/footer');
                    }
                else 
                {
                        $this->pages_model->set_user();
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/nav', $data);
                        $this->load->view('pages/login', $data);
                        $this->load->view('templates/footer', $data);
                }
        }
        public function login() //login for an old user
        {
                $this->load->helper('form');
                $this->load->library('form_validation');
                        //hämtar library, för forms.
                    $data['title'] = 'login';

                    $this->form_validation->set_rules('username', 'username', 'required');
                    $this->form_validation->set_rules('password', 'password', 'required');

                if ($this->form_validation->run() === FALSE)
                {       
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/nav', $data);
                        $this->load->view('pages/signup',$data);
                        $this->load->view('templates/footer', $data);
                }
                else // loggar in användaren.
                {
                        $data = array(
                                'username' => $this->input->post('username'),
                                'password' => $this->input->post('password')
                            );
                        $this->pages_model->login_user($data['username'], $data['password']);

                        redirect('/');
                        //redirect($_SERVER['HTTP_REFERER'], 'refresh');
                }
        }
        public function logout()
        {
                $this->pages_model->logout_user();
        }
        public function readComment()
        {
            $data['comment'] = $this->comment_model->read_comment($title);

            $data['user'] = $data['comment']['user'];
            echo json_encode($data);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav');
            $this->load->view('pages/readComment', $data);
            $this->load->view('templates/footer');
        }
}