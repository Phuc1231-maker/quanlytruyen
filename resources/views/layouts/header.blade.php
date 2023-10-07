<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-user"></i>@if(Auth::check())
                        Welcome, {{ Auth::user()->full_name }}!
                        @endif</a></li>
                    {{-- <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-user"></i>Administrator</a></li> --}}
                    {{-- <li><a href="/admin/category/danhsach"><i class="fa fa-user"></i>Administrator</a></li> --}}
                    <li><a href="/dangky">Đăng kí</a></li>
                    <li><a href="/dangnhap">Đăng nhập</a></li>
                    <form action="{{ route('getLogout') }}" method="POST">
                        @csrf
                        <button type="submit" style="border:none; margin-top:15px; font-size:20px" title="Đăng xuất"><i class="fa fa-sign-out"></i></button>
                    </form>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="/" id="logo"><img src="/source/image/logo/Logo-cake.png" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="/">
                        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    <div class="cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{ Session('cart')->totalQty }}
                            @else Trống @endif)<i class="fa fa-chevron-down"></i>
                        </div>
                        <div class="beta-dropdown cart-body">
                            @isset($productCarts)
                            @foreach($productCarts as $cart)
                            <div class="cart-item">
                                <a href="{{ route('banhang.xoagiohang', $cart['item']['id']) }}" class="cart-item-delete">
                                    <i class="fa fa-times"></i>
                                </a>
                                <div class="media">
                                    <a class="pull-left" href="#"><img src="/source/image/product/{{ $cart['item']->image }}" alt=""></a>
                                    <div class="media-body">
                                        <span class="cart-item-title">{{ $cart['item']->name }}</span>
                                        <span class="cart-item-amount">{{ $cart['qty'] }}*<span>{{ $cart['item']->promotion_price != 0?number_format($cart['item']->promotion_price,0):
                                        number_format($cart['item']->unit_price, 0) }}</span></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endisset

                            {{-- <div class="cart-item">
                                <div class="media">
                                    <a class="pull-left" href="#"><img src="/source/assets/dest/images/products/cart/2.png" alt=""></a>
                                    <div class="media-body">
                                        <span class="cart-item-title">Sample Woman Top</span>
                                        <span class="cart-item-options">Size: XS; Colar: Navy</span>
                                        <span class="cart-item-amount">1*<span>$49.50</span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="cart-item">
                                <div class="media">
                                    <a class="pull-left" href="#"><img src="/source/assets/dest/images/products/cart/3.png" alt=""></a>
                                    <div class="media-body">
                                        <span class="cart-item-title">Sample Woman Top</span>
                                        <span class="cart-item-options">Size: XS; Colar: Navy</span>
                                        <span class="cart-item-amount">1*<span>$49.50</span></span>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{ isset($totalPrice)?number_format($totalPrice,0):0 }}</span></div>
                                <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="{{ route('banhang.getdathang') }}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .cart -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li><a href="/product"> Loại Sản phẩm</a>
                        <ul class="sub-menu">
                            @if(isset($loai_sp))
                                @foreach ($loai_sp as $types)
                                <li><a href="{{route('product_type',$types ->id)}}">{{ $types->name }}</a></li>
                                @endforeach
                            @else
                                <p>Không có dữ liệu loại sản phẩm.</p>
                            @endif
                            {{-- <li><a href="product_type.html">Sản phẩm 1</a></li>
                            <li><a href="product_type.html">Sản phẩm 2</a></li>
                            <li><a href="product_type.html">Sản phẩm 4</a></li> --}}
                        </ul>
                    </li>
                    <li><a href="/about">Giới thiệu</a></li>
                    <li><a href="/lienhe">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->