<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller
{

    public function __construct()
    {
      parent::__construct();
      $this->load->model('Layanan_model');
    }

    public function index()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      // var_dump($data['jml']);die;
      $data['judul'] = 'Halaman Admin';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('layanan/index',$data);
      $this->load->view('template/footer'); 
    }

    public function ketusaha()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      //data pegawai
      $data['tam'] = $this->db->get('pegawai')->result_array();
      //data penduduk
      $data['tampil'] = $this->db->get('penduduk')->result_array();

      // var_dump($data['jml']);die;

      // validasi input data
      $this->form_validation->set_rules('nosurat', 'Nosurat', 'required|trim|is_unique[ketusaha.nosurat]',[
        'required' => 'No. Surat Harus Diisi',
        'is_unique' => 'Maaf No. Surat Sudah Ada'
      ]);

      $this->form_validation->set_rules('tglsurat', 'Tglsurat', 'required|trim',[
        'required' => 'Tanggal Surat Harus Diisi'
      ]);

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
      'required' => 'Nama Harus Diisi'
    ]);

    $this->form_validation->set_rules('penduduk', 'Penduduk', 'required|trim',[
    'required' => 'Nama Penduduk Harus Diisi'
    ]);

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
      'required' => 'Nama Harus Diisi'
  ]);
  $this->form_validation->set_rules('kwg', 'Kwg', 'required|trim',[
    'required' => 'Kewarganegaraan Harus Diisi'
  ]);
  $this->form_validation->set_rules('status', 'Status', 'required|trim',[
    'required' => 'Status Perkawinan Harus Diisi'
  ]);
  $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',[
    'required' => 'Alamat Harus Diisi'
  ]);
  $this->form_validation->set_rules('usaha', 'Usaha', 'required|trim',[
    'required' => 'Nama Usaha Harus Diisi'
  ]);
  $this->form_validation->set_rules('rt', 'Rt', 'required|trim',[
    'required' => 'RT Harus Diisi'
  ]);
  $this->form_validation->set_rules('rw', 'Rw', 'required|trim',[
    'required' => 'RW Usaha Harus Diisi'
  ]);


  if($this->form_validation->run() == FALSE){
      $data['judul'] = 'Halaman Entry Keteranggan Usaha';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('layanan/ketusaha',$data);
      $this->load->view('template/footer'); 
    }else{
      $data = [
        'nosurat' => $this->input->post('nosurat'),
        'tglsurat' => $this->input->post('tglsurat'),
        'nm_pejabat' => $this->input->post('nama2'),
        'nip' => $this->input->post('nip'),
        'gol' => $this->input->post('golongan'),
        'jabatan' => $this->input->post('jabatan'),
        'nm_pen' => $this->input->post('napen'),
        'nik' => $this->input->post('nik'),
        'jk' => $this->input->post('jk'),
        'tlahir' => $this->input->post('tlah'),
        'tglahir' => $this->input->post('tglah'),
        'agama' => $this->input->post('agama'),
        'pekerjaan' => $this->input->post('pekerjaan'),
        'kwg' => $this->input->post('kwg'),
        'status' => $this->input->post('status'),
        'alamat' => $this->input->post('alamat'),
        'rt' => $this->input->post('rt'),
        'rw' => $this->input->post('rw'),
        'nm_usaha' => $this->input->post('usaha')
    ];
     $this->db->insert('ketusaha',$data);
     $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Diinput</div>');
     redirect('layanan/list');
    }
 }

 public function list()
 {
    //mengambil data dari session di controller auth
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //memanggil model Master data
    $this->load->model('Layanan_model','kartu');
    $data['tampil'] = $this->kartu->tampil();
    
  //  var_dump($data['tampil']);die;
    $data['judul'] = 'Halaman Cetak Keterangan Usaha';
    $this->load->view('template/header',$data);
    $this->load->view('template/sidebar',$data);
    $this->load->view('template/topbar',$data);
    $this->load->view('layanan/list',$data);
    $this->load->view('template/footer');
 }

    public function get_pej()
    {
      $id = $this->input->post('id');
      $data = $this->Layanan_model->get_pej($id);
      echo json_encode($data);
    }

    public function get_pen()
    {
      $id = $this->input->post('id');
      $data = $this->Layanan_model->get_pen($id);
      echo json_encode($data);
    }


 
 public function cetak($id)
 {
    //mengambil data dari session di controller auth
   $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

   //memanggil model layanan
   $this->load->model('Layanan_model','surat');
   $data['tampil'] = $this->surat->cetak($id);
   
 //  var_dump($data['tampil']);die;
   $this->load->view('layanan/cetak',$data);
 }

 public function cetakk($id)
 {
    //mengambil data dari session di controller auth
   $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

   //memanggil model layanan
   $this->load->model('Layanan_model','surat');
   $data['tampil'] = $this->surat->cetak($id);
   
 //  var_dump($data['tampil']);die;
   $this->load->view('layanan/cetakk',$data);
 }

 public function hapus($id)
 {
   $this->Layanan_model->hapus($id);
   $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil DiHapus</div>');
   redirect('layanan/list');
 }

 //export pdf
//  public function pdfm()
//  {
//    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

//    $this->load->library('dompdf_gen');

//   //  $this->load->model('Arsip_model','arsip');
//   //  $data['tampil'] = $this->arsip->tampil();

//    // var_dump($data['ubah']); die();
//    $data['judul'] = 'Halaman print';
//    $this->load->view('layanan/surat',$data);

//    $paper_size = 'A4';
//    $orientation = 'portrait';
//    $html = $this->output->get_output();

//    $this->dompdf->set_paper($paper_size, $orientation);

//    $this->dompdf->load_html($html);
//    $this->dompdf->render();
//    $this->dompdf->stream("print out", array('Attachment' => 0));
//  }

 public function izinusaha()
 {
    //mengambil data dari session di controller auth
   $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

   //data pegawai
   $data['tam'] = $this->db->get('pegawai')->result_array();
   //data penduduk
   $data['tampil'] = $this->db->get('penduduk')->result_array();

   // var_dump($data['jml']);die;

   // validasi input data
   $this->form_validation->set_rules('nosurat', 'Nosurat', 'required|trim|is_unique[izinusaha.nosurat]',[
     'required' => 'No. Surat Harus Diisi',
     'is_unique' => 'Maaf No. Surat Sudah Ada'
   ]);

   $this->form_validation->set_rules('tglsurat', 'Tglsurat', 'required|trim',[
     'required' => 'Tanggal Surat Harus Diisi'
   ]);

 $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
   'required' => 'Nama Harus Diisi'
 ]);

 $this->form_validation->set_rules('penduduk', 'Penduduk', 'required|trim',[
 'required' => 'Nama Penduduk Harus Diisi'
 ]);

 $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
   'required' => 'Nama Harus Diisi'
]);
$this->form_validation->set_rules('kwg', 'Kwg', 'required|trim',[
 'required' => 'Kewarganegaraan Harus Diisi'
]);
$this->form_validation->set_rules('status', 'Status', 'required|trim',[
 'required' => 'Status Perkawinan Harus Diisi'
]);
$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',[
 'required' => 'Alamat Harus Diisi'
]);
$this->form_validation->set_rules('usaha', 'Usaha', 'required|trim',[
 'required' => 'Nama Usaha Harus Diisi'
]);
$this->form_validation->set_rules('rt', 'Rt', 'required|trim',[
 'required' => 'RT Harus Diisi'
]);
$this->form_validation->set_rules('rw', 'Rw', 'required|trim',[
 'required' => 'RW Usaha Harus Diisi'
]);


if($this->form_validation->run() == FALSE){
   $data['judul'] = 'Halaman Entry Izin Usaha';
   $this->load->view('template/header',$data);
   $this->load->view('template/sidebar',$data);
   $this->load->view('template/topbar',$data);
   $this->load->view('layanan/izinusaha',$data);
   $this->load->view('template/footer'); 
 }else{
   $data = [
     'nosurat' => $this->input->post('nosurat'),
     'tglsurat' => $this->input->post('tglsurat'),
     'nm_pejabat' => $this->input->post('nama2'),
     'nip' => $this->input->post('nip'),
     'gol' => $this->input->post('golongan'),
     'jabatan' => $this->input->post('jabatan'),
     'nm_pen' => $this->input->post('napen'),
     'nik' => $this->input->post('nik'),
     'jk' => $this->input->post('jk'),
     'tlahir' => $this->input->post('tlah'),
     'tglahir' => $this->input->post('tglah'),
     'agama' => $this->input->post('agama'),
     'pekerjaan' => $this->input->post('pekerjaan'),
     'kwg' => $this->input->post('kwg'),
     'status' => $this->input->post('status'),
     'alamat' => $this->input->post('alamat'),
     'rt' => $this->input->post('rt'),
     'rw' => $this->input->post('rw'),
     'nm_usaha' => $this->input->post('usaha')
 ];
  $this->db->insert('izinusaha',$data);
  $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Diinput</div>');
  redirect('layanan/listizin');
 }
}

public function listizin()
 {
    //mengambil data dari session di controller auth
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //memanggil model Master data
    $this->load->model('Layanan_model','izin');
    $data['tampil'] = $this->izin->tampilizin();
    
  //  var_dump($data['tampil']);die;
    $data['judul'] = 'Halaman Cetak Izin Usaha';
    $this->load->view('template/header',$data);
    $this->load->view('template/sidebar',$data);
    $this->load->view('template/topbar',$data);
    $this->load->view('layanan/listizin',$data);
    $this->load->view('template/footer');
 }

 public function hapusizin($id)
 {
   $this->Layanan_model->hapusizin($id);
   $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil DiHapus</div>');
   redirect('layanan/listizin');
 }


}