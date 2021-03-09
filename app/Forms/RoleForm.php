<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class RoleForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'wrapper' => ['class' => 'form-group'],
                'label' => trans('site.title').' :',
            ])
            ->add('display_name', 'text', [
                'wrapper' => ['class' => 'form-group'],
                'label' => trans('site.displayName').' :',
            ]);
        parent::buildForm();
    }
}
