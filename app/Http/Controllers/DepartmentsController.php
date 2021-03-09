<?php

namespace App\Http\Controllers;

use App\Department;
use App\Forms\DepartmentForm;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\Facades\FormBuilder;

class DepartmentsController extends BaseController
{
    protected $section = "departments";
    protected $model;
    protected $form = DepartmentForm::class;

    public function __construct(Department $department)
    {
        $this->model = $department;
        parent::__construct();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Department::get()->toTree();
        return view($this->section.'.tree',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = FormBuilder::create($this->form, [
            'url' => route('departments.store'),
            'method' => 'post'
        ]);

        return view($this->section.".form",compact("form"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = $this->model->create($request->all());
        $item->parent_id = $request->get('parent_id');
        $item->save();
        if ($item->save()) {
            $moved = $item->hasMoved();
        }

        return view($this->section.'.nestableItem', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $form = FormBuilder::create($this->form, [
            'url' => route($this->section.'.update', $department->id),
            'method' => 'PUT',
            'model' => $department
        ]);

        return view($this->section.".form",compact("form","department"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $data = $request->all();
        $department->update($data);
        return response()->json(['title' => $data['title']]);

    }


}
