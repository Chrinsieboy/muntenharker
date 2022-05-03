<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Builder\Trait_;
use App\Models\Spaardoel;
use App\Models\User;
use DateTime;

class SpaardoelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spaardoelen_all = Auth::user()->spaardoels->sortByDesc('created_at');
        // $yyyy = date('Y');
        // $mm = date('m');
        // $dd = date('d');
        $today = date('d-Y-m');
        // dd($today);

        return view('spaardoelen', ['spaardoelen_all' => $spaardoelen_all, 'today' => $today]);
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
     * @param  \App\Http\Requests\StoreSavinggoalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get name of savinggoal
        $name = $request->get('name');
        // if $name is above 15 characters, return back with error
        if (strlen($name) > 15) {
            return back()->with('error', 'De titel is te lang');
        }
        // if $name is empty or with a invisible character, return back with error
        if ($request->get('name') == null || $request->get('name') == '' || $request->get('name') == ' ' || $request->get('name') == 'ㅤ') {
            return redirect()->back()->with('error', 'Je moet een naam opgeven');
        }

        // get amount of savinggoal
        $value = $request->get('value');
        // if $value is above 999999.99, return back with error
        if($value > 999999.99) {
            return back()->with('error', 'Het bedrag is te groot');
        }

        // get date of savinggoal
        $EndDate = $request->get('EndDate');
        // if $EndDate is in the past, return back with error
        if($EndDate < date('Y-m-d')) {
            return back()->with('error', 'De datum is in het verleden');
        }

        // if everything is filled save all as variables, save it and redirect back
        if (Auth::user()->spaardoels->count() >= 9) {
            return redirect()->back()->with('error', 'Je hebt al 9 spaardoelen');
        } else {
            if($name && $EndDate) {
                $spaardoel = new Spaardoel();
                $spaardoel->name = $name;
                $spaardoel->value = $value;
                $spaardoel->user_id = Auth::id();
                $spaardoel->EndDate = $EndDate;
                $spaardoel->saveOrFail();
                return redirect()->back();
            }
        return redirect()->back();
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spaardoel  $expense
     * @return \Illuminate\Http\Spaardoel
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spaardoel  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $expense
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spaardoel  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spaardoel $spaardoelen)
    {
        $spaardoelen->delete();
        return redirect()->back();
    }

}
