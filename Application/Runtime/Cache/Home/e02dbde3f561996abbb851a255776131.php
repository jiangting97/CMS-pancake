<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo C('WEBSITE_TITLE');?></title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/Public/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="col-md-10">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo U('Index/index');?>">jiangting的博客</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php echo U('Index/index');?>">home</a></li>
                    <li><a href="<?php echo U('Index/Link');?>">Link</a></li>
                    <li><a href="#contact">unknown</a></li>

                </ul>

            </div><!--/.nav-collapse -->
        </div>
        <div class="col-md-2">
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="pull-right">
                        <a href="<?php echo U('/Admin/Login');?>" >登陆后台</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container">

    <div class="starter-template">

    </div>

</div><!-- /.container -->
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($article["title"]); ?></title>
</head>
<body>
<div class="container">
    <h2 class="text-center"><?php echo ($article["title"]); ?></h2>
    <p><?php echo ($article["content"]); ?></p>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="container">
     <p class="pull-right">jiangting97@163.com</p>
</div>

</body>
</html>
</body>
</html>