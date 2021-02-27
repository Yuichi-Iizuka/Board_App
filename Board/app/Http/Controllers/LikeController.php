<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Topic;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class LikeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Topic $topic)
    {
        $topic->likes()->detach($request->user()->id);
        $topic->likes()->attach($request->user()->id);

        return redirect('/topic');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destory(Request $request,Topic $topic)
    {
        $topic->likes()->detach($request->user()->id);
        return redirect('/topic');
    }
}
