@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editing: {{ $article->title }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('articles.update', $article->slug) }}">
                        @csrf

                        @include('articles.partials.fields')
                        
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
