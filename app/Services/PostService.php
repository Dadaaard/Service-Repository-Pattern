<?php

namespace App\Services;

use App\Interface\PostInterface;
use Illuminate\Support\Facades\Log;
use App\Events\UserCreated;

class PostService
{
    public function __construct(protected PostInterface $postRepository) {}

    public function createPost(array $data)
    {
        try {
            $post = $this->postRepository->create($data);
            event(new UserCreated($data));
            return $post;
        } catch (\Exception $e) {
            Log::error('Failed to create post: ' . $e->getMessage());

            // Re-throw or return false/null based on your error handling strategy
            throw $e; // or return false;
        }
    }

    public function getPostBody(?int $id = 1): ?string
    {
        return $this->postRepository->getBody($id);
    }
}
