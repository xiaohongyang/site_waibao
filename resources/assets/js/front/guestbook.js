var ajaxListUrl = '/api/articles?case=page'
$(function(){

    $('body').on('click', '.check-code img', function(){
        getRandomImage()
    })

    $.fn.guestGookStore = function(){
        var data = {
            column01 : $('#column01').val(),
            column02 : $('#column02').val(),
            column10 : $('#column10').val(),
        }

        var code = $('#code').val();

        if($.trim(data.column01)=='') {alert('如何称呼不能为空'); return false;}
        if($.trim(data.column02)=='') {alert('联系方式为空'); return false;}
        if($.trim(data.column10)=='') {alert('内容不能为空'); return false;}
        if($.trim(code)=='') {alert('验证码不能为空'); return false;}
        if($.trim(code) != $.fn.randomCode) {alert('验证码不正确'); return false;}

        var url = '/api/guestbook'
        $.ajax({
            url : url,
            data : data,
            type : 'POST',
            dataType : 'json',
            success : function(json) {

                if(json.status == 1) {
                    alert('留言成功')
                    window.location.href = window.location.href
                } else {
                    alert('留言失败')

                }
            }
        })
    }

    $('input[type=submit]').click(function(){
        $.fn.guestGookStore()
    })

    getRandomImage()
})



$.fn.randomCode= ""
var getRandomImage = function(){

    var arr = ['0196','0317','0533','1075','1146','1524','1814','1945','2118','3259','4863','5064','5935','6005','6219','6312','7843','9382','9528'];

    var end = arr.length
    var i = Math.random() * end;
    i = parseInt(i, 10)
    $.fn.randomCode = arr[i];
    var imageUrl = '/images/random/' + $.fn.randomCode + '.bmp';

    $('.check-code img').attr('src', imageUrl)
}