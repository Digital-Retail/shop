
<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
             <?=$breadcrumbs; ?>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<?php $curr = \ishop\App::$app->getProperty('currency'); ?>
<div class="prdt">
    <div class="container">
        <div class="prdt-top">

            <div class="col-md-9 prdt-left">

                    <?php if($products): ?>
                    <?php $i=1;?>
                    <?php foreach($products as $product): ?>
                    <?php if($i==1): ?>
                    <div class="">
                        <?php endif;?>
                        <div class="col-md-4 product-left">

                            <div class="product-main simpleCart_shelfItem">
                                <a href="product/<?=$product->alias;?>" class="mask"><img class="img-responsive zoom-img" src="/images/<?=$product->img; ?>" alt="" /></a>
                                <div class="product-bottom">
                                    <a href="product/<?=$product->alias;?>"><h3><?=$product->title;?></h3></a>
                                    <p>Explore Now</p>
                                    <h4><a class="add-to-cart-link" data-id="<?=$product->id; ?>" href="/cart/add?id=<?=$product->id;?>"><i></i></a> <span class=" item_price"><?=$curr['simbol_left']; ?><?=round($product->price*$curr['value']); ?><?=$curr['simbol_right'];?></span>
                                        <?php if($product->old_price): ?>
                                            <small><del><?=$product->old_price*$curr['value']; ?></del></small>
                                        <?php endif; ?>
                                    </h4>
                                </div>
                                <?php if($product->old_price): ?>

                                    <div class="srch">
                                        <span><?=getskidka($product->price,$product->old_price) ?></span>
                                    </div>
                                <?php endif;?>
                            </div>

                            <?php $i++; ?>
                        </div>
                        <?php if($i==5) {
                            $i=1;
                            echo '<div class="clearfix"></div>';
                        }
                        ?>


                        <?php endforeach;?>

                        <?php else: ?>
                        <h4>В этой категории товаров пока нет</h4>

                    <?php endif; ?>



                    <div class="clearfix"></div>
                </div>
                <?php if($pagination->countPages>1): ?>
                <div class="text-center">

                <?=$pagination; ?>

                </div>
            <?php endif; ?>
                </div>

            <div class="col-md-3 prdt-right">
                <div class="w_sidebar">
                    <section  class="sky-form">
                        <h4>Catogories</h4>
                        <div class="row1 scroll-pane">
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>All Accessories</label>
                            </div>
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Women Watches</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Kids Watches</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Men Watches</label>
                            </div>
                        </div>
                    </section>
                    <section  class="sky-form">
                        <h4>Brand</h4>
                        <div class="row1 row2 scroll-pane">
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>kurtas</label>
                            </div>
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sonata</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Titan</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Casio</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Omax</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>shree</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fastrack</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sports</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fossil</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Maxima</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Yepme</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Citizen</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Diesel</label>
                            </div>
                        </div>
                    </section>
                    <section class="sky-form">
                        <h4>Colour</h4>
                        <ul class="w_nav2">
                            <li><a class="color1" href="#"></a></li>
                            <li><a class="color2" href="#"></a></li>
                            <li><a class="color3" href="#"></a></li>
                            <li><a class="color4" href="#"></a></li>
                            <li><a class="color5" href="#"></a></li>
                            <li><a class="color6" href="#"></a></li>
                            <li><a class="color7" href="#"></a></li>
                            <li><a class="color8" href="#"></a></li>
                            <li><a class="color9" href="#"></a></li>
                            <li><a class="color10" href="#"></a></li>
                            <li><a class="color12" href="#"></a></li>
                            <li><a class="color13" href="#"></a></li>
                            <li><a class="color14" href="#"></a></li>
                            <li><a class="color15" href="#"></a></li>
                            <li><a class="color5" href="#"></a></li>
                            <li><a class="color6" href="#"></a></li>
                            <li><a class="color7" href="#"></a></li>
                            <li><a class="color8" href="#"></a></li>
                            <li><a class="color9" href="#"></a></li>
                            <li><a class="color10" href="#"></a></li>
                        </ul>
                    </section>
                    <section class="sky-form">
                        <h4>discount</h4>
                        <div class="row1 row2 scroll-pane">
                            <div class="col col-4">
                                <label class="radio"><input type="radio" name="radio" checked=""><i></i>60 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>50 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>40 % and above</label>
                            </div>
                            <div class="col col-4">
                                <label class="radio"><input type="radio" name="radio"><i></i>30 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>20 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>10 % and above</label>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--product-end-->