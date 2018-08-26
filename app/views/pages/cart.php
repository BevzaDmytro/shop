
<?php if(!empty($products)) { ?>
<div class="actions">
    <form  action="/shop/cart?action=clear" method="post">
        <button type="submit" class="btn btn-danger">Clear cart</button>
    </form>
    <div>
        <form action="/shop/makeorder">
            <button type="submit" class="btn btn-success">Buy</button>
        </form>
        <p>Total cost: <?= $price ?></p>
    </div>
</div>

<div class="products">
    <?php foreach ($products as $p){  ?>
        <div  class=" product">
            <img src="./assets/images/<?= $p->image ?>.jpg">

            <table class="table">
                <tr>
                    <th>Name</th>
                    <th><?= $p->name ?></th>
                </tr>
                <tr>
                    <th>Price</th>
                    <th><?= $p->price ?>$</th>
                </tr>
                <tr>
                    <th>Mark</th>
                    <th>4.5</th>
                </tr>
                <tr>
                    <th>Description</th>
                    <th><?= $p->description ?></th>
                </tr>
            </table>
            <form  action="/shop/cart?action=delete" method="post">
                <input name="id" value="<?= $p->id_product ?>"hidden>
                <button type="submit">Delete product</button>
            </form>

<!--            <a href="/shop/cart?action=delete"></a>-->
        </div>
    <?php } ?>
</div>

<?php } ?>


<?php if(empty($products)) { ?>
    <div class="emptycart">
        <h2>The cart is empty :(</h2>
        <p><a href="/shop/products">Back to products</a></p>
    </div>
<?php } ?>
