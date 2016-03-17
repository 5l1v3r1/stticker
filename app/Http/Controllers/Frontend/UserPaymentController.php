<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Frontend\FrontendController;
use PayPal, Redirect;
use App\Order;

class UserPaymentController extends FrontendController
{
    protected $paypal;

    public function index() {
        return view("user.payment.index", [
            "payments" => auth()->user()->orders,
        ]);
    }

    public function show($payment) {

        if($payment->user != auth()->user())
            return redirect()->route("frontend.home.index");

        return view("user.payment.show", [
            "payment" => $payment,
        ]);
    }

    private function preparePaypal()
    {
        $this->paypal = PayPal::ApiContext(
            config('services.paypal.client_id'),
            config('services.paypal.secret')
        );

        $this->paypal->setConfig([
            'mode' => 'sandbox',
            'service.EndPoint' => 'https://api.sandbox.paypal.com',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE',
        ]);
    }

    public function paypal($payment) {
        if($payment->user != auth()->user())
            return redirect()->route("frontend.home.index");

        $this->preparePaypal();

        $payer = PayPal::Payer();
        $payer->setPaymentMethod('paypal');

        $amount = PayPal::Amount();
        $amount->setCurrency('TRY');
        $amount->setTotal($payment->total+$payment->cargo);

        $transaction = PayPal::Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription($payment->code." Stticker");

        $redirectUrls = PayPal::RedirectUrls();
        $redirectUrls->setReturnUrl(route('frontend.user.payment.paypal.done', $payment->id));
        $redirectUrls->setCancelUrl(route('frontend.user.payment.paypal.cancel', $payment->id));

        $payment = PayPal::Payment();
        $payment->setIntent('sale');
        $payment->setPayer($payer);
        $payment->setRedirectUrls($redirectUrls);
        $payment->setTransactions($transaction);

        $response = $payment->create($this->paypal);
        $redirectUrl = $response->links[1]->href;

        return Redirect::to($redirectUrl);
    }

    public function paypalDone(Request $request, Order $payment)
    {
        $payment_id = $request->get("paymentId");
        $token      = $request->get('token');
        $payer_id   = $request->get('PayerID');

        $payment = PayPal::getById($payment_id, $this->paypal);

        $paymentExecution = PayPal::PaymentExecution();
        $paymentExecution->setPayerId($payer_id);

        $executePayment = $payment->execute($paymentExecution, $this->paypal);

        // İŞLEMLER

        return view('user.payment.done');
    }

    public function paypalCancel()
    {
        return view('user.payment.cancel');
    }
}
