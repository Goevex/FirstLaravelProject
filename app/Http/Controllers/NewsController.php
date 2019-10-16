<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Events\NewsCreatedEvent;

class NewsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    } 

    /**
     * Show user by id
     */
    public function selectOne($id){
        $news=News::findOrFail($id);
        return response()->json($news);
    }

    /**
     * Inserts user 
     */
    public function insertOne(Request $request){
        $news= new News();
        $news->title=$request->title;
        $news->content=$request->content;
        $news->user_id=$request->user()->id;
        $news->save();
        event(new NewsCreatedEvent($news));
        return response()->json(['message'=>'inserted']);
    }

    /**
     * Update user by id 
     */
    public function updateOne(Request $request, $id){
        $news=News::findOrFail($id);
        $news->title=$request->input('title');
        $news->content=$request->input('content');
        $news->user_id=$request->input('user_id');
        $news->updated_at=time();
        $news->save();
        return response()->json(['message'=>'updated']);
    }

    /**
     * Deletes user 
     */
    public function deleteOne($id){
        News::destroy($id);
        return response()->json(['message'=>'deleted']);
    }

}
