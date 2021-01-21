<!-- Footer -->
<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Web Andi <?= date('Y');?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Anda Yakin Ingin Logout...!</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout');?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/');?>vendor/jquery/jquery.min.js"></script>


<script src="<?= base_url('assets/');?>select/dist/js/select2.min.js"></script>
      <script>
          $(document).ready(function(){
            $('.js-example-basic-single').select2({
              width: '100%',
              placeholder : 'Pilih'
            });
          });
      </script>
        <!-- <script>
          $(document).ready(function() {
              $('#pendidikan').select2({
                height: '200%',
                placeholder : 'Pilih Pendidikan',
                allowClear:true
              });
             
          $(window).resize(function(){
            $('.select2').css('width', "100%");
          });
          });
        </script> -->
<!-- Select2

<link href="<?= base_url('assets/');?>select/dist/js/select2.min.js" rel="stylesheet"> -->

  <script src="<?= base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/');?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/');?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/');?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- fancybox -->
  <script src="<?= base_url('assets/');?>fancybox/js/jquery.fancybox.js"></script>
  <script>
    $(document).ready(function(){
      $('.fancybox').fancybox();
    });
  </script>


  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/');?>js/demo/datatables-demo.js"></script>

  <!-- membuat fungsi jquery ajax untuk nangkap dan simpan data dari checked -->
  <script>

     $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });

    $('.form-check-input').on('click', function(){
      const menuid = $(this).data('menu');      //variabel utk nankap data id menu dan role_id
      const roleid = $(this).data('role');

      $.ajax({
        url : "<?= base_url('admin/ubahaccess') ?>",
        type :'post',
        data :{
          menuid:menuid,        //fungsi ajax ini bertugas mngirim parameter menuid dan role id ke function ubah access
          roleid:roleid
        },
        success:function(){
          document.location.href="<?= base_url('admin/roleaccess/') ?>" + roleid;
        }
      })
    })
  </script>

<!-- chain dropdown pegawai -->
<script>
    $(document).ready(function(){
      $('#nama').change(function(){
        var id = $(this).val();
        $.ajax({
          url : "<?= base_url();?>/layanan/get_pej",
          method : "POST",
          dataType : "JSON",
          data : {
               id : id
          },
          success: function(array){
            var nip = '';
            var nama2 = '';
            var golongan ='';
            var jabatan ='';
            for(let index = 0; index < array.length; index++){
              nip += "<option>" + array[index].nip + "</option>"
              nama2 += "<option>" + array[index].nama + "</option>"
              golongan += "<option>" + array[index].golongan + "</option>"
              jabatan += "<option>" + array[index].jabatan + "</option>"
            }
            $('#nip').html(nip);
            $('#nama2').html(nama2);
            $('#golongan').html(golongan);
            $('#jabatan').html(jabatan);
          }

        })
      })
    })
</script>

<!-- chain dropdown penduduk -->
<script>
    $(document).ready(function(){
      $('#penduduk').change(function(){
        var id = $(this).val();
        $.ajax({
          url : "<?= base_url();?>/layanan/get_pen",
          method : "POST",
          dataType : "JSON",
          data : {
               id : id
          },
          success: function(array){
            var nik = '';
            var napen = '';
            var jk ='';
            var tlah ='';
            var tglah ='';
            var agama = '';
            for(let index = 0; index < array.length; index++){
              nik += "<option>" + array[index].nik + "</option>"
              napen += "<option>" + array[index].nama + "</option>"
              jk += "<option>" + array[index].jk + "</option>"
              tlah += "<option>" + array[index].tempatla + "</option>"
              tglah += "<option>" + array[index].tglah + "</option>"
              agama += "<option>" + array[index].agama + "</option>"
            }
            $('#nik').html(nik);
            $('#napen').html(napen);
            $('#jk').html(jk);
            $('#tlah').html(tlah);
            $('#tglah').html(tglah);
            $('#agama').html(agama);
          }

        })
      })
    })
</script>


</body>

</html>