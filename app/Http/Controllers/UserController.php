<?php

namespace App\Http\Controllers;

use App\Repositories\Criteria\PostWithComment;
use App\Repositories\Criteria\UserDataWithPost;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class UserController extends Controller
{
    protected $userRepository;
    protected $postRepository;
    public function __construct(UserRepository $repository, PostRepository $postRepository)
    {
        $this->userRepository = $repository;
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $this->userRepository->pushCriteria(new UserDataWithPost());

        $data = $this->userRepository->all()->toArray();
        return view('post.show', ['data' => $data]);
    }

    public function post($id)
    {
        $this->postRepository->pushCriteria(new PostWithComment());

        $data = $this->postRepository->find($id)->toArray();

        return view('post.post', ['data' => $data]);
    }
}
