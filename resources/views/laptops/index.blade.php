@extends('layouts.app')

@section('content')
<!-- header -->
<div class="header_bg">
   <div class="container">
   @if (count($errors) > 0)
   <div class="alert alert-danger" role="alert" >
       <h5>Oh snap! <b>Change a few things up</b> and try submitting again!</h5>

       @foreach ($errors->all() as $message)

           <li>{{ $message }}</li>

       @endforeach
   </div>
   @endif

    @if(Session::has('flash_message'))

       <div class="alert-message alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
           @if(Session::has('flash_message_important'))

           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

           @endif

           {{ session('flash_message') }}

       </div>

       @endif

	<div class="header">
	  <div class="head-t">
		 <div class="logo">
			  <a href="index.html"><h1>{{$category_name}} <span>Shelf </span></h1> </a>
		  </div>
		  <div class="header_right">
			<div class="cart box_1">
				<a href="checkout.html">
				<div class="total">
					<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
				</a>
				<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
				<!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                  View Cart
                </button>
				<!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                      </div>
                      <div class="modal-body">
                      				<div class="simpleCart_items"></div>

                      				<form class="form-horizontal" role="form" method="POST">

                                                            {!! csrf_field() !!}

                                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                                <label class="col-md-4 control-label">Name</label>

                                                                <div class="col-md-6">
                                                                    <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">

                                                                    @if ($errors->has('name'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('name') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                                                <label class="col-md-4 control-label">Phone Number</label>

                                                                       <div class="col-md-6">
                                                                <input type="text" id="phone_number" class="form-control" name="phone_number" value="{{ old('phone_number') }}">
                                                                      @if ($errors->has('phone_number'))
                                                                           <span class="help-block">
                                                                              <strong>{{ $errors->first('phone_number') }}</strong>
                                                                           </span>
                                                                      @endif

                                                                </div>
                                                            </div>

                                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                                <label class="col-md-4 control-label">Email</label>

                                                                <div class="col-md-6">
                                                                    <input type="email" id="email" class="form-control" name="email">

                                                                    @if ($errors->has('email'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('email') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
                                                                <label class="col-md-4 control-label">Town</label>

                                                                <div class="col-md-6">
                                                                    <input type="text" id="town" class="form-control" name="town">

                                                                    @if ($errors->has('town'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('town') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>



                                                            <div class="form-group">
                                                                <div class="col-md-6 col-md-offset-4">
                                                                    <a href="javascript:;" class="simpleCart_checkout btn btn-sm btn-primary"><span class="checkout_btn">Send Order</span></a
                                                                </div>
                                                            </div>
                                                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"></div>
	    </div>

	    <!--start-header-menu-->
        		<ul class="megamenu skyblue">
        			<li class="active grid"><a class="color1" href="{{ url('/')}}">Home</a></li>

        			@if($categories->count())
        			@foreach($categories as $category)
        			<li>

        			<a class="color2" href="{{ url('category/'. $category->id)}}">{{$category->category_name}}</a>


        		    </li>
        		    @endforeach
        		    @endif
        	</ul>
        	</div>
        </div>
        </div>
         <!--start-content-->

<!--products-->
	<div class="products">
		<div class="container">
			<div class="products-grids">
				<div class="col-md-8 products-grid-left">
					<div class="products-grid-lft">

					@if($products->count())
                        @foreach($products as $product)
						<div class="products-grd">
							<div class="p-one simpleCart_shelfItem prd">
								<a href="single.html">
										<img src="{{ asset('uploads/'.$product->product_image)}}" alt="" width="150" height="150"/>
								</a>
								<h4 class="item_name">{{$product->product_name}}</h4>
								<p><a class="item_add" href="#"><i class="glyphicon glyphicon-shopping-cart"></i> <span class=" item_price valsa">Kshs{{$product->product_price}}</span></a></p>
								<div class="pro-grd">
									<a href="{{url('product/'.$product->id)}}">Quick View</a>
								</div>
							</div>
						</div>
						{!! $products->links() !!}
						@endforeach

					@endif
					</div>
					</div>
				</div>
				<div class="col-md-4 products-grid-right">
				<!--	<div class="w_sidebar">
						<div class="w_nav1">
							<h4>All</h4>
							<ul>
								<li><a href="product.html">women</a></li>
								<li><a href="#">new fashions</a></li>
								<li><a href="#">trends</a></li>
								<li><a href="#">boys</a></li>
								<li><a href="#">girls</a></li>
								<li><a href="#">sale</a></li>
							</ul>
						</div>-->
						<section  class="sky-form">
							<h4>catogories</h4>
							<div class="row1 scroll-pane">
                                @if($categories->count())
                                @foreach($categories as $category)
								<div class="col col-4">
									<label><a href="{{ url('category/'.$category->id) }}">{{$category->category_name}}</a></label>
								</div>
								@endforeach
								@endif
							</div>
						</section>

					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
<!-- //products -->


@endsection