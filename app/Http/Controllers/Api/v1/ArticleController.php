<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $articles = Article::where('states',1)->orderBy('name', 'ASC')->get();
        // return response()->json($articles, 200);
        $articles = DB::table('articles')
            ->join('unit_of_measures','articles.unitOfMeasure_id','=','unit_of_measures.id')
            ->select('unit_of_measures.description','articles.barcode', 'articles.name', 'articles.purchasePrice','articles.salePrice','articles.stock','articles.minimumStock')
            ->where('articles.states',1)->orderBy('name', 'ASC')
            ->get();
        return response()->json($articles,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'barcode' => 'required|string|max:50|unique:articles',
            'unitOfMeasure_id' => 'required|integer',
            'name' => 'required|string|max:100',
            'purchasePrice' => 'required|numeric',
            'salePrice' => 'required|numeric',
            'stock' => 'required|numeric',
            'minimumStock' => 'required|numeric'
        ]);
        $article = null;
        if($validation){
            $article = Article::create($request->all());
            return response()->json($article, 201);
        }
        else{
            return response()->json($article,417);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\v1\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\v1\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function getArticleEdit($id){
        $code = DB::table('articles')
            ->join('unit_of_measures', 'articles.unitOfMeasure_id','=','unit_of_measures.id')
            ->select('unit_of_measures.id as articleId','unit_of_measures.description','articles.id', 'articles.barcode',
                    'articles.purchasePrice','articles.salePrice','articles.stock','articles.minimumStock')
            ->where('articles.id',$id)
            ->get();
        return response()->json($code,200);
    }
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\v1\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
