<?php if(!isset($_SESSION['user']) && $done == false) {?>
<div class="order">
    <form method="post">
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" name="email" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary" name="submit">OK</button>
            </div>
        </div>
    </form>
    <a href="/shop/main">На главную</a>
</div>
<?php } ?>



<?php if(isset($_SESSION['user']) || $done == true) {?>
    <div class="order">
        <p>Заказ успешно оформлен!</p>
        <a href="/shop/main">На главную</a>
    </div>
<?php } ?>