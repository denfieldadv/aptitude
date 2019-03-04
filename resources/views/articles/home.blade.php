@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('success'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (!$articles->isEmpty())
                <ul class="list-group">
                    @foreach ($articles as $article)
                        <li class="list-group-item">
                            {{ $article->title }}<br/>
                            <span class="badge badge-secondary">{{ $article->created_at->diffForHumans() }}</span> <small>By {{ $article->user->name }}</small> &mdash; <small><span class="badge badge-success">{{ $article->comments->count() }}</span> comments</small> &mdash; <a href="{{ route('articles.edit', $article->slug) }}"><small>Edit</small></a> / <a href="{{ route('articles.delete', $article->slug) }}" class="text-danger"><small>Delete</small></a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
