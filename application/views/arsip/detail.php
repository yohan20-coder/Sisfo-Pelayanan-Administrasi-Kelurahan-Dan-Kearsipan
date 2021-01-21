<!-- Begin Page Content -->
<div class="container-fluid">
              <!-- Basic Card Example -->
              <div class="card shadow">
                <div class="card-header py-3 mb-4">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $judul;?></h6>
                </div>

<div class="container row">

<!-- Border Left Utilities -->
<div class="col-lg-12">

  <div class="card mb-4 py-3 border-left-primary border-bottom-primary">
    <div class="card-body">

    <form action="" method="post">
          <input type="hidden" name="id" value="<?= $ubah['id'];?>">
    
    <div class="form-group row">
                <label for="menu" class="col-sm-2 col-form-label">No.Surat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nosurat" value="<?= $ubah['nosurat'];?>" readonly>
                  <?= form_error('nosurat','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>

              <div class="form-group row">
                <label for="menu" class="col-sm-2 col-form-label">No.Klasifikasi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="klasi" value="<?= $ubah['noklasi'];?>" readonly>
                  <?= form_error('klasi','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>

         	    <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Tanggal Surat</label>
         				<div class="col-sm-10">
                   <input type="date" class="form-control" name="tglmasuk" value="<?= $ubah['tglsurat'];?>" readonly>
                   <?= form_error('tglmasuk','<small class="text-danger pl-3">', '</small>'); ?>
         				</div>
         			</div>

                <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Tanggal diterimah</label>
         				<div class="col-sm-10">
                   <input type="date" class="form-control" name="tgltrima" value="<?= $ubah['tglteri'];?>" readonly>
                   <?= form_error('tgltrima','<small class="text-danger pl-3">', '</small>'); ?>
         				</div>
         			</div>

                     <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Perihal</label>
         				<div class="col-sm-10">
                   <input type="text" class="form-control" name="perihal" value="<?= $ubah['perihal'];?>" readonly>
                   <?= form_error('perihal','<small class="text-danger pl-3">', '</small>'); ?>
         				</div>
         			</div>

                     <div class="form-group row">
                        <label for="ringkas" class="col-sm-2 col-form-label">Isi Ringkasan Surat</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="ringkas" rows="4" readonly><?= $ubah['isi'];?></textarea>
                        <?= form_error('ringkas','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

										<div class="form-group row">
                        <label for="ringkas" class="col-sm-2 col-form-label">Disposisi</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="dispos" rows="4" readonly><?= $ubah['disposisi'];?></textarea>
                        <?= form_error('dispos','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

              <div class="form-group row">
         				<label for="menu" class="col-sm-2 col-form-label">Asal Instansi</label>
         				<div class="col-sm-10">
                   <input type="text" class="form-control" name="instansi" value="<?= $ubah['instansi'];?>" readonly>
                   <?= form_error('instansi','<small class="text-danger pl-3">', '</small>'); ?>
         				</div>
         			</div>

               <div class="form-group row ml-auto">
                            <div class="col-sm-10">
                            <a href="<?= base_url();?>arsip/edit/<?= $ubah['id'] ?>" class="btn btn-success">Edit</a>
                            </div>
                         </div>


    </div>
  </div>

  

</div>


</div>

</div>
<!-- /.container-fluid -->
</div>