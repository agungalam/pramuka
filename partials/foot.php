<footer style="background-color: rgb(0,0,0); text-align:center;padding:15px;color:white;">
  AS Copyright &copy; Pramuka Kwaran Ibun
</footer>
</body>

<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->

<!-- JQUERY SCRIPTS -->
<script src="<?php echo $assets; ?>assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="<?php echo $assets; ?>assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="<?php echo $assets; ?>assets/js/jquery.metisMenu.js"></script>
<!-- MORRIS CHART SCRIPTS -->
<!-- <script src="<?php echo $assets; ?>assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="<?php echo $assets; ?>assets/js/morris/morris.js"></script> -->
<script src="<?php echo $assets; ?>assets/js/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo $assets; ?>assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
  function dataTables() {
    if ($.fn.DataTable.isDataTable("#dataTables-example")) {
        $("#dataTables-example").DataTable().destroy(); // Hapus DataTables
        console.log('didestroy datatables')
    }
    $('#dataTables-example').dataTable({
      "destroy": true, // Pastikan bisa diinisialisasi ulang
      "processing": true,
    });
  }
</script>


</body>

</html>