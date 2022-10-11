<?php

namespace App\Http\Controllers;

use App\Actions\MonthlyTimesheetSummaryAction;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MonthlyTimesheetController extends Controller
{
    public function __invoke(Request $request)
    {
        session()->flash('page-title', 'ข้อมูลทาบบัตร');
        session()->flash('nav-menu', [
            ['label' => 'ข้อมูลทาบบัตร', 'route' => route('home'), 'active' => $request->route()->getName() === 'home'],
            ['label' => 'ตั้งค่า', 'route' => route('preference'), 'active' => $request->route()->getName() === 'preference'],
        ]);

        $data = (new MonthlyTimesheetSummaryAction())($request->input('month'), $request->user()->employee);

        return Inertia::render('MonthlyTimesheet', [...$data, 'monthSelected' => $request->input('month')]);
    }
}
