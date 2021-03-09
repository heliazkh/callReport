<?php

namespace App\Http\Controllers;

use App\Forms\RoleForm;
use App\Permission;
use App\Role;
use App\Http\Requests\StoreRole;
use Illuminate\Support\Facades\Cache;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;


class RolesController extends BaseController
{
    protected $model;
    protected $section = "roles";
    protected $form = RoleForm::class;

    public function __construct(Role $role)
    {
        $this->model = $role;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->model->all();

        return view($this->section . '.index',compact('items'))->with('section',$this->section);
    }

    /**
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create($this->form, [
            'url' => route($this->section . '.store'),
            'method' => 'post'
        ]);
        $permissionGroups = Permission::get()->groupBy('prefix');
        return view($this->section . '.form', compact('form', 'permissionGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreRole  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRole $request)
    {
        $data = $request->all();

        $role = $this->model->create($data);
        $role->permissions()->sync($data['permissions']);
        Cache::forget('entrust_permissions_for_role_' . $role->id);

        /*---- show messege ----*/
        Flash::success(trans('site.insertIsSuccessfully'));

        return $this->redirectToAction($data['action'], $role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, FormBuilder $formBuilder)
    {
        $item = $this->model->findOrFail($id);
        $form = $formBuilder->create($this->form, [
            'url' => route($this->section.'.update', $item->id),
            'method' => 'PUT',
            'model' => $item
        ]);
        $permissionsIdArray = $item->permissions()->pluck('id')->toArray();
        $permissionGroups = Permission::get()->groupBy('prefix');

        return view(
            $this->section.'.form',
            compact('form','permissionsIdArray','permissionGroups')
        );
    }

    /**
     * @param $id
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Role $role, StoreRole $request)
    {
        $data = $request->all();
        $role->update($data);

        $role->permissions()->sync($data['permissions']);
        Cache::forget('entrust_permissions_for_role_' . $role->id);

        /*---- show messege ----*/
        Flash::success(trans('site.updateIsSuccessfully'));

        return $this->redirectToAction('SaveAndReload', $role);
    }
}
