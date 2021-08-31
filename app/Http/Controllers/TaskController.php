<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Plots;
use App\Models\Clients;
use Illuminate\Support\Carbon;


use App\Models\Portfolio;



class TaskController extends Controller
{
    public function Task(){
        $tasks = Task::all();
        $clients = Clients::all();

        $currentDate = date('Y-m-d');
        $tomorrow = Carbon::now()->addDays(1);
        $duetoday = Task::whereDate('duedate', '=', $currentDate)->get();
        $duetomorrow = Task::whereDate('duedate', '=', $tomorrow)->get();
        $overdue = Task::whereDate('duedate', '<=', $currentDate)->get();


        return view('admin.task.task', compact('tasks','duetoday','duetomorrow','overdue','clients'));
    }

    public function TaskView(Request $request){
        $clients = Clients::all();
        $id = $request->id; 
        $tasks = Task::all()->where('client', '=', $id);
        $currentDate = date('Y-m-d');
        $tomorrow = Carbon::now()->addDays(1);
        $duetoday = Task::where('client', '=', $id)->whereDate('duedate', '=', $currentDate)->get();
        $duetomorrow = Task::where('client', '=', $id)->whereDate('duedate', '=', $tomorrow)->get();
        $overdue = Task::where('client', '=', $id)->whereDate('duedate', '<=', $currentDate)->get();


        return view('admin.task.task', compact('tasks','duetoday','duetomorrow','overdue','clients'));
    }

    public function DashView( $id){
        $clients = Clients::all();
        $portfolio = Portfolio::all();
       //  $id = $request->id; 
        $id = Portfolio::find($id);


        $currentDate = date('Y-m-d');
        $tomorrow = Carbon::now()->addDays(1);
        $tasks = Task::where('portfolio', '=', $id->id)->whereDate('duedate', '>=', $currentDate)->get();

        $duetoday = Task::where('portfolio', '=', $id->id)->whereDate('duedate', '=', $currentDate)->get();
        $duetomorrow = Task::where('portfolio', '=', $id->id)->whereDate('duedate', '=', $tomorrow)->get();
        $overdue = Task::where('portfolio', '=', $id->id)->whereDate('duedate', '<=', $currentDate)->get();
        $pailc = Plots::where('portfoliono', '=', $id->id)->where('pai_lc_expiry', '<=', $currentDate)->get();
        $fiex = Plots::where('portfoliono', '=', $id->id)->where('fi_expiry', '<=', $currentDate)->get();
        $flex = Plots::where('portfoliono', '=', $id->id)->where('fl_expiry', '<=', $currentDate)->get();
        $pmoj = Plots::where('portfoliono', '=', $id->id)->where('poa_moj_expiry', '<=', $currentDate)->get();
        $pwab = Plots::where('portfoliono', '=', $id->id)->where('poa_warba_expiry', '<=', $currentDate)->get();


        return view('admin.index', compact('tasks','duetoday','duetomorrow','overdue','clients','pailc','fiex','flex','pmoj','pwab','portfolio'));
    }

    public function TaskCreate(){
        $plots = Plots::all();
        $clients = Clients::all();
        $portfolio = Portfolio::all();



        return view('admin.task.taskCreate',compact('plots','clients','portfolio'));
        }    
        
        public function TaskStore(Request $request){

        

            Task::insert([
                'taskdesc' => $request->taskdesc,
                'portfolio' => $request->portfolio,
                'client' => $request->client,
                'plot' => $request->plot,            
                'doctype' => $request->doctype,
                'duedate' => $request->duedate,
                
    
    
    
                'created_at' => Carbon::now()
    
    
    
            ]);
    
            return Redirect()->route('tasks')->with('success', 'Task Created successfully');
        }

        public function TaskEdit($id){
            $plots = Plots::all();
            $clients = Clients::all();
            $portfolio = Portfolio::all();
            $tasks = Task::find($id);
            return view('admin.task.taskEdit', compact('tasks','plots','clients','portfolio'));
     
         }

         public function UpdateTask(Request $request, $id){

            Task::find($id)->update([
            
                'taskdesc' => $request->taskdesc,
                'portfolio' => $request->portfolio,
                'client' => $request->client,
                'plot' => $request->plot,            
                'doctype' => $request->doctype,
                'duedate' => $request->duedate,
                
    
    
    
                'created_at' => Carbon::now()
    
            ]);
    
            return Redirect()->route('tasks')->with('success', 'Task Updated successfully');
    
        } 
          
        public function closeTask($id){
            $delete = Task::find($id)->delete();
            return Redirect()->back()->with('success','Task Closed Successfuly');
    
       }
        
}
// view plot details in merge deal's
// areaname
//add a menu to view details

// transfer select deal transfer to client transfer date with in same portfolio
// finance amount * percentage / 365 = multiple by active days  -- deal no prpty value finance cost active days calculated amount export to excel