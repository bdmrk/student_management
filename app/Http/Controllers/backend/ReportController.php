<?php

namespace App\Http\Controllers\backend;

use App\Models\Enroll;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function showDueBill()
    {
        $data['dueBills'] = Enroll::with(['student', 'semester'])->where('payment_status', false)->get();
        return view('backend.report.due_bill', $data);
    }
}
