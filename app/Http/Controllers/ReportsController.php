<?php

namespace App\Http\Controllers;

use App\Exports\DelegationExport;
use App\Exports\DivMerExport;
use App\Exports\FinanceExport;
use App\Exports\MgFeeExport;
use App\Exports\PlotCloseExport;
use App\Exports\RenewalExport;
use Illuminate\Http\Request;
use App\Models\Plots;
use App\Models\Deals;
use App\Models\Clients;
use App\Models\Portfolio;
use App\Models\Renewal;
use App\Models\Task;
use App\Models\Fees;
use App\Exports\ReportExport;
use App\Exports\TaskExport;
use App\Exports\TaskCompleteExport;

use App\Imports\ReportImport;
use Maatwebsite\Excel\Facades\Excel;
//use PDF;
//use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
    



class ReportsController extends Controller
{
    public function Reports(){
       
        $portfolios = Portfolio::all();



        return view('admin.reports.reports', compact('portfolios'));
    }

    public function ReportList(Request $request){
        $clients = Clients::all();
        $portfolio = Portfolio::all();
        $deals = Deals::all();
        $id = $request->id; 
        $tasks = Task::all()->where('portfolio', '=', $id);
        $currentDate = date('Y-m-d');
        $pailc = Plots::where('portfoliono', '=', $id)->whereDate('pai_lc_expiry', '<=', $currentDate)->get();
        $fiex = Plots::where('portfoliono', '=', $id)->whereDate('fi_expiry', '<=', $currentDate)->get();
        $flex = Plots::where('portfoliono', '=', $id)->whereDate('fl_expiry', '<=', $currentDate)->get();
        $pmoj = Plots::where('portfoliono', '=', $id)->whereDate('poa_moj_expiry', '<=', $currentDate)->get();
        $pwab = Plots::where('portfoliono', '=', $id)->whereDate('poa_warba_expiry', '<=', $currentDate)->get();

        $inactives = Plots::where('portfoliono', '=', $id)->onlyTrashed()->latest()->paginate(5);
        $plots = Plots::all()->where('portfoliono', '=', $id);
       // $total = Plots::where('portfoliono', '=', $id)->sum('financeamount');
        $mgfee = Fees::all()->where('portfoliono','=',$id);

        return view('admin.reports.reportslist',compact('plots','mgfee','tasks','pailc','fiex','flex','pmoj','pwab','inactives'));

    }

    public function DivMerge(Request $request){
       
        $clients = Clients::all();
        $portfolios = Portfolio::all();
        $id = $request->id; 
     
        $plots = Plots::all()->where('portfoliono', '=', $id)->where('type', '=', 'M');

        return view('admin.reports.divmer',compact('portfolios','plots'));
    }

    public function DivMergeReport(Request $request){
        $clients = Clients::all();
        $portfolios = Portfolio::all();
        $currentDate = date('d-m-Y');

        $portfolio = Portfolio::all();
        $id = $request->id; 
        $from = $request->fromdate;
        $to = $request->todate;
        $plots = Plots::all()->where('portfoliono', '=', $id)->where('type', '=', 'M')->whereBetween('date', [$from, $to]);
        $pdf = PDF::loadView('admin.reports.divmerpdf',compact('portfolios','plots','from','to','id','currentDate'));

        switch ($request->input('action')) {
            case 'report':
           return $pdf->stream();
           break;
           case 'export':
           return Excel::download(new DivMerExport($from, $to, $id),'report.xlsx');
           break;
           }


    }



    public function Split(Request $request){
       
      $clients = Clients::all();
      $portfolios = Portfolio::all();
      $id = $request->id; 
   
      $plots = Plots::all()->where('portfoliono', '=', $id);

      return view('admin.reports.split',compact('portfolios','plots'));
  }

  public function SplitReport(Request $request){
      $clients = Clients::all();
      $portfolios = Portfolio::all();
      $currentDate = date('d-m-Y');

      $portfolio = Portfolio::all();
      $id = $request->id; 
      $from = $request->fromdate;
      $to = $request->todate;
      $plots = Plots::all()->where('portfoliono', '=', $id)->where('split', '!=', NULL)->whereBetween('date', [$from, $to]);
      $pdf = PDF::loadView('admin.reports.splitpdf',compact('portfolios','plots','from','to','id','currentDate'));

      switch ($request->input('action')) {
          case 'report':
         return $pdf->stream();
         break;
         case 'export':
         return Excel::download(new DivMerExport($from, $to, $id),'report.xlsx');
         break;
         }


  }



      public function PlotAdd(Request $request){
       
        $clients = Clients::all();
        $portfolios = Portfolio::all();
        $id = $request->id; 
     
        $plots = Plots::all()->where('portfoliono', '=', $id);

        return view('admin.reports.plotAdd',compact('portfolios','plots'));
    }

    public function PlotAddReport(Request $request){
        $clients = Clients::all();
        $portfolios = Portfolio::all();
        $currentDate = date('d-m-Y');
        $from = $request->fromdate;
        $to = $request->todate;
        $portfolio = Portfolio::all();
        $id = $request->id; 
        $plots = Plots::all()->where('portfoliono', '=', $id)->whereBetween('date', [$from, $to]);
        // $clientname = Clients::join('plots','plots.clientno','=','clients.clientname');
        // $plotss = Plots::with('clients')->get();
       // $clientname = Clients::select('clientname')->where('id',1)->get();
       $finance = Plots::where('portfoliono', '=', $id)->whereBetween('date', [$from, $to])->sum('financeamount');
       $propertyvalue = Plots::where('portfoliono', '=', $id)->whereBetween('date', [$from, $to])->sum('propertyvalue');


        $pdf = PDF::loadView('admin.reports.plotAddpdf',compact('portfolios','plots','from','to','id','currentDate','clients','finance','propertyvalue'));

       // view()->share('plots',$plots,);
        switch ($request->input('action')) {
         case 'report':
        return $pdf->stream();
        break;
        case 'export':
        return Excel::download(new ReportExport($from, $to, $id),'report.xlsx');
        break;
        }

    //    if($request->has('download')){  
      

    //    return $pdf->download('pdf_file.pdf');
    //    }
      // return response()->file($pdf);
      // return view('admin.reports.plotAddpdf',compact('portfolios','plots','from','to','id','currentDate'));

       // return $pdf->download('pdf_file.pdf');
      
    }
 


      public function PlotClose(Request $request){
       
        $clients = Clients::all();
        $portfolios = Portfolio::all();
        $id = $request->id; 
       
     
        $plots = Plots::where('portfoliono', '=', $id)->onlyTrashed()->latest()->paginate(5);

        return view('admin.reports.plotClose',compact('portfolios','plots'));
    }

    public function PlotCloseReport(Request $request){
        $clients = Clients::all();
        $portfolios = Portfolio::all();
        $currentDate = date('d-m-Y');

        $from = $request->fromdate;
        $to = $request->todate;
        $portfolio = Portfolio::all();
        $id = $request->id; 
        $plots = Plots::where('portfoliono', '=', $id)->whereBetween('date', [$from, $to])->onlyTrashed()->latest()->paginate(5);
        $finance = Plots::where('portfoliono', '=', $id)->whereBetween('date', [$from, $to])->onlyTrashed()->latest()->paginate(5)->sum('financeamount');
        $propertyvalue = Plots::where('portfoliono', '=', $id)->whereBetween('date', [$from, $to])->onlyTrashed()->latest()->paginate(5)->sum('propertyvalue');
        $pdf = PDF::loadView('admin.reports.plotClosepdf',compact('portfolios','plots','from','to','id','currentDate','finance','propertyvalue'));

        switch ($request->input('action')) {
            case 'report':
           return $pdf->stream();
           break;
           case 'export':
           return Excel::download(new PlotCloseExport($from, $to, $id),'report.xlsx');
           break;
           }

       // return view('admin.reports.plotClosepdf',compact('portfolios','portfolios','plots','from','to','id','currentDate'));

    }





      public function Renewals(Request $request){
       
        $clients = Clients::all();
        $portfolios = Portfolio::all();
        $id = $request->id; 
        $from = $request->fromdate;
        $to = $request->todate;
        $currentDate = date('Y-m-d');
        $pailc = Plots::where('portfoliono', '=', $id)->whereDate('pai_lc_expiry', '<=', $currentDate)->get();
        $fiex = Plots::where('portfoliono', '=', $id)->whereBetween('date', [$from, $to])->get();
        $flex = Plots::where('portfoliono', '=', $id)->whereDate('fl_expiry', '<=', $currentDate)->get();
        $pmoj = Plots::where('portfoliono', '=', $id)->whereDate('poa_moj_expiry', '<=', $currentDate)->get();
        $pwab = Plots::where('portfoliono', '=', $id)->whereDate('poa_warba_expiry', '<=', $currentDate)->get();

        return view('admin.reports.renewals',compact('portfolios','pailc','fiex','flex','pmoj','pwab'));
    }

    public function RenewalsReport(Request $request){
        $clients = Clients::all();
        $portfolios = Portfolio::all();
        $portfolio = Portfolio::all();
        $id = $request->id; 
        $from = $request->fromdate;
        $to = $request->todate;
        $currentDate = date('Y-m-d');
       // $pailc = Plots::where('portfoliono', '=', $id)->whereDate('pai_lc_expiry', '<=', $currentDate)->get();
        $pailc = Plots::where('portfoliono', '=', $id)->whereDate('pai_lc_expiry', '<=', $currentDate)->whereBetween('date', [$from, $to])->get();

        $fiex = Plots::where('portfoliono', '=', $id)->whereDate('fi_expiry', '<=', $currentDate)->whereBetween('date', [$from, $to])->get();
        $flex = Plots::where('portfoliono', '=', $id)->whereDate('fl_expiry', '<=', $currentDate)->whereBetween('date', [$from, $to])->get();
        $pmoj = Plots::where('portfoliono', '=', $id)->whereDate('poa_moj_expiry', '<=', $currentDate)->whereBetween('date', [$from, $to])->get();
        $pwab = Plots::where('portfoliono', '=', $id)->whereDate('poa_warba_expiry', '<=', $currentDate)->whereBetween('date', [$from, $to])->get();
        $pdf = PDF::loadView('admin.reports.renewalspdf', compact('pailc','fiex','flex','pmoj' ,'pwab','id','from','to','currentDate'));

        switch ($request->input('action')) {
            case 'report':
           return $pdf->stream();

           break;
           case 'export':
           return Excel::download(new RenewalExport($from, $to, $id),'report.xlsx');
           break;
           }
        // return view('admin.reports.renewalspdf',compact('portfolios','portfolios','pailc','fiex','flex','pmoj','pwab','from','to','id','currentDate'));

    }


   


      public function Delegation(Request $request){
       
        $clients = Clients::all();
        $portfolios = Portfolio::all();
        $id = $request->id; 
        $plots = Plots::all()->where('portfoliono', '=', $id);

      

        return view('admin.reports.delegation',compact('portfolios','plots'));
    }

    public function DelegationReport(Request $request){
        $clients = Clients::all();
        $portfolios = Portfolio::all();
        $portfolio = Portfolio::all();
        $currentDate = date('d-m-Y');

        $id = $request->id; 
        $from = $request->fromdate;
        $to = $request->todate;
        $plots = Plots::all()->where('portfoliono', '=', $id)->whereBetween('date', [$from, $to]);

        $pdf = PDF::loadView('admin.reports.delegationpdf',compact('portfolios','plots','from','to','id','currentDate'));

        switch ($request->input('action')) {
            case 'report':
           return $pdf->stream();
           break;
           case 'export':
           return Excel::download(new DelegationExport($from, $to, $id),'report.xlsx');
           break;
           }

       // return view('admin.reports.delegationpdf',compact('portfolios','portfolios','plots','from','to','id','currentDate'));

    }


  




      public function Finance(Request $request){
       
        $clients = Clients::all();
        $portfolios = Portfolio::all();
        $id = $request->id; 

        $plots = Plots::all()->where('portfoliono', '=', $id);

      

        return view('admin.reports.finance',compact('portfolios','plots'));
    }

    public function FinanceReport(Request $request){
        $clients = Clients::all();
        $portfolios = Portfolio::all();
        $portfolio = Portfolio::all();
        $currentDate = date('d-m-Y');

        $id = $request->id; 
        $from = $request->fromdate;
        $to = $request->todate;
        $plots = Plots::all()->where('portfoliono', '=', $id)->whereBetween('date', [$from, $to]);
        $finance = Plots::where('portfoliono', '=', $id)->whereBetween('date', [$from, $to])->sum('financeamount');
        $propertyvalue = Plots::where('portfoliono', '=', $id)->whereBetween('date', [$from, $to])->sum('propertyvalue');
        $pdf = PDF::loadView('admin.reports.financepdf',compact('portfolios','plots','from','to','id','currentDate','finance','propertyvalue'));

        switch ($request->input('action')) {
            case 'report':
           return $pdf->stream();
           break;
           case 'export':
           return Excel::download(new FinanceExport($from, $to, $id),'report.xlsx');
           break;
           }

      //  return view('admin.reports.financepdf',compact('portfolios','portfolios','plots','from','to','id','currentDate'));

    }



      public function MGFee(Request $request){
       
        $clients = Clients::all();
        $portfolios = Portfolio::all();
        $id = $request->id; 
        $plots = Plots::all()->where('portfoliono', '=', $id);
        $mgfee = Fees::all();

      

        return view('admin.reports.mgfee',compact('portfolios','plots','mgfee'));
    }

    public function MGFeeReport(Request $request){
        $clients = Clients::all();
        $portfolios = Portfolio::all();
        $portfolio = Portfolio::all();
        $currentDate = date('d-m-Y');

        $id = $request->id; 
        $year = $request->year;
        $calcprd = $request->calcprd;
        // $from = $request->fromdate;
        // $to = $request->todate;
        // $mgfee = Fees::all()->where('portfoliono','=',$id)->whereBetween('created_at', [$from, $to]);

        // $plots = Plots::all()->where('portfoliono', '=', $id)->whereBetween('date', [$from, $to]);
        $mgfee = Fees::all()->where('portfoliono','=',$id)->where('year','=',$year)->where('calcprd','=',$calcprd);
        $sum = Fees::all()->where('portfoliono','=',$id)->where('year','=',$year)->where('calcprd','=',$calcprd)->sum('mgfees');



        $pdf = PDF::loadView('admin.reports.mgfeepdf',compact('portfolios','mgfee','year','calcprd','id','currentDate','sum'));

        switch ($request->input('action')) {
            case 'report':
           return $pdf->stream();
           break;
           case 'export':
           return Excel::download(new MgFeeExport($year, $calcprd, $id),'report.xlsx');
           break;
           }

      //  return view('admin.reports.mgfeepdf',compact('portfolios','portfolios','plots','mgfee','from','to','id','currentDate'));

    }



      public function Task(Request $request){
       
        $clients = Clients::all();
        $portfolios = Portfolio::all();
        $id = $request->id; 
        $currentDate = date('Y-m-d');

        $tasks = Task::where('portfolio', '=', $id)->whereDate('duedate', '>=', $currentDate)->get();
      

        return view('admin.reports.task',compact('portfolios','tasks'));
    }

    public function TaskReport(Request $request){
        $clients = Clients::all();
        $portfolios = Portfolio::all();
        $portfolio = Portfolio::all();
        $id = $request->id; 
        $currentDate = date('d-m-Y');
        $from = $request->fromdate;
        $to = $request->todate;
        $tasks = Task::where('portfolio', '=', $id)->whereBetween('created_at', [$from, $to])->get();
        //->whereDate('duedate', '>=', $currentDate)

        $pdf = PDF::loadView('admin.reports.taskpdf',compact('portfolios','tasks','from','to','id','currentDate'));

        switch ($request->input('action')) {
            case 'report':
           return $pdf->stream();
           break;
           case 'export':
           return Excel::download(new TaskExport($from, $to, $id),'report.xlsx');
           break;
           }

     //   return view('admin.reports.taskpdf',compact('portfolios','portfolios','tasks','from','to','id','currentDate'));

    }


    public function TaskComplete(Request $request){
       
      $clients = Clients::all();
      $portfolios = Portfolio::all();
      $id = $request->id; 
      $currentDate = date('Y-m-d');

      $tasks = Task::where('portfolio', '=', $id)->whereDate('duedate', '>=', $currentDate)->get();
    

      return view('admin.reports.taskComplete',compact('portfolios','tasks'));
  }

  public function TaskCompleteReport(Request $request){
      $clients = Clients::all();
      $portfolios = Portfolio::all();
      $portfolio = Portfolio::all();
      $id = $request->id; 
      $currentDate = date('d-m-Y');
      $from = $request->fromdate;
      $to = $request->todate;
      $tasks = Task::where('portfolio', '=', $id)->whereBetween('created_at', [$from, $to])->onlyTrashed()->latest()->paginate(5);
      //->whereDate('duedate', '>=', $currentDate)

      $pdf = PDF::loadView('admin.reports.taskCompletePdf',compact('portfolios','tasks','from','to','id','currentDate'));

      switch ($request->input('action')) {
          case 'report':
         return $pdf->stream();
         break;
         case 'export':
         return Excel::download(new TaskCompleteExport($from, $to, $id),'report.xlsx');
         break;
         }

   //   return view('admin.reports.taskpdf',compact('portfolios','portfolios','tasks','from','to','id','currentDate'));

  }


 




     

     
}
