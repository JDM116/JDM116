<?php

namespace App\Http\Controllers;

use App\Models\TuningCardModel;
use App\Models\User;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
        TuningCardModel::create([
            'title'=> request('title') ,
            'image'=> request('image') ,
            'description'=> request('description') ,
            'amount'=> request('amount') ,
            'cost'=> request('cost') ,
            'type'=> request('type'),
        ]);
        return redirect('/admin');

    }
    public function show()
{
    $tunings = TuningCardModel::paginate(1); // Display 10 items per page
    return view('admin', compact('tunings'));
}

public function search(Request $request)
{
    $query = $request->input('query');
    $tunings = TuningCardModel::where('title', 'LIKE', "%{$query}%")->paginate(1);

    return view('admin', compact('tunings'))->with('success', 'Результаты поиска');
}

    public function wheels(){
        $wheels = TuningCardModel::where('type', 'Диски')->get();
        return view('index', compact('wheels'));
    }
    public function register(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=>$request->role,
        ]);

       return redirect('/admin');
    }
    public function remove(Request $request)
    {
        $tuning = TuningCardModel::find($request->id);

        if ($tuning) {
            $tuning->delete();
            return redirect()->back()->with('success', 'Товар успешно удален.');
        }

        return redirect()->back()->withErrors(['Товар не найден.']);
    }
    public function update(Request $request)
    {
        $tuning = TuningCardModel::find($request->id);

        if ($tuning) {
            $tuning->title = $request->title;
            $tuning->description = $request->description;
            $tuning->image = $request->image;
            $tuning->amount = $request->amount;
            $tuning->type = $request->type;
            $tuning->cost = $request->cost;
            $tuning->save();

            return redirect()->back()->with('success', 'Товар успешно обновлен.');
        }

        return redirect()->back()->withErrors(['Товар не найден.']);

        

    }
        public function more($id)
    {
        $tuning = TuningCardModel::findOrFail($id);
        $comments = comment::where('card_id', $id)->get();
        return view('show', compact('tuning','comments',"id"));
    }

        public function profile(){

            $favorite = TuningCardModel::where('favorite', true)->get();
            $user = User::All();
            return view('profile', compact('favorite'), compact('user'));

        }

        public function share(Request $request, $id)
        {
            $request->validate([
                'body' => 'required|min:4',
            ]);
        
            Comment::create([
                'card_id' => $id,
                'author' => Auth::user()->name,
                'body' => $request->body,
            ]);
        
            return redirect()->route('tunings.more', $id);
        }
}