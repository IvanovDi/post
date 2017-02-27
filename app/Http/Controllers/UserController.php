<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Repositories\Criteria\PostWithComment;
use App\Repositories\Criteria\UserDataWithPost;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

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

    public function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat(
            $x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            ceil($length/strlen($x)) )),
            1,
            $length);
    }

    public function store(Request $request)
    {
        //определение пользовательских предупеждений
        $messages = [
            'name.required' => 'Поле :attribute обязательно должно быть заполненно',
            'description.max' => 'максимаольное допустимое колличество символов -  :max'
        ];

//        dd($request->file('media'));
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'description' => 'required|max:150'
        ], $messages);
        //возвращение ошибок при добавлении файлов
        if($validator->fails()) {
            return redirect()->route('create_post')->withErrors($validator)->withInput();
        }

        //работа с media files
        if($request->hasFile('media')) {
            $media = file_get_contents($request->file('media')->getRealPath());
            $mediaFileName = $this->generateRandomString() . $request->file('media')->getClientOriginalName();
            Storage::disk('local');
            Storage::put($mediaFileName, $media);
            }



        $this->postRepository->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'user_id' => \Auth::user()->id,
            'media' => $mediaFileName
        ]);

        return redirect()->route('show');
    }

    public function about()
     {
         return view('post.about');
     }

    public function video()
    {
        return view('post.video');
    }

    public function contact()
    {
        return view('post.contacts');
    }

    public function sendMail(Request $request)
    {
        $name = $request->input('name');
        $msg = $request->input('message');
        Mail::to('olga@gmail.com')->send(new SendMail($name, $msg));
        return redirect()->back();
    }


}
