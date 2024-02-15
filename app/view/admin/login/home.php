<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header">
        <h3 class="text-center font-weight-light my-4">Login</h3>
    </div>
    <div class="card-body">
        <form id="form-login">
            <div class="form-floating mb-3">
                <input class="form-control" id="iusername" type="text" placeholder="Email/Username" name="username" />
                <label>Email/Username</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="ipassword" type="password" placeholder="Password" name="password" />
                <label>Password</label>
            </div>
            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                <button type="submit" class="btn btn-primary" style="width: 80%; border-radius: 50px">Login</button>
            </div>
        </form>
    </div>
    <div class="card-footer text-center py-3">
        @Copyright <?= $this->config->semevar->app_name?>
    </div>
</div>