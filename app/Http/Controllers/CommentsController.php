<?php

namespace Danny\Http\Controllers;

use Danny\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if (Auth::check()) {
         $this->validate($request,[
          "body"=>"required",
        ]);

        $comment = Comment::create([
         "body"=>$request->input("body"),
         "url"=>$request->input("url"),
         "user_id"=>Auth::user()->id,
         "commentable_id"=>$request->input("commentable_id"),
         "commentable_type"=>$request->input("commentable_type"),

        ]);
        if ($comment) {
            return back()->with("success","Comments Created Successfuly");
        }

        return back()->withInput()->with("errors","Comment Creattion Fail");
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \Danny\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Danny\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Danny\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Danny\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
