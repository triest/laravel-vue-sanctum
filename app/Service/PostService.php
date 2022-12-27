<?php

namespace App\Service;

use App\Filters\PostFilter;
use App\Http\Requests\Post\IndexPostRequest;
use App\Models\Post;
use App\Sorters\PostSorter;
use Illuminate\Support\Facades\Auth;

class PostService
{

    public function index(IndexPostRequest $request)
    {
        $filters =  new PostFilter($request);

        $sorters = new PostSorter($request);

        $query = Post::query()->filter($filters)->sort($sorters);

        $perPage = (int)$request->perPage;
        return $query->paginate($perPage);
    }

    /**
     * @param array $date
     * @return Post
     */
    public function create(array $date): Post
    {
        $date["user_id"]= 1;
        $post = new Post();

        $post->fill($date);
        $post->save();
        return $post;
    }

    /**
     * @param Post $post
     * @return Post
     */
    public function show(Post $post): Post
    {
        return $post;
    }

    /**
     * @param Post $post
     * @param array $data
     * @return Post
     */
    public function update(Post $post, array $data): Post
    {
        $post->update($data);
        return $post;
    }

    public function destroy(Post $post)
    {
        $post->delete();
    }

}
