
<?php if($registered == false) {?>

    <div class="reg">
        <form method="post" id="ch">
            <div class="form-group row">
                <label for="inputemail" class="col-sm-4 col-form-label">E-mail</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputemail" name="email" required>
                </div>
                <label for="inputName" class="col-sm-4 col-form-label">Login</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputName" name="login" required>
                </div>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#inputName").keyup(function(){
                            var thiss = $(this);
                            var value = thiss.val();
                            $.post("/shop/registration",{value:value}).done(function(data){
                                if(data === "no") //если имя не доступно
                                {
                                    $("#msgbox").fadeTo(200,0.1,function() //начнет появляться сообщение
                                    {
                                        $(this).html('Это имя уже занято').addClass('messageboxerror').fadeTo(900,1);
                                    });
                                }
                            });
                        });
                    });
                </script>
                <label for="inputPw" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPw" name="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                </div>
                    <label for="captcha" class="col-sm-4 col-form-label"><img src="/shop/app/web/captcha/captcha_hardcode/captcha.php"></label>
                <div class="col-sm-8">
                    <input id="captcha" class="input form-control" type="text" name="norobot" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary" name="submit">Sign up</button>
                </div>
            </div>
        </form>
        <p><a href="/shop/login">Already have an account?</a></p>
    </div>



<?php }?>

<?php if($registered == true) {?>
    <p>Письмо отправлено!<br>Для окончания регистрации, перейдите по ссылке в письме</p><br>
    <p><a href="/shop/products">На главную</a></p>
<?php } ?>
