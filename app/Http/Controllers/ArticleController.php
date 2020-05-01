<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;
use App\User;
use App\Category;
use Auth;
use App\Http\Requests\ArticlesRequest;
use App\Exports\ArticlesExport;


class ArticleController extends Controller
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
        if(Auth::user()->role == 'admin')
        {
            $articles = Article::paginate(10);
            return view('articles.index')->with('articles',$articles);
        }else
        {
            $id = Auth::user()->id;
            $articles = Article::where('user_id','=', $id)->paginate(10);
            return view('editor.index')->with('articles',$articles);
        }
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user          = Auth::user();
        $categories    = Category::all();
        return view('articles.create')->with('user',$user)->with('categories',$categories);
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
        $article = new Article;
        $article->name               = $request->name;
        $article->description        = $request->description;
        $article->user_id            = Auth::user()->id;
        $article->category_id        = $request->category;
        if($request->hasFile('image')){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'),$file);
            $article->image = 'imgs/'.$file;
        }
        
        if(Auth::user()->role == 'admin')
        {
            if($article->save()){
                return redirect('articles')->with('message', 'El articulo: '.$article->name.' fue Adicionado con Exito!');
            }

        }else
        {
            if($article->save()){
            return redirect('editor/index')->with('message', 'Su articulo: '.$article->name.' fue adicionado con Exito!');
            }
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
        $user       = Auth::user();
        $article    = Article::find($id);
        $category   = Category::find($article->category_id);
        return view('articles.show')->with('article', $article)->with('user', $user)->with('category', $category);
        // $article = Article::find($id);
        // return view('articles.show')->with('article',$article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article    = Article::find($id);
        $user       = Auth::user();
        $categories = Category::all();
        return view('articles.edit')->with('article', $article)->with('user', $user)->with('categories', $categories);
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
        $article =                   Article::find($id);
        $article->name               = $request->name;
        $article->description        = $request->description;
        $article->user_id            = Auth::user()->id;
        $article->category_id        = $request->category;
        if($request->hasFile('image')){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'),$file);
            $article->image = 'imgs/'.$file;
        }

        if(Auth::user()->role == 'admin')
        {
            if($article->save()){
                return redirect('articles')->with('message', 'El articulo: '.$article->name.' fue Modificado con Exito!');
            }else{
                return redirect('articles')->with('message', 'El articulo: '.$article->name.' No pudo ser modificado. Intentelo de nuevo');
            }
        }else
        {
            if($article->save()){
                return redirect('editor/index')->with('message', 'El articulo: '.$article->name.' fue Modificado con Exito!');
            }else{
                return redirect('editor/index')->with('message', 'El articulo: '.$article->name.' No pudo ser modificado. Intentelo de nuevo');
            }
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
        $article = Article::find($id);
        if ($article->delete()) {
            return redirect('articles')->with('message', 'El articulo: '.$article->name.' fue Eliminado con Exito!');
        }
    }

    public function pdf() {
        //$articles = Article::all();
        if(Auth::user()->role == 'admin')
        {
             //$articles = Article::all();
            $pdf = \PDF::loadView('articles.pdf', 
            [
                'users'         => User::all(),
                'categories'    => Category::all(),
                'articles'      => Article::all()
            ]);
            return $pdf->download('articles.pdf');
        }
        else
        {
            $articles = Article::where('user_id', Auth::user()->id)->get();
            $pdf = \PDF::loadView('editor.pdf',[
                'categories'    => Category::all(),
                'articles'      =>$articles
                // 'articles'      => Article::all()
            ]);
            return $pdf->download('articles.pdf');
        }
    }

    //Para crear EXCEL
    public function excel() {
        return \Excel::download( new ArticlesExport, 'articles.xlsx');
    }

// ***********************************FUNCIONES DEL EDITOR************************
    // Ruta de MyArticles
    public function myarticles()
    {
        $id = Auth::user()->id;
        $articles = Article::where('user_id','=', $id)->paginate(10);
        return view('articles.myarticles')->with('articles',$articles);

    }
    public function editorcreate(){
        $user          = Auth::user();
        $categ    = Category::all();
        return view('editor.create')->with('user',$user)->with('categories',$categ);
    }
    public function showeditor($id)
    {
        $user       = Auth::user();
        $article    = Article::find($id);
        $category   = Category::find($article->category_id);
        return view('editor.show')->with('article', $article)->with('user', $user)->with('category', $category);
    }

    public function updarticle(Request $request, $id)
    {
        $article        = Article::find($id);
        $user           = Auth::user();
        $categories     = Category::all();
        return view('editor.edit')->with('article', $article)->with('user', $user)->with('categories', $categories);
    }

}
