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
            <a class="navbar-brand" href="#">内容管理系统</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Html</a></li>
                <li><a href="#about">CSS</a></li>
                <li><a href="#contact">Javascript</a></li>

                <li class="nav-left">  <a href="<?php echo U('Login/logout');?>">注销</a></li>
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
    <title>添加新闻</title>
</head>
<body>
<div class="container">

        <label for="newstitle">
            新闻标题:
        </label>
        <input type="text" name="newstitle" id="newstitle"/>
        <label for="newscontent">
            新闻内容:
        </label>
        <input type="text" name="newscontent" id="newscontent"/>
        <label for="addtime">
            添加日期:
        </label>
        <input type="text" name="addtime" id="addtime"/>
        <input type="button" value="添加新闻" id="addnews" onclick="addNews()">
        <a href="<?php echo U('Index/index');?>" class="btn">返回管理界面</a>

</div>
<script src="//cdn.bootcss.com/jquery/3.0.0-beta1/jquery.js" ></script>
<script type="text/javascript">

    function addNews(){
        newstitle = $("#newstitle").val();
        newscontent = $("#newscontent").val();
        addtime = $("#addtime").val();
        $.ajax({
            url: "<?php echo U('News/addNewsHandler');?>",
            data: {
                newstitle: newstitle,
                newscontent : newscontent,
                addtime: addtime
            },
            type: 'post',
            cache: false,
            dataType: 'json',
            success: function (data) {
                if (data.regist_state) {
                    alert("添加失败!");
                }else{
                    alert("添加成功!");

                }
            },
            error: function () {
                alert("ajax请求异常！");
            }
        });
    }

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