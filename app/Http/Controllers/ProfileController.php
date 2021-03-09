<?php

namespace App\Http\Controllers;

use App\Forms\UserForm;
use App\Http\Requests\StoreProfile;
use App\Http\Requests\StoreUser;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class ProfileController extends BaseController
{
    protected $model;
    protected $section = 'users';
    protected $form = UserForm::class;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(FormBuilder $formBuilder)
    {
        $user = Auth::user();
        unset($user->password);
        $form = $formBuilder->create($this->form ,[
            'method' => 'POST',
            'url' => route('profile.update'),
            'model' => $user
        ]);

        return view($this->section.'.profile', compact('form'))->with('section',$this->section);
    }

    public function update(StoreProfile $request)
    {
        $user = Auth::user();
        $data = $request->all();
        $user->update($data);

        Flash::info(trans('site.updateIsSuccessfully'));

        return redirect()->route('profile.index');
    }




}
