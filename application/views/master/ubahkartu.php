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
                        <form action="<?= base_url();?>master/ubahkartu/<?= $ubah['id'] ?>" method="post">

                        <input type="hidden" name="id" value="<?= $ubah['id'];?>">

                        <div class="form-group">
                            <label for="nokk">No. Kartu Keluarga</label>
                            <input type="text" class="form-control" name="nokk" value="<?= $ubah['no_kk'];?>">
                            <?= form_error('nokk','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Pengguna</label>
                            <input type="text" class="form-control" name="nama" value="<?= $ubah['nama_kk'];?>">
                            <?= form_error('nama','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?= $ubah['alamat'];?>">
                            <?= form_error('alamat','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                    

                        <div class="form-group">
                            <label for="kelurahan">Kelurahan</label>
                            <input type="text" class="form-control" name="kelurahan" value="<?= $ubah['kelurahan'];?>">
                            <?= form_error('kelurahan','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="rtrw">RT/RW</label>
                            <input type="text" class="form-control" name="rtrw" value="<?= $ubah['rt/rw'];?>">
                            <?= form_error('rtrw','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">ubah</button>
                        </div>
                        </form>
                    </div>
                </div>
                
        

            </div>
      <!-- End of Main Content -->
      </div>
    </div>
</div>