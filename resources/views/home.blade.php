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
    <div class="row">
        <div class="col-md-8">
            @if (!$articles->isEmpty())
                @foreach ($articles as $article)
                    <div class="card mb-4">
                        <div class="card-header">{{ $article->title }}</div>

                        <div class="card-body">
                            <p class="card-text"><span class="badge badge-secondary">{{ $article->created_at->diffForHumans() }}</span> <small>By {{ $article->user->name }}</small> &mdash; <small><span class="badge badge-success">{{ $article->comments->count() }}</span> comments</small></p>
                            <p class="card-text">{{ $article->snippet }}</p>
                            <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">Members</div>

                <div class="card-body">
                    @if (!$members->isEmpty())
                        <ul class="list-group">
                            @foreach ($members as $member)
                                <li class="list-group-item {{ auth()->user()->id == $member->id ? 'active' : '' }}">{{ $member->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <div class="alert alert-danger" role="alert">
                            There are currently no members.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
