<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PizzaController extends Controller
{
/*    public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index() {
        $pizzas = Pizza::all();
        //$pizzas = DB::table('pizzas')->orderBy('id')->get();
        //$pizzas = DB::table('pizzas')->where('type', 'hawaiian')->get();
        //$pizzas = DB::table('pizzas')->latest()->get();
        return view('/pizzas/index', [
            'pizzas' => $pizzas,
        ]);
    }
    public function show($id) {
        /*        $pizzas = Pizza::all();
                $pizza = $pizzas->findOrFail($id);*/
        $pizza = Pizza::findOrFail($id);
        return view('/pizzas/show',['pizza'=>$pizza]);
        /*return view('/pizzas/show', ['id' => $id]);*/
        /* $pizza = DB::table('pizzas')->where('id',$id)->get();
         return view('details',['pizza'=>$pizza]);*/
    }
    public function create()
    {
        return view('/pizzas/create');
    }
    public function store()
    {
        /*        error_log(request('name'));
                error_log(request('type'));
                error_log(request('base'));
                error_log($pizza);*/
        $pizza = new Pizza();
        $pizza->name = \request('name');
        $pizza->type = \request('type');
        $pizza->base = \request('base');
        $pizza->toppings = \request('toppings');
        /*error_log(\request('toppings'));*/
        //return \request('toppings');
        $pizza->save();
        return redirect('/')->with('msg','Thanks for your Order');
    }
    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();
        return redirect('/pizzas');
    }
}
