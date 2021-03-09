<?php

namespace App\Http\Controllers;

use App\Forms\UserForm;
use App\Http\Requests\StoreUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class UsersController extends BaseController
{
    protected $model;
    protected $section = "users";
    protected $form = UserForm::class;

    public function __construct(User $user)
    {
        $this->model = $user;
        parent::__construct();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FormBuilder $formBuilder,Request $request)
    {
        $searchForm = $formBuilder->create($this->form, [
            'method' => 'get',
            'url' => route($this->section.'.index'),
            'model' => $request->all()
        ]);
        $items = $this->model->with('roles','department')->filter($request->all())->get();

        return view($this->section.'.index',compact('items','searchForm'))->with('section',$this->section);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create($this->form, [
            'method' => 'post',
            'url' => route($this->section.'.store')
        ]);
        return view($this->section.'.form',compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUser  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
       $data = $request->all();
       $user = $this->model->create($data);
       $user->roles()->sync($data['role_list']);

        /*---- show messege ----*/
        Flash::success(trans('site.insertIsSuccessfully'));

        return $this->redirectToAction($data['action'], $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, FormBuilder $formBuilder)
    {
        unset($user->password);
        $form = $formBuilder->create($this->form, [
            'url' => route($this->section.'.update', $user->id),
            'method' => 'PUT',
            'model' => $user
        ]);

        return view($this->section.'.form', compact('form', 'user'))->with('section', $this->section);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, StoreUser $request)
    {
        $data = $request->all();
        if ($data['password'] == '') {
            unset($data['password']);
        }

        $user->update($data);

        if (isset($data['role_list'])) {
            $user->roles()->sync($data['role_list']);
        }
        Cache::forget('entrust_roles_for_user_' . $user->id);

        /*---- show messege ----*/
        Flash::success(trans('site.updateIsSuccessfully'));

        return $this->redirectToAction('SaveAndReload', $user);
    }
}
