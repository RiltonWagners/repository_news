<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use Illuminate\Http\Request;
use Elastic\Elasticsearch\ClientBuilder;
use Elastica\Client as ElasticaClient;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */  
    public function index()
    {
        $news = News::paginate(10);
        
        if($news){
            return response()->json($news);
        }
        return response('Not results found.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {

        $news = new News;

        try{
            
            if($news->fill($request->all())->save()){
                return response('Successfully create!');
            }
            return response('Sorry! The request could not be performed. Please try again in a few moments.');

        }catch (\Throwable $th){

            throw $th;
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
        $news = News::find($id);

        if($news){
            return response()->json($news);
        }
        return response('Not results found.');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {

        $news = News::find($id);
        if($news){
            try {

                $news->title        = $request->title;
                $news->date         = $request->date;
                $news->url          = $request->url;
                $news->source       = $request->source;
                $news->contents     = $request->contents;
                $news->updated_at   = date("Y-m-d H:i:s");

                if($news->save()){
                    return response('Successfully updated!');
                }
                return response('Sorry! The request could not be performed. Please try again in a few moments.');
                
            } catch (\Throwable $th) {
                throw $th;
            }
        }
        return response('Not results found.'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        if($news){
            try {

                if($news->delete()){
                    return response('Successfully removed!');
                }
                return response('Sorry! The request could not be performed. Please try again in a few moments.');

            } catch (\Throwable $th) {
                throw $th;
            }
        }
        return response('Not results found.');        
    }
}