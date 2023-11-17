<?php

namespace App\Components\Pages;

use App\Models\Gateway;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use nusoap_client;
use Victorybiz\LaravelCryptoPaymentGateway\LaravelCryptoPaymentGateway;

class Order extends Component
{
    public $Payment;

    public function route()
    {
        return Route::get('/order')
            ->name('order');
    }

    public function mount(Request $request)
    {
        $payment_id = $request->get('payment_id');
        $this->Payment = Transaction::where('id', $payment_id)->first();
        if ($this->Payment->gateway_id == 1) {
            $this->CheckPaymentZarinpal($request);
        }

    }

    public function render()
    {
        return view('pages.order');
    }

    public function CheckPaymentZarinpal($request)
    {
        $Authority = $request->get('Authority');
        $Gateway = Gateway::find($this->Payment->gateway_id);
        if (isset($Authority)) {
            $MerchantID = $Gateway->merchant;
            $zarinpalSandbox = boolval($Gateway->sandbox);
            $Amount = $this->Payment->amount;
            if ($request->get('Status') == 'OK') {
                if ($zarinpalSandbox) {
                    $client = new nusoap_client('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
                } else {
                    $client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
                }
                $client->soap_defencoding = 'UTF-8';
                $result = $client->call('PaymentVerification', [
                    [
                        'MerchantID' => $MerchantID,
                        'Authority' => $Authority,
                        'Amount' => $Amount,
                    ],
                ]);
                if ($zarinpalSandbox) {
                    $result['Status'] = 100;
                }
                if ($result['Status'] == 100) {

                    $this->Payment->status = "complete";
                    if ($result['RefID']) {
                        $this->Payment->refid = $result['RefID'];
                    }
                    $this->Payment->save();

                    $plan = Plan::find($this->Payment->plan_id);
                    $newSubscription = Subscription::firstOrNew(['user_id' => Auth::user()->id]);
                    $newSubscription->plan_id = $plan->id;
                    $newSubscription->start_plan = Carbon::now();
                    $newSubscription->end_plan = Carbon::now()->addDays($plan->period);
                    $newSubscription->save();

                    session()->flash('message', 'پرداخت با موفقیت انجام شد.');
                } else {
                    $this->Payment->status = "error";
                    $this->Payment->save();

                    session()->flash('message', 'خطا در انجام عملیات');
                }
            } else {
                $this->Payment->status = "canceled";
                $this->Payment->save();

                session()->flash('message', 'سفارش لغو گردید.');
            }
        }


    }

    public function CheckPaymentGoUrl($request){
    }
}
