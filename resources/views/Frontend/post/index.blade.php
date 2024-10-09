<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>
<body class="antialiased">
    <h1>All Posts</h1>
    <div class="row">
        @foreach($posts as $post)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <h2>{{ $post->title }}</h2>
                        <p>{!! $post->description !!}</p>
                        <p>
                            Category: {{ $post->category ? $post->category->name : 'Uncategorized' }}
                        </p>
                        @if($post->category && $post->category->image)
                            <img src="{{ asset('storage/' . $post->category->image) }}" alt="{{ $post->category->name }}" style="max-width: 100%; height: auto;">
                        @endif
                        <a href="{{ route('posts.show', $post->slug) }}">Read More</a> <!-- Adjust the route as necessary -->
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <h2>Latest Posts</h2>
<div class="latest-posts">
    @foreach($latestPosts as $latestPost)
        <div class="post">
            <h3>{{ $latestPost->title }}</h3>
            <a href="{{ route('posts.show', $latestPost->slug) }}">Read More</a>
        </div>
    @endforeach
</div>

</body>
</html>
