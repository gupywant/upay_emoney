  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{URL::asset('/assets_admin/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{URL::asset('/assets_admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="{{URL::asset('/assets_admin/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{URL::asset('/assets_admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{URL::asset('/assets_admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{URL::asset('/assets_admin/vendor/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{URL::asset('/assets_admin/vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{URL::asset('/assets_admin/js/argon.js?v=1.2.0')}}"></script>
  <script src="{{URL::asset('/assets_admin/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script src="{{URL::asset('assets_admin/vendor/dropzone/dist/min/dropzone.min.js')}}"></script>
  @if(!empty($select))
    <script type="text/javascript">
      $(document).ready(function() {
        $('.select2').select2();
        $('.select3').select2();
      });
    </script>
  @endif
  @if(!empty($table))
    <script type="text/javascript">
      $(document).ready( function () {
        $('#myTable').DataTable();
    } );
    </script>
  @endif
</body>

</html>