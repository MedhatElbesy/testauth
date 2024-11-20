<!-- resources/views/articles/index.blade.php -->
@extends('layouts.app')

@section('title', 'All Articles')

@section('content')
<a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Create New Article</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{!! $article->content !!}</td>
                <td>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
