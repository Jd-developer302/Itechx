@extends('layouts.master')

@section('content')
   <div class="container">
    <h1>Create Post</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
       <div class="form-group">
    <label for="category_id">Category</label>
    <select name="category_id" class="form-control" required>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="MySummernote" row="5" class="form-control "></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
   </div>
@endsection
