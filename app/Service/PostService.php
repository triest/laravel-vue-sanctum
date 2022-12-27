<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostService
{
    /**
     * @param array $date
     * @return Post
     */
    public function create(array $date): Post
    {
        $date = Auth::id();
        $post = new Post();

        $post->fill($date);
        $post->save();
        return $post;
    }



}
