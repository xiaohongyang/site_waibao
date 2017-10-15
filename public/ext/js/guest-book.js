var ajaxListUrl = '/api/articles?case=page' 
$(function(){

    var codeImage = getRandomImage();
    alert(codeImage)
    $('.check-code img').src(codeImage)

    $.fn.guestGookStore = function(){
        var data = {
            column01 : $('#column01').val(),
            column02 : $('#column02').val(),
            column03 : $('#column03').val(),
            column04 : $('#column04').val(),
            column05 : $('#column05').val(),
            column10 : $('#column10').val(),
        }

        if($.trim(data.column01)=='') {alert('主题不能为空'); return false;}
        if($.trim(data.column10)=='') {alert('内容为空'); return false;}
        if($.trim(data.column02)=='') {alert('公司名称不能为空'); return false;}
        if($.trim(data.column03)=='') {alert('姓名为空'); return false;}
        if($.trim(data.column04)=='') {alert('电话不能为空'); return false;}
        if($.trim(data.column05)=='') {alert('电邮不能为空'); return false;}

        var url = '/api/guestbook'
        $.ajax({
            url : url,
            data : data,
            type : 'POST',
            dataType : 'json',
            success : function(json) {

                if(json.status == 1) {
                    $.fn.xhyAlert.show('留言成功')
                } else {
                    $.fn.xhyAlert.show('留言失败')

                }
            }
        })
    }

    $('input[type=submit]').click(function(){
        $.fn.guestGookStore()
    })
})



$.fn.randomCode= ""
var getRandomImage = function(){

    var arr = [
        0196,
        0317,
        0533,
        1075,
        1146,
        1524,
        1814,
        1945,
        2118,
        3259,
        4863,
        5064,
        5935,
        6005,
        6219,
        6312,
        7843,
        9382,
        9528
    ];

    var end = arr.length
    var i = Math.random() * end;
    i = parseInt(i, 10)
    $.fn.randomCode = arr[i];
    return '/images/random/' + arr[$.fn.randomCode] + '.bmp';
}