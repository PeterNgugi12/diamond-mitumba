<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Cart;

class CheckoutComponent extends Component
{
    public $ship_to_different;

    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $country;
    public $county;
    public $address;

    public $s_firstname;
    public $s_lastname;
    public $s_email;
    public $s_mobile;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_country;
    public $s_county;
    public $s_address;

    public $paymentmode;
    public $thankyou;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'  => 'required|email',
            'mobile' => 'required|numeric', 
            'line1'  => 'required',
            'city' => 'required', 
            'country' => 'required', 
            'county' => 'required', 
            'address'  => 'required',
            'paymentmode'  => 'required',
        ]);
        if($this->ship_to_different)
        {
            
            $this->validateOnly($fields,[
                's_firstname' => 'required',
                's_lastname'  => 'required',
                's_email'  => 'required|email',
                's_mobile' => 'required|numeric', 
                's_line1'  => 'required',
                's_city' => 'required', 
                's_country' => 'required', 
                's_county' => 'required', 
                's_address'  => 'required',
             ]);
        }
    }

    public function placeOrder()
    {
        $this->validate([
           'firstname' => 'required',
           'lastname'  => 'required',
           'email'  => 'required|email',
           'mobile' => 'required|numeric', 
           'line1'  => 'required',
           'city' => 'required', 
           'country' => 'required', 
           'county' => 'required', 
           'address'  => 'required',
           'paymentmode'  => 'required',
        ]);

        $order = new Order();
        $order ->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->tax = session()->get('checkout')['tax'];
        $order->transport = session()->get('checkout')['transport'];
        $order->total = session()->get('checkout')['total'];
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname ;
        $order->email  = $this->email;
        $order->mobile  = $this->mobile;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->city  = $this->city;
        $order->country  = $this->country;
        $order->county  = $this->county;
        $order->address = $this->address;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->ship_to_different ? 1:0;
        $order->save();


        foreach(Cart::instance('cart')->content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem -> product_id = $item->id;
            $orderItem -> order_id = $order->id;
            $orderItem -> price = $item->price;
            $orderItem -> quantity = $item->qty;
            $orderItem ->save();
        }
        if($this->ship_to_different)
        {
            $this->validate([
                's_firstname' => 'required',
                's_lastname'  => 'required',
                's_email'  => 'required|email',
                's_mobile' => 'required|numeric', 
                's_line1'  => 'required',
                's_city' => 'required', 
                's_country' => 'required', 
                's_county' => 'required', 
                's_address'  => 'required',
             ]);
             $shipping = new Shipping();
             $shipping -> order_id = $order->id;
             $shipping->firstname = $this->s_firstname;
             $shipping->lastname = $this->s_lastname ;
             $shipping->email  = $this->s_email;
             $shipping->mobile  = $this->s_mobile;
             $shipping->line1 = $this->s_line1;
             $shipping->line2 = $this->s_line2;
             $shipping->city  = $this->s_city;
             $shipping->country  = $this->s_country;
             $shipping->county  = $this->s_county;
             $shipping->address = $this->s_address;
             $shipping->save();
        }
        if($this->paymentmode == 'cod')
        {
          $transaction = new Transaction();
          $transaction ->user_id = Auth::user()->id;
          $transaction -> order_id = $order->id;
          $transaction -> mode= 'cod';
          $transaction ->status = 'pending';
          $transaction ->save();
        }
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function verifyForCheckout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        else if($this->thankyou)
        {
            return redirect()->route('thankyou');
        }
        else if(!session()->get('checkout'))
        {
            return redirect()->route('product.cart'); 
        }
    }
    

    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
