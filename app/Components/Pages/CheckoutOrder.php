<?php

namespace App\Components\Pages;

use App\Models\Gateway;
use App\Models\Order;
use App\Models\Plan;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use nusoap_client;
use Victorybiz\LaravelCryptoPaymentGateway\LaravelCryptoPaymentGateway;

class CheckoutOrder extends Component
{
    public $plan;

    public $email;
    public $name;
    public $password;

    public $gatways = [];
    public $gatway_select;

    public function route()
    {
        return Route::get('/checkout')
            ->name('checkout');
    }

    public function mount(Request $request)
    {
        $this->plan = Plan::find($request->plan_id);
        if (Auth::check()) {
            $this->email = Auth::user()->email;
            $this->name = Auth::user()->name;
        }
        $this->gatways = Gateway::where("status", "active")->get();
        $this->gatway_select = $this->gatways[0]->id;
    }

    public function render()
    {
        return view('pages.checkout-order');
    }

    public function Checkout()
    {
        //check user exsit
        if (!Auth::check()) {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
            ]);

            Auth::login($user, true);
        }
        //save as new order
        $order = new Order();

        $order->user_id = Auth::user()->id;
        $order->plan_id = $this->plan->id;
        $order->gateway_id = $this->gatway_select;
        $order->amount = $this->plan->price;
        $order->status = "pending";
        $order->save();
        //redirect to gateway
        if ($this->gatway_select == 1) {
            $this->BuyFromZarinpal($this->plan->id);
        } elseif ($this->gatway_select == 4) {
            $this->BuyFromGoUrl($this->plan->id);
        }

    }


    public function BuyFromZarinpal($planId)
    {


        $Gateway = Gateway::find(1);

        $plan = Plan::find($planId);

        $MerchantID = $Gateway->merchant;
        $zarinpalSandbox = boolval($Gateway->sandbox);

        if ($zarinpalSandbox) {
            $client = new nusoap_client('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
        } else {
            $client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
        }

        $client->soap_defencoding = 'UTF-8';
        $newPay = Transaction::create();
        $newPay->user_id = Auth::user()->id;
        $newPay->plan_id = $planId;
        $newPay->discription = $plan->title;
        $newPay->amount = $plan->price;
        $newPay->gateway_id = $this->gatway_select;
        $newPay->status = "pending";
        $newPay->save();

        $CallbackURL = url('/order?payment_id=' . $newPay->id); // Required
        $result = $client->call('PaymentRequest', [
            [
                'MerchantID' => $MerchantID,
                'Amount' => $plan->price,
                'Description' => $plan->description,
                'Email' => Auth::user()->email,
                'Mobile' => Auth::user()->mobile,
                'CallbackURL' => $CallbackURL,
            ],
        ]);
        //Redirect to URL You can do it also by creating a form

        if ($result['Status'] == 100) {
            $newPay->authority = $result['Authority'];
            $newPay->save();

            if ($zarinpalSandbox) {
                $result['url'] = 'https://sandbox.zarinpal.com/pg/StartPay/' . $result['Authority'];
            } else {
                $result['url'] = 'https://www.zarinpal.com/pg/StartPay/' . $result['Authority'] . '/ZarinGate';
            }

            return redirect($result['url']);
        } else {
            return false;
        }
    }

    public function BuyFromGoUrl($planId)
    {
        $plan = Plan::find($planId);

        $newPay = Transaction::create();
        $newPay->user_id = Auth::user()->id;
        $newPay->plan_id = $planId;
        $newPay->discription = $plan->title;
        $newPay->amount = $plan->price;
        $newPay->gateway_id = $this->gatway_select;
        $newPay->status = "pending";
        $newPay->save();

        $payment_url = LaravelCryptoPaymentGateway::startPaymentSession([
            'amountUSD' => $plan->price,
            'orderID' => $newPay->id,
            'userID' => Auth::user()->id,
            'redirect' => 'https://cgwork.ir/order?payment_id=' . $newPay->id,
        ]);
        return redirect($payment_url);

    }
}
