<script>
    var login_try = 0;
    $(function() {
        Login.init();
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
    $("#form-login").on("submit", function(evt) {
        evt.preventDefault();
        console.log('login')
        login_try++;
        var url = '<?= base_url('api_admin/login/auth/'); ?>';
        var fd = {};
        fd.username = $("#iusername").val();
        fd.password = $("#ipassword").val();
        if (fd.username.length <= 3) {
            $("#iusername").focus();
            toastr["warning"]("Email/username too short, minimum length is 6 digit", "Warning");
            return false;
        }
        if (fd.password.length <= 4) {
            $("#ipassword").focus();
            toastr["warning"]("Password too short, minimum length is 6 digit", "Warning");
            return false;
        }
        NProgress.start();
        $("#iusername").prop("disabled", true);
        $("#ipassword").prop("disabled", true);
        $(".btn-submit").prop("disabled", true);
        $("#icon-submit").removeClass("fa-chevron-right");
        $("#icon-submit").addClass("fa-circle-o-notch");
        $("#icon-submit").addClass("fa-spin");
        $.post(url, fd).done(function(dt) {
            NProgress.set(0.6);
            if (dt.status == 200) {
                toastr["success"]("Redirecting to dashboard, please wait!", "Login Successfully");
                setTimeout(function() {
                    NProgress.set(0.7)
                }, 2000);
                setTimeout(function() {
                    NProgress.done();
                    window.location = '<?= base_url_admin('') ?>';
                }, 3000);
            } else {
                $("#iusername").prop("disabled", false);
                $("#ipassword").prop("disabled", false);
                $(".btn-submit").prop("disabled", false);
                $("#icon-submit").addClass("fa-chevron-right");
                $("#icon-submit").removeClass("fa-circle-o-notch");
                $("#icon-submit").removeClass("fa-spin");
                NProgress.done();
                toastr["error"](dt.message, "Login Failed");
                setTimeout(function() {
                    $("#bsubmit").removeClass("fa-spin");
                    if (login_try > 2) {
                        window.location = '<?= base_url_admin('login') ?>';
                    }
                }, 3000);
            }
        }).error(function() {
            $("#iusername").prop("disabled", false);
            $("#ipassword").prop("disabled", false);
            $(".btn-submit").prop("disabled", false);
            $("#icon-submit").addClass("fa-chevron-right");
            $("#icon-submit").removeClass("fa-circle-o-notch");
            $("#icon-submit").removeClass("fa-spin");
            toastr["error"]("Something went wrong!! Cannot login right now", "Error");
            NProgress.done();
        });
    });
</script>