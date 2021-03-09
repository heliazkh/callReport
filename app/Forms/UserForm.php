<?php

namespace App\Forms;

use App\Role;
use App\Department;

class UserForm extends BaseForm
{
    public function buildForm()
    {
        $this
            ->add('first_name', 'text', [
                'label' => trans('site.firstName').' :',
                'wrapper' => ['class' => 'form-group'],
            ])
            ->add('last_name', 'text', [
                'label' => trans('site.lastName').' :',
                'wrapper' => ['class' => 'form-group'],
            ])
            ->add('name', 'text', [
                'label' => trans('site.fullName').' :',
                'wrapper' => ['class' => 'form-group'],
            ])
            ->add('email', 'text', [
                'label' => trans('site.email').' :',
                'wrapper' => ['class' => 'form-group'],
            ])
            ->add('mobile', 'text', [
                'label' => trans('site.mobile').' :',
                'wrapper' => ['class' => 'form-group'],
            ])
            ->add('username', 'text', [
                'label' => trans('site.username').' :',
                'wrapper' => ['class' => 'form-group'],
            ])
            ->add('password', 'password', [
                'label' => trans('site.password').' :',
                'wrapper' => ['class' => 'form-group'],
            ])
            ->add('role_list', 'select', [
                'choices' => $this->getRoles(),
                'label' => trans('site.role').' :',
                'wrapper' => ['class' => 'form-group'],
                'empty_value' => trans('site.select'),
                'attr' => [
                    'class' => 'form-control select2'
                ]
            ])
            ->add('department_id', 'select', [
                'choices' => $this->getDepartments(),
                'label' => trans('site.department').' :',
                'wrapper' => ['class' => 'form-group'],
                'empty_value' => trans('site.select'),
                'attr' => [
                    'class' => 'form-control select2'
                ]
            ])
            ->add('activated', 'select', [
                'choices' => ['1' => trans('site.active'), '0' => trans('site.inactive')],
                'label' => trans('site.activeOrInactive').' :',
                'wrapper' => ['class' => 'form-group'],
                'attr' => [
                    'class' => 'form-control select2'
                ]
            ])
        ;
    }

    private function getRoles()
    {
        return Role::orderBy('id', 'DESC')->pluck('display_name', 'id')->toArray();
    }

    private function getDepartments()
    {
        return Department::root()->get()->pluck('title', 'id')->toArray();
    }
}
