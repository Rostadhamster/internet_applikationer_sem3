<?php
    class Recipes extends CI_Controller{
        
        public function index(){
            $data['title'] ='Välj ditt recept!';
            
            $this->load->view('templates/header');
            $this->load->view('recipes/index', $data);
            $this->load->view('templates/footer');
        }
        
     
        public function view($page = 'index'){
            if(!file_exists(APPPATH.'views/recipes/'.$page.'.php')){
              show_404();
            }
            
            $data['recipe_id'] = $page;
            $data['title'] = ucfirst($page);
            $data['comments'] = $this->recipe_model->get_comments($page);
            
            $this->load->view('templates/header');
            $this->load->view('recipes/'.$page, $data);
            $this->load->view('recipes/comments');
            $this->load->view('templates/footer');
        }
        
        public function create(){
            
            
            $this->form_validation->set_rules('recipe_id', 'Recipe_id', 'required');
            
            $this->form_validation->set_rules('message', 'Message', 'required');
                
                $this->recipe_model->create_comment();
                redirect('recipes/index');
        }
        
        public function delete($id){
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
                        
            $this->recipe_model->delete_comment($id);
  
            redirect('recipes');
        }
        
    }