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

    // In your controller's addComment method
public function addComment(Request $request, $spareParts_id)
{
    $request->validate([
        'comment' => 'required|string|max:500',
    ]);

    // Save the comment
    Comment::create([
        'spareParts_id' => $spareParts_id,  // Note that the column is 'spareParts_id'
        'user_id' => auth()->id(),
        'comment' => $request->input('comment'),
    ]);

    return redirect()->route('spareparts.comments', ['spareParts_id' => $spareParts_id])
                     ->with('success', 'Comment added successfully!');
}

}
