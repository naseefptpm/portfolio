<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plots;
use App\Models\Deals;
use App\Models\Clients;
use App\Models\Portfolio;
use App\Models\Renewal;
use App\Models\Fees;
use Illuminate\Support\Carbon;
use DateTime;



class CalculateFeeController extends Controller
{
    public function CalculateFee(){
        $portfolios = Portfolio::all();
    
        return view('admin.feecal.feecal',compact('portfolios'));
        }

        public function Calculate(Request $request){

         

            $clients = Clients::all();
            $portfolio = Portfolio::all();
            $deals = Deals::all();
            $id = $request->id;
            $mgfee = Portfolio::all()->where('id','=',$id);

            $type = Portfolio::where('id','=', $id)->value('feecalmethod');
            $dealstartdate = Plots::where('portfoliono','=', $id)->value('date');
            $currentDate = date('Y-m-d');
            $datetime1 = new DateTime($dealstartdate);
            $datetime2 = new DateTime($currentDate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            $plots = Plots::all()->where('portfoliono', '=', $id);
            $sum = Plots::where('portfoliono', '=', $id)->sum('financeamount');
            $feeper =  Portfolio::where('id','=', $id)->value('mgfeepercentage');
            $mult = $sum * $feeper;

             
            if($type = 'proportionate'){
            $perday = $mult / 365;
            $total = $perday * $days  ;

            } else {
                $total = $mult / 4 ;

            }



            Fees::insert([
                'portfoliono' => $request->id,
                'calcprd' => $request->calpd,
                'type' => $type,
                'mgfees' => $total,
       
                'created_at' => Carbon::now()
    
    
    
            ]);

            return view('admin.feecal.calculate',compact('plots','total','mgfee','sum'));
            } 

}
