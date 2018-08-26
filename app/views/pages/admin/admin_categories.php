

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


<form method="post" action="/shop/addcategory">
    <button type="submit" name="new" value="category"> Создать новую категорию</button>
</form>

<div class="table-responsive">
<table class="products table table-hover table-condensed table-striped " >
    <thead class="thead-inverse">
            <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
               
                <th></th>
            </tr>
    </thead>


    <?php foreach ($categories as $d){?>
        <tr>
            <th>
                <form method="post" action="/shop/editcategory">
                    <input name="id" type="hidden" value="<?= $d->id_category?>">
                    <button name="change" value="<?= $d->id_category?>"><img class="edit" src="/shop/assets/images/pen.png"></button>
                </form>
            </th>



            <th><?= $d->id_category?></th>
            <th><?= $d->name_category?></th>

            <th>
                <form method="post">
                    <button name="deletecategory" value="<?= $d->id_category?>"><img class="delete" src="/shop/assets/images/delete.png"></button>
                </form>
            </th>
        </tr>
    <?php } ?>


</table>
</div>
