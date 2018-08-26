

<!--        <form method="post">-->
<!--            <p><input type="radio" name="table" value="products"> Products</p>-->
<!--            <p><input type="radio" name="table" value="categories"> Categories</p>-->
<!---->
<!--            <button type="submit">Check</button>-->
<!--        </form>-->

<div class="btn-group btn-group-lg choose" role="group" aria-label="Basic example">
    <form method="post">
        <button type="submit" class="btn btn-secondary" name="table" value="products">Products</button>
        <button type="submit" class="btn btn-secondary" name="table" value="categories">Categories</button>
    </form>
</div>


<form method="post" action="/shop/addproduct">
    <button type="submit" name="new" value="product"> Создать новый продукт</button>
</form>

<div class="table-responsive">
<table class="products table table-hover table-condensed table-striped ">
    <thead class="thead-inverse">
             <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                 <th>Description</th>
                 <th>Category</th>
                 <th>Image</th>
                <th></th>
            </tr>
    </thead>


    <?php foreach ($products as $d){?>
        <tr>
            <th>
                <form method="post" action="/shop/editproduct">
                    <input name="id" type="hidden" value="<?= $d->id_product?>">
                    <button name="change" value="<?= $d->id_product?>"><img class="edit" src="/shop/assets/images/pen.png"></button>
                </form>
            </th>



            <th><?= $d->id_product?></th>
            <th><?= $d->name?></th>
            <th><?= $d->price?></th>
            <th><?= $d->description?></th>
            <th><?= $d->category?></th>
            <th><?= $d->image ?></th>
            <th>
                <form method="post" >
                    <button name="deleteproduct" value="<?= $d->id_product?>"><img class="delete" src="/shop/assets/images/delete.png"></button>
                </form>
            </th>
        </tr>
    <?php } ?>


</table>
</div>
