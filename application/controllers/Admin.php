<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
      parent::__construct();
      //user akses
      $this->load->model('Menu_model');
     is_log_in();
  }

    public function index()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      // $data[total] = $this->Arsip_model->jmlmasuk();

      $this->load->model('Arsip_model','jml');
      $this->load->model('User_model','pengguna');
      $data['jml'] = $this->jml->jmlmasuk();
      $data['keluar'] = $this->jml->jmlkeluar();
      $data['pengguna'] = $this->pengguna->jmlpengguna();
      
      //penduduk tingkat pendidikan
      $this->load->model('Penduduk_model','pen');
      $data['jmlsma'] = $this->pen->jmlsma();
      $data['jmlsmp'] = $this->pen->jmlsmp();
      $data['jmlsd'] = $this->pen->jmlsd();
      $data['jmlsarjana'] = $this->pen->jmlsarjana();
      $data['magister'] = $this->pen->jmlmagister();
      $data['doktor'] = $this->pen->jmldoktor();
      $data['prof'] = $this->pen->jmlprof();

      //penduduk berdasarkan agama
      $data['katolik'] = $this->pen->jmlkatolik();
      $data['islam'] = $this->pen->jmlislam();
      $data['kristen'] = $this->pen->jmlkristen();
      $data['hindu'] = $this->pen->jmlhindu();
      $data['budha'] = $this->pen->jmlbudha();
      $data['konghucu'] = $this->pen->jmlkonghucu();

      //penduduk berdasarkan Jenis Kelamin
      $data['laki'] = $this->pen->jmllaki();
      $data['perempuan'] = $this->pen->jmlperempuan();

      // var_dump($data['jml']);die;
      $data['judul'] = 'Halaman Admin';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('admin/index',$data);
      $this->load->view('template/footer');
    }

    public function role()
    {
       //mengambil data dari session di controller auth
       $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

       $data['role'] = $this->db->get('user_role')->result_array();

       $this->form_validation->set_rules('role','Role','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);

      if($this->form_validation->run()==false){   
       //   var_dump($data['user']);die;
         $data['judul'] = 'Halaman Role';
         $this->load->view('template/header',$data);
         $this->load->view('template/sidebar',$data);
         $this->load->view('template/topbar',$data);
         $this->load->view('admin/role',$data);
         $this->load->view('template/footer');
      }else{
        $role= $this->input->post('role');
        $this->db->insert('user_role',['role'=>$role]);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
        redirect('admin/role');
      }
    }

    public function ubahrole($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $data['ubah'] = $this->db->get_where('user_role',['id'=>$id])->row_array();

      $this->form_validation->set_rules('nama','Nama','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      

    if($this->form_validation->run()==false){
        $data['judul'] = 'Menu Edit';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar',$data);
        $this->load->view('admin/ubahrole',$data);
        $this->load->view('template/footer');
      }else{
         $level = $this->input->post('nama');
         $this->Menu_model->role($id);
          $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil DiUbah</div>');
        redirect('admin/role');
      }

    } 



    public function roleaccess($role_id)
    {
       //mengambil data dari session di controller auth
       $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

       $data['role'] = $this->db->get_where('user_role',['id' => $role_id])->row_array();

       //ngakalin agar menu admin gak tampil pada role administrator krna itu hak penuh dari admin
       $this->db->where('id !=' , 1);
       $this->db->where('id !=' , 5);
       $data['menu'] = $this->db->get('user_menu')->result_array();
      
       //   var_dump($data['user']);die;
         $data['judul'] = 'Halaman Role';
         $this->load->view('template/header',$data);
         $this->load->view('template/sidebar',$data);
         $this->load->view('template/topbar',$data);
         $this->load->view('admin/role-access',$data);
         $this->load->view('template/footer');
    }

    public function ubahaccess()
    {
      $menu_id = $this->input->post('menuid');
      $role_id = $this->input->post('roleid');

      $data = [
        'role_id' => $role_id,
        'menu_id' => $menu_id
      ];

      $result = $this->db->get_where('user_access_menu', $data);

      if($result->num_rows() < 1 ){           //kalau data gak ada
        $this->db->insert('user_access_menu', $data);
      }else{
        $this->db->delete('user_access_menu', $data);
      }

      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Access telah diubah</div>');
    }
}