<?php # 9/2019

class Users extends CI_Controller {

	public function __construct(){
        parent::__construct();     
       //we could charge model, but it is useless because it is charged by default 
	}

    //This function only load the views. If you dont specify where you are going you always go inside index.
    public function index()
	{
		$this->load->view('templates/header'); 
		$this->load->view('main/main'); 
        $this->load->view('templates/footer');
    }
    
    //Add a new user
    public function create(){
        
        //I save the data where i introduced with the mehtod post in a variable called $info

		$info = $this->input->post();               // data are what i input wiht method posst
                                                    //var_dump($info);
        $this->User_Model->add_user($info);     // call function which is in User model
        
        // if you want to catch information about ajax you can put $this->User_Model->add_user($info);
	}
	public function read(){

       //I save the data where i introduced with the mehtod post in an array called user which have another array inside called user table

        $users['user_table'] = $this->User_Model->get_users();
        //var_dump($users['user_table']);
        $this->load->view('templates/header'); 
        $this->load->view('main/main'); 
        $this->load->view('main/read_table',$users); 

        ///I have to put whole data(word in blue)and if I want to use in the view. In views I have to put the key
        $this->load->view('templates/footer');
        
    }
    
    //Search an user by his id, by default is null
    public function read_id($id=null){
       
        $users['user_table'] = $this->User_Model->get_users($id); //save data form the post in this array
        
        $this->load->view('templates/header'); 
        $this->load->view('main/main'); 
        $this->load->view('main/read_table',$users); 
        ///I have to put whole data(word in blue)and if i want to use in the view. there i have to put the key
        $this->load->view('templates/footer');
        
	}

    public function update() {
       
        $data = $this->input->post();       //save data form, the post in this variable
        $this->User_Model->updateM($data);  //call function update(input)
        $this->read();                      //after y call this funtion, when you reload the page, but in java refresh already upload
        
    }

    public function delete($id){

        $data = $this->input->post(); //save data form the post in this variable
        // var_dump($data['id']);

       //data is an array and I want only his id,so :
        $id= $data['id'];
      
        $this->User_Model->deleteM($id);
        $this->read();
        
    }
}
    
