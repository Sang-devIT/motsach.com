@extends('admin.app')
@section('title')
Dashboard
@endsection

@section('content')
<div class="container-fluid py-4 position-relative" style="z-index: 1;">
  
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Doanh thu hôm nay</p>
                    <h5 class="font-weight-bolder mb-0">
                     {{number_format($sum,0,',',',')}} VNĐ
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Lượt user đăng ký</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $countUser }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Đơn hàng hôm nay</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $count }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Lợi nhuận hôm nay</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{number_format($sumMoney,0,',',',')}} VNĐ
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row my-3">
        <div class="card">
          <div class="card-header pb-0">
            <h5>Thống kê doanh thu</h5>
          </div>
          <div class="card-body">
            <form autocomplete="off">
              @csrf
                <div class="row">
                  <div class="col-lg-3">
                    <p class="mb-0">Từ ngày:<input type="text" id="datepicker" class="form-control"></p>
                  </div>
                  <div class="col-lg-3">
                    <p class="mb-0">Đến ngày:<input type="text" id="datepicker2" class="form-control"></p>
                  </div>
                  {{-- <div class="col-lg-3">
                    <p class="mb-0">Lọc theo:
                      <select name="" id="" class="dashboard-filter form-control">
                        <option>--- Chọn theo ---</option>
                        <option value="thang">Theo Tháng</option>
                        <option value="nam">Theo Năm</option>
                      </select>
                    </p>
                  </div> --}}
                  <div class="col-lg-3">
                    <p class="mb-0 mt-4">
                      <input type="text" class="btn btn-info click-dashboard" value="Thống kê">
                  </div>
                </div>
            </form>
            <div id="myfirstchart" style="height: 250px;"></div>
          </div>
        </div>
      </div>
    </div>
    
 @endsection
 @push('scripts')
  <script  type="text/javascript">
    $("document").ready(function() {
      var options = {
          series: [{
          name: 'Doanh thu',
          data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
          name: 'Lợi nhuận',
          data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }, {
          name: 'Tổng chi',
          data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
        }],
          chart: {
          type: 'bar',
          height: 500
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '60%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'],
        },
        yaxis: {
          title: {
            text: 'Biểu đồ thống kê',
            magrin: 10,
            style:{
              fontSize: '20px'
            }
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return  val + " VNĐ"
            }
          }
        }
        };
        var chart = new ApexCharts(document.querySelector("#myfirstchart"), options);
        chart.render();

       $('.click-dashboard').click(function () { 
        // alert('lex');
        var _token = $('input[name="_token"]').val();
        var toDate = $('#datepicker').val();
        var fromDate = $('#datepicker2').val();
        $.ajax({
          url: "/admin/statistics-by-date",
          method: "POST",
          dataType: "JSON",
          data: {toDate:toDate,fromDate:fromDate,_token:_token},
          success: function (data) {
            // dd(data);
            chart.setData(data);
          }
        });
      });
      $( "#datepicker" ).datetimepicker({
        timepicker:false,
        format:'Y-m-d'
      });
      $( "#datepicker2" ).datetimepicker({
        timepicker:false,
        format:'Y-m-d'
      });
    });
  </script>
 @endpush