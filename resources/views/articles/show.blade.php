@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $article->title }}</h2>
    <div>{!! $article->content !!}</div> <!-- Render the content with HTML tags -->
    <a href="{{ route('articles.index') }}" class="btn btn-secondary">Back to Articles</a>
</div>
@endsection
