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
    <title>登陆成功</title>

</head>
<body>
<div class="container">
    <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked" id="myTab">

            <li><a href="<?php echo U('/Home/index');?>">返回博客</a></li>
            <li><a href="<?php echo U('Blog/addBlog');?>">添加博文</a></li>
            <li>
                <a href="#menu" data-toggle="tab">文章管理</a>
            </li>
            <li class="dropdown">
                <a href="#" id="myTabDrop1" class="dropdown-toggle"
                   data-toggle="dropdown">今日任务
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                    <li><a href="#jmeter" tabindex="-1" data-toggle="tab">写博文</a></li>
                    <li><a href="#ejb" tabindex="-1" data-toggle="tab">复习博文</a></li>
                </ul>
            </li>
        </ul>
    </div>


    <div id="myTabContent" class="tab-content">

        <div class="tab-pane fade in active" id="menu">
            <div class="col-md-9">
                <form id="cms-form">

                    <table class="table table-striped table-border">
                        <caption>博文列表</caption>
                        <thead>
                        <tr>
                            <th>博文标题</th>
                            <th>博文类型</th>
                            <th>添加日期</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if(is_array($list)): foreach($list as $key=>$article): ?><tr>
                                <td><?php echo ($article["title"]); ?></td>
                                <td><?php echo ($article["type"]); ?></td>
                                <td><?php echo ($article["addtime"]); ?></td>
                                <td>
                                    <a href="<?php echo U('Blog/editBlog',array( 'id'=>$article['id']));?>"
                                       class="btn">编辑</a>
                                    <input type="button" id="delNews" class="btn delNews" value="删除"
                                           onclick="delBlog('<?php echo ($article["id"]); ?>')"/>
                                </td
                            </tr><?php endforeach; endif; ?>
                        </tbody>
                    </table>
                    <div class="pull-right">
                        <ul class="pagination">
                            <div><?php echo ($page); ?></div>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="jmeter">
            <p>添加博文整理知识</p>
        </div>
        <div class="tab-pane fade" id="ejb">
            <p>要坚持,坚持复习!
            </p>
        </div>
    </div>


</div>


<script type="text/javascript" src="/Public/js/admin/main.js"></script>
<script src="//cdn.bootcss.com/jquery/3.0.0-beta1/jquery.js"></script>
<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>


<script>
    $(function () {
        $('#myTab li:eq(2) a').tab('show');
    });
</script>
<script type="text/javascript">


    $("#button-listorder").click(function () {
        alert("button-listorder");
        var data = $("#cms-form").serializeArray();
        postData = {};
        $(data).each(function (i) {
            postData[this.name] = this.value;
        });
        console.log(postData);
        alert(JSON.stringify(postData));
        //将获取到的数据post给服务器
        $.ajax({
            url: "<?php echo U('News/orderNews');?>",
            data: {
                postData: postData
            },
            type: 'post',
            cache: false,
            dataType: 'json',
            success: function (data) {
                if (data.error_code) {
                    alert("更新失败");
                } else {
                    alert("更新成功");
                    location.reload();
                }
            },
            error: function () {
                alert("ajax请求异常!")
            }
        });


    });

    function delBlog(id) {
        alert(id);

        $.ajax({
            url: "<?php echo U('Blog/delBlog');?>",
            data: {
                id: id
            },
            type: 'post',
            cache: false,
            dataType: 'json',
            success: function (data) {
                if (data.error_code) {
                    alert("删除失败!");
                } else {
                    alert("删除成功!");
                    location.reload();
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