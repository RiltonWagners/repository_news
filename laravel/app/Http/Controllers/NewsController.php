<?php

namespace App\Http\Controllers;

use App\Models\News;
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
        $client = ClientBuilder::create()->build();

        $search = request('search');   
        
        if(!empty($search)){
            $params =[
                'index' => 'news',
                'type' => 'Título',
                'body' => [
                    'query' => ''
                ]
            ];

            try {

                $response = $client->search($params);

                if($response){
                    dd($response);
                }

                return response('Not results found.');


            } catch (\Throwable $th) {
                //throw $th;
                return response('Not results found.');
            }
            

        }else{
            $news = News::paginate(10);
             

            $params['index'] = 'news';
            $response = $client->indices()->stats($params);
                    
            //dd($response); 

            return view('news', ['news' => $news]); 
                  
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::paginate($id);

        return view('news', ['news'=>$news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
