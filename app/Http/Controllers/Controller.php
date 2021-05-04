<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class Controller extends BaseController
{
    static function dbCheck(){
        $dt = date("d-m-Y H:i", strtotime(Carbon::now()->subDays(2)->toDateTimeString())); //give us the date 2 days before the current date
        
        $task_1a = DB::table('tbl_name')->where('COL 6','<',$dt)->whereIn('COL 5', ['Pending pickup', 'pickup queued', 'pickup exception'])->get(); // task 1 part a
        $task_1b = DB::table('tbl_name')->whereNotIn('COL 5', ['Completed'])->get();  // task 2 part b
        
        $myJSON = json_encode(($task_1a));

        return $myJSON;
       
    }
}
