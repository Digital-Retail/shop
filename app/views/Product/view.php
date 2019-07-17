<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <?=$breadCrumbs; ?>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--start-single-->
<div class="single contact">
    <div class="container">
        <div class="single-main">
            <div class="col-md-9 single-main-left">
                <div class="sngl-top">
                    <div class="col-md-5 single-top-left">
                       <?php if($images): ?>
                        <div class="flexslider">
                            <ul class="slides">
                                <?php foreach ($images as $image): ?>
                                <li data-thumb="/images/<?=$image['img']; ?>">
                                    <div class="thumb-image"> <img src="/images/<?=$image['img']; ?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <?php if(!$images): ?>
                            <div class="flexslider">
                                <ul class="slides">
                                        <li data-thumb="/images/<?=$product->img; ?>">
                                            <div class="thumb-image"> <img src="/images/<?=$product->img; ?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                                        </li>
                                </ul>
                            </div>
                        <?php endif; ?>



                    </div>
                    <div class="col-md-7 single-top-right">
                        <div class="single-para simpleCart_shelfItem">
                            <h2><?=$product->title; ?></h2>
                            <div class="star-on">
                                <ul class="star-footer">
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                </ul>
                                <div class="review">
                                    <a href="#"> 1 customer review </a>

                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <?php $curr = \ishop\App::$app->getProperty('currency');
                            $cats = \ishop\App::$app->getProperty('cats');

                            ?>

                            <h5 class="item_price"><?=$curr['simbol_left']; ?><span data-basePrice="<?=round($product->price*$curr['value']); ?>" id="productPrice"><?=round($product->price*$curr['value']); ?></span><?=$curr['simbol_right'];?></h5>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                            <div class="available">
                                <ul>
                                    <?php if($mods): ?>
                                    <li>Цвет

                                        <select>
                                            <option data-price="<?=round($product->price*$curr['value']) ;?>">Выбрать цвет</option>

                                            <?php foreach ($mods as $mod): ?>
                                            <option data-title="<?=$mod->title ;?>" value="<?=$mod->id; ?>" data-price="<?=round($mod->price*$curr['value']) ;?>" value="<?=$mod->id; ?>"><?=$mod->title; ?></option>

                                            <?php endforeach; ?>
                                        </select></li>
                                    <?php endif; ?>
                                    <div class="clearfix"> </div>
                                </ul>
                            </div>
                            <ul class="tag-men">
                                <li><span>Категория :</span>
                                   <a href="/category/<?=$cats[$product->category_id]['alias'] ;?>"><span class="women1"> <?=$cats[$product->category_id]['title'] ;?></span></li></a>

                            </ul>
                            <input size="4" value="1" name="quantity" id='quantity' min="1" step="1" type="number" style="width:60px;">
                            <a id="productAdd" href="/cart/add/?id=<?=$product->id; ?>" class="add-cart item_add add-to-cart-link" data-id="<?=$product->id; ?>">Добавить в корзину</a>

                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="tabs">
                    <ul class="menu_drop">
                        <li class="item1"><a href="#"><img src="/images/arrow.png" alt="">Описание</a>
                            <ul>
                                <li class="subitem1"><a href="#"><?=$product->description; ?></a></li>
                            </ul>
                        </li>
                        <li class="item2"><a href="#"><img src="/images/arrow.png" alt="">Дополнительная информация</a>
                            <ul>
                                <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                            </ul>
                        </li>
                        <li class="item3"><a href="#"><img src="/images/arrow.png" alt="">Отзывы (10)</a>
                            <ul>
                                <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                                <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                            </ul>
                        </li>
                        <li class="item4"><a href="#"><img src="/images/arrow.png" alt="">Полезные ссылки</a>
                            <ul>
                                <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- C Этим товаром покупают -->
                <?php if($related): ?>
                <div class="latestproducts">
                    <div class="product-one">
               <h3 style="text-align: center; padding: 0 10px">С этим товаром также покупают</h3>
                <?php foreach ($related as $product): ?>


                        <div class="col-md-4 product-left p-left">
                            <div class="product-main simpleCart_shelfItem">
                                <a href="/product/<?=$product['alias']; ?>"  class="mask"><img class="img-responsive zoom-img" src="/images/<?=$product['img'] ?>" alt="" /></a>
                                <div class="product-bottom">
                                  <a href="/product/<?=$product['alias']; ?>" ><h3 ><?=$product['title']; ?></h3> </a>

                                    <h4><a class="add-to-cart add-to-cart-link" href="/card/add?id=<?=$product['id']; ?>" data-id="<?=$product['id'];?>"><i></i></a> <span class=" item_price"><?=$curr['simbol_left']; ?><?=round($product['price']*$curr['value']); ?><?=$curr['simbol_right'];?></span>
                                        <?php if($product['old_price']): ?>
                                            <small><del><?=$product['old_price']*$curr['value']; ?></del></small>
                                        <?php endif; ?>
                                    </h4>
                                </div>
                                <?php if($product['old_price']): ?>

                                    <div class="srch">
                                        <span><?=getskidka($product['price'],$product['old_price']) ?></span>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
               <?php endforeach; ?>

                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Последнии просмотренные товары -->
                <?php if($recentlyViewed): ?>
                    <div class="latestproducts">
                        <div class="product-one">
                            <h3 style="text-align: center; padding: 0 10px">Последнии просмотренные товары</h3>
                            <?php foreach($recentlyViewed as $product): ?>


                                <div class="col-md-4 product-left p-left">
                                    <div class="product-main simpleCart_shelfItem">
                                        <a href="/product/<?=$product->alias; ?>"  class="mask"><img class="img-responsive zoom-img" src="/images/<?=$product['img'] ?>" alt="" /></a>
                                        <div class="product-bottom">
                                            <a href="/product/<?=$product['alias']; ?>" ><h3 ><?=$product['title']; ?></h3> </a>

                                            <h4><a class="add-to-cart add-to-cart-link" href="/cart/add?id=<?=$product['id']; ?>" data-id="<?=$product['id'];?>"><i></i></a> <span class=" item_price"><?=$curr['simbol_left']; ?><?=round($product['price']*$curr['value']); ?><?=$curr['simbol_right'];?></span>
                                                <?php if($product['old_price']): ?>
                                                    <small><del><?=$product['old_price']*$curr['value']; ?></del></small>
                                                <?php endif; ?>
                                            </h4>
                                        </div>
                                        <?php if($product['old_price']): ?>

                                            <div class="srch">
                                                <span><?=getskidka($product['price'],$product['old_price']) ?></span>
                                            </div>
                                        <?php endif;?>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-md-3 single-right">
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
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--end-single-->
<script src="/js/imagezoom.js"></script>
<script defer src="/js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="/css/flexslider.css" type="text/css" media="screen">
<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>