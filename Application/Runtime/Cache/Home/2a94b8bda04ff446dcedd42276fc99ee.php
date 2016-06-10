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
    <title>Title</title>

    <link rel="stylesheet" href="/Public/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <div class="col-md-2">

        <ul class="nav" id="nav">
            <?php if(is_array($type)): foreach($type as $key=>$t): ?><li><a href="#articleList" data-toggle="tab" onclick="switchTab('<?php echo ($t["id"]); ?>', 1)"><?php echo ($t["name"]); ?></a></li><?php endforeach; endif; ?>
        </ul>
    </div>

    <div class="col-md-10">
        博文列表
        <div class="tab-content" id="articleList">

        </div>
        <div class="text-center">
            <ul class="pagination">
                <!--<li><a href="#">&laquo;</a></li>-->
            </ul>
        </div>
    </div>

</div>
<script src="//cdn.bootcss.com/jquery/3.0.0-beta1/jquery.js"></script>
<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
<script>
    typeId = '<?php echo ($defaultType); ?>';
    page = '<?php echo ($defaultPage); ?>';
    $(document).ready(function() {
        switchTab(typeId, page);
    });

    function switchTab(id, page) {
        $("#articleList").html("");
        $(".pagination").html("");
        $.ajax({
            url: "<?php echo U('Index/showTab');?>",
            data: {
                typd_id: id,
                page :page
            },
            type: 'post',
            dataType: 'json',
            success: function (data) {
                count = data.count;
                totalPage = data.totalPage;
                curPage = data.curPage;
                typeId = data.typeId;
                for (i = 1; i <= totalPage; i++) {
                    var page_li = $("<li>").appendTo(".pagination");
                    var page_a = $("<a>").appendTo(page_li).text(i).attr("href", "#").
                    attr("onclick", "switchTab("+typeId+","+(i)+")");
                }
                $.each(data.list, function (cur, val) {
                    var list_group_item = $("<a>").addClass('list-group-item').attr("href", "<?php echo U('Index/read');?>"+"?id="+val.id).appendTo($("#articleList"));
                    var article_title = $("<h4>").addClass('list-group-item-heading article-title').appendTo(list_group_item);  //定义一个标题h4
                    var article_content = $("<p>").addClass('list-group-item-text article-content').appendTo(list_group_item); //定义一个内容目录
                    article_title.text(val.title);
                    article_content.text(val.content);
                });
            },
            error: function () {
                alert("fail");
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
<div class="container">
     <p class="pull-right">jiangting97@163.com</p>
</div>

</body>
</html>
</body>
</html>