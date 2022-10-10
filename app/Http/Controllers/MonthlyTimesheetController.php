<?php

namespace App\Http\Controllers;

use App\Actions\MonthlyTimesheetSummaryAction;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MonthlyTimesheetController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = (new MonthlyTimesheetSummaryAction())($request->input('month'), $request->user()->employee);

        return Inertia::render('MonthlyTimesheet', [...$data, 'monthSelected' => $request->input('month')]);
    }
}
