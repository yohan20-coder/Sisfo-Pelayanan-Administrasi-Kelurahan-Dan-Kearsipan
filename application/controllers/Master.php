<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller
{

  public function __construct()
  {
      parent::__construct();
      //memanggil model arsipMasuk
      $this->load->model('Master_model');
      //user akses
     is_log_in();
  }

    public function index()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      //memanggil model Master data
      $this->load->model('Master_model','kartu');
      $data['tampil'] = $this->kartu->tampil();
      
    //  var_dump($data['tampil']);die;
      $data['judul'] = 'Halaman Data Kartu Keluarga';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('master/index',$data);
      $this->load->view('template/footer');
    }

public function tambah()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      
 $this->form_validation->set_rules('nokk', 'Nokk', 'required|trim|min_length[16]|is_unique[kartukel.no_kk]',[
      'required' => 'No. Kartu Keluarga Harus Diisi',
      'is_unique' => 'Maaf No. Kartu Keluarga Sudah Ada',
      'min_length' => 'No. Kartu Keluarga Diinput Harus 16 Digit  !'
  ]);

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
      'required' => 'Nama Harus Diisi'
  ]);

  $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',[
    'required' => 'Alamat Harus Diisi'
  ]);
  $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required|trim',[
        'required' => 'Kelurahan Harus Diisi'
  ]);
  $this->form_validation->set_rules('rtrw', 'rtrw', 'required|trim',[
    'required' => 'Kelurahan Harus Diisi'
]);
  
 
  if($this->form_validation->run() == FALSE){
    $data['judul'] = 'Halaman Tambah Data Kartu Keluarga';
    $this->load->view('template/header',$data);
    $this->load->view('template/sidebar',$data);
    $this->load->view('template/topbar',$data);
    $this->load->view('master/tambahkk',$data);
    $this->load->view('template/footer');
  }else{
    $data = [
    'no_kk' => $this->input->post('nokk'),
    'nama_kk' => $this->input->post('nama'),
    'alamat' => $this->input->post('alamat'),
    'kelurahan' => $this->input->post('kelurahan'),
    'rt/rw' => $this->input->post('rtrw')
  ];
   $this->db->insert('kartukel',$data);
   $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Diinput</div>');
   redirect('master');
    }
  }

  public function ubahkartu($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['ubah'] = $this->Master_model->getUbah($id);

    $this->form_validation->set_rules('nokk', 'Nokk', 'required|trim|min_length[16]',[
      'required' => 'No. Kartu Keluarga Harus Diisi',
      // 'is_unique' => 'Maaf No. Kartu Keluarga Sudah Ada',
      'min_length' => 'No. Kartu Keluarga Diinput Harus 16 Digit  !'
  ]);

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
      'required' => 'Nama Harus Diisi'
  ]);

  $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',[
    'required' => 'Alamat Harus Diisi'
  ]);
  $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required|trim',[
        'required' => 'Kelurahan Harus Diisi'
  ]);
  $this->form_validation->set_rules('rtrw', 'rtrw', 'required|trim',[
    'required' => 'Kelurahan Harus Diisi'
]);

  if($this->form_validation->run()==false){
      $data['judul'] = 'Halaman Edit Data Kartu Keluarga';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('master/ubahkartu',$data);
      $this->load->view('template/footer');
    }else{
      $data = [
        'no_kk' => $this->input->post('nokk'),
        'nama_kk' => $this->input->post('nama'),
        'alamat' => $this->input->post('alamat'),
        'kelurahan' => $this->input->post('kelurahan'),
        'rt/rw' => $this->input->post('rtrw')
      ];     
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('kartukel', $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil DiUbah</div>');
      redirect('master');
    }

  } 

  public function hapuskk($id)
  {
    $this->Master_model->hapuskk($id);
    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil DiHapus</div>');
    redirect('master');
  }

  //bagian pegawai
  public function pegawai()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      //memanggil model Master data
      $this->load->model('Master_model','pegawai');
      $data['tampil'] = $this->pegawai->tampilpeg();
      
    //  var_dump($data['tampil']);die;
      $data['judul'] = 'Halaman Data Pegawai Kelurahan';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('Master/pegawai',$data);
      $this->load->view('template/footer');
    }

 public function tambahpeg()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      
 $this->form_validation->set_rules('nip', 'Nip', 'required|trim|is_unique[pegawai.nip]',[
      'required' => 'No. Nip Harus Diisi',
      'is_unique' => 'Maaf No. Nip Sudah Ada'
  ]);

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
      'required' => 'Nama Harus Diisi'
  ]);

  $this->form_validation->set_rules('jk', 'Jk', 'required|trim',[
    'required' => 'Jenis Kelamin Harus Diisi'
  ]);

  $this->form_validation->set_rules('golongan', 'Golongan', 'required|trim',[
    'required' => 'Golongan Harus Diisi'
  ]);

  $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim',[
        'required' => 'Jabatan Harus Diisi'
  ]);
  
 
  if($this->form_validation->run() == FALSE){
    $data['judul'] = 'Halaman Tambah Data Pegawai';
    $this->load->view('template/header',$data);
    $this->load->view('template/sidebar',$data);
    $this->load->view('template/topbar',$data);
    $this->load->view('master/tambahpeg',$data);
    $this->load->view('template/footer');
  }else{
    $data = [
    'nama' => $this->input->post('nama'),
    'nip' => $this->input->post('nip'),
    'jk' => $this->input->post('jk'),
    'golongan' => $this->input->post('golongan'),
    'jabatan' => $this->input->post('jabatan')
  ];
   $this->db->insert('pegawai',$data);
   $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Diinput</div>');
   redirect('master/pegawai');
    }
  }

  public function ubahpeg($id)
  {
    //mengambil data dari session di controller auth
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['ubah'] = $this->Master_model->getUbahPeg($id);
      
    $this->form_validation->set_rules('nip', 'Nip', 'required|trim',[
         'required' => 'No. Nip Harus Diisi',
     ]);
   
       $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
         'required' => 'Nama Harus Diisi'
     ]);
   
     $this->form_validation->set_rules('jk', 'Jk', 'required|trim',[
       'required' => 'Jenis Kelamin Harus Diisi'
     ]);

     $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim',[
      'required' => 'Jabatan Harus Diisi'
    ]);

     $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim',[
           'required' => 'Jabatan Harus Diisi'
     ]);
     
    
     if($this->form_validation->run() == FALSE){
       $data['judul'] = 'Halaman Edit Data Pegawai';
       $this->load->view('template/header',$data);
       $this->load->view('template/sidebar',$data);
       $this->load->view('template/topbar',$data);
       $this->load->view('master/ubahpeg',$data);
       $this->load->view('template/footer');
     }else{
       $data = [
       'nama' => $this->input->post('nama'),
       'nip' => $this->input->post('nip'),
       'jk' => $this->input->post('jk'),
       'golongan' => $this->input->post('golongan'),
       'jabatan' => $this->input->post('jabatan')
     ];
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('pegawai',$data);
      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Diinput</div>');
      redirect('master/pegawai');
       }
  }

  public function hapuspeg($id)
  {
    $this->Master_model->hapuspeg($id);
    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil DiHapus</div>');
    redirect('master/pegawai');
  }

  //Bagian penduduk
  public function penduduk()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      //memanggil model Master data
      $this->load->model('Master_model','pend');
      $data['tampil'] = $this->pend->tampilpen();
      
    //  var_dump($data['tampil']);die;
      $data['judul'] = 'Halaman Data Penduduk';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('master/penduduk',$data);
      $this->load->view('template/footer');
    }

public function tambahpen()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $data['tampil'] = $this->db->get('kartukel')->result_array();
      
 $this->form_validation->set_rules('nik', 'Nik', 'required|trim|is_unique[penduduk.nik]',[
      'required' => 'No. Nik Harus Diisi',
      'is_unique' => 'Maaf No. Nik Sudah Ada'
  ]);

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
      'required' => 'Nama Harus Diisi'
  ]);

  $this->form_validation->set_rules('jk', 'Jk', 'required|trim',[
    'required' => 'Jenis Kelamin Harus Diisi'
  ]);
  $this->form_validation->set_rules('nokk', 'Nokk', 'required|trim',[
        'required' => 'No. KK Harus Diisi'
  ]);
  $this->form_validation->set_rules('tmplahir', 'Tmplahir', 'required|trim',[
    'required' => 'Tempat Lahir Harus Diisi'
]);
$this->form_validation->set_rules('tgl', 'Tgl', 'required|trim',[
  'required' => 'Tanggal Lahir Harus Diisi'
]);
$this->form_validation->set_rules('agama', 'Agama', 'required|trim',[
  'required' => 'Agama Harus Diisi'
]);
$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim',[
  'required' => 'Pendidikan Harus Diisi'
]);
$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim',[
  'required' => 'Pekerjaan Harus Diisi'
]);
  
 
  if($this->form_validation->run() == FALSE){
    $data['judul'] = 'Halaman Tambah Data Penduduk';
    $this->load->view('template/header',$data);
    $this->load->view('template/sidebar',$data);
    $this->load->view('template/topbar',$data);
    $this->load->view('master/tambahpen',$data);
    $this->load->view('template/footer');
  }else{
    $data = [
      'nama' => $this->input->post('nama'),
      'no_kk' => $this->input->post('nokk'),
      'nik' => $this->input->post('nik'),
      'jk' => $this->input->post('jk'),
      'tempatla' => $this->input->post('tmplahir'),
      'tglah' => $this->input->post('tgl'),
      'agama' => $this->input->post('agama'),
      'pend' => $this->input->post('pendidikan'),
      'pekerjaan' => $this->input->post('pekerjaan')
  ];
   $this->db->insert('penduduk',$data);
   $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Diinput</div>');
   redirect('master/penduduk');
    }
  }

  
public function ubahpen($id)
{
   //mengambil data dari session di controller auth
  $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

  $data['tampil'] = $this->db->get('kartukel')->result_array();
 
  $data['ubah'] = $this->Master_model->getUbahPen($id);

$this->form_validation->set_rules('nik', 'Nik', 'required|trim',[
  'required' => 'No. Nik Harus Diisi'
]);

$this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
  'required' => 'Nama Harus Diisi'
]);

$this->form_validation->set_rules('jk', 'Jk', 'required|trim',[
'required' => 'Jenis Kelamin Harus Diisi'
]);
$this->form_validation->set_rules('nokk', 'Nokk', 'required|trim',[
    'required' => 'No. KK Harus Diisi'
]);
$this->form_validation->set_rules('tmplahir', 'Tmplahir', 'required|trim',[
'required' => 'Tempat Lahir Harus Diisi'
]);
$this->form_validation->set_rules('tgl', 'Tgl', 'required|trim',[
'required' => 'Tanggal Lahir Harus Diisi'
]);
$this->form_validation->set_rules('agama', 'Agama', 'required|trim',[
'required' => 'Agama Harus Diisi'
]);
$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim',[
'required' => 'Pendidikan Harus Diisi'
]);
$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim',[
'required' => 'Pekerjaan Harus Diisi'
]);


if($this->form_validation->run() == FALSE){
$data['judul'] = 'Halaman Edit Data Penduduk';
$this->load->view('template/header',$data);
$this->load->view('template/sidebar',$data);
$this->load->view('template/topbar',$data);
$this->load->view('master/ubahpen',$data);
$this->load->view('template/footer');
}else{
$data = [
  'nama' => $this->input->post('nama'),
  'no_kk' => $this->input->post('nokk'),
  'nik' => $this->input->post('nik'),
  'jk' => $this->input->post('jk'),
  'tempatla' => $this->input->post('tmplahir'),
  'tglah' => $this->input->post('tgl'),
  'agama' => $this->input->post('agama'),
  'pend' => $this->input->post('pendidikan'),
  'pekerjaan' => $this->input->post('pekerjaan')
];
$this->db->where('id', $this->input->post('id'));
$this->db->update('penduduk',$data);
$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil DiUbah</div>');
redirect('master/penduduk');
}
}

public function detpen($id)
{
   //mengambil data dari session di controller auth
  $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

  $data['ubah'] = $this->db->get('kartukel')->result_array();
 
  $data['sm'] = $this->Master_model->getUbahPen($id);

  // var_dump($data['sm']);die;

$data['judul'] = 'Halaman Detail Data Penduduk';
$this->load->view('template/header',$data);
$this->load->view('template/sidebar',$data);
$this->load->view('template/topbar',$data);
$this->load->view('master/detpen',$data);
$this->load->view('template/footer');
}


  public function hapuspen($id)
  {
    $this->Master_model->hapuspen($id);
    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil DiHapus</div>');
    redirect('master/penduduk');
  }

}