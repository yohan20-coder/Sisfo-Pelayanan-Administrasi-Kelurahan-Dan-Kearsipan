
  <div class="container"><br><br>

    <!-- Outer Row -->
    <div class="row mt-5 justify-content-center">

      <div class="col-lg-6">
        <!-- <h4 class ="text-center mt-3 pt-4 text-gray-900">Selamat Datang di Sistem Kearsipan <br> Kelurahan Rewarangga</h4> -->
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h4 class="h4 text-gray-900 mb-4">Selamat Datang Di Sistem Informasi <br> Pelayanan Administrasi Dan Kearsipan <br> Kelurahan Rewarangga</h4>
                    <marquee><p>Kelurahan Inovatif Bermutu</p></marquee>
                  </div>

                  <?= $this->session->flashdata('message');?>

                  <form class="user" method="post" action="<?= base_url('auth');?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="email" name="email" value="<?= set_value('email'); ?>"placeholder="Masukan Email Anda...">
                      <?= form_error('email','<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukan Password Anda...">
                      <?= form_error('password','<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
        
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  
                    
                  </form>
   
                  <div class="text-center mt-5">
                    <!-- <h5 class="text-gray-900">KKN FTI Unflor 2020</h5> -->
                  </div>
                  <!-- <div class="text-center">
                    <a class="small" href="<?= base_url();?>auth/registration">Daftar Account!</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
    </div>
  </div>

 <!-- daftar -->
 <div class="modal fade" id="daftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content mr-auto img-thumbnail">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center !important">Informasi Login</h5><br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <img src="<?= base_url('assets/');?>img/andi.jpg" alt="Speaker 1" class="img-thumbnail">
              <p class="text-center"><b>Andy W Pria Termanis dan Intelek di Kampus</b></p>
            </div>
  
            <div class="col-md-6">
              <div class="details">
                <h4 class="text-center"><strong>FTI UNFLOR FAKULTAS ZAMAN NOW</strong></h4>
                <p class="text-center" style="font-size: 12px;">Hello Guys Terimah Kasih atas kunjungannya di project website PKL Miliku ini merupakan project demo miliku yang ku pasang di server VPS dengan OS Ubuntu Server 20.0.4. di layanan Alibaba Cloud untuk mengaksesnya sangatlah mudah teman-teman cukup login ke sistemku dengan memasukan <b class="text-primary">Email : yohanesardinus@gmail.com dan Password : 123</b> Jika teman-teman ingin memberikan kritik dan saran atau menemukan bug dalam webku ini silakan kirim kritik, saran dan masukan via email ya di <b class="text-info">yohanesardinus@gmail.com</b></p>

                <a target="blank" href="https://github.com/yohan20-coder" class="btn btn-primary btn-user btn-block">Klik Jika Pingin Lihat Akun Githubku</a>
                <!-- <a href="https://drive.google.com/open?id=1BBaOqusHdEY34YB50wPJjAqlbJ4e5ijL" class="btn btn-warning btn-user btn-block">Download Brosur Pendaftaran</a> -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
