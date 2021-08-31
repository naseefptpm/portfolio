<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
  public function Clients(){
    $clients = Clients::all();

    return view('admin.clients.clients',compact('clients'));
    }

    public function ClientCreate(){
        return view('admin.clients.createCients');
    }  

    public function ClientStore(Request $request){

        

        Clients::insert([
            'clientname' => $request->clientname,
            'clientaddress' => $request->clientaddress,
            'clienttelephone' => $request->clienttelephone,
            'clientemail' => $request->clientemail,            
            'clientidtype' => $request->clientidtype,
            'clientidno' => $request->clientidno,
            'clientidexpdate' => $request->clientidexpdate,
            



            'created_at' => Carbon::now()



        ]);

        return Redirect()->route('clients')->with('success', 'Client Created successfully');
    }
  
    public function ClientEdit($id){
        $clients = Clients::find($id);
        return view('admin.clients.editClient', compact('clients'));
 
     }

    public function UpdateClient(Request $request, $id){

        Clients::find($id)->update([
        
            'clientname' => $request->clientname,
            'clientaddress' => $request->clientaddress,
            'clienttelephone' => $request->clienttelephone,
            'clientemail' => $request->clientemail,            
            'clientidtype' => $request->clientidtype,
            'clientidno' => $request->clientidno,
            'clientidexpdate' => $request->clientidexpdate,
  
            'created_at' => Carbon::now()

        ]);

        return Redirect()->route('clients')->with('success', 'Client Updated successfully');

    } 

    public function DeleteClient($id){

        Clients::find($id)->delete();
        return Redirect()->route('clients')->with('success', 'Client Deleted successfully');


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
