<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Services\PostService;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{

    public function __construct(protected PostService $postService) {}

    public function index()
    {
        $post = $this->postService->getPostBody();
        return view('post', compact('post'));
    }

    public function store(PostRequest $request): RedirectResponse
    {
        try {
            $this->postService->createPost($request->validated());
            return redirect()->back()->with('success', 'Post created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create post. Please try again.');
        }
    }
}
