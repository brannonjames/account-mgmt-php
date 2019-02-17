<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller {
  public function get(Request $request) {
    // possible params:
        // place (Confirmation, Setup, Activated, Deactivated)
        // transaction_date (day, week, month)
    $query = DB::table('accounts');
    $place = $request->input('place');
    $date = $request->input('date');
    if ($place) {
      $query->where('place', $place);
    }
    return $query->get();
  }
}