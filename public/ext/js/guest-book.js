var ajaxListUrl = '/api/articles?case=page' 

$(function(){
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
            type : 'PUT',
            dataType : 'json',
            success : function(json) {

                console.log(json)
            }
        })
    }

    $('input[type=submit]').click(function(){
        $.fn.guestGookStore()
    })
})