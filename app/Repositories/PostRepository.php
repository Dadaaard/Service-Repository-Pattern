<?php

namespace App\Repositories;

use App\Models\Post;
use App\Interface\PostInterface;
use Illuminate\Database\Eloquent\Collection;

class PostRepository implements PostInterface
{

    public function __construct(protected Post $post) {}

    public function create(array $data)
    {
        return $this->post->create($data);
    }

    public function getBody(int $id): ?string
    {
        $post = $this->post->find($id);
        return $post ? $post->body : null;
    }
}
