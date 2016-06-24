@extends('layouts.app')

@section('content')
 <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Product</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('product/update/'.$product->id) }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Product Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}">

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
                                             @if($category->id == $product->category_id)
                                             <option value="{{$category->id}}" selected>{{$category->category_name}}</option>
                                             @else
                                             <option value="{{$category->id}}">{{$category->category_name}}</option>
                                             @endif
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


                                     <input type="text" class="form-control" name="product_price" value="{{$product->product_price}}">

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
                                {{$product->product_description}}
                                </textarea>

                                @if ($errors->has('product_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" value="{{$product->product_image}}" name="set_image">


                        <div class="col-md-offset-6">
                         <img src="{{ asset('uploads/'.$product->product_image)}}" height="67" width="70">
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
                                    <i class="fa fa-btn fa-sign-in"></i>Update Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection