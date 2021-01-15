<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $title; ?></title>
        <link href="/public/styles/bootstrap.css" rel="stylesheet">
        <link href="/public/styles/user.css" rel="stylesheet">
        <link href="/public/styles/font-awesome.css" rel="stylesheet">
        <link href="/public/images/favicon.png" rel="shortcut icon" type="image/x-icon"/>
        <script src="/public/scripts/jquery.js"></script>
        <script src="/public/scripts/form.js"></script>
        <script src="/public/scripts/popper.js"></script>
        <script src="/public/scripts/bootstrap.js"></script>
    </head>
    <body class="fixed-nav sticky-footer bg-dark">
        <?php if ($this->route['action'] != 'login' && $this->route['action'] != 'registration') { ?>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
                <a class="navbar-brand" href="/">Hello <?php  ?></a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">
                            <i class="fa fa-fw fa-sign-out"></i>
                            <span class="nav-link-text">Выход</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        <?php } ?>
        <?php echo $content; ?>
    </body>
</html>