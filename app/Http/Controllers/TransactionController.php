<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plots;
use App\Models\Deals;
use App\Models\Clients;
use App\Models\Portfolio;
use App\Models\Renewal;
use App\Search;
use App\Post;





use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;


class TransactionController extends Controller
{
    public function AddPlot(){
        $plots = Plots::all();
        $inactives = Plots::onlyTrashed()->latest()->paginate(5);
    
        return view('admin.transactions.addPlot.addPlot',compact('plots','inactives'));
        }

   public function PlotCreate(){
    $plots = Plots::all();
    $clients = Clients::all();
    $portfolio = Portfolio::all();
        return view('admin.transactions.addPlot.plotCreate',compact('plots','clients','portfolio'));
        }   
        
    public function PlotStore(Request $request){

        $validateData =$request->validate([
            'pai_lc_attach' => 'required|mimes:jpg,jpeg,png,pdf',
            'fi_attach' => 'required|mimes:jpg,jpeg,png,pdf',
            'fl_attach' => 'required|mimes:jpg,jpeg,png,pdf',
            'email_attach_newdeal' => 'required|mimes:jpg,jpeg,png,pdf',
            'email_attach_poa' => 'required|mimes:jpg,jpeg,png,pdf',


    
         ]);
    
    $pai_lc_attach = $request->file('pai_lc_attach');
    $name_gen = hexdec(uniqid());
    $image_ext = strtolower($pai_lc_attach->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$image_ext;
    $up_location = 'file/plot/';
    $last_lc = $up_location.$img_name;
    $pai_lc_attach->move($up_location,$img_name);

    $fi_attach = $request->file('fi_attach');
    $name_gen = hexdec(uniqid());
    $image_ext = strtolower($fi_attach->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$image_ext;
    $up_location = 'file/plot/';
    $last_fi = $up_location.$img_name;
    $fi_attach->move($up_location,$img_name);

    $fl_attach = $request->file('fl_attach');
    $name_gen = hexdec(uniqid());
    $image_ext = strtolower($fl_attach->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$image_ext;
    $up_location = 'file/plot/';
    $last_fl = $up_location.$img_name;
    $fl_attach->move($up_location,$img_name);

    $email_attach_newdeal = $request->file('email_attach_newdeal');
    $name_gen = hexdec(uniqid());
    $image_ext = strtolower($email_attach_newdeal->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$image_ext;
    $up_location = 'file/plot/';
    $last_newdeal = $up_location.$img_name;
    $email_attach_newdeal->move($up_location,$img_name);

    $email_attach_poa = $request->file('email_attach_poa');
    $name_gen = hexdec(uniqid());
    $image_ext = strtolower($email_attach_poa->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$image_ext;
    $up_location = 'file/plot/';
    $last_poa = $up_location.$img_name;
    $email_attach_poa->move($up_location,$img_name);

            Plots::insert([
                'portfoliono' => $request->portfoliono,
                'clientno' => $request->clientno,
                'date' => $request->date,
                'type' => 'N',
                   'areaname' => $request->areaname,
                   'block' => $request->block,
                   'propertyvalue' => $request->propertyvalue,
                   'financeamount' => $request->financeamount,
                   'pairent' => $request->pairent,
                   'licensedpurpose' => $request->licensedpurpose,
                   'applicationno' => $request->applicationno,
                   'plotareasize' => $request->plotareasize,
                   'pai_lc_issue' => $request->pai_lc_issue,
                   'pai_lc_expiry' => $request->pai_lc_expiry,
                   'pai_lc_attach' => $last_lc,
                   'fi_issue' => $request->fi_issue,
                   'fi_expiry' => $request->fi_expiry,
                   'fi_attach' => $last_fi,
                   'fl_issue' => $request->fl_issue,
                   'fl_expiry' => $request->fl_expiry,
                   'fl_attach' => $last_fl,
                   'poa_moj_issue' => $request->poa_moj_issue,
                   'poa_moj_expiry' => $request->poa_moj_expiry,
                   'poa_moj_issued_to' => $request->poa_moj_issued_to,
                   'poa_warba_issue' => $request->poa_warba_issue,
                   'poa_warba_expiry' => $request->poa_warba_expiry,
                   'poa_warba_issued_to' => $request->poa_warba_issued_to,
                   'email_attach_newdeal' => $last_newdeal,
                   'email_attach_poa' => $last_poa,

                   
             
                   'created_at' => Carbon::now()
       
       
       
               ]);
       
               return Redirect()->route('transaction.addplot')->with('success', 'Plot Created successfully');
           }  
           
    public function PlotEdit($id){
        $plots = Plots::all();
        $clients = Clients::all();
        $portfolio = Portfolio::all();
            $plots = Plots::find($id);
            return view('admin.transactions.addPlot.editPlot', compact('plots','clients','portfolio'));
     
         }

    public function UpdatePlot(Request $request, $id){

        $validateData =$request->validate([
            'pai_lc_attach' => 'required|mimes:jpg,jpeg,png,pdf',
            'fi_attach' => 'required|mimes:jpg,jpeg,png,pdf',
            'fl_attach' => 'required|mimes:jpg,jpeg,png,pdf',
            'email_attach_newdeal' => 'required|mimes:jpg,jpeg,png,pdf',
            'email_attach_poa' => 'required|mimes:jpg,jpeg,png,pdf',
    
         ]);
    
       
    $old_image = $request->old_image;


    $pai_lc_attach = $request->file('pai_lc_attach');
    $fi_attach = $request->file('fi_attach');
    $fl_attach = $request->file('fl_attach');
    $email_attach_newdeal = $request->file('email_attach_newdeal');
    $email_attach_poa = $request->file('email_attach_poa');





     if($pai_lc_attach && $fi_attach && $fl_attach && $email_attach_newdeal && $email_attach_poa){
  
        $name_gen = hexdec(uniqid());
        $image_ext = strtolower($pai_lc_attach->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$image_ext;
        $up_location = 'file/plot/';
        $last_lc = $up_location.$img_name;
        $pai_lc_attach->move($up_location,$img_name);
    
        $name_gen = hexdec(uniqid());
        $image_ext = strtolower($fi_attach->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$image_ext;
        $up_location = 'file/plot/';
        $last_fi = $up_location.$img_name;
        $fi_attach->move($up_location,$img_name);
    
        $name_gen = hexdec(uniqid());
        $image_ext = strtolower($fl_attach->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$image_ext;
        $up_location = 'file/plot/';
        $last_fl = $up_location.$img_name;
        $fl_attach->move($up_location,$img_name);
    
        $name_gen = hexdec(uniqid());
        $image_ext = strtolower($email_attach_newdeal->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$image_ext;
        $up_location = 'file/plot/';
        $last_newdeal = $up_location.$img_name;
        $email_attach_newdeal->move($up_location,$img_name);
    
        $name_gen = hexdec(uniqid());
        $image_ext = strtolower($email_attach_poa->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$image_ext;
        $up_location = 'file/plot/';
        $last_poa = $up_location.$img_name;
        $email_attach_poa->move($up_location,$img_name);




    if(file_exists($old_image)) {
        unlink($old_image);
   }

            Plots::find($id)->update([
                'portfoliono' => $request->portfoliono,
                'clientno' => $request->clientno,
                'date' => $request->date,
                'type' => 'N',
                   'areaname' => $request->areaname,
                   'block' => $request->block,
                   'propertyvalue' => $request->propertyvalue,
                   'financeamount' => $request->financeamount,
                   'pairent' => $request->pairent,
                   'licensedpurpose' => $request->licensedpurpose,
                   'applicationno' => $request->applicationno,
                   'plotareasize' => $request->plotareasize,
                   'pai_lc_issue' => $request->pai_lc_issue,
                   'pai_lc_expiry' => $request->pai_lc_expiry,
                   'pai_lc_attach' => $last_lc,
                   'fi_issue' => $request->fi_issue,
                   'fi_expiry' => $request->fi_expiry,
                   'fi_attach' => $last_fi,
                   'fl_issue' => $request->fl_issue,
                   'fl_expiry' => $request->fl_expiry,
                   'fl_attach' => $last_fl,
                   'poa_moj_issue' => $request->poa_moj_issue,
                   'poa_moj_expiry' => $request->poa_moj_expiry,
                   'poa_moj_issued_to' => $request->poa_moj_issued_to,
                   'poa_warba_issue' => $request->poa_warba_issue,
                   'poa_warba_expiry' => $request->poa_warba_expiry,
                   'poa_warba_issued_to' => $request->poa_warba_issued_to,
                   'email_attach_newdeal' => $last_newdeal,
                   'email_attach_poa' => $last_poa,
            
    
    
    
                'created_at' => Carbon::now()
    
            ]);
    
            return Redirect()->route('transaction.addplot')->with('success', 'Plot Updated successfully');
    
        }else{

            Plots::find($id)->update([
                'portfoliono' => $request->portfoliono,
                'clientno' => $request->clientno,
                'date' => $request->date,
                'type' => 'N',
                'areaname' => $request->areaname,
                'block' => $request->block,
                'propertyvalue' => $request->propertyvalue,
                'financeamount' => $request->financeamount,
                'pairent' => $request->pairent,
                'licensedpurpose' => $request->licensedpurpose,
                'applicationno' => $request->applicationno,
                'plotareasize' => $request->plotareasize,
                'pai_lc_issue' => $request->pai_lc_issue,
                'pai_lc_expiry' => $request->pai_lc_expiry,
                'fi_issue' => $request->fi_issue,
                'fi_expiry' => $request->fi_expiry,
                'fl_issue' => $request->fl_issue,
                'fl_expiry' => $request->fl_expiry,
                'poa_moj_issue' => $request->poa_moj_issue,
                'poa_moj_expiry' => $request->poa_moj_expiry,
                'poa_moj_issued_to' => $request->poa_moj_issued_to,
                'poa_warba_issue' => $request->poa_warba_issue,
                'poa_warba_expiry' => $request->poa_warba_expiry,
                'poa_warba_issued_to' => $request->poa_warba_issued_to,
                'created_At' => Carbon::now()
         
             ]);
         
             return Redirect()->route('transaction.addplot')->with('success', 'Plot Updated * successfully');
    
         }  

    }   
    
        public function InactivePlot($id){
            $delete = Plots::find($id)->delete();
            return Redirect()->back()->with('success','Documents Inactive Successfuly');
    
       }
    
       public function ActivePlot($id){
        $delete = Plots::withTrashed()->find($id)->restore();
        return Redirect()->route('transaction.addplot')->with('success', 'Plot Activated successfully');
    
      }

      public function SearchPlot(){
    
        $search_text = $_GET['query'];
        $plots = Plots::where('areaname','LIKE', '%'.$search_text.'%')
        ->orWhere('block','LIKE', '%'.$search_text.'%')
        ->orWhere('id','LIKE', '%'.$search_text.'%')
        ->orWhere('applicationno','LIKE', '%'.$search_text.'%')
        ->orWhere('licensedpurpose','LIKE', '%'.$search_text.'%')->get();
        return view('admin.transactions.addPlot.addPlot',compact('plots'));



    }

    public function PlotInactives(){
        $plots = Plots::all();
        $inactives = Plots::onlyTrashed()->latest()->paginate(5);
    
        return view('admin.transactions.addPlot.inActivePlots',compact('plots','inactives'));
        }

    public function NewDeal(){
            $deals = Deals::all();
            $plots = Plots::all();

            return view('admin.transactions.newDeal.newDeal',compact('deals','plots'));
            }    
         
            public function DealCreate(){
                $plots = Plots::all();
                $clients = Clients::all();
                $portfolio = Portfolio::all();



                return view('admin.transactions.newDeal.dealCreate',compact('plots','clients','portfolio'));
                }     
                

                public function DealStore(Request $request){
                   
                    Deals::insert([
                        'portfoliono' => $request->portfoliono,
                        'clientno' => $request->clientno,
                        'plotno' => $request->plotno,
                        'date' => $request->date,
                        'type' => 'N',

                        
     
                        
                  
                        'created_at' => Carbon::now()
            
            
            
                    ]);
            
                    return Redirect()->route('transaction.newdeal')->with('success', 'Deal Created successfully');
                


                }

                public function DealEdit($id){
                    $deals = Deals::find($id);
                    $plots = Plots::all();
                $clients = Clients::all();
                $portfolio = Portfolio::all();
                    return view('admin.transactions.newDeal.editDeal', compact('deals','plots','clients','portfolio'));
             
                 }   
                 
                 public function UpdateDeal(Request $request, $id){
                   
                    Deals::find($id)->update([
                        'portfoliono' => $request->portfoliono,
                        'clientno' => $request->clientno,
                        'plotno' => $request->plotno,
                        'date' => $request->date,
                        
     
                        
                  
                        'created_at' => Carbon::now()
            
            
            
                    ]);
            
                    return Redirect()->route('transaction.newdeal')->with('success', 'Deal Updated successfully');
                


                } 
                
                public function InactiveDeal($id){
                    $delete = Deals::find($id)->delete();
                    return Redirect()->back()->with('success','Deal Inactivated Successfuly');
            
               }

            public function DealInactives(){
                $plots = Plots::all();
                $inactives = Plots::onlyTrashed()->latest()->paginate(5);
            
                return view('admin.transactions.newDeal.inactiveDeals',compact('plots','inactives'));
                }

                public function ActiveDeal($id){
                    $delete = Deals::withTrashed()->find($id)->restore();
                    return Redirect()->route('transaction.newdeal')->with('success', 'Deal Activated successfully');
                
                  }

                  public function Renewals(){
                      
                    $plots = Plots::all();
                    $clients = Clients::all();
                    $portfolio = Portfolio::all();
                    $deals = Deals::all();

    
    
    
                    return view('admin.transactions.renewals.renewals',compact('plots','clients','portfolio','deals'));
                    }    
            
             public function RenewSearch(Request $request){
                $id = $request->id;
                $plots = Plots::all()->where('id', '=', $id);
                $clients = Clients::all();
                $portfolio = Portfolio::all();
                $deals = Deals::all();

                
                return view('admin.transactions.renewals.renewalsUpdate',compact('plots','clients','portfolio','deals' ));

             }

                    public function RenewEdit($id){
                        $plots = Plots::find($id);

                        $clients = Clients::all();
                        $portfolio = Portfolio::all();
                        $deals = Deals::all();
                       
                        return view('admin.transactions.renewals.renewalsUpdate', compact('plots','clients','portfolio','deals'  ));
                 
                     }

                     public function RenewalStore(Request $request, $id){

                        $validateData = $request->validate([
                            'repai_lc_attach' => 'required|mimes:jpg,jpeg,png,pdf',
                            'refi_attach' => 'required|mimes:jpg,jpeg,png,pdf',
                            'refl_attach' => 'required|mimes:jpg,jpeg,png,pdf',
                            'reemail_attach_newdeal' => 'required|mimes:jpg,jpeg,png,pdf',
                            'reemail_attach_poa' => 'required|mimes:jpg,jpeg,png,pdf',
                
                
                    
                         ]);
                    
                    $repai_lc_attach = $request->file('repai_lc_attach');
                    $name_gen = hexdec(uniqid());
                    $image_ext = strtolower($repai_lc_attach->getClientOriginalExtension());
                    $img_name = $name_gen.'.'.$image_ext;
                    $up_location = 'file/plot/';
                    $last_lc = $up_location.$img_name;
                    $repai_lc_attach->move($up_location,$img_name);
                
                    $refi_attach = $request->file('refi_attach');
                    $name_gen = hexdec(uniqid());
                    $image_ext = strtolower($refi_attach->getClientOriginalExtension());
                    $img_name = $name_gen.'.'.$image_ext;
                    $up_location = 'file/plot/';
                    $last_fi = $up_location.$img_name;
                    $refi_attach->move($up_location,$img_name);
                
                    $refl_attach = $request->file('refl_attach');
                    $name_gen = hexdec(uniqid());
                    $image_ext = strtolower($refl_attach->getClientOriginalExtension());
                    $img_name = $name_gen.'.'.$image_ext;
                    $up_location = 'file/plot/';
                    $last_fl = $up_location.$img_name;
                    $refl_attach->move($up_location,$img_name);
                
                    $reemail_attach_newdeal = $request->file('reemail_attach_newdeal');
                    $name_gen = hexdec(uniqid());
                    $image_ext = strtolower($reemail_attach_newdeal->getClientOriginalExtension());
                    $img_name = $name_gen.'.'.$image_ext;
                    $up_location = 'file/plot/';
                    $last_newdeal = $up_location.$img_name;
                    $reemail_attach_newdeal->move($up_location,$img_name);
                
                    $reemail_attach_poa = $request->file('reemail_attach_poa');
                    $name_gen = hexdec(uniqid());
                    $image_ext = strtolower($reemail_attach_poa->getClientOriginalExtension());
                    $img_name = $name_gen.'.'.$image_ext;
                    $up_location = 'file/plot/';
                    $last_poa = $up_location.$img_name;
                    $reemail_attach_poa->move($up_location,$img_name);
                
                            //Renewal::insert  
                             Plots::find($id)->update([
                                   'portfoliono' => $request->reportfoliono,
                                   'clientno' => $request->reclientno,
                                   'plotno' => $request->replotno,
                                   'type' => 'R',

                                   'pai_lc_issue' => $request->repai_lc_issue,
                                   'pai_lc_expiry' => $request->repai_lc_expiry,
                                   'pai_lc_attach' => $last_lc,
                                   'fi_issue' => $request->refi_issue,
                                   'fi_expiry' => $request->refi_expiry,
                                   'fi_attach' => $last_fi,
                                   'fl_issue' => $request->refl_issue,
                                   'fl_expiry' => $request->refl_expiry,
                                   'fl_attach' => $last_fl,
                                   'poa_moj_issue' => $request->repoa_moj_issue,
                                   'poa_moj_expiry' => $request->repoa_moj_expiry,
                                   'poa_moj_issued_to' => $request->repoa_moj_issued_to,
                                   'poa_warba_issue' => $request->repoa_warba_issue,
                                   'poa_warba_expiry' => $request->repoa_warba_expiry,
                                   'poa_warba_issued_to' => $request->repoa_warba_issued_to,
                                   'email_attach_newdeal' => $last_newdeal,
                                   'email_attach_poa' => $last_poa,
                
                          
                                   'created_at' => Carbon::now()
                       
                       
                       
                               ]);
                       
                               return Redirect()->route('transaction.renewals')->with('success', 'Plot Renewed successfully');
                           }    

                           public function Merge(){
                      
                            $plots = Plots::all();
                            $clients = Clients::all();
                            $portfolio = Portfolio::all();
                            $deals = Deals::all();
        
            
            
            
                            return view('admin.transactions.merge.merge',compact('plots','clients','portfolio','deals'));
                            }   


                         
                            public function SearchMerge(){
                                $clients = Clients::all();
                                $portfolio = Portfolio::all();
                                $deals = Deals::all();
                                $search_text = $_GET['query'];
                                $plots = Plots::where('areaname','LIKE', '%'.$search_text.'%')
                                ->orWhere('block','LIKE', '%'.$search_text.'%')
                                ->orWhere('id','LIKE', '%'.$search_text.'%')
                                ->orWhere('applicationno','LIKE', '%'.$search_text.'%')
                                ->orWhere('licensedpurpose','LIKE', '%'.$search_text.'%')->get();
                                return view('admin.transactions.merge.merge',compact('plots','clients','portfolio','deals'));
                        
                        
                        
                            }
                            public function MergeDeals(Request $request){
                                $plots = Plots::all();
                                $clients = Clients::all();
                                $portfolio = Portfolio::all();
                                $id = $request->id;


                                Plots::whereIn('id',explode(",",$id))->delete();
                                 $delete = Plots::find($request->id2)->delete();

                                //  $deal = Plots::wherein('id',explode(",",$id))->find($id);;
                                
                
                                return view('admin.transactions.merge.mergeDeal',compact('plots','clients','portfolio'));
                                }   

                                public function SearchDeal(){

                                $search_text = $_GET['query1'];
                                $plots = Plots::where('areaname','LIKE', '%'.$search_text.'%')
                                ->orWhere('block','LIKE', '%'.$search_text.'%')
                                ->orWhere('id','LIKE', '%'.$search_text.'%')
                                ->orWhere('applicationno','LIKE', '%'.$search_text.'%')
                                ->orWhere('licensedpurpose','LIKE', '%'.$search_text.'%')->get();
                
                                return view('admin.transactions.merge.merge',compact('plots'));

                                }

                            public function DealMerge(Request $request){
                   

                                    $validateData =$request->validate([
                                        'pai_lc_attach' => 'required|mimes:jpg,jpeg,png,pdf',
                                        'fi_attach' => 'required|mimes:jpg,jpeg,png,pdf',
                                        'fl_attach' => 'required|mimes:jpg,jpeg,png,pdf',
                                        'email_attach_newdeal' => 'required|mimes:jpg,jpeg,png,pdf',
                                        'email_attach_poa' => 'required|mimes:jpg,jpeg,png,pdf',
                            
                            
                                
                                     ]);
                                
                                $pai_lc_attach = $request->file('pai_lc_attach');
                                $name_gen = hexdec(uniqid());
                                $image_ext = strtolower($pai_lc_attach->getClientOriginalExtension());
                                $img_name = $name_gen.'.'.$image_ext;
                                $up_location = 'file/plot/';
                                $last_lc = $up_location.$img_name;
                                $pai_lc_attach->move($up_location,$img_name);
                            
                                $fi_attach = $request->file('fi_attach');
                                $name_gen = hexdec(uniqid());
                                $image_ext = strtolower($fi_attach->getClientOriginalExtension());
                                $img_name = $name_gen.'.'.$image_ext;
                                $up_location = 'file/plot/';
                                $last_fi = $up_location.$img_name;
                                $fi_attach->move($up_location,$img_name);
                            
                                $fl_attach = $request->file('fl_attach');
                                $name_gen = hexdec(uniqid());
                                $image_ext = strtolower($fl_attach->getClientOriginalExtension());
                                $img_name = $name_gen.'.'.$image_ext;
                                $up_location = 'file/plot/';
                                $last_fl = $up_location.$img_name;
                                $fl_attach->move($up_location,$img_name);
                            
                                $email_attach_newdeal = $request->file('email_attach_newdeal');
                                $name_gen = hexdec(uniqid());
                                $image_ext = strtolower($email_attach_newdeal->getClientOriginalExtension());
                                $img_name = $name_gen.'.'.$image_ext;
                                $up_location = 'file/plot/';
                                $last_newdeal = $up_location.$img_name;
                                $email_attach_newdeal->move($up_location,$img_name);
                            
                                $email_attach_poa = $request->file('email_attach_poa');
                                $name_gen = hexdec(uniqid());
                                $image_ext = strtolower($email_attach_poa->getClientOriginalExtension());
                                $img_name = $name_gen.'.'.$image_ext;
                                $up_location = 'file/plot/';
                                $last_poa = $up_location.$img_name;
                                $email_attach_poa->move($up_location,$img_name);
                            
                                        Plots::insert([
                                            'portfoliono' => $request->portfoliono,
                                            'clientno' => $request->clientno,
                                            'date' => $request->date,
                                            'type' => 'M',
                                               'areaname' => $request->areaname,
                                               'block' => $request->block,
                                               'propertyvalue' => $request->propertyvalue,
                                               'financeamount' => $request->financeamount,
                                               'pairent' => $request->pairent,
                                               'licensedpurpose' => $request->licensedpurpose,
                                               'applicationno' => $request->applicationno,
                                               'plotareasize' => $request->plotareasize,
                                               'pai_lc_issue' => $request->pai_lc_issue,
                                               'pai_lc_expiry' => $request->pai_lc_expiry,
                                               'pai_lc_attach' => $last_lc,
                                               'fi_issue' => $request->fi_issue,
                                               'fi_expiry' => $request->fi_expiry,
                                               'fi_attach' => $last_fi,
                                               'fl_issue' => $request->fl_issue,
                                               'fl_expiry' => $request->fl_expiry,
                                               'fl_attach' => $last_fl,
                                               'poa_moj_issue' => $request->poa_moj_issue,
                                               'poa_moj_expiry' => $request->poa_moj_expiry,
                                               'poa_moj_issued_to' => $request->poa_moj_issued_to,
                                               'poa_warba_issue' => $request->poa_warba_issue,
                                               'poa_warba_expiry' => $request->poa_warba_expiry,
                                               'poa_warba_issued_to' => $request->poa_warba_issued_to,
                                               'email_attach_newdeal' => $last_newdeal,
                                               'email_attach_poa' => $last_poa,
                            
                                               
                                         
                                               'created_at' => Carbon::now()
                                   
                                   
                                   
                                           ]);
                                   
                                           return Redirect()->route('transaction.addplot')->with('success', 'Plot Created successfully');
                                       
                            
            
            
                            }

                            public function Split(){
                                // $plots = Plots::all();
                                // $clients = Clients::all();
                                // $portfolio = Portfolio::all();
                               // $deals = Deals::where('type','LIKE', '%'.'M'.'%');

                                $plots = Plots::all()->where('type', '=', 'M');


                
                
                                return view('admin.transactions.split.split',compact('plots'));
                                } 


                                public function SplitDeals(Request $request){
                                    $plots = Plots::all();
                                    $clients = Clients::all();
                                    $portfolio = Portfolio::all();
                                    $deals = Deals::all();
                                    $id = $request->id;
    
    
                                    Plots::whereIn('id',explode(",",$id))->delete();
    
    
                    
                    
                                    return view('admin.transactions.split.splitDeal',compact('plots','clients','portfolio'));
                                    }  

                                    public function SplitStore(Request $request){
                   
                                        $validateData =$request->validate([
                                            'pai_lc_attach' => 'required|mimes:jpg,jpeg,png,pdf',
                                            'fi_attach' => 'required|mimes:jpg,jpeg,png,pdf',
                                            'fl_attach' => 'required|mimes:jpg,jpeg,png,pdf',
                                            'email_attach_newdeal' => 'required|mimes:jpg,jpeg,png,pdf',
                                            'email_attach_poa' => 'required|mimes:jpg,jpeg,png,pdf',
                                
                                
                                    
                                         ]);
                                    
                                    $pai_lc_attach = $request->file('pai_lc_attach');
                                    $name_gen = hexdec(uniqid());
                                    $image_ext = strtolower($pai_lc_attach->getClientOriginalExtension());
                                    $img_name = $name_gen.'.'.$image_ext;
                                    $up_location = 'file/plot/';
                                    $last_lc = $up_location.$img_name;
                                    $pai_lc_attach->move($up_location,$img_name);
                                
                                    $fi_attach = $request->file('fi_attach');
                                    $name_gen = hexdec(uniqid());
                                    $image_ext = strtolower($fi_attach->getClientOriginalExtension());
                                    $img_name = $name_gen.'.'.$image_ext;
                                    $up_location = 'file/plot/';
                                    $last_fi = $up_location.$img_name;
                                    $fi_attach->move($up_location,$img_name);
                                
                                    $fl_attach = $request->file('fl_attach');
                                    $name_gen = hexdec(uniqid());
                                    $image_ext = strtolower($fl_attach->getClientOriginalExtension());
                                    $img_name = $name_gen.'.'.$image_ext;
                                    $up_location = 'file/plot/';
                                    $last_fl = $up_location.$img_name;
                                    $fl_attach->move($up_location,$img_name);
                                
                                    $email_attach_newdeal = $request->file('email_attach_newdeal');
                                    $name_gen = hexdec(uniqid());
                                    $image_ext = strtolower($email_attach_newdeal->getClientOriginalExtension());
                                    $img_name = $name_gen.'.'.$image_ext;
                                    $up_location = 'file/plot/';
                                    $last_newdeal = $up_location.$img_name;
                                    $email_attach_newdeal->move($up_location,$img_name);
                                
                                    $email_attach_poa = $request->file('email_attach_poa');
                                    $name_gen = hexdec(uniqid());
                                    $image_ext = strtolower($email_attach_poa->getClientOriginalExtension());
                                    $img_name = $name_gen.'.'.$image_ext;
                                    $up_location = 'file/plot/';
                                    $last_poa = $up_location.$img_name;
                                    $email_attach_poa->move($up_location,$img_name);
                                
                                            Plots::insert([
                                                'portfoliono' => $request->portfoliono,
                                                'clientno' => $request->clientno,
                                                'date' => $request->date,
                                                'type' => 'S',
                                                   'areaname' => $request->areaname,
                                                   'block' => $request->block,
                                                   'propertyvalue' => $request->propertyvalue,
                                                   'financeamount' => $request->financeamount,
                                                   'pairent' => $request->pairent,
                                                   'licensedpurpose' => $request->licensedpurpose,
                                                   'applicationno' => $request->applicationno,
                                                   'plotareasize' => $request->plotareasize,
                                                   'pai_lc_issue' => $request->pai_lc_issue,
                                                   'pai_lc_expiry' => $request->pai_lc_expiry,
                                                   'pai_lc_attach' => $last_lc,
                                                   'fi_issue' => $request->fi_issue,
                                                   'fi_expiry' => $request->fi_expiry,
                                                   'fi_attach' => $last_fi,
                                                   'fl_issue' => $request->fl_issue,
                                                   'fl_expiry' => $request->fl_expiry,
                                                   'fl_attach' => $last_fl,
                                                   'poa_moj_issue' => $request->poa_moj_issue,
                                                   'poa_moj_expiry' => $request->poa_moj_expiry,
                                                   'poa_moj_issued_to' => $request->poa_moj_issued_to,
                                                   'poa_warba_issue' => $request->poa_warba_issue,
                                                   'poa_warba_expiry' => $request->poa_warba_expiry,
                                                   'poa_warba_issued_to' => $request->poa_warba_issued_to,
                                                   'email_attach_newdeal' => $last_newdeal,
                                                   'email_attach_poa' => $last_poa,
                                
                                                   
                                             
                                                   'created_at' => Carbon::now()
                                       
                                       
                                       
                                               ]);
                                
                                        return Redirect()->route('split.create')->with('success', 'Deal Split successfully');
                                    
                    
                    
                                    }

                                    public function Transfer(){
                      
                                        $plots = Plots::all();
                                        $clients = Clients::all();
                                        $portfolio = Portfolio::all();
                                        $deals = Deals::all();
                                        $portfolios = Portfolio::all();

                    
                        
                        
                        
                                        return view('admin.transactions.transfer.transfer',compact('plots','clients','portfolios','deals'));
                                        }  

                public function TransferPlot(Request $request){
                    $clients = Clients::all();
                    $portfolio = Portfolio::all();
                    $deals = Deals::all();
                    $id = $request->id;
                    $plots = Plots::all()->where('portfoliono', '=', $id);
                   
        
                    return view('admin.transactions.transfer.transferPlot',compact('plots'));
                    } 



                    public function index()
                    {
                        return view('admin.transactions.addPlot.plotCreate');
                    }
                
                    public function selectSearch(Request $request)
                    {
                        $clients = [];
                
                        if($request->has('q')){
                            $search_text = $request->q;
                            $clients = Clients::where('clientname','LIKE', '%'.$search_text.'%')
                            ->orWhere('clienttelephone','LIKE', '%'.$search_text.'%')
                            ->orWhere('id','LIKE', '%'.$search_text.'%')
                            ->orWhere('clientemail','LIKE', '%'.$search_text.'%')
                            ->orWhere('clientidno','LIKE', '%'.$search_text.'%')
                                    ->get();
                        }
                        return response()->json($clients);
                    }

                    public function SearchClient(){
    
                        $search_text = $_GET['query'];
                        $clients = Clients::where('clientname','LIKE', '%'.$search_text.'%')
                        ->orWhere('clienttelephone','LIKE', '%'.$search_text.'%')
                        ->orWhere('id','LIKE', '%'.$search_text.'%')
                        ->orWhere('clientemail','LIKE', '%'.$search_text.'%')
                        ->orWhere('clientidno','LIKE', '%'.$search_text.'%')->get();
                        return view('admin.clients.clients',compact('clients'));
                
                
                
                    }


            
}




