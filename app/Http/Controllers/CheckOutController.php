<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Item;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AddInfoRequest;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    /**
     * @var
     */
    protected $grand_total;

    public function store(AddInfoRequest $addInfoRequest){

        $content = $addInfoRequest;

        $customer = Customer::create($addInfoRequest->all());

        for($i=1; $i < $content['itemCount'] + 1; $i++) {

            $name = 'item_name_'.$i;
            $quantity = 'item_quantity_'.$i;
            $price = 'item_price_'.$i;

            $customer->items()->create([

                'item_name' =>  $content[$name],
                'item_quantity' => $content[$quantity],
                'item_price'    => $content[$price],
                'total'         => $total = $content[$quantity]*$content[$price],
                $total = $content[$quantity]*$content[$price],
                $this->grand_total += $total

            ]);


        }

        $customer->grand_total()->create([

            'grand_total' => $this->grand_total

        ]);

        Session::flash('flash_message','Your Order was received We will get back to you shortly');
        return redirect()->back();

    }

    public function orders()
    {
        $customers = Customer::with('items')->paginate(8);

        return view('checkout.orders', compact('customers'));
    }

    public function orderItems($order_id){

        $items = Item::where('customer_id', '=', $order_id)->paginate(10);

        $customer = Customer::where('id', '=', $order_id)->with('grand_total')->first();

        return view('checkout.items', compact('items', 'customer'));
    }

    public function delete($customer_id){

        $customer = Customer::where('id', '=', $customer_id)->with('items', 'grand_total')->first();

        $customer->grand_total()->delete();

        $customer->items()->delete();

        $customer->delete();

        Session::flash('flash_message', 'The order was deleted successfully');

        return redirect()->back();

    }
}
