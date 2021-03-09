<?php

namespace App\Forms;

class DepartmentForm extends BaseForm
{
    public function buildForm()
    {
        $this
            ->add('parent_id', 'text', [
                'attr' => [
                    'class' => 'form-control d-none',
                    'id' => 'parent_id'
                ]
            ])
            ->add('title', 'text', [
                'wrapper' => ['class' => 'form-group'],
                'label' => trans('site.title').' :',
            ]);
        parent::buildForm();
    }
}
