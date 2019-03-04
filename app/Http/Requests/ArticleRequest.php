<?php

namespace App\Http\Requests;

use App\Article;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'   => 'required|max:255',
            'snippet' => 'required',
            'content' => 'required',
        ];
    }

    /**
     * Save the article to the database
     */
    public function commit($article = null)
    {
        $data = $this->except(['_token']);

        $input = [
            'title' => $data['title'],
            'slug' => Str::slug($data['title']),
            'user_id' => auth()->user()->id,
            'snippet' => $data['snippet'],
            'content' => $data['content'],
            'published' => isset($data['published']) ? 1 : 0,
            'created_at' => now(),
            'updated_at' => now()
        ];

        if ($article) {
            $article->update($input);
        } else {
            Article::create($input);
        }
    }
}
