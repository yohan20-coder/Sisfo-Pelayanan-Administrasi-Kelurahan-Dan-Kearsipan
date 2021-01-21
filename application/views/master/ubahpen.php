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
                        <form action="?= base_url();?>master/ubahpen/<?= $ubah['id'] ?>" method="post">

                        <input type="hidden" class="form-control" name="id" value="<?= $ubah['id'] ?>">

                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" value="<?= $ubah['nama'] ?>">
                            <?= form_error('nama','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                    <div class="form-group">
                    <label for="nokk">Nama Kepala Keluarga</label>
                        <select name="nokk"  class="js-example-basic-single">
                            <option value=""></option>
                            <?php foreach($tampil as $m): ?>
                                <option value="<?= $m['no_kk'] ?>"
                                <?php if($m['no_kk'] == $ubah['no_kk']){
                                    echo 'selected';
                                    }?>
                                ><?= $m['nama_kk'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('nokk','<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                            <label for="nik">Nik</label>
                            <input type="text" class="form-control" name="nik" value="<?= $ubah['nik'] ?>">
                            <?= form_error('nik','<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    

                    <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select name="jk"  class="js-example-basic-single">
                            <option value=""></option>
                            <option value="Laki-Laki" <?php if($ubah['jk']=='Laki-Laki'){echo "selected";} ?>>Laki-Laki</option>
                            <option value="Perempuan" <?php if($ubah['jk']=='Perempuan'){echo "selected";} ?>>Perempuan</option>
                        </select>
                        <?= form_error('jk','<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                        <div class="form-group">
                            <label for="tmplahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tmplahir" value="<?=$ubah['tempatla']?>">
                            <?= form_error('tmplahir','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="tgl">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl" value="<?= $ubah['tglah'] ?>">
                            <?= form_error('tgl','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                    <div class="form-group">
                    <label for="agama">Agama</label>
                        <select name="agama" class="js-example-basic-single">
                            <option value=""></option>
                                <option value="Katolik" <?php if($ubah['agama']=='Katolik'){echo "selected";} ?>>Katolik</option>
                                <option value="Kristen/Protestan" <?php if($ubah['agama']=='Kristen/Protestan'){echo "selected";} ?>>Kristen/Protestan</option>
                                <option value="Islam" <?php if($ubah['agama']=='Islam'){echo "selected";} ?>>Islam</option>
                                <option value="Hindu" <?php if($ubah['agama']=='Hindu'){echo "selected";} ?>>Hindu</option>
                                <option value="Budha" <?php if($ubah['agama']=='Budha'){echo "selected";} ?>>Budha</option>
                                <option value="Konghucu" <?php if($ubah['agama']=='Konghucu'){echo "selected";} ?>>Konghucu</option>
                        </select>
                        <?= form_error('agama','<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                    <label for="pend">Pendidikan</label>
                        <select name="pendidikan" id="menu_id" class="js-example-basic-single">
                            <option value=""></option>
                                <option value="SD" <?php if($ubah['pend']=='SD'){echo "selected";} ?>>SD</option>
                                <option value="SMP" <?php if($ubah['pend']=='SMP'){echo "selected";} ?>>SMP</option>
                                <option value="SMA" <?php if($ubah['pend']=='SMA'){echo "selected";} ?>>SMA</option>
                                <option value="Sarjana(S1)" <?php if($ubah['pend']=='Sarjana(S1)'){echo "selected";} ?>>Sarjana(S1)</option>
                                <option value="Magister(S2)" <?php if($ubah['pend']=='Magister(S2)'){echo "selected";} ?>>Magister(S2)</option>
                                <option value="Doktor(S3)" <?php if($ubah['pend']=='Doktor(S3)'){echo "selected";} ?>>Doktor(S3)</option>
                                <option value="Profesor" <?php if($ubah['pend']=='Profesor'){echo "selected";} ?>>Profesor</option>
                        </select>
                        <?= form_error('pendidikan','<small class="text-danger pl-3">', '</small>'); ?>
                    </div>


                    <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" name="pekerjaan" value="<?= $ubah['pekerjaan'] ?>">
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