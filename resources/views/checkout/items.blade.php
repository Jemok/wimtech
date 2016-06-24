@extends('layouts.app')

@section('content')

<div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    Order Summary


                    </div>
                    <div class="panel-body">

                    @if($items->count())
                    <p>Name: {{$customer->name}}</p>
                    <p>Email:{{$customer->email}}</p>
                    <p>Phone Number:{{$customer->phone_number}}</p>
                    <p>Town:{{$customer->town}}</p>
                     <table class="table">
                           <thead>
                                <tr>
                               <td>
                               Name
                               </td>
                               <td>
                               Quantity
                               </td>
                               <td>
                               Price
                               </td>
                               <td>
                               Total
                               </td>

                               </tr>

                           <thead>
                        @foreach($items as $item)

                        <tr>
                        <td>
                        {{$item->item_name}}
                        </td>
                        <td>
                        {{$item->item_quantity}}
                        </td>
                        <td>
                        {{ number_format($item->item_price, 2)}}
                        </td>
                        <td>
                        {{ number_format($item->total, 2)}}
                        </td>
                        </tr>
                        @endforeach


                     </table>
                       <div class="col-md-offset-8">
                          Grand Total: {{ number_format($customer->grand_total->grand_total, 2)}}
                       </div>

                    @endif
                    </div>
                   {!! $items->links() !!}
                </div>
            </div>
        </div>

@endsection