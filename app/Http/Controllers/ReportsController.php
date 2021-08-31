<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plots;
use App\Models\Deals;
use App\Models\Clients;
use App\Models\Portfolio;
use App\Models\Renewal;
use App\Models\Task;
use App\Models\Fees;
use App\Exports\ReportExport;
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


        return view('admin.reports.divmerpdf',compact('portfolios','portfolios','plots','from','to','id','currentDate'));

    }

    
    public function DivMergePdf(Request $request){
        $clients = Clients::all();
        $portfolios = Portfolio::all();

        $portfolio = Portfolio::all();
        $id = $request->id; 
       
        $plots = Plots::all()->where('portfoliono', '=', $id)->where('type', '=', 'M');
      

        return view('admin.reports.divmerpdf',compact('portfolios','portfolios','plots'));

    }


     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
       
         return Excel::download(new ReportExport, 'dividemerge.xlsx');
      
    }
     
   
    public function createPDF() {
        // retreive all records from db

        $data = Plots::all();
  
        // share data to view
        view()->share('plots',$data);
        $pdf = PDF::loadView('admin.reports.divmerpdf', $data);
  
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
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

       // view()->share('plots',$plots);
       // $pdf = PDF::loadView('admin.reports.plotAddpdf', $plots);

        return view('admin.reports.plotAddpdf',compact('portfolios','portfolios','plots','from','to','id','currentDate'));
      // return $pdf->download('pdf_file.pdf');

    }


    public function PlotAddCreatePDF() {
        // retreive all records from db
        $data = Plots::all();
  
        // share data to view
        view()->share('plots',$data);
        $pdf = PDF::loadView('admin.reports.plotAddpdf', $data);
  
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
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


        return view('admin.reports.plotClosepdf',compact('portfolios','portfolios','plots','from','to','id','currentDate'));

    }


    public function PlotCloseCreatePDF() {
        // retreive all records from db
        $data = Plots::onlyTrashed()->latest()->paginate(5);
  
        // share data to view
        view()->share('plots',$data);
        $pdf = PDF::loadView('admin.reports.plotClosepdf', $data);
  
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
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
        $pailc = Plots::where('portfoliono', '=', $id)->whereBetween('date', [$from, $to])->get();

        $fiex = Plots::where('portfoliono', '=', $id)->whereBetween('date', [$from, $to])->get();
        $flex = Plots::where('portfoliono', '=', $id)->whereBetween('date', [$from, $to])->get();
        $pmoj = Plots::where('portfoliono', '=', $id)->whereBetween('date', [$from, $to])->get();
        $pwab = Plots::where('portfoliono', '=', $id)->whereBetween('date', [$from, $to])->get();

        return view('admin.reports.renewalspdf',compact('portfolios','portfolios','pailc','fiex','flex','pmoj','pwab','from','to','id','currentDate'));

    }


    public function RenewalsCreatePDF() {
        // retreive all records from db
        $currentDate = date('Y-m-d');
        $pailc = Plots::whereDate('pai_lc_expiry', '<=', $currentDate)->get();
        $fiex = Plots::whereDate('fi_expiry', '<=', $currentDate)->get();
        $flex = Plots::whereDate('fl_expiry', '<=', $currentDate)->get();
        $pmoj = Plots::whereDate('poa_moj_expiry', '<=', $currentDate)->get();
        $pwab = Plots::whereDate('poa_warba_expiry', '<=', $currentDate)->get();  
        // share data to view
        view()->share('plots',compact('pailc','fiex','flex','pmoj' ,'pwab'));
        $pdf = PDF::loadView('admin.reports.renewalspdf', compact('pailc','fiex','flex','pmoj' ,'pwab'));
  
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
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

        return view('admin.reports.delegationpdf',compact('portfolios','portfolios','plots','from','to','id','currentDate'));

    }


    public function DelegationCreatePDF() {
        // retreive all records from db
        $plots = Plots::all();
        // share data to view
        view()->share('plots',$plots);
        $pdf = PDF::loadView('admin.reports.delegationpdf', $plots);
  
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
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

        return view('admin.reports.financepdf',compact('portfolios','portfolios','plots','from','to','id','currentDate'));

    }


    public function FinanceCreatePDF() {
        // retreive all records from db
        $plots = Plots::all();
        // share data to view
        view()->share('plots',$plots);
        $pdf = PDF::loadView('admin.reports.financepdf', $plots);
  
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
      }

      public function MGFee(Request $request){
       
        $clients = Clients::all();
        $portfolios = Portfolio::all();
        $id = $request->id; 
        $plots = Plots::all()->where('portfoliono', '=', $id);
        $mgfee = Fees::all()->where('portfoliono','=',$id);

      

        return view('admin.reports.mgfee',compact('portfolios','plots','mgfee'));
    }

    public function MGFeeReport(Request $request){
        $clients = Clients::all();
        $portfolios = Portfolio::all();
        $portfolio = Portfolio::all();
        $currentDate = date('d-m-Y');

        $id = $request->id; 
        $from = $request->fromdate;
        $to = $request->todate;
        $mgfee = Fees::all()->where('portfoliono','=',$id)->whereBetween('created_at', [$from, $to]);

        $plots = Plots::all()->where('portfoliono', '=', $id)->whereBetween('date', [$from, $to]);

        return view('admin.reports.mgfeepdf',compact('portfolios','portfolios','plots','mgfee','from','to','id','currentDate'));

    }


    public function MGFeeCreatePDF() {
        // retreive all records from db
        $plots = Plots::all();
        $mgfee = Fees::all();

        // share data to view
        view()->share('plots',compact('plots','mgfee'));
        $pdf = PDF::loadView('admin.reports.mgfeepdf',compact('plots','mgfee'));
  
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
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

        return view('admin.reports.taskpdf',compact('portfolios','portfolios','tasks','from','to','id','currentDate'));

    }


    public function TaskCreatePDF() {
        // retreive all records from db
       
       $currentDate = date('Y-m-d');

        $tasks = Task::whereDate('duedate', '<=', $currentDate)->get();

        // share data to view
        view()->share('tasks',$tasks);
        $pdf = PDF::loadView('admin.reports.taskpdf',$tasks);
  
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
      }




     

     
}
