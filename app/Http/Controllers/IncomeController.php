<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Models\Income;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IncomeController extends Controller
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
        // select database from user using user_id for all transactions with -
        $transactions_all = DB::select('SELECT * FROM transactions WHERE user_id = '.$user_id.'  AND type = \'+\' ORDER BY created_at DESC');
        // select database from user using user_id for color
        // $transactions_color = DB::select('select color from categories');

        // dd($transactions_color);

        /**
        * SELECT
        * (SELECT SUM(value) FROM `transactions` WHERE user_id = 1
        * AND type = '+'
        * )
        * -
        * (SELECT SUM(value) FROM `transactions` WHERE user_id = 1
        * AND type = '-'
        * )
        */

        // return view with $transaction
        return view('inkomen', ['transactions_all' => $transactions_all, 'user_id' => $user_id]);
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
        // else if (!$name || !$type || !$value || !$category_id) {
        //     $error = 'Whoops, je hebt niet alles ingevuld';
        //     // return 'test';
        //     return redirect()->back()->with(['error' => $error]);
        // }
        // return view('transactions');

        // if () {
        //     # code...
        // }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
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
    public function update(UpdateIncomeRequest $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        //
    }
}
