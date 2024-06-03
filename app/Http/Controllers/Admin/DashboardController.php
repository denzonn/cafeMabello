<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $proses = Transaction::where('status', 'PROSES')->count();
        $unpaid = Transaction::where('status', 'UNPAID')->count();
        $paid = Transaction::where('status', 'PAID')->count();
        $cancel = Transaction::where('status', 'CANCEL')->count();

        return view('pages.admin.dashboard', compact('paid', 'cancel', 'proses', 'unpaid'));
    }
}
