<div class="login">
    <?php if($email == false){?>
    <form method="post">
        <div class="form-group row">
            <label for="inputemail" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputemail" name="email" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary" name="submit">Send</button>
            </div>
        </div>
    </form>
    <?php } ?>

    <?php if($email == true){?>
        <form method="post">
            <div class="form-group row">
                <label for="inputpw" class="col-sm-2 col-form-label">New password</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputpw" name="password" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary" name="submit">Change</button>
                </div>
            </div>
        </form>
    <?php } ?>
</div>