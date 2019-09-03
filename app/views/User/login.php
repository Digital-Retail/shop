
<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li><a href="/user/login">Авторизация</a></li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->

<!--register-starts-->
	<div class="register">
		<div class="container">
			<div class="register-top heading">
				<h2>Авторизация</h2>
			</div>
            <?php if(isset($_SESSION['errors'])): ?>
                <div class="container-">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="alert alert-danger"><?php echo $_SESSION['errors']; unset($_SESSION['errors']); ?></div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isset($_SESSION['success'])): ?>
                <div class="container">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
                    </div>
                </div>
            <?php endif; ?>
            <form action="/user/login" method="post">
                <div class="register-main">

                    <div class="col-md-6 col-md-offset-3 ">
                        <div class="form-group">
                            <label for="1ogin">Логин:</label>
                            <input name="login" autocomplete="off" id="login" name="login" class="form-control" type="text" tabindex="1" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль:</label>
                            <input name="password" id="password" name="password" class="form-control" type="password" tabindex="2" required>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-6 col-md-offset-3 ">
                        <div class="address submit">
                            <input type="submit" value="Войти">
                        </div>
                    </div>
                </div>
            </form>

		</div>
	</div>
	<!--register-end-->