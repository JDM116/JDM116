<?php

namespace App\Http\Controllers;

use App\Models\TuningCardModel;
use Illuminate\Http\Request;

class TuningCardController extends Controller
{
    public function index(){
        $tuningcards = TuningCardModel::orderBy("created_at","desc")->get();
        return view("welcome", compact('tuningcards'));
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
