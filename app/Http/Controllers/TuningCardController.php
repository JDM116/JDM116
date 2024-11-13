<?php

namespace App\Http\Controllers;

use App\Models\TuningCardModel;
use Illuminate\Http\Request;

class TuningCardController extends Controller
{

    public function index(Request $request)
{
    $query = TuningCardModel::query();

    // Обработка сортировки по названию и цене
    if ($request->has('sort_by')) {
        if ($request->sort_by === 'title') {
            $query->orderBy('title');
        } elseif ($request->sort_by === 'cost') {
            $query->orderBy('cost');
        }
    }

    // Фильтрация по типу
    if ($request->has('type') && $request->type) {
        $query->where('type', $request->type);
    }

    $tunings = $query->get();

    return view('tuning', compact('tunings'));
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
