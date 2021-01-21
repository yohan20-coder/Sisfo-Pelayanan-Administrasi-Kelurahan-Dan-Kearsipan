<?php
    include "tgl.php";
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
         <!--  <h1 class="h3 mb-4 text-gray-800"></h1> -->

          <div class="row">
            <div class="col-lg-12">

               <!-- Basic Card Example -->
              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $judul;?></h6>
                </div>
                <div class="card-body col-lg-12">

                  <!-- pesan error -->
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <!-- pesan berhasil tambah data -->
        <?= $this->session->flashdata('message');?>


          <table class="table"  width="100%" cellspacing="0">

                    <tr>
                          <td>Nama Lengkap</td>
                          <td>: <?= $sm['nama'] ?></td>
                      </tr>

                      <tr>
                          <td>Tempat Lahir</td>
                          <td>: <?= $sm['tempatla'] ?></td>
                      </tr>

                      <tr>
                          <td>Tanggal Lahir</td>
                          <td>: <?= tgl_indo($sm['tglah'])?></td>
                      </tr>
                    
                      <tr>
                          <td>Nomor KK</td>
                          <td>: <?= $sm['no_kk'] ?></td>
                      </tr>

                    

                      <tr>
                          <td>Nama Kepala Keluarga</td>
                          <td>:
                          <select name="nokk" disabled="disabled">
                            <!-- <option value="">Pilih</option> -->
                            <?php foreach($ubah as $m): ?>
                                <option value="<?= $m['no_kk'] ?>" 
                                <?php if($m['no_kk'] == $sm['no_kk']){
                                    echo 'selected';
                                    }?>
                               ><?= $m['nama_kk'] ?></option>
                            <?php endforeach; ?>
                        </select>
                          </td>
                      </tr>

                      <tr>
                        <td>Nomor Nik</td>
                        <td>: <?= $sm['nik'] ?></td>
                      </tr>

                      <tr>
                          <td>Jenis Kelamin</td>
                          <td>: <?= $sm['jk'] ?></td>
                      </tr>
                        
                    <tr>
                        <td>Agama</td>
                        <td>: <?= $sm['agama'] ?></td>
                    </tr>

                    <tr>
                        <td>Pendidikan</td>
                        <td>: <?= $sm['pend'] ?></td>
                    </tr>
                         
                    <tr>
                        <td>Pekerjaan</td>
                        <td>: <?= $sm['pekerjaan'] ?></td>
                    </tr>
                         
                         
                      </tr>
                  
                </table>
               
                </div>
              </div>

            </div>

        
            </div>
          </div>

</div>



