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
        const requestUrl = "<?= base_url() ?>api_admin/alamat/read/";
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
                    data: 'rt',
                    title: 'RT',
                    render: function(data, type, row) {
                        var anis = "";
                        if(data > 9){
                            anis = "0"
                        }
                        else{
                            anis = "00"
                        }
                        return "RT." + anis + data
                    }
                },
                {
                    data: 'no_rumah',
                    title: 'Nomor Rumah'
                },
                {
                    data: 'kode_pos',
                    title: 'Kode Pos'
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
            let image_tag = row.querySelectorAll("td")[1];
            let image_name;
            if (image_tag.querySelector("a") == null) {
                image_name = "-";
            } else {
                image_name = image_tag.querySelector("a").querySelector("img").getAttribute("src");
                let image_name_splited = image_name.split("/");
                image_name = image_name_splited[image_name_splited.length - 1] + "\\" + image_name_splited[image_name_splited.length - 1];
            }
            document.getElementById("submit").setAttribute("onclick", "edit('" + image_name + "')");
        } else {
            $('#modal-title').html('Create New');
            document.getElementById("submit").setAttribute("onclick", "create()");
        }

        NProgress.start();
        if (type === "edit") {
            toedit_id = row.querySelectorAll("td")[0].innerText;
            $("#rt").val(row.querySelectorAll("td")[1].innerText.split(".")[1]);
            $("#no_rumah").val(row.querySelectorAll("td")[2].innerText);
            $("#kode_pos").val(row.querySelectorAll("td")[3].innerText);
        } else {
            $("#rt").val("");
            $("#no_rumah").val("");
            $("#kode_pos").val("");
        }
    }

    function edit(image_name) {
        var form = document.getElementById("editor-form")
        let formData = new FormData(form);
        formData.append("id", toedit_id);
        // formData.append("image_name", image_name);
        NProgress.start();
        $.ajax({
            url: base_url + "api_admin/alamat/update/",
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
                    url: base_url + "api_admin/alamat/delete/" + id + "/",
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
            url: base_url + "api_admin/alamat/create/",
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