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

    function deleteM() {
        const id = "<?= $aspirasi->balasan_id?>"
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
                    url: base_url + "api_admin/balasan/delete/" + id + "/",
                    type: 'DELETE',
                    contentType: 'application/json',
                    success: function(response) {
                        if (response.status == 200) {
                            toastr["success"]("Data deleted successfully", "Success");
                            location.reload()
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
        formData.append("aspirasi_id", "<?= $aspirasi->id?>")
        formData.append("pengguna_id", "<?= $admin->id?>")
        NProgress.start();
        $.ajax({
            url: base_url + "api_admin/balasan/create/",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status == 200) {
                    toastr["success"](response.message, "Success");
                    location.reload()
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