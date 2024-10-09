<!-- Coding by CodingLab | www.codinglabweb.com -->
<!DOCTYPE html>
<html lang="en">
    @include('components.dashboard.header')
<body>


  <div id="wrapper">
    <div>
        @include('components.dashboard.sidebar')
    </div>
    <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('components.dashboard.navbar')
        @yield('content')
    </div>
  </div>
  </div>


 

     <!-- Bootstrap core JavaScript-->
     <script src="{{asset('asset/css/jquery/jquery.min.js')}}"></script>
     <script src="{{asset('asset/css/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
 
 
     <!-- Core plugin JavaScript-->
 
     <script src="{{asset('asset/css/jquery-easing/jquery.easing.min.js')}}"></script>
 
     <!-- Custom scripts for all pages-->
 
     <script src="{{asset('asset/js/sb-admin-2.min.js')}}"></script>
 
     <!-- Page level plugins -->
     <script src="{{asset('asset/css/chart.js/Chart.min.js')}}"></script>
 
     <!-- Page level custom scripts -->
     <script src="{{asset('asset/js/demo/chart-area-demo.js')}}"></script>
     <script src="{{asset('asset/js/demo/chart-pie-demo.js')}}"></script>
    <!-- summernote js links-->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> 
    <script>
      $(document).ready(function() {
          $("#MySummernote").summernote({
            height:250,
          });
          $('.dropdown-toggle').dropdown();
      });
  </script>
  <script>
    let table = new DataTable('#myTable');
  </script>
  @yield('scripts')
</body>
</html>