<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/Public/css/bootstrap.min.css">

</head>
<body>

<div class="container">
    <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="<?php echo U('News/addNews');?>" class="btn">添加新闻</a></li>

            <li><a href="#">SVN</a></li>
            <li><a href="#">iOS</a></li>
            <li><a href="#">VB.Net</a></li>
            <li><a href="#">Java</a></li>
            <li><a href="#">PHP</a></li>
        </ul>
    </div>

    <form action="<?php echo U('News/searchTypeNews');?>" role="search">
        <div class="input-group">
            <span class="input-group-addon">类型</span>
            <select class="form-control" name="type">
                <option value=''>请选择类型</option>
                <option value='1'>后台菜单</option>
                <option value='0'>前台列表</option>
            </select>
        </div>

        <input type="hidden" name="c" value="menu"/>
        <input type="hidden" name="a" value="index"/>
            <span class="input-group-btn">
                <button id="sub_data" type="submit" class="btn btn-primary">
                    搜索
                </button>
            </span>
    </form>
    <div class="col-md-9">




        <table class="table table-striped table-border">
            <caption>新闻列表</caption>
            <thead>
            <tr>
                <th>新闻标题</th>
                <th>新闻内容</th>
                <th>修改日期</th>
                <th>新闻图片</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>

            <?php if(is_array($newsList)): foreach($newsList as $key=>$news): ?><tr>
                    <td><?php echo ($news["newstitle"]); ?></td>

                    <td><?php echo ($news["newscontent"]); ?></td>
                    <td><?php echo ($news["newsimg"]); ?></td>
                    <td><?php echo ($news["addtime"]); ?></td>

                    <td>

                        <li class="active"><a href="<?php echo U('News/modifyNews',array( 'newsid'=>$news['newsid']));?>"
                                              class="btn">modify新闻</a></li>
                        <input type="button" id="delNews" class="btn btn-info delNews" value="删除新闻"
                               onclick="delNews('<?php echo ($news["newsid"]); ?>')"/>

                    </td>

                </tr><?php endforeach; endif; ?>


            </tbody>
        </table>
        <ul class="pagination">
            <div><?php echo ($page); ?></div>
        </ul>


    </div>

</div>


<script type="text/javascript" src="/Public/js/admin/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/js/admin/main.js"></script>
<script src="//cdn.bootcss.com/jquery/3.0.0-beta1/jquery.js"></script>
<script type="text/javascript">

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