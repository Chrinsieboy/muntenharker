<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dashboard;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get user_id from Auth
        $user_id = Auth::user()->id;
        // select database from user for all transactions
        $transactions_total1 = Auth::user()->transactions;
        $transactions_total2 = 0;
        foreach ($transactions_total1 as $transaction) {
                if($transaction->type === '+') {
                $transactions_total2 += (float)$transaction->value;
                } 
                elseif($transaction->type === '-') {
                    $transactions_total2 -= (float)$transaction->value;
                }
        }

        // select database from user for all income
        $transactions_total_expense = Auth::user()->transactions->where('type', '-');
        $transactions_total_uitgaven = 0;
        foreach ($transactions_total_expense as $transaction) {
                if($transaction->type === '-') {
                    $transactions_total_uitgaven += (float)$transaction->value;
                }
        }
        
        // select database from user for all income
        $transactions_total_income = Auth::user()->transactions->where('type', '+');
        $transactions_total_inkomen = 0;
        foreach ($transactions_total_income as $transaction) {
                if($transaction->type === '+') {
                $transactions_total_inkomen += (float)$transaction->value;
                }
        }

        // Get latest expense and income
        // $last_transaction_uitgaven = Auth::user()->transactions->where('type', '-')->sortByDesc('created_at')->first()->name;
        // $last_transaction_inkomen = Auth::user()->transactions->where('type', '+')->sortByDesc('created_at')->first()->name;
        // $last_transactions_uitgaven = 0;
        // dd($last_transaction_uitgaven);

        // return view('dashboard');
        return view('dashboard', ['transaction_total' => $transactions_total2, 'transactions_total_inkomen' => $transactions_total_inkomen, 'transactions_total_uitgaven' => $transactions_total_uitgaven]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExpenseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExpenseRequest  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
