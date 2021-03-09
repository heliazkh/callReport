
if ($("#selectAllPermissions").length) {
    $("#selectAllPermissions").on('change', function() {
        if ($(this).is(':checked')) {
            $('.permissions').prop('checked', true);
        } else {
            $('.permissions').prop('checked', false);
        }
    });
}

/*---- show alert deleteButton -----*/
$('.deleteButton').click(function (e) {
    e.preventDefault();
    var form = $(this).parents('form');
    swal({
        title: 'هشدار حدف کردن',
        text: 'آیا مطمئن هستید؟',
        icon: "warning",
        buttons: {
            confirm : 'بله',
            cancel : 'خیر'
        },
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
            form.submit();
        }
    })
});

if ($(".select2").length) {
    $('.select2').select2({
        placeholder: 'Select'
    });
}

$(".btn-search").click(function(){
    $(".searchBox").toggleClass('d-none');
});







