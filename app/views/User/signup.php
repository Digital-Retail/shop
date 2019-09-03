   <?php $curr = \ishop\App::$app->getProperty('currency'); ?>
<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li><a href="/user/signup">Регистрация</a></li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--register-starts-->
	<div class="register">
		<div class="container">
			<div class="register-top heading">
				<h2>Регистрация</h2>
			</div>

            <?php if(isset($_SESSION['errors'])): ?>
                <div class="container-">
                    <div class="col-md-12">
                        <div class="alert alert-danger"><?php echo $_SESSION['errors']; unset($_SESSION['errors']); ?></div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isset($_SESSION['success'])): ?>
                <div class="container">
                    <div class="col-md-12">
                        <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
                    </div>
                </div>
            <?php endif; ?>

            <form id="signup" method="post" action="/user/signup" role="form" data-toggle="validator">
                <div class="register-main">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="firstName">Имя:</label>
                                <input  autocomplete="off" id="firstName" value="<?php getFormData('firstName'); ?>"  name="firstName" class="form-control" type="text" tabindex="2" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="LastName">Фамилия:</label>
                                <input  autocomplete="off" class="form-control" value="<?php getFormData('lastName'); ?>" name="lastName" type="text" tabindex="3" required>
                                <div class="help-block with-errors"></div>
                            </div>


                            <div class="form-group col-md-12">
                                <label autocomplete="off" for="login">Логин:</label>
                                <input  id="login" value="<?php getFormData('login'); ?>" name="login" class="form-control" type="text"  required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Email">Электронный ящик:</label>
                                <input  autocomplete="off" value="<?php getFormData('email'); ?>" placeholder="Email address" name="email" class="form-control" type="email" tabindex="4" data-error="Ох, этот адрес не валидный" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="telephone">Телефон</label>
                                <input name="telephone"  value="<?php getFormData('telephone'); ?>"  autocomplete="off" id="telephone" type="text" class="form-control bfh-phone"  data-mask="+7 (000)-000-00-00" placeholder="+7 (___)-___-__-__" tabindex="5" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword" class="control-label">Password</label>
                                <div class="form-inline row">
                                    <div class="form-group col-md-6 has-feedback">
                                        <input name="password" type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Пароль" required>
                                        <div class="help-block">Минимум 6 символов</div>
                                    </div>
                                    <div class="form-group col-md-6 has-feedback">
                                        <input name="repassword" type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Упс, пароли не совпадают" placeholder="Повторите пароль" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="address submit">
                                    <input type="submit" value="Зарегистрироваться">
                                </div>
                            </div>


                        </div> <!-- End form Row -->
                    </div>
                </div>
            </form>


			</div>

	</div>


	<!--register-end-->