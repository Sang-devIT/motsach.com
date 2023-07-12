<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('backend/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('backend/img/favicon.png')}}">
  <title>
    Dashboard motsach.com
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  {{-- <link href="{{asset('backend/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('backend/fontawesome512/all.css')}}" rel="stylesheet" />
  <link href="{{asset('backend/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" />
  <link href="{{asset('backend/css/icons.min.css')}}" rel="stylesheet" /> --}}
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  {{-- <link href="{{asset('backend/img/css/nucleo-svg.css')}}" rel="stylesheet" /> --}}
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('backend/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('backend/css/soft-ui-dashboard.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('css/select2.css')}}">
  <link rel="stylesheet" href="{{asset('css/jquery.datetimepicker.css')}}">
  <link rel="stylesheet" href="{{asset('css/apexcharts.css')}}">
</head> 

<body class="g-sidenav-show  bg-gray-100">
        
        @include('admin.partials.sidebar')
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('admin.partials.header')
        @yield('content')
        </main>


        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('backend/js/soft-ui-dashboard.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>

  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> --}}
    <!--   Core JS Files   -->
  <script src="{{asset('backend/js/core/popper.min.js')}}"></script>
  <script src="{{asset('backend/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('backend/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('backend/js/plugins/smooth-scrollbar.min.js')}}"></script>
  {{-- <script src="{{asset('backend/js/plugins/chartjs.min.js')}}"></script> --}}
  
  <script src="{{asset('backend/js/app.js')}}"></script>
  <script src="{{asset('backend/libs/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('backend/libs/feather-icons/feather.min.js')}}"></script>
  <script src="{{asset('js/select2.js')}}"></script>
  <script src="{{asset('js/jquery.datetimepicker.full.min.js')}}"></script>
  {{-- <script src="{{asset('js/apexcharts.amd.js')}}"></script> --}}
  {{-- <script src="{{asset('js/apexcharts.common.js')}}"></script> --}}
  {{-- <script src="{{asset('js/apexcharts.esm.js')}}"></script> --}}
  <script src="{{asset('js/apexcharts.js')}}"></script>
  {{-- <script src="{{asset('js/morris.js')}}"></script> --}}
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> --}}
  {{-- <script src="{{asset('js/morris.min.js')}}"></script> --}}

  {{-- <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script> --}}
  
  <script type="text/javascript">
    $("document").ready(function() {
        setTimeout(function() {
            $(".close-flash_message").remove();
        }, 3000);
    });
  </script>
  <script>
    $(document).on('click','.btn-delete',function(){
      Swal.fire({
        title: 'Bạn có chắc chắn xóa?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok'
      }).then((result) => {
        if (result.isConfirmed) {
          var id = $(this).data('id');
          var type = $(this).data('type');
          window.location.href = type + '/destroy/'+ id;
          Swal.fire('Đã xóa!', '', 'success')
        }
      })
    });
  </script>
  
@stack('scripts')

</body>

</html>