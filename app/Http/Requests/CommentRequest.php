<?php

namespace App\Http\Requests;

use App\Comment;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'content' => 'required'
        ];
    }

    /**
     * Save the comment to the database
     */
    public function commit($article_id)
    {
        $data = $this->except(['_token']);
        Comment::insert([
            'user_id' => auth()->user()->id,
            'article_id' => $article_id,
            'content' => $data['content'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
