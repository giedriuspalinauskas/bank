<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transfer;
use App\User;

class TransfersController extends Controller
{
  public function send(Request $request)
  {
      $this->validate($request, [
        'nr' => 'required',
        'price' => 'required',
      ]);
      $user = User::find($request->nr);
      $user2 = User::find(auth()->user()->id);
      if ($user != $user2) {
        if (isset($user)) {
          if ($user2->balance > $request->price) {
            $user->balance += $request->price;
            $user->save();
            $user2->balance -= $request->price;
            $user2->save();

            $transfer = new transfer;
            $transfer->number = auth()->user()->id;
            $transfer->sendTo = $request->nr;
            $transfer->price = $request->price;
            $transfer->save();

            return redirect('/account')->with('success', 'Trasfer success');
          } else return redirect('/account')->with('error', 'You dont have much money in your bank account');
        } else return redirect('/account')->with('error', 'This account number not exist');
      } else return redirect('/account')->with('error', 'This is your account number');
  }
}
