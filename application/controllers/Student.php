                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MX_Controller {

    function __construct() {
        parent::__construct();
        /* !!!!!! Warning !!!!!!!11
         *  admin panel initialization
         *  do not over-right or remove auth_panel/auth_panel_ini/auth_ini
         */
        //$this->load->helper('aul');
        $this->load->helper('array');
        //modules::run('student_panel/auth_panel_ini/auth_ini');
        $this->load->library('form_validation', 'uploads');
        //$this->load->model("backend_user");
        $this->load->model('Student_model');
        $this->load->helper('custom');
    }

    public function registration() {

        $data['tab'] = 'registration'; 
        $this->load->view('student_login_n_registration', $data);
        //die('workingd');
        //$user_data = $this->session->userdata('active_user_data');
        //$view_data['page'] = 'Home';
        // $data['page_data'] = $this->load->view('home', $view_data, TRUE);
        //$data['page_title'] = "Home";
        //echo modules::run('student_panel/template/call_default_template', $data);
    }
    
    public function ajax_register_a_student() {
        $data = $this->input->post();
        //print_r($data)
        $input = elements(array('first_name','last_name','email','mobile','city_id','state_id'),$data);
        $input['password'] = md5($data['password']);
        //$input['city_id'] = $data['city'];        
        $inputs['student_id']=$this->Student_model->add_a_student($input);
        $inputs['institution_type']=$data['institution_type'];
        if($data['institution_type'] ==1){
            $inputs['institution_id']=$data['school_id'];
            $inputs['course_id']=$data['school_class_id'];
            $inputs['section_id']=$data['school_class_section_id'];
        }else if($data['institution_type'] == 2){
            $inputs['institution_id']=$data['university_id'];
            $inputs['course_id']=$data['university_course_id'];
            $inputs['section_id']=$data['university_course_section_id'];
        }else{
            $inputs['institution_id']=$data['coaching_id'];
            $inputs['course_id']=$data['coaching_course_id'];
            $inputs['section_id']=$data['coaching_course_batch_id'];
        }
        $this->Student_model->add_education_profile($inputs);
        echo 1;
    }
    
    function ajax_student_login(){
        $data = $this->input->post();
        $this->db->where('user_type',1);
        $this->db->where('password',md5($data['login_password']));
        $this->db->group_start()
                ->where('username',$data['username'])
                ->or_where('email',$data['username'])
                ->or_where('mobile',$data['username'])
                ->group_end();
        $user = $this->db->get('users')->row_array();
        if($user){
            echo 'success';
        }else{
            echo 'fail';
        }
        
    }
    
    function ajax_student_my_login(){
        $data = $this->input->post();
        $this->db->where('user_type',1);
        $this->db->where('password',md5($data['my_password']));
        $this->db->group_start()
                ->where('username',$data['my_username'])
                ->or_where('email',$data['my_username'])
                ->or_where('mobile',$data['my_username'])
                ->group_end();
        $user = $this->db->get('users')->row_array();
        if($user){
            echo 'success';
        }else{
            echo 'fail';
        }
        
    }
    
    
    public function login() {

        $data['tab'] = 'login'; 
        $this->load->view('student_login_n_registration', $data);
    }

     public function my_profile() {
        $data['tab'] = 'my profile'; 
        $this->load->view('student/my_profile', $data);
    }
}
