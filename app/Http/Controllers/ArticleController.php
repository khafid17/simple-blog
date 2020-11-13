<?php

namespace App\Http\Controllers;

use App\models\article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $articles = article::orderby('id', 'desc')->paginate(6);

        return view('article.index', compact('articles'));
    }
    public function show($slug){
        $article = article::where('slug', $slug)->first();

        if($article == null)
        abort(404);
        return view('article.single', compact('article'));
    }
    public function create(){
        return view('article.create');
    }
    public function store(Request $request){
        

        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif.svg',
            'title' => 'required|max:255|min:3',
            'subject' => 'required|min:10',
        ]);
        $imgName = null;
        if($request->thumbnail){
        
        $imgName = $request->thumbnail->getClientOriginalName() . '-' . time() 
                                    . '.' . $request->thumbnail->extension();
        $request->thumbnail->move(public_path('image'), $imgName);
        }
        article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'subject' => $request->subject,
            'thumbnail' => $imgName
        ]);

        return redirect('/artikel');
    }
    public function edit($id){
        $article = article::find($id);
        return view('article.edit', compact('article'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|max:255|min:3',
            'subject' => 'required|min:10',
        ]);
        $imgName = null;
        if($request->thumbnail){
            $imgName = $request->thumbnail->getClientOriginalName() . '-' . time() 
                                    . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('image'), $imgName);
        }

        article::find($id)->update([
            'title' => $request->title,
            'subject' => $request->subject,
            'thumbnail' => $imgName
        ]);
        
        
        // $article = article::find($id);
        // $article->title = $request->title;
        // $article->subject = $request->subject;
        // $article->save();

        return redirect('/artikel');
    }
    public function destroy($id){
        article::find($id)->delete();
        return redirect('/artikel');

    }
}
