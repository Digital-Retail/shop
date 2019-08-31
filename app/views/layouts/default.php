

<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>

    <base>
<?=$this->getMeta() ?>
<link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/megamenu/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/megamenu/css/ionicons.min.css" rel="stylesheet" type="text/css" media="all" />
<!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!--Custom-Theme-files-->
<!--theme-style-->
<link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="/js/jquery-1.11.0.min.js"></script>
<!--dropdown-->
<script src="/js/jquery.easydropdown.js"></script>
</head>
<body>



	<!--top-header-->
	<div class="top-header">
		<div class="container">
			<div class="top-header-main">
				<div class="col-md-6 top-header-left">
					<div class="drop">
						<div class="box">
							<select id="currency" tabindex="4" class="dropdown drop">
							<?php new \app\widgets\currency\Currency(); ?>
							</select>
						</div>
                        <div class="btn-group">
                            <a class="dropdown-toggle account-link" data-toggle="dropdown">Профиль <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php if(!empty($_SESSION['user'])): ?>
                                    <li><a href="#">Добро пожаловать, <?=h($_SESSION['user']['name']);?></a></li>
                                    <li><a href="/user/logout">Выход</a></li>
                                <?php else: ?>
                                    <li><a href="/user/login">Вход</a></li>
                                    <li><a href="/user/signup">Регистрация</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-6 top-header-left">
					<div class="cart box_1" >
                        <a href="/cart/show" onclick="getCart(); return false;">
                            <div class="total">
                                <img src="/images/cart-1.png" alt="" />
                                <span id="cartTotal">
                                <?php if(!empty($_SESSION['cart'])): ?>
                                    <?=$_SESSION['cart.currency']['simbol_left']." ".$_SESSION['cart.sum'].$_SESSION['cart.currency']['simbol_right'] ?>
                                <?php endif; ?>
                                </span>
                            </div>
                        </a>
                        <!--	<a href="checkout.html">
							 <div class="total">
								<span class="simpleCart_total"></span></div>
								<img src="/images/cart-1.png" alt="" />
									</a>
						<p><a href="javascript:;" class="simpleCart_empty">Пустая карзина</a></p>
								-->

						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--top-header-->
	<!--start-logo-->
	<div class="logo">
		<a href="<?=PATH ?>"><h1>Digital Retail</h1></a>
	</div>
	<!--start-logo-->
	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container">
			<div class="header">
				<div class="col-md-9 col-sm-12 col-xs-12 ">
              <div class="menu-container">
                  <div class="menu">
                      <?php new \app\widgets\menu\Menu([
                              'tpl' => WWW.'/menu/menu.php'
                          ]
                      ); ?>
                  </div>
              </div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12 " style="margin:10px 0">
				<div class="search-bar">
					<form action="search" method="get" autocomplete="off">
                        <input type="text" class="typeahead" placeholder="Поиск" id="typeahead" name="s">
                        <input type="submit" value="">
                    </form>
				</div>
			</div>
			<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	<!--bottom-header-->
	<div class="content">

	<?=$content; ?>
	</div>
	<!--information-end-->
	<!--footer-starts-->
	<div class="footer">
		<div class="container">
			<div class="footer-top">
				<div class="col-md-6 footer-left">
					<form>
						<input type="text" value="Enter Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email';}">
						<input type="submit" value="Subscribe">
					</form>
				</div>
				<div class="col-md-6 footer-right">					
					<p>© 2015 Luxury Watches. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--footer-end-->
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Корзина</h4>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button"  data-dismiss="modal" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                    <button type="button" class="btn btn-default" id="clear-cart" data-dismiss="modal" onclick="clearCart();">Очистить корзину</button>
                    <a href="/cart/view"  type="button" class="btn btn-primary">Оформить заказ</a>
                </div>
            </div>
        </div>
    </div>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--start-menu-->

    <script>

        var path = '<?=PATH;?>',
            course = <?=$curr['value'];?>,
         symboleLeft = '<?=$curr['simbol_left'];?>',
            symboleRight = '<?=$curr['simbol_right'];?>';

    </script>

    <script src="/js/typeahead.bundle.js"></script>
    <script src="/megamenu/js/megamenu.js"></script>
        <script src="/js/main.js"> </script>

    <!--dropdown-->
    <script src="/js/jquery.easydropdown.js"></script>

    <script type="text/javascript">
        $(function() {

            var menu_ul = $('.menu_drop > li > ul'),
                menu_a  = $('.menu_drop > li > a');

            menu_ul.hide();

            menu_a.click(function(e) {
                e.preventDefault();
                if(!$(this).hasClass('active')) {
                    menu_a.removeClass('active');
                    menu_ul.filter(':visible').slideUp('normal');
                    $(this).addClass('active').next().stop(true,true).slideDown('normal');
                } else {
                    $(this).removeClass('active');
                    $(this).next().stop(true,true).slideUp('normal');
                }
            });

        });
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>