@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-outline-facebook">
                        {{ trans('site.expandAll') }}
                    </button>
                    <button type="button" class="btn btn-outline-behance">
                        {{ trans('site.collapseAll') }}
                    </button>
                </div>
                <div class="card-body">
                    <div class="dd" id="departmentList">
                        <ol class="dd-list">
                            @foreach($items as $item)
                                @include('departments.nestableItem', ['item' => $item])
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" id="quickEdit">
            <button class="btn btn-primary d-none" type="button" disabled="" id="loadgif">
                <span class="spinner-border spinner-border-sm m-r-5" role="status" aria-hidden="true"></span>
                در حال بارگذاری ...
            </button>
        </div>
    </div>
@endsection


@section('additional_css')
    <link rel="stylesheet" href="{{ asset('vendors/nestable/nestable.css') }}" type="text/css">
@stop

@section('additional_js')
    <script src="{{ asset('vendors/nestable/jquery.nestable.js') }}"></script>

    {{-- script for form--}}

    <script>
        var $this = $('#departmentList');
        var $body = $("body");

        $body.on("click", '.quickCreate', function (e) {
            var url = $(this).data('url');
            var id = $(this).parent('div').data('id');
            var hyperLink = $(this);

            $.get(url, function (data, item) {
                $('#quickEdit').html(data);
                $('#parent_id').val(id);
                $('#quickForm').on('submit', function (e) {
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: '{{ route('departments.store') }}',
                        data: $(this).serialize(),
                        success: function (response) {
                            if (hyperLink.parent('div').parent('li').length) {
                                if (hyperLink.parent('div').parent('li').children('ol').length) {
                                    hyperLink.parent('div').parent('li').children('ol').append(response);
                                } else {
                                    hyperLink.parent('div').parent('li').append('<ol class="dd-list">' + response + '</ol>');
                                }
                            } else {
                                hyperLink.parent('div').next('div').children('ol').append(response);
                            }
                            $('#quickEdit').html('');
                        },
                    });

                });
            })
        });
        $body.on("click", '.quickEdit', function (e) {
            var url = $(this).data('url');
            var id = $(this).parent('div').data('id');
            var hyperLink = $(this);

            $.get(url, function (data, item) {
                $('#quickEdit').html(data);
                $('#quickForm').on('submit', function (e) {
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: '/departments/'+id,
                        data: $(this).serialize(),
                    }).done(function (response) {
                        hyperLink.parent('div').prev('div').html(response.title);
                        $('#quickEdit').html('');
                    });
                });
            })
        });
        $body.on("click", '.quickDestroy', function () {
            var url = $(this).data('url');
            var hyperLink = $(this);

            swal({
                title: 'هشدار حدف کردن',
                text: 'آیا مطمئن هستید؟',
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'حذف کن',
                cancelButtonText: 'انصراف',
                closeOnConfirm: true
            }).then(function(isConfirm) {
                if (isConfirm) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: url,
                    }).done(function (response) {
                        hyperLink.parent('div').parent('li').remove();
                        $('#quickEdit').html('');
                    });
                    /*$.get(url, function () {
                    });*/
                }
            })
        });
    </script>
@stop
