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
        const requestUrl = "<?= base_url() ?>api_admin/warga/read/";
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
                    data: 'foto',
                    title: 'Foto',
                    render: function(data, type, row) {
                        if (data == "") {
                            return "-";
                        } else {
                            if (!data.includes("http")) {
                                data = base_url + data;
                            }
                            return '<a href="' + data + '"><img src="' + data + '" style="width: 100px"></a>';
                        }
                    }
                },
                {
                    data: 'nik',
                    title: 'NIK'
                },
                {
                    data: 'nama',
                    title: 'Nama'
                },
                {
                    data: 'phone',
                    title: 'Nomor Telepon'
                },
                {
                    data: 'ttl',
                    title: 'Tempat Tanggal Lahir'
                },
                {
                    data: 'kelamin',
                    title: 'Kelamin',
                    render: function(data, type, row) {
                        if (data == 0) {
                            return "Perempuan";
                        } else {
                            return 'Laki-Laki';
                        }
                    }
                },
                {
                    data: 'kewarganegaraan',
                    title: 'Kewarganegaraan',
                    render: function(data, type, row) {
                        if (data == 0) {
                            return "WNA";
                        } else {
                            return 'WNI';
                        }
                    }
                },
                {
                    data: 'pekerjaan',
                    title: 'Pekerjaan'
                },
                {
                    data: 'posisi',
                    title: 'Posisi Dalam Masyarakat'
                },
                {
                    data: 'alamat',
                    title: 'Alamat',
                    render: function(data, type, row) {
                        return "<div style=\"width : 200px\">" + data + "</div>"
                    }
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
                image_name = image_name_splited[image_name_splited.length - 1];
            }
            document.getElementById("submit").setAttribute("onclick", "edit('" + image_name + "')");
        } else {
            $('#modal-title').html('Create New');
            document.getElementById("submit").setAttribute("onclick", "create()");
        }

        NProgress.start();
        if (type === "edit") {
            toedit_id = row.querySelectorAll("td")[0].innerText;
            $.ajax({
                url: base_url + "api_admin/warga/getById/"+toedit_id+"/",
                type: 'GET',
                contentType: false,
                processData: false,
                success: function(response) {
                    $("#nik").val(response.data.nik);
                    $("#nama").val(response.data.nama);
                    $("#phone").val(response.data.phone);
                    $("#tempat_lahir").val(response.data.tempat_lahir);
                    $("#tanggal_lahir").val(response.data.tanggal_lahir);
                    $("#kelamin").val(response.data.kelamin);
                    $("#kewarganegaraan").val(response.data.kewarganegaraan);
                    $("#pekerjaan").val(response.data.pekerjaan);
                    $("#posisi_id").val(response.data.posisi_id);
                    $("#alamat_id").val(response.data.alamat_id);
                    NProgress.done();
                },
                error: function(xhr, status, error) {
                    toastr["error"](error, "Error");
                    NProgress.done();
                }
            });
        } else {
            $("#name").val("");
            document.getElementById("image").files = {
                length: 0
            };
        }
    }

    function edit(image_name) {
        var form = document.getElementById("editor-form")
        let formData = new FormData(form);
        // formData.append("id", toedit_id);
        // formData.append("name", $("#name").val());
        if (Array.from(document.querySelector("#foto").files).length > 0) {
            formData.append("image", document.querySelector("#foto").files[0]);
            toastr["info"]("Image upload in progress, please wait", "Info");
        }
        // formData.append("image_name", image_name);
        NProgress.start();
        $.ajax({
            url: base_url + "api_admin/warga/update/",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status == 200) {
                    toastr["success"](response.message, "Success");
                    if (Array.from(document.querySelector("#image").files).length > 0) {
                        toastr["info"]("It may take a while for the image to change, please wait for a few moments, or re-check the data after 24 hour", "Info");
                    }
                } else {
                    toastr["error"](response.message, "Error");
                }
                logTable.ajax.reload();
                NProgress.done();
            },
            error: function(xhr, status, error) {
                toastr["error"](error, "Error");
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
                    url: base_url + "api_admin/brand/delete/" + id,
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
                        toastr["error"](error, "An error occured");
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
        if (Array.from(document.querySelector("#foto").files).length > 0) {
            formData.append("foto", document.querySelector("#foto").files[0]);
            toastr["info"]("Image upload in progress, please wait", "Info");
        }
        NProgress.start();
        $.ajax({
            url: base_url + "api_admin/warga/create/",
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
                toastr["error"](error, "Error");
                logTable.ajax.reload();
                NProgress.done();
            }
        });
    }
</script>