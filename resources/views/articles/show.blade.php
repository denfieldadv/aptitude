@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('success'))
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row justify-content-center mb-2">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">{{ $article->title }}</div>

                <div class="card-body">
                    <p class="card-text"><span class="badge badge-secondary">{{ $article->created_at->diffForHumans() }}</span> <small>By {{ $article->user->name }}</small> &mdash; <small><span class="badge badge-success">{{ $article->comments->count() }}</span> comments</small></p>
                    <p class="card-text">{{ $article->copy }}</p>
                </div>
            </div>
        </div>
    </div>

    @if (!$article->comments->isEmpty())
        @foreach ($article->comments as $comment)
            <div class="row justify-content-center pl-5">
                <div class="col-md-8 pl-5">
                    <div class="card mb-2">
                        <div class="card-header">{{ $comment->user->name }} - <span class="badge badge-secondary">{{ $comment->created_at->diffForHumans() }}</span></div>

                        <div class="card-body">
                            <p class="card-text">{!! $comment->content !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New comment</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('articles.comment', $article->slug) }}">
                        @csrf
                        <textarea class="form-control mb-4" name="content" placeholder="Content" rows="3"></textarea>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
