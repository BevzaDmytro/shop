<div class="categories">
    <h3>Categories</h3>

    <div class="list-group">

        <?php foreach ($categories as $c){?>
            <a href="#!" class="list-group-item list-group-item-action"><?= $c->name_category ?></a>
        <?php }?>

    </div>

</div>

<div class="product">
    <p class="back"><a href="/shop/products">Back to products</a></p>
    <div class="image">
        <img src="/shop/assets/images/<?= $product->image ?>.jpg">
    </div>

    <table class="table first">
        <tr>
            <th>Name</th>
            <th><?= $product->name ?></th>
        </tr>
        <tr>
            <th>Price</th>
            <th><?= $product->price ?>$</th>
        </tr>
        <tr>
            <th>Mark</th>
            <th>4.5</th>
        </tr>
        <tr>
            <th>Description</th>
            <th><?= $product->description ?></th>
        </tr>
    </table>

    <div class="add">
<!--        1<input type="range" step="1" min="0" max="100" value="10" id="price" name="price"/>100-->
        <form method="post" id="add-{<?= $product->id_product ?>}">
            <div class="number">
                <button class="minus">-</button>
                <input type="number" value="1" size="5" class="count" name="count" id="count"/>
                <button class="plus">+</button>
            <button type="submit" class="link-button">Add to cart</button>
        </form>
    </div>
        <script>
            $("form[id|='add']").on('click', function() {
                id = $(this).attr('id').split('-');
                id = id[1];
                var count = $("input#count").val();
                //$.get('/shop/product/<?= $product->id_product ?>?action=add&count={}', alert('Product ' + id + ' added'));
                $.post('/shop/product/<?= $product->id_product ?>',{action: "add", count: count});
            });
        </script>
    </div>

    <div class="comment">
        <div class="input-com">
            <form method="post" action="/shop/product/<?= $product->id_product?>?action=comment">
                <div class="form-group">
                    <label for="login">Your login</label>
                    <?php if(isset($_SESSION['user'])) { ?>
                        <input class="form-control" id="login" type="text" name="user" value="<?= $_SESSION['user']?>">
                    <?php } ?>
                    <?php if(!isset($_SESSION['user'])) { ?>
                        <input class="form-control" id="login" type="text" name="user" required>
                    <?php } ?>
                </div>
                <textarea class="form-control" name="comment" row="10" cols="23"></textarea>
                <button type="submit">Add comment</button>
            </form>
        </div>

        <div class="comments">
            <h3 class="title-comments">Комментарии</h3>
            <ul class="media-list">
                <?php if(!empty($comments)){ ?>
                <?php foreach ($comments as $c){?>

                    <li class="media">
                        <div class="media-body">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <div class="author"><?= $c->login_user?></div>
                                </div>
                                <div class="panel-body">
                                    <div class="media-text text-justify"><?= $c->text?></div>
                                </div>
                            </div>

                <?php }?>

                            <?php }?>
            </ul>
        </div>
    </div>
</div>


