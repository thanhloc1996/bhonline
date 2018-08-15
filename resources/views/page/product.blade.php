@extends('layout');
@section('content');
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
			<h6 class="inner-title">Sản Phẩm {{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
				<a href="{{route('index')}}.">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="source/image/product/{{$sanpham->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
							<p class="single-item-title"><h2>{{$sanpham->name}}</h2></p> 
								<p class="single-item-price">
								@if($sanpham->promotion_price !=0)
									<span class="flash-del"><br>{{number_format($sanpham->unit_price)}} đồng</br></span>
									<span class="flash-sale"><br>{{number_format($sanpham->promotion_price)}} đồng</br></span>
									@else
									<span class="flash-sale"><br>{{number_format($sanpham->unit_price)}} đồng</br></span>
								@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
							<p>{{$sanpham->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Số lượng:</p>
							<div class="single-item-options">
								<select class="wc-select" name="color">
									<option>Qty</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="{{route('addtocart',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description"><h6>Mô tả</h6></a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$sanpham->description}}</p>
						</div>

					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm khác</h4>
						
						<div class="row">
							@foreach($sp_tt as $tt)
							<div class="col-sm-4">
								<div class="single-item">
										@if($tt->promotion_price!=0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
									<div class="single-item-header">
									<a href="{{route('product',$tt->id)}}"><img src="source/image/product/{{$tt->image}}" alt="" height="230px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$tt->name}}</p>
										<p class="single-item-price" style="font-size: 18px">
												@if($tt->promotion_price==0)
												<span class="flash-sale">{{number_format($tt->unit_price)}} đồng</span>
												@else
												<span class="flash-del">{{number_format($tt->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($tt->promotion_price)}} đồng</span>
												@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row" align="center">{{$sp_tt->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản phẩm giảm giá</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($sp_gg as $gg)
								
								<div class="media beta-sales-item">
									
									<a class="pull-left" href="{{route('product',$gg->id)}}"><img src="source/image/product/{{$gg->image}}" alt=""></a>
									
									<div class="media-body">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										{{$gg->name}}
										<span class="beta-sales-price">{{number_format($gg->promotion_price)}} đồng</span>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->

				</div>
			</div>
		</div> <!-- #content -->
    </div> <!-- .container -->
@endsection
