<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;

class PortfolioController extends Controller
{
    public function Portfolio(){
        $portfolios = Portfolio::all();
        return view('admin.portfolio.portfolio', compact('portfolios'));
    }

    public function PortfolioCreate(){
        return view('admin.portfolio.createPortfolio');
    }

    public function PortfolioStore(Request $request){
      
        
        $validateData =$request->validate([
            'agreementattach' => 'required|mimes:jpg,jpeg,png,pdf',
    
         ]);
    
        $agreementattach = $request->file('agreementattach');
    
      
        
        $name_gen = hexdec(uniqid());
    $image_ext = strtolower($agreementattach->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$image_ext;
    $up_location = 'file/agreement/';
    $last_img = $up_location.$img_name;
    $agreementattach->move($up_location,$img_name);
        
         
    
       


        Portfolio::insert([
            'portfolioname' => $request->portfolioname,
            'mgfeepercentage' => $request->mgfeepercentage,
            'minfeeperquarter' => $request->minfeeperquarter,
            'feecalmethod' => $request->feecalmethod,            
            'contactperson' => $request->contactperson,
            'contactnumber' => $request->contactnumber,
            'contactemail' => $request->contactemail,
            'agreementdate' => $request->agreementdate,
            'agreementexpdate' => $request->agreementexpdate,
            'agreementattach' => $last_img,



            'created_at' => Carbon::now()



        ]);

        return Redirect()->route('portfolio')->with('success', 'Portfolio Created successfully');

    }

    public function Edit($id){
       $portfolios = Portfolio::find($id);
       return view('admin.portfolio.editportfolio', compact('portfolios'));

    }

    public function InactivePortfolio($id){
        $delete = Portfolio::find($id)->delete();
        return Redirect()->back()->with('success','Portfolio Inactivated Successfuly');

   }
   public function PortfolioInactives(){
    $portfolios = Portfolio::all();
    $inactives = Portfolio::onlyTrashed()->latest()->paginate(5);

    return view('admin.portfolio.inactivePortfolios',compact('portfolios','inactives'));
    }

    public function ActivePortfolio($id){
        $delete = Portfolio::withTrashed()->find($id)->restore();
        return Redirect()->route('portfolio')->with('success', 'Portfolio Activated successfully');
    
      }

}
