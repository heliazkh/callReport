<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class BaseForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('SaveAndClose', 'submit', [
                'label' => '<i class="icon-check"></i> '.trans('site.add'),
                'attr' => [
                    'class' => 'btn btn-success curve',
                    'value' => 'SaveAndClose',
                    'name' => 'action'
                ]
            ]);
    }
}
