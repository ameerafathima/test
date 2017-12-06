<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Login_model extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
        }
        public function verify()
        {
            $username=$this->input->post('username');
            $password=md5($this->input->post('password'));
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('username',$username);
            $this->db->where('password',$password);
            $query=$this->db->get();
            if($query->num_rows()==1)
            {
                $row=$query->row();
                $data=array(
                    'userid'=>$row->userid,
                    'fname'=>$row->fname,
                    'lname'=>$row->lname,
                    'username'=>$row->username,
                    'validated'=>true,
                );
                $this->session->set_userdata($data);
                return true;
            }
            return false;
        }
    }
    ?>