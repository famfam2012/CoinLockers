<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CoinLockerModel;

class MainControllers extends Controller
{

    public function locker()
    {
        $lockers = DB::table('locker')->join('price', 'locker.Coin_locker_price', '=', 'price.Coin_locker_price_id')->get();

        $list = [];

        foreach ($lockers as $row) {
            $data = [
                'Coin_locker_number' => $row->Coin_locker_number,
                'Coin_locker_status' => $row->Coin_locker_status,
                'Coin_locker_price' => $row->Coin_locker_price,
                'Coin_locker_hour_first' => $row->Coin_locker_hour_first,
                'Coin_locker_hour_next' => $row->Coin_locker_hour_next,
                'Coin_locker_size' => $row->Coin_locker_size
            ];
            array_push($list, $data);
        }

        return view('locker', [
            'locker' => $list
        ]);
    }

    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function Deposit(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok");
        $locker = (int) $request->input('locker');
        $status = (int) $request->input('status');
        $pass = $request->input('pass');

        DB::table('locker')->where('Coin_locker_number', $locker)->update([
            'Coin_locker_status' => $status,
            'Coin_locker_pass_unlock' => $pass
        ]);

        DB::table('Log')->insertGetId([
            'Coin_locker_pass_unlock' => $pass,
            'Coin_locker_number' => $locker,
            'Coin_locker_status_use' => 2,
            'Coin_locker_time_start' => now()
        ]);
        $thank = "Thank you";
        $word = "You have deposited at locker" . + $locker;
        return view('complete', [
            'message' => $word,
            'thankyou' => $thank
        ]);

        // return view('welcome');
    }

    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function withdraw(Request $request)
    {
        $locker = (int) $request->input('locker');
        $pass = (int) $request->input('pass');

        $lockers = DB::table('locker')->join('price', 'locker.Coin_locker_price', '=', 'price.Coin_locker_price_id')
            ->where([
            [
                'Coin_locker_number',
                $locker
            ]
        ])
            ->first();

        // echo $lockers->Coin_locker_pass_unlock;

        // print_r($lockers);

        if ($pass == $lockers->Coin_locker_pass_unlock) {
            $ok = DB::table('Log')->join('locker', 'Log.Coin_locker_number', '=', 'locker.Coin_locker_number')
                ->join('price', 'locker.Coin_locker_price', '=', 'price.Coin_locker_price_id')
                ->where([
                [
                    'Log.Coin_locker_status_use',
                    2
                ],
                [
                    'Log.Coin_locker_number',
                    $locker
                ]
            ])
                ->first();

            return view('withdraw', [
                'Coin_locker_using_id' => $ok->Coin_locker_using_id,
                'Coin_locker_pass_unlock' => $ok->Coin_locker_pass_unlock,
                'Coin_locker_number' => $ok->Coin_locker_number,
                'Coin_locker_status_use' => $ok->Coin_locker_status_use,
                'Coin_locker_time_start' => $ok->Coin_locker_time_start,
                'Coin_locker_time_end' => $ok->Coin_locker_time_end,
                'Coin_locker_timeuse' => $ok->Coin_locker_timeuse,
                'Coin_locker_price' => $ok->Coin_locker_price,
                'Coin_locker_status' => $ok->Coin_locker_status,
                'Coin_locker_price_id' => $ok->Coin_locker_price_id,
                'Coin_locker_hour_first' => $ok->Coin_locker_hour_first,
                'Coin_locker_hour_next' => $ok->Coin_locker_hour_next,
                'Coin_locker_size' => $ok->Coin_locker_size
            ]
            );
        } else {
            $thank = "";
            $word = "Invalid password";
            return view('complete', [
                'message' => $word,
                'thankyou' => $thank
            ]);
        }

        //
    }

    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function withdraw_ok(Request $request)
    {
        $timeuse = $request->input('timeuse');
        $endtime = $request->input('endtime');
        $all_price = $request->input('all_price');
        $id_log = $request->input('id_log');
        $lokcer = (int) $request->input('lokcer');
       
        DB::table('Log')->where([
            [
                'Coin_locker_using_id',
                $id_log
            ]
        ])->update([
            'Coin_locker_status_use' => 1,
            'Coin_locker_time_end' => $endtime,
            'Coin_locker_timeuse' => $timeuse,
            'Coin_locker_price' => $all_price
        ]);
        
        DB::table('locker')->where([
            [
                'Coin_locker_number',
                $lokcer
            ]
        ])->update([
            'Coin_locker_status' => 1,
            'Coin_locker_pass_unlock' =>(Null),
            
        ]);
        

        $thank = "Thank You";
        $word = " ";
        return view('complete', [
            'message' => $word,
            'thankyou' => $thank
        ]);
    }
}

?>
