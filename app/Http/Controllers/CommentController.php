<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpareParts;
use App\Models\Comment;

class CommentController extends Controller
{
    public function showComments($spareParts_id)
    {
        // Fetch spare part details
        $sparePart = SpareParts::findOrFail($spareParts_id);

        // Fetch all comments related to the spare part
        $comments = Comment::where('spareParts_id', $spareParts_id)  // Correct column name
                           ->orderBy('created_at', 'desc')
                           ->get();

        return view('SpareParts.HomePage.comment', compact('sparePart', 'comments'));
    }




}
