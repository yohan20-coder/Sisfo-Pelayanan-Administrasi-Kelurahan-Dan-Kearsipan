 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function(){
      var time = 5000;
      setTimeout(function(){
        $("#daftar").modal("show")
      }, time);

      //refresh otomatis
        setInterval(function(){
          $("#daftar").modal("show")
        }, 30000);
    });
  </script>
  <script src="<?= base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/');?>js/sb-admin-2.min.js"></script>

</body>

</html>
