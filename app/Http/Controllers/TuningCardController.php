<?php

namespace App\Http\Controllers;

use App\Models\TuningCardModel;
use Illuminate\Http\Request;

class TuningCardController extends Controller
{
    public function index(){
        TuningCardModel::orderBy("created_at","desc")->get();
        return view("welcome");
    }
    public function create(){
  TuningCardModel::new([
    'title'=> request('title') ,
    'image'=> request('image') ,
    'description'=> request('description') ,
    'amount'=> request('amount') ,
    'cost'=> request('cost') ,
  ]);
  return redirect('/');

    }
}
