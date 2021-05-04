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
        $dt = date("d-m-Y H:i", strtotime(Carbon::now()->subDays(10)->toDateTimeString()));
        $data = DB::table('tbl_name')->whereNotIn('COL 5', ['Completed'])->get();
        $data1 = DB::table('tbl_name')->where('COL 6','<',$dt)->whereIn('COL 5', ['Pending pickup', 'pickup queued', 'pickup exception'])->get();
      //return ('03-04-2021 18:26'<=$dt);
        
        $myJSON = json_encode(count($data1));

return $myJSON;
       
    }
}
