<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;

use Illuminate\Http\Request;
use Input;
use Redirect;
use Validator;
class ArticlesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$articles = Article::all();
		return view('articles.index', compact('articles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('articles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	   $rules = array('title' => 'required|min:5');

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return Redirect::route('articles.create')
                ->withErrors($validator)
                ->withInput();
        }

           $article = Article::create(array('title'=>Input::get('title'), 'text'=>Input::get('text')));
           return Redirect::route('articles.show', array($article->id));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$article = Article::find($id);
		return view('articles.show',compact('article'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$article = Article::find($id);

        return view('articles.edit', compact('article'));

	}

        /* 
         * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
public function update($id)
    {
        $rules = array('title' => 'required|min:5');

        $validator = Validator::make(Input::all(), $rules);
	
        $article = Article::find($id);

        if ($validator->fails())
        {
            return Redirect::route('articles.edit',array($article))
                ->withErrors($validator)
                ->withInput();
        }


        $article->title = Input::get('title');
        $article->text = Input::get('text');
        $article->save();

        return Redirect::route('articles.show', array($article->id));
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		Article::destroy($id);

        return Redirect::route('articles.index');
	}

}
