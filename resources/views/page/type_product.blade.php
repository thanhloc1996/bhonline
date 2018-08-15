    @extends('layout');
    @section('content');
    <div class="inner-header">
		<div class="container">
			<div class="pull-left">
			<h6 class="inner-title">Sản phẩm {{$loai_sp->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
				<a href="{{route('index')}}">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loai as $l)
						<li><a href="{{route('type_product',$l->id)}}">{{$l->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản Phẩm Mới</h4>
							<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($sp_theoloai)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sp_theoloai as $sp)
								<div class="col-sm-4">
									<div class="single-item">
										@if($sp->promotion_price!=0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
										<a href="{{route('product',$sp->id)}}"><img src="source/image/product/{{$sp->image}}" alt="" height="230px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp->name}}</p>
											<p class="single-item-price" style="font-size: 18px">
												@if($sp->promotion_price !=0)
													<span class="flash-del">{{number_format($sp->unit_price)}} đồng</span>
													<span class="flash-sale">{{number_format($sp->promotion_price)}} đồng</span>
													@else
													<span class="flash-sale">{{number_format($sp->unit_price)}} đồng</span>
													@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach

							</div>
							<div class="row" align="center">{{$sp_theoloai->links()}}</div>
						</div>
							
						<div class="space50">&nbsp;</div>
						</div> <!-- .beta-products-list -->

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_khac)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_khac as $khac)
								<div class="col-sm-4">
									<div class="single-item">
										@if($khac->promotion_price!=0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
										<a href="{{route('product',$khac->id)}}"><img src="source/image/product/{{$khac->image}}" alt=""height="230px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$khac->name}}</p>
											<p class="single-item-price" style="font-size: 18px">
												@if($khac->promotion_price !=0)
													<span class="flash-del">{{number_format($khac->unit_price)}} đồng</span>
													<span class="flash-sale">{{number_format($khac->promotion_price)}} đồng</span>
													@else
													<span class="flash-sale">{{number_format($khac->unit_price)}} đồng</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							
						<div class="row" align="center">{{$sp_khac->links()}}</div>
						
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection