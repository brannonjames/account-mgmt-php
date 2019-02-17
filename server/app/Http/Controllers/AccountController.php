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
      $accountBefore = DB::table('accounts').where('id', $id).get();
      $accountAfter = $request->all();
      // if trying to update place, run transaction
      if ($accountBefore->place != $accountAfter->place) {
        $active;
        $transition;
        if ($accountBefore->place == 'Confirmation' && $accountAfter->place == 'Setup') {
          $transition_name = 'to_setup';
          $active = false;
          $transition = [
            "name" => 'to_setup',
            "from" => 'Confirmation',
            "to" => 'Setup',
            
          ];
        }
        if ($accountBefore->place == 'Setup' && $accountAfter->place == 'Activated') {
          $transition_name = 'activate';
          $active = true;
        }
        if ($accountBefore->place == 'Activated' && $accountAfter->place == 'Deactivated') {
          $transition_name = 'deactivate';
          $active = false;
        }
        if ($accountBefore->place == 'Setup' && $accountAfter->place == 'Deactivated') {
          $transition_name = 'cancel';
          $active = false;
        }
        DB::transaction(function() {
          $account->active = $active;
          DB::table('accounts')->update($account);
          DB::table('transations')->insert([
            "name" => $transition_name,

          ]);
        });
      }
      DB::table('accounts')->update($account);
      return $account;
    } catch (Exception $e) {
      return 'Error';
    }
  }
}