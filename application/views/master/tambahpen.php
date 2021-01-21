 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Basic Card Example -->
              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $judul;?></h6>
                </div>
                <div class="card-body col-lg-12">

            <!-- konfirmasi -->
          <div class="row">
            <div class="col-md-12">
              <?= $this->session->flashdata('message'); ?>
            </div>
          </div>

                <div class="row">
                    <div class="col-lg-12">
                        <form action="<?= base_url('master/tambahpen') ?>" method="post">

                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama">
                            <?= form_error('nama','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                    <div class="form-group">
                    <label for="nokk">Nama Kepala Keluarga</label>
                        <select name="nokk" id="menu"  class="js-example-basic-single">
                            <option value="">Pilih</option>
                            <?php foreach($tampil as $m): ?>
                                <option value="<?= $m['no_kk'] ?>"><?= $m['nama_kk'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('nokk','<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                            <label for="nik">Nik</label>
                            <input type="text" class="form-control" name="nik">
                            <?= form_error('nik','<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    

                    <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                        <select name="jk"  class="js-example-basic-single">
                            <option value=""></option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                        </select>
                        <?= form_error('jk','<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                        <div class="form-group">
                            <label for="tmplahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tmplahir">
                            <?= form_error('tmplahir','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="tgl">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl">
                            <?= form_error('tgl','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                    <div class="form-group">
                    <label for="agama">Agama</label>
                        <select name="agama" id="menu_id" class="js-example-basic-single">
                            <option value=""></option>
                                <option value="Katolik">Katolik</option>
                                <option value="Kristen/Protestan">Kristen/Protestan</option>
                                <option value="Islam">Islam</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                        </select>
                        <?= form_error('agama','<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
       <div class="form-group">
                    <label for="pend">Pendidikan</label>
                        <select name="pendidikan" id="pendidikan" class="js-example-basic-single">
                            <option value=""></option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="Sarjana(S1)">Sarjana(S1)</option>
                                <option value="Magister(S2)">Magister(S2)</option>
                                <option value="Doktor(S3)">Doktor(S3)</option>
                                <option value="Profesor">Profesor</option>
                        </select>
                        <?= form_error('pendidikan','<small class="text-danger pl-3">', '</small>'); ?>
                    </div>


                    <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" name="pekerjaan">
                            <?= form_error('pekerjaan','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>



                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>

                        

                    </div>
                </div>
                
        

            </div>
      <!-- End of Main Content -->
      </div>
    </div>
</div>