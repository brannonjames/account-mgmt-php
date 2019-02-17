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

  public function post(Request $request) {
    try {
      $account = $request->all();
      // TODO - figure out how to return value after insert
      DB::table('accounts')->insert($account);
      return $account;
    } catch (Exception $e) {
      return 'Error';
    }
  }

  public function update($id, Request $request) {
    try {
      $account = $request->all();
      DB::table('accounts')->update($account);
      return $account;
    } catch (Exception $e) {
      return 'Error';
    }
  }
}