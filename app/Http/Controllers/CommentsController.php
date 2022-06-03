<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Blog;

class CommentsController extends Controller
{
    public function store(Blog $blog, Request $request)
  {
    // return $request;

    $blog->comments()->create([
      'comment' => $request->comment,
        
    ]);
    return redirect()->back();
  }
 
  public function delete(Comments $comment){
    $comment->delete();
    return redirect()->back();
  }

}
