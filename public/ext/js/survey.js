var ajaxListUrl = '/api/articles?case=page' 

$(function(){
    $.fn.guestGookStore = function(){
        var data = {
            column01 : $('#column01').val(),
            column02 : $('#column02').val(),
            column03 : $('#column03').val(),
            column04 : $('#column04').val(),
            column05 : $('#column05').val(),
            column06 : $('input[name=column06]:checked').val(),
            column07 : $('input[name=column07]:checked').val(),
            column08 : $('input[name=column08]:checked').val(),
            column09 : $('input[name=column09]:checked').val(),
            column10 : $('textarea[name=column10]').val(),
            type_id : 2
        }

        if($.trim(data.column01)=='') {alert('单位名称不能为空'); return false;}
        if($.trim(data.column02)=='') {alert('工程名称名称不能为空'); return false;}
        if($.trim(data.column03)=='') {alert('填表人姓名不能为空'); return false;}
        if($.trim(data.column04)=='') {alert('日期不能为空'); return false;}
        if($.trim(data.column05)=='') {alert('联系电话不能为空'); return false;}
        if($.trim(data.column10)=='') {alert('意见和建议不能为空'); return false;}

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