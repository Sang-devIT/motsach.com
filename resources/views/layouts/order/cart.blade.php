@extends('layouts.app')

@section('content')
<div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Đơn hàng</h2>
        </div>
        <div class="card-body">
            @csrf
            <div class="table-responsive">
                <table class="table table-bordered m-0">
                  <thead>
                    <tr>
                      <!-- Set columns width -->
                      <th class="text-center py-3 px-4" style="min-width: 50%;">Tên Sản phẩm/thông tin</th>
                      <th class="text-right py-3 px-4" style="width: 20%;">Đơn giá</th>
                      <th class="text-center py-3 px-4" style="width: 10%;">Số lượng</th>
                      <th class="text-right py-3 px-4" style="width: 15%;">Giá</th>
                      <th class="text-center align-middle py-3 px-0" style="width: 5%;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $total = 0 ?>
                    @if(!count($orders))
                      <h5 style="font-size: 20px;font-style: italic;font-weight: bold;">Bạn chưa có sản phẩm trên giỏ hàng!!!!</h5>
                    @endif
                    @if(!empty($orders))
                      @foreach($orders as $item)
                      <?php $total += $item->price * $item->qty ?>
                        <tr>
                          <td class="p-4">
                            <div class="media align-items-center">
                                <div class="img-cart">
                                  <img src={{ asset('assets/images/upload/product/'.$item->options->photo) }} style="cursor: zoom-in;margin-right: 15px;" width="60px"/>
                                </div> 
                                <div class="media-body">
                                  <a href="#" class="d-block text-dark">{{ $item->name }}</a>
                                </div>
                            </div>
                          </td>
                          <td class="text-right font-weight-semibold align-middle p-4">{{ number_format($item->price,0,",",",") }} VNĐ</td>
                          <td class="align-middle p-4"><input type="number" min="1" class="form-control text-center qty_cart " data-price="{{ $item->price }}" data-rowid="{{ $item->rowId }}" data-id="{{ $item->id }}" data-sl="{{ $item->options->stock }}" name="qty[{{ $item->rowId }}]" value="{{ $item->qty }}" max="{{ $item->options->stock }}"></td>
                          <td class="text-right font-weight-semibold align-middle p-4 subtotal-{{ $item->id }}">{{ number_format($item->subtotal,0,",",",") }} VNĐ</td>
                          <td class="text-center align-middle px-0"><a href="{{ route('cart.delete',$item->rowId) }}" class="remove_cart shop-tooltip close float-none text-danger" title="" data-qty="{{ $item->qty }}" data-rowid="{{ $item->rowId }}" data-original-title="Remove">×</a></td>
                        </tr>
                      @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- / Shopping cart table -->
              
              <div class="d-flex flex-wrap justify-content-end align-items-center pb-4">
                <div class="d-flex">
                  <div class="text-right mt-4">
                    <label class="text-muted font-weight-normal m-0"></label>Tổng tiền</label>
                    <div class="text-large"><strong class="total">{{ number_format($total,0,",",",") }} VNĐ</strong></div>
                  </div>
                </div>
              </div>
              
              <div class="float-right d-flex justify-content-end">
                <a href="{{ route('index') }}"><button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Tiếp tục mua sắm</button></a>
                
                @if (count(Cart::content())>0)
                  <a href="{{ route('order.checkout') }}"><button type="button" class="btn btn-lg btn-primary mt-2">Thanh toán</button></a>
                @else
                <a style="opacity: 0.5;"><button type="button" class="btn btn-lg btn-primary mt-2">Thanh toán</button></a>
                @endif
              </div>
          </div>
      </div>
  </div>
 
 <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
      
      $('.qty_cart').change(function(){
        let id = $(this).data('id');
        let sltk = $(this).data('sl');
        let qty = parseInt($(this).val());
        let price = $(this).data('price');
        let rowid = $(this).data('rowid');
        let _token = $("input[name='_token']").val();
        if(qty > sltk){
          alert("Số lượng mua quá lớn so với tồn kho của sản phẩm!!!!");
          $(this).attr('value','sltk');
          return false;
        }
        $.ajax({
          url:"/cart/update_ajax",
          dataType:"JSON",
          method:"POST",
          data:{id:id,qty:qty,price:price,rowid:rowid,_token:_token},
          success: function(data){
            $(".subtotal-"+id).text(data.subtotal);
            $(".total").text(data.total);
            return false;
          },
          error: function(xhr, ajaxOptions, thrownError) {
              alert(xhr.status);
              alert(thrownError);
          }
        });
      });
    });
  </script>
@endsection