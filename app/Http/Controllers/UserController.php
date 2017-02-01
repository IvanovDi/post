<?php

namespace App\Http\Controllers;

use App\Repositories\Criteria\PostWithComment;
use App\Repositories\Criteria\UserDataWithPost;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function create()
    {
        return view('post.create_post');
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Поле :attribute обязательно должно быть заполненно',
            'description.max' => 'максимаольное допустимое колличество символов -  :max'
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'description' => 'required|max:50'
        ], $messages);

        if($validator->fails()) {
            return redirect()->route('create_post')->withErrors($validator)->withInput();
        }

        $this->postRepository->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'user_id' => \Auth::user()->id
        ]);
        return redirect()->back();
    }
}
