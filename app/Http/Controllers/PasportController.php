<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRequest as AppValidationRequest;
use Illuminate\Http\Request\ValidationRequest;
use DB;
use App\Pasport;
use auth;
use app\User;
use Illuminate\Queue\Failed\NullFailedJobProvider;
use Illuminate\View\View;

class PasportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
     public function __construct()
     {
         $this->middleware('auth');
     }


   public function index()
   {
         $list=Pasport::all();
         return view('pasports.index',['pasports'=>$list]);
   }
   public function create()
   {
       return view('pasports.create');
   }
   public function store(AppValidationRequest $v)
   {
   
    /*$data['user_id']=auth::user()->id;
    $data=$v->only(['nom','prenom','CIN','email','NUP','user_id']);
    $pass=Pasport::create($data);*/

    $da=new Pasport();
    $da->nom=$v->input('nom');
    $da->prenom=$v->input('prenom');
    $da->email=$v->input('email');
    $da->CIN=$v->input('CIN');
    $da->NUP=$v->input('NUP');
    $da->user_id=auth::user()->id;
    $da->save();
    return redirect('pasports');
   }
   public function edit($id)
   {
    $item=Pasport::FindOrFail($id);
    return view('pasports.edit',['item'=>$item]);

   }

   public function update(AppValidationRequest $v,$id)
   {
    $pass=Pasport::find($id);
    $pass->nom=$v->input('nom');
    $pass->prenom=$v->input('prenom');
    $pass->CIN=$v->input('CIN');
    $pass->email=$v->input('email');
    $pass->NUP=$v->input('NUP');
    $pass->save();
    session()->flash('update','the update done successfuly !');
    return redirect('pasports');
         
   }

public function destroy($id)
{
    $pass=Pasport::find($id);
    $pass->delete();
    return redirect('pasports');
}

public function search(AppValidationRequest $input)
{
    $cin =$input->input('search');
    $list=Pasport::query()->wherelike('CIN',$cin);
    return view('pasports.search',['list'=>$list]);

}
public function recouver_emails()
{
    
    DB::update('update pasports set deleted_at=null');
 
    return redirect('pasports');
}


}
