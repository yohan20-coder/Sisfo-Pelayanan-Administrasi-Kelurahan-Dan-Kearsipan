<?php

class Master_model extends CI_Model
{
    public function tampil()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('kartukel');
        return $query->result_array();
    }

    public function getUbah($id)
    {
    	$query =  $this->db->get_where('kartukel',['id'=>$id]);
        return $query->row_array();
    }

    public function hapuskk($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kartukel');
    }

    //model pegawai
    public function tampilpeg()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('pegawai');
        return $query->result_array();
    }

    public function getUbahPeg($id)
    {
    	$query =  $this->db->get_where('pegawai',['id'=>$id]);
        return $query->row_array();
    }

    public function hapuspeg($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pegawai');
    }


    //model penduduk
    public function tampilpen()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('penduduk');
        return $query->result_array();
    }

    public function getUbahPen($id)
    {
    	$query =  $this->db->get_where('penduduk',['id'=>$id]);
        return $query->row_array();
    }

    public function hapuspen($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('penduduk');
    }

    //join tabel penduduk dengan tabel kk
    public function join($id)
    {
        $query = "SELECT `penduduk`.*, `kartukel`.`nama_kk`
                    FROM `penduduk` JOIN `kartukel`
                    ON `penduduk`.`id` = `kartukel`.`id` Where penduduk.`id` = '$id'";

    return $this->db->query($query)->row_array();
    }

}