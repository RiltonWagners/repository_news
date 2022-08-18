<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(10);
        
        if($user){
            return response()->json($user);
        }
        return response('Not results found.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        try{
            
            if($user->fill($request->all())->save()){
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
        $user = User::find($id);

        if($user){
            return response()->json($user);
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
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if($user){
            try {
                
                $user->name         = $request->name;
                $user->email        = $request->email;
                $user->password     = $request->password;
                $user->updated_at   = date("Y-m-d H:i:s");

                if($user->save()){
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
        $user = User::find($id);
        if($user){
            try {

                if($user->delete()){
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
