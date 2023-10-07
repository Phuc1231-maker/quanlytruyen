@extends('layouts.master')
@section('content')
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Tìm kiếm</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{ isset($product)?count($product):0 }} Sản Phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="row">                        
                        @foreach($product as $new)                       
                        <div class="col-sm-3">
                            <div class="single-item">
                            @if($new->promotion_price != 0)
                                <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                            @endif
                                <div class="single-item-header">
                                    <a href="{{ route('product', $new->id) }}"><img src="/source/image/product/{{ $new->image }}" height="200em"></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{ $new->name }}</p>
                                    <p class="single-item-price">
                                    @if($new->promotion_price != 0)
                                        <span class="flash-del" style="font-weight: bold;">{{ number_format($new->unit_price,0,".",",") }}</span>
                                        <span class="flash-sale" style="font-weight: bold;">{{ number_format($new->promotion_price,0,".",",") }} đồng</span>
                                    @else
                                        <span class="flash-sale" style="font-weight: bold;">{{ number_format($new->unit_price,0,".",",") }} đồng</span>
                                    @endif
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="{{ route('banhang.addToCart', $new->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{route('product', $new->id)}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>                                                                
                        @endforeach
                        
                        </div> <!-- .beta-products-list -->
                        
                    <div class="space50">&nbsp;</div>
                </div>
            </div> <!-- end section with sidebar and main content -->
        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection