<script>
    NProgress.configure({
        parent: ".sb-topnav"
    });
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    let toedit_id = 0;
    const base_url = "<?= base_url() ?>";
    // const ftp_base_url = "<?= $this->config->semevar->ftp_base_url ?>";
    let logTable;
    $(document).ready(function(e) {
        const requestUrl = "<?= base_url() ?>api_admin/user/read/";
        logTable = $('#main_table').DataTable({
            serverSide: true,
            dom: 'lf<"create-container">rti<"d-flex justify-content-end actions mb-2">p',
            ajax: {
                url: requestUrl,
                dataSrc: 'data'
            },
            order: [
                [0, 'desc']
            ],
            columns: [{
                    data: 'id',
                    title: 'ID'
                },
                {
                    data: 'username',
                    title: 'Username'
                },
                {
                    data: 'email',
                    title: 'Email'
                },
                {
                    data: 'warga',
                    title: 'Informasi Warga'
                },
                {
                    data: 'created_at',
                    title: 'Dibuat Pada'
                },
                {
                    defaultContent: `
                    <button class="btn btn-warning btn-sm" onclick="modal(this, 'edit')" data-bs-toggle="modal" data-bs-target="#editm">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteM(this)">Delete</button>
                `,
                    title: 'Action'
                }
            ]
        });
        document.querySelector(".create-container").innerHTML += `<button class="btn btn-success" onclick="modal(this, 'create')" data-bs-toggle="modal" data-bs-target="#editm">Create new</button>`;
    });


    function modal(context, type) {
        let row = context.parentNode.parentNode;
        if (type === "edit") {
            $('#modal-title').html('Edit');
            document.getElementById("submit").setAttribute("onclick", "edit()");
        } else {
            $('#modal-title').html('Create New');
            document.getElementById("submit").setAttribute("onclick", "create()");
        }

        if (type === "edit") {
            toedit_id = row.querySelectorAll("td")[0].innerText;
            $("#username").val(row.querySelectorAll("td")[1].innerText);
            $("#email").val(row.querySelectorAll("td")[2].innerText);
            $("#warga_id").val(row.querySelectorAll("td")[3].innerText.split("\n")[0].split(":")[1].replace(" ", ""));
            document.getElementById("password").setAttribute("placeholder", "Isi kolom untuk mengganti password");
            document.getElementById("confirm_password").setAttribute("placeholder", "Isi kolom untuk mengganti password");
        } else {
            $("#username").val("");
            $("#email").val("");
            $("#password").val("");
            $("#confirm_password").val("");
            document.getElementById("password").setAttribute("placeholder", "");
            document.getElementById("confirm_password").setAttribute("placeholder", "");
            $("#warga_id").val("");
            
        }
    }

    function edit() {
        var form = document.getElementById("editor-form")
        let formData = new FormData(form);
        formData.append("id", toedit_id);
        // formData.append("image_name", image_name);
        NProgress.start();
        $.ajax({
            url: base_url + "api_admin/user/update/",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status == 200) {
                    toastr["success"](response.message, "Success");
                } else {
                    toastr["error"](response.message, "Error");
                }
                logTable.ajax.reload();
                NProgress.done();
            },
            error: function(xhr, status, error) {
                toastr["error"](xhr.responseJSON.message, "Error");
                logTable.ajax.reload();
                NProgress.done();
            }
        });
    }

    function deleteM(context) {
        const id = context.parentNode.parentNode.querySelector("td").innerHTML;
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                NProgress.start();
                $.ajax({
                    url: base_url + "api_admin/user/delete/" + id + "/",
                    type: 'DELETE',
                    contentType: 'application/json',
                    success: function(response) {
                        if (response.status == 200) {
                            toastr["success"]("Data deleted successfully", "Success");
                        } else {
                            toastr["error"](response.message, "Error");
                        }
                        logTable.ajax.reload();
                        NProgress.done();
                    },
                    error: function(xhr, status, error) {
                        toastr["error"](xhr.responseJSON.message, "An error occured");
                        logTable.ajax.reload();
                        NProgress.done();
                    }
                });
            }
        });
    }

    function create() {
        var form = document.getElementById("editor-form")
        let formData = new FormData(form);
        NProgress.start();
        $.ajax({
            url: base_url + "api_admin/user/create/",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status == 200) {
                    toastr["success"](response.message, "Success");
                } else {
                    toastr["error"](response.message, "Error");
                }
                logTable.ajax.reload();
                NProgress.done();
            },
            error: function(xhr, status, error) {
                toastr["error"](xhr.responseJSON.message, "Error");
                logTable.ajax.reload();
                NProgress.done();
            }
        });
    }
</script>