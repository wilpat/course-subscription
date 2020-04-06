<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    function __constructor(){
        $this->middleware('auth');
    }
    
    public function show()
    {

        $plans = [
            'prod_H2tkSGz7Iw2fDy' => 'Monthly',
            'plan_H2tttagMtIv0yY' => '6 Months',
            'plan_H2tqbgFqjIAwmg' => 'Yearly'
        ];

        $data = [
            'intent' => auth()->user()->createSetupIntent(),
            'plans' => $plans
        ];

        return view('payment')->with($data);
    }

    public function subscribe(Request $request)
    {

        $paymentMethod = $request->payment_method;
        $subscriptionPlan = $request->plan;

        auth()->user()->newSubscription('main', $subscriptionPlan)->create($paymentMethod);

        return response(['status'=>'success']);
    }
}
