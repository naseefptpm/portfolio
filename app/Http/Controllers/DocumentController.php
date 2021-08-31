<?php

namespace App\Http\Controllers;
use App\Models\Documents;
use Illuminate\Support\Carbon;


use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function DocType(){
        $documents = Documents::all();
        $inactives = Documents::onlyTrashed()->latest()->paginate(5);
    
        return view('admin.doctype.documents',compact('documents','inactives'));
        }

    public function DocCreate(){
        return view('admin.doctype.createDocument');
        }

     public function DocStore(Request $request){

        

         Documents::insert([
                'documentname' => $request->documentname,
                'docoption' => $request->docoption,
                'docdepartment' => $request->docdepartment,
                
                
    
    
    
                'created_at' => Carbon::now()
    
    
    
            ]);
    
            return Redirect()->route('document.type')->with('success', 'Document Type Created successfully');
        }
        
        public function DocumentEdit($id){
            $documents = Documents::find($id);
            return view('admin.doctype.editDocument', compact('documents'));
     
         }

         
    public function UpdateDocument(Request $request, $id){

        Documents::find($id)->update([
            'documentname' => $request->documentname,
            'docoption' => $request->docoption,
            'docdepartment' => $request->docdepartment,            



            'created_at' => Carbon::now()

        ]);

        return Redirect()->route('document.type')->with('success', 'Document Type Updated successfully');

    } 

    public function InactiveDocument($id){
        $delete = Documents::find($id)->delete();
        return Redirect()->back()->with('success','Documents Inactive Successfuly');

   }

   public function ActiveDocument($id){
    $delete = Documents::withTrashed()->find($id)->restore();
    return Redirect()->back()->with('success','Documents  Restored Successfuly');

  }
}
