<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $title; ?></title>
        <link href="/public/styles/bootstrap.css" rel="stylesheet">
        <link href="/public/styles/main.css" rel="stylesheet">
        <link href="/public/styles/font-awesome.css" rel="stylesheet">
        <link href="/public/images/favicon.png" rel="shortcut icon" type="image/x-icon"/>
        <script src="/public/scripts/jquery.js"></script>
        <script src="/public/scripts/form.js"></script>
        <script src="/public/scripts/popper.js"></script>
        <script src="/public/scripts/bootstrap.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="/">Сайт</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <?php if ($isGuest) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Войти</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/registration">Зарегистрироваться</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Выйти</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <?php echo $content; ?>
    </body>
</html>
