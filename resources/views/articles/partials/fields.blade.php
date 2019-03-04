<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Title of the article" value="{{ old('title') ? old('title') :(isset($article->title) ? $article->title : '') }}">
</div>

@if ($errors->has('title'))
    <div class="alert alert-danger" role="alert">
        {{ $errors->get('title')[0] }}
    </div>
@endif

<div class="form-group">
    <label for="snippet">Snippet</label>
    <textarea class="form-control" id="snippet" name="snippet" placeholder="Snippet" rows="3">{{ old('snippet') ? old('snippet') :(isset($article->snippet) ? $article->snippet : '') }}</textarea>
</div>

@if ($errors->has('snippet'))
    <div class="alert alert-danger" role="alert">
        {{ $errors->get('snippet')[0] }}
    </div>
@endif

<div class="form-group">
    <label for="copy">Copy</label>
    <textarea class="form-control" id="copy" name="copy" placeholder="Copy" rows="3">{{ old('copy') ? old('copy') :(isset($article->copy) ? $article->copy : '') }}</textarea>
</div>

@if ($errors->has('copy'))
    <div class="alert alert-danger" role="alert">
        {{ $errors->get('copy')[0] }}
    </div>
@endif

<div class="form-group pl-4">
    <input type="checkbox" class="form-check-input" id="published" name="published" @if (old('published') || (isset($article->published) && $article->published)) checked @endif>
    <label for="published">Published</label>
</div>