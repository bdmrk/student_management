<?php

namespace App\Http\Controllers\backend;

use App\Models\Enroll;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function showDueBill(Request $request)
    {
        $semester = $request->query('semester');
        $paymentStatus = $request->query('payment_status');

        $enroll = Enroll::with(['student', 'semester']);

            if ($semester > 0) {
                $enroll->where('semester_id', $semester);
            }

            if ($paymentStatus != null) {
                $enroll->where('payment_status', $paymentStatus);
            }
        $data['dueBills'] = $enroll->get();
        $data['semester_id'] = $semester;
        $data['payment_status'] = $paymentStatus;

        $data['semesters'] = Semester::all();
        return view('backend.report.bill', $data);
    }

    public function paidBill($enrollId)
    {
        try {
            $enroll = Enroll::findOrFail($enrollId);
            $enroll->payment_status = 1;
            $enroll->save();
        } catch (Exception $exception) {
            return redirect()->back()->with('errorMessage', 'Failed. Something went wrong. please try again');
        }
        return redirect()->back()->with("successMessage", "Payment add successfully");

    }
}
