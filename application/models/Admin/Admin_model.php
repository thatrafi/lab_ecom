<?php 
class Admin_model extends CI_model
{
    function getAllAdmin(){
        $admin = $this->db->get('tbl_admin');
        return $admin;
    }
    function isEmailExist($email){
        $admin = $this->db->get_where('tbl_admin',['email'=>$email]);
        return $admin;
    }
    function checkAdmin($email,$pass){
        $admin = $this->db->get_where('tbl_admin',['email'=>$email,'password'=>$pass]);
        return $admin;
    }
}
?>