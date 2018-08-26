
<?php if(isset($_POST['edit']) && $_POST['edit'] ==  "product") {?>
<div class="additem">
    <form method="post" >
        <input  name="id" type="hidden" value="<?= $product->id_product ?>" >

        <label class="col-sm-4 col-form-label" for="inputName">Name</label>
        <div class="form-group col-sm-8">
            <input class="form-control" name="name" type="text" id="inputName" value="<?= $product->name ?>">
        </div>

        <label class="col-sm-4 col-form-label" for="inputPrice">Price</label>
        <div class="form-group col-sm-8">
            <input class="form-control" name="price" type="number" id="inputPrice" value="<?= $product->price ?>">
        </div>

        <label class="col-sm-4 col-form-label" for="descr">Description</label>
        <div class="form-group col-sm-8">
            <input class="form-control" id="descr" name="description" type="text" value="<?= $product->description ?>">

        </div>

        <label class="col-sm-4 col-form-label" for="cat">Category</label>
        <div class="form-group col-sm-8">
            <input class="form-control" id="cat" name="category" type="text" value="<?= $product->category ?>">
        </div>

        <label class="col-sm-4 col-form-label" for="img">Image name</label>
        <div class="form-group col-sm-8">
            <input class="form-control" id="img" name="image" type="text" value="<?= $product->image ?>">
        </div>
        <button type="submit" name="changeit"> Редактировать </button>
    </form>

    <form  method="post" action="/shop/admin">
        <button type="submit" name="cancel"> Отменить </button>
    </form>
</div>
<?php } ?>

<?php if(isset($_POST['edit']) && $_POST['edit'] ==  "category") {?>
<div class="additem">
    <form method="post" >
        <input name="id" type="hidden" value="<?= $category->id_category ?>">

            <label class="col-sm-4 col-form-label" for="name">Name</label>
        <div class="form-group col-sm-8">
            <input class="form-control" name="name" type="text" id="name" value="<?= $category->name_category ?>">
        </div>
        <button type="submit" name="changeit"> Редактировать </button>
    </form>

    <form  method="post" action="/shop/admin">
        <button type="submit" name="cancel"> Отменить </button>
    </form>
</div>
<?php } ?>
