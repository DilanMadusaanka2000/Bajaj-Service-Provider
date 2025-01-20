<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments for {{ $sparePart->name }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f7fa;
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .spare-part-details, .comments-section, .add-comment {
            margin-bottom: 20px;
        }

        .spare-part-details h2, .comments-section h3, .add-comment h3 {
            margin-bottom: 10px;
        }

        .spare-part-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .comment-card {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .comment-card p {
            margin: 0;
        }

        .comment-card .user {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .add-comment textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3182ce;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #2c5282;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #c6f6d5;
            color: #2f855a;
        }

        .alert-danger {
            background-color: #fed7d7;
            color: #c53030;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="spare-part-details">
            <h2>{{ $sparePart->name }}</h2>
            <p>Category: {{ $sparePart->category }}</p>
            <p>Price: ${{ number_format($sparePart->price, 2) }}</p>
            @if($sparePart->image)
                 <img src="{{ asset('storage/' . $sparePart->image) }}" alt="{{ $sparePart->name }}" class="spare-part-image">
             @else
              <p>No image available for this spare part.</p>
            @endif

        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="comments-section">
            <h3>Comments</h3>
            @forelse ($comments as $comment)
                <div class="comment-card">
                    <p class="user">{{ $comment->user->name }}</p>
                    <p>{{ $comment->comment }}</p>
                    <small>{{ $comment->created_at->format('d M Y, H:i') }}</small>
                </div>
            @empty
                <p>No comments yet. Be the first to comment!</p>
            @endforelse
        </div>

{{--
        <div class="add-comment">
            <h3>Add a Comment</h3>
            {{-- <form action="{{ route('spareparts.add_comment', ['spareParts_id' => $sparePart->id]) }}" method="POST">
                @csrf
                <textarea name="comment" rows="4" placeholder="Write your comment here..." required></textarea>
                <button type="submit" class="btn">Submit</button>
            </form> --}}
        </div>
    </div>
</body>
</html>
