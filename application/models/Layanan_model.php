<?php

class Layanan_model extends CI_Model
{

    public function tampil()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('ketusaha');
        return $query->result_array();
    }

    public function get_pej($id)
    {
        $this->db->from('pegawai');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    // public function get_pej($id)
    // {
    // 	$query =  $this->db->get_where('pegawai',['id'=>$id]);
    //     return $query->result_array();
    // }

    public function get_pen($id)
    {
        $this->db->from('penduduk');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function cetak($id)
    {
    	$query =  $this->db->get_where('ketusaha',['id'=>$id]);
        return $query->row_array();
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('ketusaha');
    }

    public function tampilizin()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('izinusaha');
        return $query->result_array();
    }

    public function hapusizin($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('izinusaha');
    }
}