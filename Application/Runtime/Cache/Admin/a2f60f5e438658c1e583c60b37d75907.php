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
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">博客后台管理系统</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo U('Index/index');?>" class="btn">Home</a></li>
                <li class="nav-right">

                        <a href="<?php echo U('Login/logout');?>">注销</a>

                </li>
            </ul>

        </div><!--/.nav-collapse -->
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
    <title>修改博文</title>
</head>
<body>
<div class="container">
    <form action="<?php echo U('Blog/saveBlog');?>" method="post">
        <input type="hidden" name="id" value="<?php echo ($article["id"]); ?>" id="id">
        <label for="title">
            文章标题:
        </label>
        <input type="text" name="title" id="title" value="<?php echo ($article["title"]); ?>"/>
        <label for="article-type">博文类型</label>
        <select id="article-type" name="type">
            <?php if(is_array($type)): foreach($type as $key=>$t): ?><option value="<?php echo ($t["id"]); ?>"><?php echo ($t["name"]); ?></option><?php endforeach; endif; ?>

        </select>
        <textarea id="content" name="content" value="<?php echo ($article["content"]); ?>">
        </textarea>
        <input class="btn btn-success pull-right" type="submit" value="提交"/>
    </form>


</div>
<script src="//cdn.bootcss.com/jquery/3.0.0-beta1/jquery.js" ></script>
<script type="text/javascript" src="/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/Public/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript">

    $(function () {
        window.UEDITOR_HOME_URL = '/Public/ueditor/';
        window.onload = function () {
            window.UEDITOR_CONFIG.initialFrameHeight = 300;//编辑器的高度
            ue = UE.getEditor('content');
            //判断ueditor 编辑器是否创建成功
            ue.addListener("ready", function () {
                // editor准备好之后才可以使用
                ue.setContent('<?php echo ($article["content"]); ?>');
            });
        }
    });

</script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

</body>
</html>
</body>
</html>