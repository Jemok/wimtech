@extends('layouts.app')

@section('content')

<div class="row">
 @if(Session::has('flash_message'))

    <div class="alert-message alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
        @if(Session::has('flash_message_important'))

        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        @endif

        {{ session('flash_message') }}

    </div>

    @endif
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Product</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('category/store') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Category Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="category_name" value="{{ old('category_name') }}">

                                @if ($errors->has('category_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category_description') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Product Description</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="category_description">
                                </textarea>

                                @if ($errors->has('category_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('category_class') ? ' has-error' : '' }}">
                                                    <label class="col-md-4 control-label">Category Class</label>

                              <div class="col-md-6">
                                   <input type="text" class="form-control" name="category_class" value="{{ old('category_class') }}">

                                      @if ($errors->has('category_class'))
                                      <span class="help-block">
                                           <strong>{{ $errors->first('category_class') }}</strong>
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



@endsection