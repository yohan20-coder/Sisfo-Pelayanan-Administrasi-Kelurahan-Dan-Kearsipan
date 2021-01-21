<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip extends CI_Controller
{

  public function __construct()
  {
      parent::__construct();
      //memanggil model arsipMasuk
      $this->load->model('Arsip_model');
      //user akses
     is_log_in();
  }

    public function index()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      //memanggil model arsip
      $this->load->model('Arsip_model','arsip');
      $data['tampil'] = $this->arsip->tampil();
      
    //  var_dump($data['tampil']);die;
      $data['judul'] = 'Halaman Arsip Surat Masuk';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('arsip/index',$data);
      $this->load->view('template/footer');
    }

    public function tambah()
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      // $data['ubah'] = $this->Menu_model->getUbah($id);

      $this->form_validation->set_rules('nosurat','Nosurat','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      // $this->form_validation->set_rules('klasi','Klasi','required',[
      //   'required' => 'Data Tidak Boleh Kosong !'
      // ]);
      $this->form_validation->set_rules('tglmasuk','Tglmasuk','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('tgltrima','Tgltrima','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('perihal','Perihal','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('ringkas','Ringkas','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('dispos','Dispos','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('instansi','Instansi','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);

      

      if($this->form_validation->run()==false){
        $data['judul'] = 'Halaman Tambah Surat Masuk';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar',$data);
        $this->load->view('arsip/tambah',$data);
        $this->load->view('template/footer');
      }else{

        $data = [
          'nosurat' => $this->input->post('nosurat'),
          'noklasi' => $this->input->post('klasi'),
          'tglsurat' => $this->input->post('tglmasuk'),
          'tglteri' => $this->input->post('tgltrima'),
          'perihal' => $this->input->post('perihal'),
          'isi' => $this->input->post('ringkas'),        
          'disposisi' => $this->input->post('dispos'),
          'instansi' => $this->input->post('instansi')
        ];

        $this->db->insert('arsma',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
        redirect('arsip');
      }   
    } 


    public function detail($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Arsip_model','arsip');
      $data['ubah'] = $this->arsip->ubah($id);

      $data['judul'] = 'Halaman Detail Surat Masuk';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('arsip/detail',$data);
      $this->load->view('template/footer');
    }

    public function edit($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $data['edit'] = $this->Arsip_model->Ubah($id);

      // $this->load->model('Arsip_model');
      // $data['edit'] = $this->edit->ubah($id);
      // $data['ubah'] = $this->Menu_model->getUbah($id);

      // var_dump($data['edit']);die;
       
      if($this->form_validation->run()==false){
      $data['judul'] = 'Halaman Detail Surat Masuk';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('arsip/edit',$data);
      $this->load->view('template/footer');   
      }
}

public function editkel($id)
{
  $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

  $data['edit'] = $this->Arsip_model->Ubahkel($id);

  // var_dump($data['edit']);die;
   
  $data['judul'] = 'Halaman Edit Surat Keluar';
  $this->load->view('template/header',$data);
  $this->load->view('template/sidebar',$data);
  $this->load->view('template/topbar',$data);
  $this->load->view('arskel/edit',$data);
  $this->load->view('template/footer');   

}
    
 
    public function editproses()
    {    
            //tampung data dari form
          $nosurat = $this->input->post('nosurat');
          $noklasi = $this->input->post('klasi');
          $tglsurat = $this->input->post('tglmasuk');
          $tglteri = $this->input->post('tgltrima');
          $perihal = $this->input->post('perihal');
          $isi = $this->input->post('ringkas');        
          $disposisi = $this->input->post('dispos');
          $instansi = $this->input->post('instansi');
      
          $this->Arsip_model->update(array(
              'nosurat' => $nosurat,
              'noklasi' => $noklasi,
              'tglsurat' =>  $tglsurat,
              'tglteri' => $tglteri,
              'perihal' => $perihal,
              'isi' => $isi,
              'disposisi' => $disposisi,
              'instansi' => $instansi,
              ), array('id' => $this->input->post('id')
                  )
          );
          $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil DiEdit</div>');
          redirect('arsip');

}

public function editkelproses()
{    
      $nosurat = $this->input->post('nosurat');
      $noklasi = $this->input->post('klasi');
      $tglsurat = $this->input->post('tglmasuk');
      $ringkasan = $this->input->post('ringkasan');
      $pengelolah = $this->input->post('pengelolah');        
      $kepada = $this->input->post('kepada');
      $keterangan = $this->input->post('keterangan');
  
      $this->Arsip_model->updatekel(array(
          'nosurat' => $nosurat,
          'noklasi' => $noklasi,
          'tglsurat' =>  $tglsurat,
          'ringkasan' => $ringkasan,
          'pengelolah' => $pengelolah,
          'kepada' => $kepada,
          'keterangan' => $keterangan
          ), array('id' => $this->input->post('id')
              )
      );
      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil DiEdit</div>');
      redirect('arsip/suratkel');
}
 

    public function hapus($id)
    {   
         $this->Arsip_model->hapus($id);
         $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil DiHapus</div>');
         redirect('arsip');
    }

    public function cetak()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      //memanggil model arsip
      $this->load->model('Arsip_model','arsip');
      $data['tampil'] = $this->arsip->tampil();
      
    //  var_dump($data['tampil']);die;
      $this->load->view('arsip/cetak',$data);
    }

    

    //export pdf
    public function pdfm()
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->library('dompdf_gen');

      $this->load->model('Arsip_model','arsip');
      $data['tampil'] = $this->arsip->tampil();

      // var_dump($data['ubah']); die();
      $data['judul'] = 'Halaman print';
      $this->load->view('arsip/pdfm',$data);

      $paper_size = 'A4';
      $orientation = 'landscape';
      $html = $this->output->get_output();

      $this->dompdf->set_paper($paper_size, $orientation);

      $this->dompdf->load_html($html);
      $this->dompdf->render();
      $this->dompdf->stream("print out", array('Attachment' => 0));
    }


//function arsip keluar
    public function suratkel()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      
      $this->load->model('Arsip_model','arsip');
      $data['tamkel'] = $this->arsip->tamkel();
    //   var_dump($data['user']);die;
      $data['judul'] = 'Halaman Arsip Surat Keluar';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('arskel/index',$data);
      $this->load->view('template/footer');
    }

    public function add()
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      // $data['ubah'] = $this->Menu_model->getUbah($id);

      $this->form_validation->set_rules('nosurat','Nosurat','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      // $this->form_validation->set_rules('klasi','Klasi','required',[
      //   'required' => 'Data Tidak Boleh Kosong !'
      // ]);
      $this->form_validation->set_rules('tglmasuk','Tglmasuk','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
     
      $this->form_validation->set_rules('pengelolah','Pengelolah','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('ringkas','Ringkas','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('kepada','Kepada','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('keterangan','Keterangan','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);

      

      if($this->form_validation->run()==false){
        $data['judul'] = 'Halaman Tambah Surat Keluar';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar',$data);
        $this->load->view('arskel/tambah',$data);
        $this->load->view('template/footer');
      }else{

        $data = [
          'nosurat' => $this->input->post('nosurat'),
          'noklasi' => $this->input->post('klasi'),  
          'ringkasan' => $this->input->post('ringkas'), 
          'pengelolah' => $this->input->post('pengelolah'),
          'tglsurat' => $this->input->post('tglmasuk'),   
          'kepada' => $this->input->post('kepada'),        
          'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->insert('arske',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
        redirect('arsip/suratkel');
      }   
    }

    public function detkel($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Arsip_model','arsip');
      $data['ubah'] = $this->arsip->ubahkel($id);

      $data['judul'] = 'Halaman Detail Surat Keluar';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('arskel/detail',$data);
      $this->load->view('template/footer');
    }

    

    public function pdfm2()
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->library('dompdf_gen');

      $this->load->model('Arsip_model','arsip');
      $data['tampil'] = $this->arsip->tamkel();

      // var_dump($data['ubah']); die();
      $data['judul'] = 'Halaman print';
      $this->load->view('arskel/pdfm',$data);

      $paper_size = 'A4';
      $orientation = 'landscape';
      $html = $this->output->get_output();

      $this->dompdf->set_paper($paper_size, $orientation);

      $this->dompdf->load_html($html);
      $this->dompdf->render();
      $this->dompdf->stream("print out", array('Attachment' => 0));
    }

    public function cetak2()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      //memanggil model arsip
      $this->load->model('Arsip_model','arsip');
      $data['tampil'] = $this->arsip->tamkel();
      
    //  var_dump($data['tampil']);die;
      $this->load->view('arskel/cetak',$data);
    }

    public function delete($id)
    {   
         $this->Arsip_model->hapuskel($id);
         $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil DiHapus</div>');
         redirect('arsip/suratkel');
    }
}