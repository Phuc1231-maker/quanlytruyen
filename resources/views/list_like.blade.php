@extends('layouts.master')
@section('content')
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Danh sách yêu thích</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{ isset($new_products) ? count($new_products) : 0 }} sản phẩm yêu thích</p>
								<div class="clearfix"></div>
							</div>
							
							<div class="row">
								@isset($new_products)
									@foreach($new_products as $new_product)
										<div class="col-sm-3">
											<div class="single-item">
												@if($new_product->promotion_price != 0)
													<div class="ribbon-wrapper">
														<div class="ribbon sale">Sale</div>
													</div>
												@endif
												<div class="single-item-header">
													<a href="{{ route('product', $new_product->id) }}">
														<img src="/source/image/product/{{ $new_product->image }}" height="200em">
													</a>
												</div>
												<div class="single-item-body">
													<p class="single-item-title">{{ $new_product->name }}</p>
													<p class="single-item-price">
														@if($new_product->promotion_price != 0)
															<span class="flash-del" style="font-weight: bold;">{{ number_format($new_product->unit_price, 0, ".", ",") }}</span>
															<span class="flash-sale" style="font-weight: bold;">{{ number_format($new_product->promotion_price, 0, ".", ",") }} đồng</span>
														@else
															<span class="flash-sale" style="font-weight: bold;">{{ number_format($new_product->unit_price, 0, ".", ",") }} đồng</span>
														@endif
													</p>
												</div>
												<div class="single-item-caption">
													<a class="add-to-cart pull-left" href="{{ route('banhang.addToCart', $new_product->id) }}"><i class="fa fa-shopping-cart"></i></a>
													<a class="beta-btn primary" href="{{ route('product', $new_product->id) }}">Chi Tiết <i class="fa fa-chevron-right"></i></a>
													<a class="beta-btn primary" href="{{ route('list.xoayeuthich', $new_product->id) }}" onclick="event.preventDefault(); if (confirm('Bạn có muốn xóa sản phẩm khỏi danh sách không?')) document.getElementById('form-delete-{{ $new_product->id }}').submit();">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                    <form id="form-delete-{{ $new_product->id }}" action="{{ route('list.xoayeuthich', $new_product->id) }}" method="GET" style="display: none;">
                                                        @csrf
                                                    </form>
													
												</div>
											</div>
										</div>
									@endforeach
								@endisset
							</div> <!-- .beta-products-list -->						
						</div>
					</div>
				</div> <!-- end section with sidebar and main content -->
			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection

@section('js')
	<!--customjs-->
	<script src="/source/assets/dest/js/custom2.js"></script>
	<script>
		$(document).ready(function($) {    
			$(window).scroll(function(){
				if($(this).scrollTop() > 150){
					$(".header-bottom").addClass('fixNav')
				} else {
					$(".header-bottom").removeClass('fixNav')
				}
			});
		});
	</script>
@endsection
