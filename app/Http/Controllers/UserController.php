<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function purchase(Request $request)
    {
        $user = User::firstOrCreate([
            'email' => $request->email
        ],[
            'password' => Hash::make(Str::random(12)),
            'name' => $request->first_name . ' ' . $request->last_name,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
        ]);

        try {
            $user->createOrGetStripeCustomer();

            $payment = $user->charge(
                $request->amount,
                $request->payment_method_id
            );

            $payment = $payment->asStripePaymentIntent();

            $order = $user->orders()->create([
                'transaction_id' => $payment->charges->data[0]->id,
                'total' => $payment->charges->data[0]->amount
            ]);

            foreach(json_decode($request->cart, true) as $item) {
                $order->products()
                    ->attach($item['id'], ['quantity' => $item['quantity']]);
            }

            $order->load('products');

            return $order;
        } catch(\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 500]);
        }
    }
}
