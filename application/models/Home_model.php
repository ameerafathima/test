<?php
    if(!defined('BASEPATH'))exit('No direct script access allowed');
    class Home_model extends CI_MOdel
    {
        function __construct()
        {
            parent::__construct();
        }

        //inserting entered data to table employee
        function insert_user_data($user_name,$email,$password,$department,$designation,$iname)
        {
            $data=array(
                'duser'=>$user_name,
                'email'=>$email,
                'password'=>$password,
                'department'=>$department,
                'designation'=>$designation,
                'iname'=>$iname
            );
            return $this->db->insert('employee',$data);  
        }

        //taking datas from employee table to show it in userslist 
        function fetch_user_data()
        {
            $this->db->select('*');
            $this->db->from('employee');
            $query=$this->db->get();
            return $query->result();
        }

        //deleting row of employee table
        function delete_user_data($user_id)
        {
            $this->db->where('id',$user_id);
            $this->db->delete('employee');
            
        }

        function show_data($user_id)
        {
            $this->db->select('*');
            $this->db->from('employee');
            $this->db->where('id',$user_id);
            $query=$this->db->get();
            return $query->result();
        }

        //updating row of employee table
        function update_user_data($user_id,$data)
        {
            $this->db->where('id',$user_id);
            $this->db->update('employee',$data);
        }

        function getcountry()
        {
           $this->db->select('*');
           $query = $this->db->get('countries');
           return $query->result();
        }

        function getstate($country_id='')
        {
           $this->db->select('*');
           $this->db->where('country_id', $country_id);
           $query = $this->db->get('states');
           return $query->result();
        }

        function getcity($state_id='')
        {
           $this->db->select('*');
           $this->db->where('state_id', $state_id);
           $query = $this->db->get('cities');
           return $query->result();
        }

        function get_locations()
        {
            $this->db->select('duser,address,latitude,longitude');
            $query=$this->db->get('employee');
            return $query->result();
        }

        function view_image()
        {
            $this->db->select('duser,iname');
            $query=$this->db->get('employee');
            return $query->result();
        }


    }