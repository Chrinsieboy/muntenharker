<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Expense;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Psy\Readline\Transient;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;


class ExpenseController extends Controller
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

        // Get all transactions for in the table
        $transactions_all = Auth::user()->transactions->where('type', '-');

        // select database from user for all outcome
        $transactions_total_expense = Auth::user()->transactions->where('type', '-');
        $transactions_total_uitgaven = 0;
        foreach ($transactions_total_expense as $transaction) {
                if($transaction->type === '-') {
                    $transactions_total_uitgaven += (float)$transaction->value;
                }
        }

        // Count all transactions with type -
        $transactions_total_id = Auth::user()->transactions->where('type', '-')->count('*');
        // dd($transactions_color);

        // return view with $transaction
        return view('uitgaven', ['transactions_all' => $transactions_all, 'transactions_total_uitgaven' => $transactions_total_uitgaven, 'transactions_total_id' => $transactions_total_id, 'user_id' => $user_id]);
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
        $name = $request->get('name');
        // request type
        $type = $request->get('type');
        // request value
        $value = $request->get('value');
        // make sure that $category_id is an int and request category
        (int)$category_id = $request->get('category');
        // if everything is filled save all as variables, save it and redirect back
        if($type && $value && $category_id) {
            $transaction = new Transaction();
            $transaction->name = $name;
            $transaction->type = $type;
            $transaction->value = $value;
            $transaction->category_id = $category_id;
            $transaction->user_id = Auth::id();
            $transaction->save();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        return view('/uitgaven');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        return view('/uitgaven');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExpenseRequest  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        return view('/uitgaven');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $transaction)
    {
        $test = $transaction;
        dd($test);
        $transaction->delete();
        return redirect('/uitgaven');
    }
}
