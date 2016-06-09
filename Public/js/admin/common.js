/**
 * Created by jiangting on 16/6/3.
 */

/**
 * 添加操作按钮
 */

$("#addnews").click(function () {
    var url = SCOPE.add_url;
})






alert("123");



$("#addnews").click(function () {
    var data = $("cms-form").serializeArray();
    postData = {};
    $(data).each(function(i)) {
        postData[this.name] = this.value;
    }
});