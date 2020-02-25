<div class="register-main">
    <div class="col-md-6">
        <form method="post" action="auth/login" data-toggle="validator" role="form" id="signUpForm">
            <div class="form-group">
                <label for="login" class="control-label">Login</label>
                <input type="text" class="form-control" name="login" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="password" class="control-label">Password</label>
                <input type="password" data-minlength="6" class="form-control" id="password" name="password"
                       placeholder="Password" required>
            </div>
            <div class="address form-group">
                <button type="submit" class="btn btn-primary">Войти</button>
            </div>
        </form>
    </div>
</div>
