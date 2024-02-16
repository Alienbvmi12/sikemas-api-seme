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
        const requestUrl = "<?= base_url() ?>api_admin/aspirasi/read/";
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
                    data: 'pengirim',
                    title: 'Pengirim'
                }, 
                {
                    data: 'perihal',
                    title: 'Perihal'
                },
                {
                    data: 'status',
                    title: 'Status'
                },
                {
                    data: 'created_at',
                    title: 'Dikirim Pada'
                },
                {
                    defaultContent: '',
                    title: 'Action',
                    render: function(data, type, row) {
                        return `
                            <a href="` + base_url + `admin/` + `aspirasi/detail/` + row.id + `/` +`"><button class="btn btn-primary btn-sm">Detail</button></a>
                            <button class="btn btn-danger btn-sm" onclick="deleteM(this)">Delete</button>
                            `;
                    }
                }
            ]
        });
    });


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
                    url: base_url + "api_admin/aspirasi/delete/" + id + "/",
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
</script>