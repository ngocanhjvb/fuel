<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/blog/">

    <title>Blog Template FUEL</title>
    <?php echo Asset::css(array('bootstrap.css', 'blog.css')); ?>
    <script type="text/javascript"
            src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=xU4UxT2YojUn6U0qFSB3ORH9M0eDhNZJbz4FuhlPV11_71kgFkuxcHNTYCoIYK8XsEISETdmVctyrDqNOvW_JwczJscD4RQKdZ2bc_rN7QY"
            charset="UTF-8"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="/">Home</a>
            <?= Html::anchor(Router::get('add_tag'), 'Add Tag', ['class' => 'blog-nav-item']); ?>
    </div>
</div>

<div class="container">

    <div class="blog-header">
        <h1 class="blog-title">The Fuel Blog</h1>
        <p class="lead blog-description">The fuelPhp blog with Bootstrap.</p>
    </div>

    <div class="row">
        <div class="col-sm-12 blog-main">
            <div class="panel-body">
                <?= $content ?>
                <div class="text-center">

                </div>
            </div>

        </div><!-- /.blog-main -->
    </div><!-- /.row -->

</div><!-- /.container -->

<footer class="blog-footer">
    <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.
    </p>
    <p>
        <a href="#">Back to top</a>
    </p>
</footer>
<?= Asset::js('jquery.js'); ?>
</body>
</html>
