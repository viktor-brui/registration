<header class="masthead">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <?php if ($isGuest) { ?>
                        <span class="subheading">Авторизируйтесь или зарегистрируйтесь</span>
                    <?php } else { ?>
                        <h1>Привет, <?= $name; ?></h1>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</header>
