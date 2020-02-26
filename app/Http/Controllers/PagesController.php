<?php

namespace App\Http\Controllers;
use App\transfer;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
      return view('pages.index');
    }

    public function account(){
      return view('pages.account');
    }

    public function history(){
      $transfers = transfer::All();
      // return $transfer;
      return view('pages.history')->with('transfers', $transfers);
    }
}
