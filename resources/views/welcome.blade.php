@extends('layouts.app')

@section('content')



@if(\Auth::guest())
<!--//-->
	<div class=" header-right">
		<div class=" banner">
			 <div class="slider">
			    <div class="callbacks_container">
			      <ul class="rslides" id="slider">
					 <li>
			          	 <div class="banner1">
			           		<div class="caption">
					          	<h3><span>Dealers in:</span></h3>
					          	<p>Laptops,Desktops &</p>
                                                         <p>all Computers Accessories</p>
			          		</div>
			          	</div>
			         </li>
					 <li>
			          	 <div class="banner2">
			           		<div class="caption">
					          	<h3><span>Dealers in:</span></h3>
					          	<p>Casual & official Wear,Designed jeans & shoes</p>
                                                         <p>Official shoes,Watches</p>
			          		</div>
			          	</div>
			         </li>
			         <li>
			          	 <div class="banner3">
			           		<div class="caption">
					          	<h3><span>Dealers in:</span></h3>
					          	<p>Latest Phones </p>
                                                         <p>iphones,Samsung,Sony Experia</p>

			          		</div>
			          	</div>
			         </li>
			      </ul>
			  </div>
			</div>
		</div>
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

 @if(!\Auth::guest())

 <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Product</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('product/store') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Product Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}">

                                @if ($errors->has('product_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                                    <label for="team_id">Allocate a Category</label>
                                 </div>
                                 <div class="col-md-6">
                                    <select class="form-control" name="category">
                                         @if($categories->count())
                                             @foreach($categories as $category)
                                             <option value="{{$category->id}}">{{$category->category_name}}</option>
                                             @endforeach
                                             @else
                                             <option>no categories found</option>
                                             @endif
                                     </select>
                                </div>

                                @if($errors->has('category'))
                                     <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                     </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('product_price') ? ' has-error' : '' }}">
                            <div class="col-md-4 control-label">
                               Product Price
                            </div>

                            <div class="col-md-6">


                                     <input type="text" class="form-control" name="product_price" value="{{ old('product_price') }}">

                                                                 @if ($errors->has('product_price'))
                                                                     <span class="help-block">
                                                                         <strong>{{ $errors->first('product_price') }}</strong>
                                                                     </span>
                                                                 @endif
                            </div>

                        </div>

                        <div class="form-group{{ $errors->has('product_description') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Product Description</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="product_description">
                                </textarea>

                                @if ($errors->has('product_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('product_image') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Product Image</label>
                                   <div class="col-md-6">
                                       <input type="file" class="form-control" name="product_image">
                                            @if($errors->has('product_image'))
                                                 <span class="help-block">
                                                      <strong>{{ $errors->first('product_image') }}</strong>
                                                 </span>
                                            @endif
                                   </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Add Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

     <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Products</div>
                    <div class="panel-body">

                    @if($products->count())
                     <table class="table">
                           <thead>
                                <tr>
                               <td>
                               Name
                               </td>
                               <td>
                               Description
                               </td>
                               <td>
                               Price
                               </td>
                               <td>
                               Image
                               </td>
                               <td>
                               Edit
                               </td>
                               <td>
                               Delete
                               </td>
                               </tr>

                           <thead>
                        @foreach($products as $product)

                        <tr>
                        <td>
                        {{$product->product_name}}
                        </td>
                        <td>
                        {{$product->product_description}}
                        </td>
                        <td>
                        {{$product->product_price}}
                        </td>
                        <td>
                         <img src="{{ asset('uploads/'.$product->product_image)}}" height="67" width="70">
                        </td>
                        <td>
                        <a href="{{ url('product/edit/'. $product->id) }}">Edit</a>
                        </td>
                        <td>
                            <form action="{{ url('product/delete/'. $product->id)}}" method="post">
                            {!! csrf_field() !!}
                              <button type="submit" class="btn btn-sm btn-warning">Delete</button>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                     </table>
                    @endif
                    </div>
                </div>
            </div>
        </div>



@endif
@endsection
