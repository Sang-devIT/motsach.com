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
                      <i class="fas fa-coins"></i>
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
                    <i class="far fa-user"></i>
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
                    <i class="fas fa-box"></i>
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
                    <i class="fas fa-wallet"></i>
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
                  <div class="col-lg-3">
                    <p class="mb-0">Lọc theo:
                      <select name="" id="" class="dashboard-filter form-control">
                        <option>--- Chọn theo ---</option>
                        <option value="thangtruoc">Tháng trước</option>
                        <option value="tuan">Theo tuần</option>
                        <option value="thang">Tháng này</option>
                        <option value="nam">Theo Năm</option>
                      </select>
                    </p>
                  </div>
                  <div class="col-lg-3">
                    <p class="mb-0 mt-4">
                      <input type="text" class="btn btn-info click-dashboard click-dashboard-1" value="Thống kê">
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
      // var options = {
      //     series: [{
      //       name: "Doanh thu",
      //       data: [10, 41, 35, 51, 49, 62, 69, 91, 148,41, 35, 51, 49, 62, 69, 91, 148]
      //     },{
      //       name: "Lợi nhuận",
      //       data: [34, 54, 23, 75, 78, 62, 8, 91, 148,4, 54, 23, 75, 78, 62, 8, 91, 148]
      //     },{
      //       name: "Tổng chi",
      //       data: [10, 5, 35, 85, 49, 62, 5, 91, 148,10, 5, 35, 85, 49, 62, 5, 91, 148]
      //     }
      //   ],
      //     chart: {
      //     height: 500,
      //     type: 'line',
      //     zoom: {
      //       enabled: false
      //     }
      //   },
      //   dataLabels: {
      //     enabled: false
      //   },
      //   stroke: {
      //     curve: 'straight'
      //   },
      //   title: {
      //     text: 'Biểu đồ thống kê',
      //     align: 'center'
      //   },
      //   grid: {
      //     row: {
      //       colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
      //       opacity: 0.5
      //     },
      //   },
      //   xaxis: {
      //     categories: ['Ngày 1','Ngày 2', 'Ngày 3', 'Ngày 4', 'Ngày 5', 'Ngày 6', 'Ngày 7', 'Ngày 8', 'Ngày 9', 'Ngày 10','Ngày 11','Ngày 12','Ngày 13','Ngày 14', 'Ngày 15', 'Ngày 16', 'Ngày 17', 'Ngày 18', 'Ngày 19', 'Ngày 20', 'Ngày 21', 'Ngày 22','Ngày 23','Ngày 24','Ngày 25','Ngày 26','Ngày 27','Ngày 28','Ngày 29','Ngày 30','Ngày 31'],
      //   }
      //   };

      //   var chart = new ApexCharts(document.querySelector("#myfirstchart"), options);
      //   chart.render();
      var options = {
          series: [{
          name: 'Doanh thu',
          data: []
        }, {
          name: 'Lợi nhuận',
          data: []
        }, {
          name: 'Tổng chi',
          data: []
        }],
          chart: {
          type: 'bar',
          height: 500
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '80%',
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
          categories: ['Ngày 1','Ngày 2', 'Ngày 3', 'Ngày 4', 'Ngày 5', 'Ngày 6', 'Ngày 7', 'Ngày 8', 'Ngày 9', 'Ngày 10','Ngày 11','Ngày 12','Ngày 13','Ngày 14', 'Ngày 15', 'Ngày 16', 'Ngày 17', 'Ngày 18', 'Ngày 19', 'Ngày 20', 'Ngày 21', 'Ngày 22','Ngày 23','Ngày 24','Ngày 25','Ngày 26','Ngày 27','Ngày 28','Ngày 29','Ngày 30','Ngày 31'],
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
      // if(isExist($('.dashboard-filter'))){
      //   $('.click-dashboard-1').click(function () {
      //     alert('aaaa');
      //    });
      // }
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
          success: function (response) {
            chart.updateOptions({
              xaxis: {
                categories: response.dateChon
              },
              series: [{
                        data: response.sumOrder
              },{
                        data: response.sumTotal
              },{
                data: response.sumImport
              }],
            });
          }
        });
      });
      $('.dashboard-filter').change(function () { 
        var filter = $(this).val();
        var _token = $("input[name='_token']").val();
        $.ajax({
          url: "/admin/statistics-by-month",
          method: "POST",
          dataType: "JSON",
          data: {filter:filter,_token:_token},
          success: function (response) {
            chart.updateOptions({
              xaxis: {
                categories: response.dateChon
              },
              series: [{
                        data: response.sumOrder
              },{
                        data: response.sumTotal
              },{
                data: response.sumImport
              }],
            });
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