<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
    
  class Mdl extends CI_Model {
    function GetRow($keyword) {        
      $this->db->order_by('id_pegawai', 'DESC');
      $this->db->like("nama_pegawai", $keyword);
      return $this->db->get('pegawai')->result_array();
    }
     
    function getRows($params = array())
    {
      $this->db->select('*');
      $this->db->from('users');
      
      if(array_key_exists("conditions",$params)){
        foreach ($params['conditions'] as $key => $value)
        {
          $this->db->where($key,$value);
        }
      }
            
        if(array_key_exists("id_users",$params))
        {
            $this->db->where('id_users',$params['id_users']);
            $query  = $this->db->get();
            $result = $query->row_array();
        }
        else
        {
          if(array_key_exists("start",$params) && array_key_exists("limit",$params))
          {
            $this->db->limit($params['limit'],$params['start']);
          }
          elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params))
          {
            $this->db->limit($params['limit']);
          }

          $query = $this->db->get();
          
          if(array_key_exists("returnType",$params) && $params['returnType'] == 'count')
          {
            $result = $query->num_rows();
          }
          elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single')
          {
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
          }
          else
          {
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
          }
      }
      return $result;
    }
    
    function insert_data($data,$table)
    {
      if(!array_key_exists("masuk", $data)){
        $data['masuk'] = date("Y-m-d H:i:s");
      }
      if(!array_key_exists("edit", $data)){
        $data['edit'] = date("Y-m-d H:i:s");
      }

      $this->db->insert($table, $data);
      return TRUE;
    }

        function lihat($table)
        {
            $sql = $this->db->get($table);
            return $sql;
        }

        function total($table)
        {
            $sql = $this->db->count_all_results($table);
            return $sql;
        }

        function detail($id_sm = 'id_sm')
        {
            $data       = array();
            $options    = array('id_sm' => $id_sm);
            $Q          = $this->db->get_where('surat_masuk',$options,1);

            if ($Q->num_rows() > 0)
            {
                $data = $Q->row_array();
            }

            $Q->free_result();
            return $data;
        }

        function detail_sk($id_sk = 'id_sk')
        {
            $data       = array();
            $options    = array('id_sk' => $id_sk);
            $Q          = $this->db->get_where('surat_keluar',$options,1);

            if ($Q->num_rows() > 0)
            {
                $data = $Q->row_array();
            }

            $Q->free_result();
            return $data;
        }

        function detail_sp($id_sp = 'id_sp')
        {
            $data       = array();
            $options    = array('id_sp' => $id_sp);
            $Q          = $this->db->get_where('surat_perintah',$options,1);

            if ($Q->num_rows() > 0)
            {
                $data = $Q->row_array();
            }

            $Q->free_result();
            return $data;
        }

        function get_data_list($tbl, $limit, $start, $keyword)
        {
            if (!empty($keyword)) 
            {
                $this->db->like('perihal_sk',$keyword);
            }

            $query = $this->db->get($tbl, $limit, $start);
            return $query;
        }
        
        function edit_sp($where, $table)
        {
            return $this->db->get_where($table, $where);
        }

        function update_sp($where,$data,$table) 
        {
            if(!array_key_exists("edit", $data))
            {
                $data['edit'] = date("Y-m-d H:i:s");
            }
            
            $this->db->where($where);
            $this->db->update($table, $data);
        }

        function form_update($table, $filter, $id)
        {
            $this->db->where( $filter, $id);
            $sql = $this->db->get($table);

            return $sql;
        }

        function update($table, $data, $nama_id, $id)
        {
            $this->db->where($nama_id, $id);
            $sql = $this->db->update($table, $data);

            return $sql;
        }

        function delete($table, $filter, $id)
        {
            $this->db->where( $filter, $id);
            $sql = $this->db->delete($table);

            return $sql;
        }

        function agenda($table, $filter)
        {
            $this->db->select('*');
            $this->db->from($table);
            $this->db->order_by($filter, 'DESC');
            $this->db->limit(1);
        
            $hasil = $this->db->get();
            return $hasil;
        }

        function perbln($tgl, $table)
        {
            $this->db->where($tgl);
            $sql =  $this->db->get($table);
            return $sql;
           
        }

        function update_pass($id,$data,$table)
        {
            if(!array_key_exists("edit", $data))
            {
                $data['edit'] = date("Y-m-d H:i:s");
            }

            $this->db->where('id_users',$id);
            $this->db->update($table,$data);
        }

        function search($table, $kolom, $dari, $sampai)
        {
        //    if (!empty($keyword['cari'])) {
                $this->db->select('*');
                $this->db->from($table);
                $this->db->where("$kolom BETWEEN '$dari' AND '$sampai'");

                $hasil= $this->db->get();
                return $hasil;
            // }
        }
    }
