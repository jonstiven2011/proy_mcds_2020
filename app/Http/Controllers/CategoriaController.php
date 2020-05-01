<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Exports\CategoriesExport;

class CategoriaController extends Controller
{

    //este metodo es para hacer que despues del logueo no vuelva a iniciar sesion solo con el link, es darle seguridad a la vista
    public function __constructor(){
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Almacenamiento de datos
        //dd($request->all());
        $category = new Category;
        $category->name               = $request->name;
        $category->description        = $request->description;
        if($request->hasFile('image')){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'),$file);
            $category->image = 'imgs/'.$file;
        }
        if($category->save()){
            return redirect('categories')->with('message', 'La categoria: '.$category->name.' fue Adicionada con Exito!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show')->with('category',$category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());

        //Modificar usuario
        $category = Category::find($id);
        $category->name               = $request->name;
        $category->description        = $request->description;
        if($request->hasFile('image')){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'),$file);
            $category->image = 'imgs/'.$file;
        }

        if($category->save()){
            return redirect('categories')->with('message', 'La categoria: '.$category->name.' fue Modificada con Exito!');
        }else{
            return redirect('categories')->with('message', 'La categoria: '.$category->name.' No pudo ser modificada. Intentelo de nuevo');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category->delete()) {
            return redirect('categories')->with('message', 'La categoria: '.$category->name.' fue Eliminado con Exito!');
        }
    }

    //Para crear PDF
    public function pdf() {
        $categories = Category::all();
        $pdf = \PDF::loadView('categories.pdf', compact('categories'));
        return $pdf->download('categories.pdf');
    }

    //Para crear EXCEL
    public function excel() {
        return \Excel::download( new CategoriesExport, 'categories.xlsx');
    }
}
