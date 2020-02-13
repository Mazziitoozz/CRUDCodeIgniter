<?php
class User_Model extends CI_Model{

    public function __construct(){
        $this->load->database(); //Charge new database
    }

    public function add_user($data)
    {
    //print_r($data) is usefull check if the data are in the model
    return $this->db->insert('NI-CRUD',$data);

    }

    public function get_users($id = null)
    //Default is null  but if I send anId it gives me the data
    {
         if($id === null){
            $this->db->select('*');
            $this->db->from('NI-CRUD');
            $variable = $this->db->get();//get my all of the users
            //print_r($query->result_array());
            return $variable->result_array();
        }else{
            
            $this->db->from('NI-CRUD');
            $this->db->where('id',$id); // condition of thw where('name in the table', value that we put)

            $variable= $this->db->get_where(); //you can use get if you use from,where..or just get_where
            //we have to put the condition inside array
            return $variable->result_array(); //return an array as result
        }
    }

    public function updateM($data)
    {   
        //var_dump($data); //useful to know if the data are in the model

         //edit information
         $this->db->set('firstname', $data['firstname']);// set(column name, new_info).As data is an array(5) we have to put []
         $this->db->set('surname', $data['surname']);
         $this->db->set('dob',  $data['dob']);
         $this->db->set('id_card', $data['id_card']);
 
         $this->db->where('id', $data['id']);
         return  $this->db->update('NI-CRUD');	
        
 
    }
    
    public function deleteM($id){
        $this->db->where('id',$id);
        return $this->db->delete('NI-CRUD');
    }
}