<!-- jQuery 3 -->
<script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('/plugins/iCheck/icheck.min.js') }}"></script>
<!--Echart 3-->
<script src="{{ asset('bower_components/echarts3/js/echarts-all-3.js')}}"></script>
<script src="{{ asset('bower_components/echarts3/js/theme/vintage.js')}}"></script>
<script src="{{ asset('bower_components/echarts3/js/theme/dark.js')}}"></script>
<!-- Jquery Toast-->
<script src="{{ asset('bower_components/toast-master/js/jquery.toast.js')}}"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js')}}" charset="UTF-8"></script>
<!--DataTables. -->
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('bower_components/datatables.net/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('bower_components/datatables.net/js/buttons.flash.min.js')}}"></script>
<script src="{{ asset('bower_components/datatables.net/js/jszip.min.js')}}"></script>
<!-- <script src="{{ asset('bower_components/datatables.net/js/1/vfs_fonts.js')}}"></script>
<script src="{{ asset('bower_components/datatables.net/js/1/pdfmake.min.js')}}"></script>
<script src="{{ asset('bower_components/datatables.net/js/1/pdfmake.min.js.map')}}"></script> -->
<script src="{{ asset('bower_components/datatables.net/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('bower_components/datatables.net/js/buttons.print.min.js')}}"></script>

<!-- Bootstrap Form Validation -->
<script src="{{ asset('/js/validator.js') }}"></script>
<!-- Funciones reutilizables -->
<script src="{{ asset('/js/general.js') }}"></script>
@stack('scripts')
