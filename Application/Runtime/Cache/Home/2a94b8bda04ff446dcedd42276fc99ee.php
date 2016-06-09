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
<nav class="navbar navbar-inverse ">
    <div class="container">

        <div class="col-md-8">


            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">jiangting的博客</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Html</a></li>
                    <li><a href="#about">CSS</a></li>
                    <li><a href="#contact">Javascript</a></li>
                    <li>
                        &&nbsp;n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </li>
                    <li>

                        <a href="<?php echo U('/Admin/Login');?>">登陆后台</a>

                    </li>
                </ul>

            </div><!--/.nav-collapse -->
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
    <title>Title</title>

    <link rel="stylesheet" href="/Public/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <form id="cms-form">
        <?php if(is_array($newsList)): foreach($newsList as $key=>$news): ?><a href="#" class="list-group-item">
                <h4 class="list-group-item-heading"><?php echo ($news["newstitle"]); ?></h4>
                <p class="list-group-item-text"><?php echo ($news["newscontent"]); ?></p>
            </a><?php endforeach; endif; ?>
        <ul class="pagination">
            <div><?php echo ($page); ?></div>
        </ul>
    </form>
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
<script type="text/javascript" src="/Public/js/admin/common.js"></script>
</html>
</body>
</html>