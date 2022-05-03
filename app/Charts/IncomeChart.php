<?php

declare(strict_types = 1);

namespace App\Charts;

// use models
use App\Models\Category;
use App\Models\Transaction;

// use chartisan stuff
use ConsoleTVs\Charts\BaseChart;
use Chartisan\PHP\Chartisan;

// use request
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeChart extends BaseChart
{
    public function handler(Request $request): Chartisan
    {
        // This charts are made with the help from Annelieke
        // Thanks for that ツ

        $data = Auth::user()->transactions->where('type', '+'); // Get all Transactions with type +
        $data2 = Category::all(); // Get all Categories
    
        $dates = []; // Make $dates an array
        $graphData = []; // Make $graphData an array

        foreach($data as $row) {
            $value = $row->value; // Get value and put it in $value
            $date = date_format($row->created_at, 'd/m/Y'); // Get created_at and then only the date and put it in $date
            $categoryName = $row->category->name; // Get the name of the category and put it in $categoryName
    
            if (!in_array($date, $dates)) { // als niet in array de $date = date_format($row->created_at, 'd/m/Y'); en de $dates= [];
                $dates[] = $date; // Set date in the array that is being showed
            }
    
            if (!isset($graphData[$categoryName])) { // Look if graphdata is not good, make it NULL
                $graphData[$categoryName] = []; // Make $graphdata[categoryName] NULL
            }
    
            if(isset($graphData[$categoryName][$date])) {
                $graphData[$categoryName][$date] += $value; // If the category and date are the same, count it in
            }
            else{
                $graphData[$categoryName][$date] = $value; // else don't
            }
        }

        $chartisan = Chartisan::build() // $chartisan will build Chartisan
            ->labels($dates);  // with label $dates, this will be seen under the chart

        foreach($graphData as $categoryName => $datum) {
            $categoryDates = []; // Make $categoryDates an array
            foreach($dates as $date) {
                $categoryDates[] = $datum[$date] ?? 0; // ?? means that, when the left side is null THAN right side
            }
            $chartisan->dataset($categoryName, $categoryDates); // set data in chartisan
        }

        return $chartisan; // Make the chartisan
    }
}