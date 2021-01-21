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
                        <form action="<?= base_url();?>master/ubahpeg/<?= $ubah['id'] ?>" method="post">

                        <input type="hidden" name="id" value="<?= $ubah['id'];?>">

                        <div class="form-group">
                            <label for="nama">Nama Pegawai (sertakan dengan gelar)</label>
                            <input type="text" class="form-control" name="nama" value="<?= $ubah['nama'];?>">
                            <?= form_error('nama','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="nip">Nip</label>
                            <input type="text" class="form-control" name="nip" value="<?= $ubah['nip'];?>">
                            <?= form_error('nip','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                   

                    <div class="form-group">
                    <label for="nip">Jenis Kelamin</label>
                        <select name="jk" id="menu_id" class="form-control">
                            <option value="">Pilih</option>
                            <option value="Laki-Laki" <?php if($ubah['jk']=='Laki-Laki'){echo "selected";} ?>>Laki-Laki</option>
                            <option value="Perempuan" <?php if($ubah['jk']=='Perempuan'){echo "selected";} ?>>Perempuan</option>
                        </select>
                        <?= form_error('jk','<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                            <label for="golongan">Golongan</label>
                            <input type="text" class="form-control" name="golongan" value="<?= $ubah['golongan'] ?>">
                            <?= form_error('golongan','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="jabatan">Jabatan(Harap Jabatan Jangan Disingkat)</label>
                            <input type="text" class="form-control" name="jabatan" value="<?= $ubah['jabatan'];?>">
                            <?= form_error('jabatan','<small class="text-danger pl-3">', '</small>'); ?>
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