<!--<div class="banner">-->
<!--<img src="/shop/assets/images/banner2.jpg">-->
<!--</div>-->
<div id="testCarousel" class="carousel slide banner" data-ride="carousel">
    <!-- Индикаторы карусели -->
    <ol class="carousel-indicators">
        <!-- Перейти к слайду №0 с помощью соответствующего атрибута с индексом data-slide-to="0" -->
        <li data-target="#testCarousel" data-slide-to="0" class="active"></li>
        <!-- Перейти к слайду №1 с помощью соответствующего индекса data-slide-to="1" -->
        <li data-target="#testCarousel" data-slide-to="1"></li>
        <!-- Перейти к слайду №1 с помощью соответствующего индекса data-slide-to="2" -->
        <li data-target="#testCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Слайды карусели -->
    <div class="carousel-inner">
        <!-- Слайд 1 -->
        <div class="item active">
            <img src="/shop/assets/images/banner2.jpg">
            <div class="carousel-caption">

            </div>
        </div>
        <!-- Слайд 2 -->
        <div class="item">
            <img src="/shop/assets/images/banner.jpg">
            <div class="carousel-caption">

            </div>
        </div>
        <!-- Слайд 3 -->
        <div class="item">
            <img src="/shop/assets/images/banner2.jpg">
            <div class="carousel-caption">

            </div>
        </div>
    </div>

    <!-- Навигация карусели (следующий или предыдущий слайд) -->
    <!-- Кнопка, переход на предыдущий слайд с помощью атрибута data-slide="prev" -->
    <a class="left carousel-control" href="#testCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <!-- Кнопка, переход на следующий слайд с помощью атрибута data-slide="next" -->
    <a class="right carousel-control" href="#testCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>

<div class="container">
    <div class="main-part">
        <div class="categories">
            <h3>Categories</h3>

            <div class="list-group">

                <?php foreach ($categories as $c){?>
                <a href="/shop/products?category=<?= $c->name_category ?>" class="list-group-item list-group-item-action"><?= $c->name_category ?></a>
                <?php }?>

            </div>

        </div>
        <div class="pagination_and_filters">
            <ul class="pagination">

                <?php for($i=1;$i<=$pagination;$i++){ ?>

                    <li><a href="/shop/products?page=<?= $i ?>"><?= $i ?></a></li>

                <?php }?>

            </ul>
            <div class="input">

            </div>
            <div class="btn-group">
                <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">Sort by<span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="/shop/products?filter=price&param=asc">Cheap - Exp</a></li>
                    <li><a href="/shop/products?filter=price&param=desc">Exp - Cheap</a></li>
                    <li><a href="/shop/products?filter=name&param=asc">А - Z</a></li>
                    <li><a href="/shop/products?filter=name&param=desc">Z - A</a></li>
                </ul>
            </div>

        </div>
    <!--    <div class="container">-->


            <div class="row">
                <?php foreach ($products as $p){ ?>
                <div  class="col-sm-2 col-md-2 col-lg-3 product">
                    <p class="price"><?= $p->price?>$</p>

                    <p class="description"><a href="/shop/product/<?= $p->id_product ?>"><?= $p->name ?></a></p>
                    <p class="is">in stock</p>
                    <!--                <img src="../../../assets/images/item.jpg">-->
                    <img src="./assets/images/<?= $p->image?>.jpg">
                </div>
        <?php } ?>
            </div>
    <!--    </div>-->


        <div class="pagination_and_filters">
            <ul class="pagination">
                <?php for($i=1;$i<=$pagination;$i++){ ?>

                    <li><a href="/shop/products?page=<?= $i ?>"><?= $i ?></a></li>

                <?php }?>

            </ul>
        </div>
    </div>


<div class="row row-new">
    <div class="col-sm-4 col-md-4 col-lg-4 new">
        <img src="/shop/assets/images/itemnew1.jpg">
        <p>new item</p>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4 new">
        <img src="/shop/assets/images/itemnew2.jpg">
        <p>new item</p>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4 new">
        <img src="/shop/assets/images/itemnew3.jpg">
        <p>new item</p>
    </div>

</div>

</div>