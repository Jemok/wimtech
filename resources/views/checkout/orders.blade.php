@extends('layouts.app')

@section('content')

<div class="row">
        <div class="col-md-8 col-md-offset-2">
          @if(Session::has('flash_message'))

               <div class="alert-message alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
                   @if(Session::has('flash_message_important'))

                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                   @endif

                   {{ session('flash_message') }}

               </div>

               @endif
          </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Orders</div>
                    <div class="panel-body">

                    @if($customers->count())
                     <table class="table">
                           <thead>
                                <tr>
                               <td>
                               Customer Name
                               </td>
                               <td>
                               Phone Number
                               </td>
                               <td>
                               Email
                               </td>
                               <td>
                               Town
                               </td>
                               <td>
                               Order Summary
                               </td>
                               <td>
                               Date
                               </td>
                               <td>
                               Remove
                               </td>

                               </tr>

                           <thead>
                        @foreach($customers as $customer)

                        <tr>
                        <td>
                        {{$customer->name}}
                        </td>
                        <td>
                        {{$customer->phone_number}}
                        </td>
                        <td>
                        {{$customer->email}}
                        </td>
                        <td>
                        {{$customer->town}}
                        </td>
                        <td>
                        <a href="{{url('orders/'.$customer->id)}}">Order Summary</a>
                        </td>
                        <td>
                        {{$customer->created_at->diffForHumans()}}
                        </td>
                        <td>
                        <form method="post" action="{{ url('orders/delete/'. $customer->id) }}">
                            {!! csrf_field() !!}

                            <button class="btn btn-sm btn-warning" type="submit">Remove</button>
                        </form>
                        </td>
                        </tr>
                        @endforeach

                     </table>

                    @endif
                    </div>
                   {!! $customers->links() !!}
                </div>
            </div>
        </div>

@endsection