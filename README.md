1. **Database and reporting -** we have provided you with a sample dataset( of order and order tracking information received from various systems. These databases are saved in a MySQL database via Laravel controllers on a regular basis. Analyse the strutures and suggest the best way to create the following reports: 
2. 
    1. All orders with last current status (order_status>current_status) is any of [Pending pickup, pickup queued, pickup exception] and order date (Orders>order_date) > 2 days
    
    2. List of all open orders (table.Order_number) with sub-orders (Orders>order_id) which does not have status(order_status > Current_tatus) of completed
   
 Solution::
 
    I have used laravel for this task 
    My method looks like this in the controller file
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
