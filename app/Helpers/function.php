<?php
use Gloudemans\Shoppingcart\Facades\Cart;
function ktraSLT($t,$id){
	$stock = $t;
	$idPro = $id;
	$sessionCart = Cart::content();
	$tam ='';
	foreach ($sessionCart as $key => $value) {
		if ($idPro==$value->id) {
			$tam=$value->qty;
		}
	}
	return $tam;
}