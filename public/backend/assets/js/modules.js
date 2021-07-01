$(function () {
    function deleteResource(module, element) {
        var id = $(element).attr('id').replace('delete-', '');
        var token = $('meta[name=csrf-token]').attr('content');
        Swal.fire({
            title: "Are you sure?",
            text: " You want to DELETE this record , You will not be able to recover this record!",
            type: "error",
            showCancelButton: !0,
            confirmButtonColor: "#d00000",
            confirmButtonText: "Confirm",
            cancelButtonText: "Cancel",
            closeOnConfirm: !1,
            closeOnCancel: !1
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    method: 'POST',
                    url: window.location.href + '/' + id,
                    data: {_method: 'DELETE', _token: token},
                    success: function (data) {
                        Swal.fire("Deleted!", data.success, "success");
                        location.reload()
                    }
                });
            }
        })

    }


    let modules = [
        'enums',
        'languages',
        'categories',
        'users',
        'permissions',
        'roles',
        'modules',
        'customers',
        'services',
        'providers',
        'pages',
        'addresses',
        'zones',
        'items',
        'preferences',
        'timeSlots',
        'orders',
        'promoCodes',
        'admins'

    ];
    for(let moduleKey in modules) {
        var moduleSelector = `${modules[moduleKey]}  [id^=delete-]`;
        $(document).on("click","."+moduleSelector,function() {
            deleteResource(`${modules[moduleKey]}`, this);
        });
    }


});

