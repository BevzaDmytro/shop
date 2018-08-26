<h2>Add page</h2>

<!--        <form method="post">-->
<!--            <p><input type="radio" name="table" value="products"> Products</p>-->
<!--            <p><input type="radio" name="table" value="categories"> Categories</p>-->
<!---->
<!--            <button type="submit">Check</button>-->
<!--        </form>-->

    <?php if(isset($_POST['new']) && $_POST['new'] ==  "product") {?>
<div class="additem">
    <form method="post" >
        <div class="form-group row">
            <input  name="id" type="hidden" >

            <label for="inputName" class="col-sm-4 col-form-label">Name</label>
            <div class="form-group col-sm-8">
                <input class="form-control" name="name" type="text" id="inputName">
             </div>


            <label for="inputPrice" class="col-sm-4 col-form-label"">Price</label>
                <div class="form-group col-sm-8">
                    <input class="form-control" name="price" type="number" id="inputPrice">
                </div>


            <label for="descr" class="col-sm-4 col-form-label">Description</label>
                <div class="form-group col-sm-8">
                    <input class="form-control" id="descr" name="description" type="text">
                </div>


            <label for="cat" class="col-sm-4 col-form-label">Category</label>
                 <div class="form-group col-sm-8">
                    <input class="form-control" id="cat" name="category" type="text"">
                 </div>


            <label for="img" class="col-sm-4 col-form-label">Image name</label>
                <div class="form-group col-sm-8">
                 <input class="form-control" id="img" name="image" type="text"">
                </div>

        </div>
        <div class="col-sm-10 offset-sm-4">
            <button class="btn btn-primary" type="submit" name="add"> Добавить </button>
        </div>

    </form>

    <form  method="post" action="/shop/admin">
        <div class="col-sm-10 offset-sm-4">
            <button class="btn btn-primary cancel col-lg-offset" type="submit" name="cancel"> Отменить </button>
        </div>
    </form>
</div>
<?php } ?>




    <?php if(isset($_POST['new']) && $_POST['new'] ==  "category") {?>
<div class="additem">
    <form method="post" >
        <input name="id" type="hidden" >
        <div class="form-group">
            <label for="name" class="col-sm-4 col-form-label">Name</label>

            <div class="form-group col-sm-8">
                <input class="form-control" name="name" type="text" id="name">
            </div>
        </div>
        <div class="col-sm-10 offset-sm-4">
            <button class="btn btn-primary" type="submit" name="add"> Добавить </button>
        </div>
    </form>

    <form  method="post" action="/shop/admin">
        <div class="col-sm-10 offset-sm-4">
            <button class="btn btn-primary cancel col-lg-offset" type="submit" name="cancel"> Отменить </button>
        </div>
    </form>
</div>
<?php } ?>

