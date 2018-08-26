<!--<form method="post">-->
<!--    <input name="login" type="text">-->
<!--    <input name="password" type="text">-->
<!--    <button type="submit" name="submit">Log in</button>-->
<!--</form>-->

<div class="login">
    <form method="post">
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" name="login" required>
            </div>
            <label for="inputPw" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPw" name="password"  required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
            </div>
        </div>
    </form>
    <p><a href="/shop/registration">Registration</a></p>
    <p><a href="/shop/login?forgot=true">Forgot password?</a></p>
</div>
