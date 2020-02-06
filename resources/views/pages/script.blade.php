
<script src="{{ asset('jQuery-printPage-plugin-master/jquery.printPage.js') }}"></script>
<script src="{{ asset('customAssets/js/jquery.js') }}"></script>
<script src="{{ asset('customAssets/js/jquery.min.js') }}"></script>
<!-- jQuery -->
<script src="{{ asset('customAssets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('customAssets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('customAssets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('customAssets/plugins/moment/moment.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('customAssets/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('customAssets/dist/js/demo.js') }}"></script>
<script src="{{ asset('customAssets/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('customAssets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>