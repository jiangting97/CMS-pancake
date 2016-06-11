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
    <title>登陆成功</title>

</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/Public/css/bootstrap.min.css">


</head>
<body>

<div class="container">
    <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked" id="myTab">
            <li>
                <a href="#home" data-toggle="tab">
                    CMS Home
                </a>
            </li>
            <li>
                <a href="#menu" data-toggle="tab">文章管理</a>
            </li>
            <li class="dropdown">
                <a href="#" id="myTabDrop1" class="dropdown-toggle"
                   data-toggle="dropdown">Java
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                    <li><a href="#jmeter" tabindex="-1" data-toggle="tab">jmeter</a></li>
                    <li><a href="#ejb" tabindex="-1" data-toggle="tab">ejb</a></li>
                </ul>
            </li>
        </ul>
    </div>


    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade " id="home">
            <p>个人博客</p>
        </div>
        <div class="tab-pane fade in active" id="menu">
            <form action="<?php echo U('News/searchTypeNews');?>" role="search">
                <li class="active"><a href="<?php echo U('News/addNews');?>" class="btn">添加新闻</a></li>
            </form>
            <div class="col-md-9">


                <form id="cms-form">

                    <table class="table table-striped table-border">
                        <caption>新闻列表</caption>
                        <thead>
                        <tr>
                            <th>排序</th>
                            <th>新闻标题</th>
                            <th>新闻内容</th>
                            <th>修改日期</th>
                            <th>新闻图片</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if(is_array($newsList)): foreach($newsList as $key=>$news): ?><tr>
                                <td><input size="4" type="text" name="<?php echo ($news["newsid"]); ?>" value="<?php echo ($news["listorder"]); ?>"/>
                                </td>
                                <td><?php echo ($news["newstitle"]); ?></td>

                                <td><?php echo ($news["newscontent"]); ?></td>
                                <td><?php echo ($news["newsimg"]); ?></td>
                                <td><?php echo ($news["addtime"]); ?></td>

                                <td>

                                    <a href="<?php echo U('News/modifyNews',array( 'newsid'=>$news['newsid']));?>"
                                       class="btn">modify新闻</a>
                                    <input type="button" id="delNews" class="btn btn-info delNews" value="删除新闻"
                                           onclick="delNews('<?php echo ($news["newsid"]); ?>')"/>

                                </td>

                            </tr><?php endforeach; endif; ?>


                        </tbody>
                    </table>
                    <ul class="pagination">
                        <div><?php echo ($page); ?></div>
                    </ul>
                    <button id="button-listorder" type="button" class="btn btn-primary dropdown-toggle"
                            onclick="orderNews()">
                        排序
                    </button>

                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="jmeter">
            <p>jMeter 是一款开源的测试软件。它是 100% 纯 Java 应用程序，用于负载和性能测试。</p>
        </div>
        <div class="tab-pane fade" id="ejb">
            <p>Enterprise Java Beans（EJB）是一个创建高度可扩展性和强大企业级应用程序的开发架构，部署在兼容应用程序服务器（比如 JBOSS、Web Logic 等）的 J2EE 上。
            </p>
        </div>
    </div>


</div>


<script type="text/javascript" src="/Public/js/admin/main.js"></script>
<script src="//cdn.bootcss.com/jquery/3.0.0-beta1/jquery.js"></script>
<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>


<script>
    $(function () {

        var ll = 1;


        $('#myTab li:eq(1) a').tab('show');
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
//                    window.location.href = "<?php echo U('Index/Index');?>";
                }
            },
            error: function () {
                alert("ajax请求异常!")
            }
        });


    });

    function delNews(newsid) {

        $.ajax({
            url: "<?php echo U('News/delNews');?>",
            data: {
                newsid: newsid
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