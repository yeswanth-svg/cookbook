<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view("admin.dashboard");
    }



    public function razorpay_transactions()
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            $transactions = $api->payment->all(['count' => 100]);

            $simplifiedTransactions = collect($transactions->items)
                ->map(function ($transaction) {
                    $transaction->simplified_status = match ($transaction->status) {
                        'captured' => 'Paid',
                        'authorized' => 'Unpaid',
                        'failed' => 'Failure',
                        default => 'Unknown',
                    };

                    $transaction->customer_email = $transaction->email ?? 'Unknown';
                    $transaction->customer_phone = $transaction->contact ?? 'Unknown';

                    // Convert created_at to Asia/Kolkata timezone
                    $transaction->formatted_created_at = \Carbon\Carbon::createFromTimestamp($transaction->created_at, 'UTC')
                        ->setTimezone(config('app.timezone')) // Convert to application's timezone
                        ->format('D M d, h:i A'); // e.g., Sat Dec 21, 12:29 PM
    
                    return $transaction;
                })
                ->sortByDesc('created_at')
                ->values();

            return view('admin.razorpay_transactions', [
                'transactions' => $simplifiedTransactions,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors('Error fetching transactions: ' . $e->getMessage());
        }
    }




}
