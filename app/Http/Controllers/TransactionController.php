<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Builder\Trait_;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // get transactions from person that is logged in
    public function index(Transaction $transaction)
    {
        // get user_id from Auth
        $user_id = Auth::user()->id;

        // Get all transactions for in the table
        $transactions_all = Auth::user()->transactions->sortByDesc('created_at');

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

        // select database from user for all outcome
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

        // select database from user for all IDtransactions
        $transactions_total_id = Auth::user()->transactions->count('*');
        // dd($transactions_total_id);

        $categories = Auth::user()->categories;

        // dd($categories);

        // return view with $transaction
        return view('transactions', ['transactions_all' => $transactions_all, 'transaction_total' => $transactions_total2, 'transactions_total_inkomen' => $transactions_total_inkomen, 'transactions_total_uitgaven' => $transactions_total_uitgaven, 'transactions_total_id' => $transactions_total_id, 'categories' => $categories]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // store the transaction
    public function store(Request $request)
    {
        // request name
        $name = $request->get('name');
        // If name is above 15 characters, return back with error
        if (strlen($name) > 15) {
            return back()->with('error', 'De titel is te lang');
        }
        // if $name is empty or with a invisible character, return back with error
        if ($request->get('name') == null || $request->get('name') == '' || $request->get('name') == ' ' || $request->get('name') == 'ㅤ') {
            return redirect()->back()->with('error', 'Je moet een naam opgeven');
        }

        // request type
        $type = $request->get('type');
        // If type is not + or -, return back with error
        if ($type !== '+' && $type !== '-') {
            return back()->with('error', 'Type is niet correct');
        }

        // request value
        $value = $request->get('value');
        // if $value is above 999999.99, return back with error
        if($value > 999999.99) {
            return back()->with('error', 'Het bedrag is te groot');
        }

        // make sure that $category_id is an int and request category
        (int)$category_id = $request->get('category');
        if ($category_id == null || $category_id == '' || $category_id == ' ' || $category_id == 'ㅤ') {
            return redirect()->back()->with('error', 'Je moet een categorie opgeven');
        }

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
        // ->with('message', 'Transaction saved!')
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('/transactions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view('/transactions');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        return view('/transactions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect('/transactions');
    }
}
 