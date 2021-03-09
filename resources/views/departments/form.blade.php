<div class="card">
    <div class="card-header">
        <h3 class="title">
            {{ __('site.departments.create') }}
        </h3>
    </div>
    <div class="card-body">
        {!! form_start($form, ['class' => '', 'id' => 'quickForm']) !!}
            <div class="form-body">
                {!! form_row($form->title) !!}
                {!! form_widget($form->parent_id) !!}
            </div><!-- /.form-body -->
            <hr>
            <div class="form-actions">
                {!! form_row($form->SaveAndClose) !!}
            </div><!-- /.form-actions -->
        {!! form_end($form, false) !!}
    </div>
</div>


