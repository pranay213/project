<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends CI_Model {
    public function get_data()
    {
        $query=$this->db->get('count');
        return $query->result_array();
    }
    public function insert_data($date)
    {
        $query=$this->db->where('date',$date);
        $query=$this->db->get('count');
        $num=$query->num_rows();    
        if($num>0)
        {
            return 0;
        }
        else{
            if($this->db->insert('count',array('date'=>$date)))
            {
                // return 1;
            }
           
        }
    }
    public function update_count()
    {
        $date=date("Y-m-d");
        $this->db->select('count');
        $this->db->where('date',$date);
         $count=$this->db->get('count')->result_array();
          $counter=$count[0]['count'];
         
        if($counter<101)
        {
            if($counter==100)
            {
                $this->db->where('date',$date);
                $this->db->set(array('count'=>$counter+1));
                if($this->db->update('count'))
                {
                    return "completed";
                } 
            }
            $this->db->where('date',$date);
            $this->db->set(array('count'=>$counter+1));
            if($this->db->update('count'))
            {
                return "cls";
            }
        }
        else{
            return 'completed';
        }
         // $this->db->set('count','')
    }
}