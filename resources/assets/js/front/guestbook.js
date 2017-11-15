var ajaxListUrl = '/api/articles?case=page'
$(function(){

    $('body').on('click', '.check-code img', function(){
        getRandomImage()
    })

    $.fn.guestbook ={
        addError : function(message, element){
            element.siblings('.error').remove();
            messageObj = $("<span class='error'>"+ message +"</span>")
            element.after(messageObj)
        },
        removeError : function(element){
            element.siblings('.error').remove();
        }
    }
    $.fn.guestGookStore = function(){
        var data = {
            column01 : $('#column01').val(),
            column02 : $('#column02').val(),
            column10 : $('#column10').val(),
        }

        var code = $('#code').val();

        if ($.trim(data.column01) == '') {
            $.fn.guestbook.addError('如何称呼不能为空', $('#column01'));
            return false;
        } else {
            $.fn.guestbook.removeError($('#column01'))
        }
        if ($.trim(data.column02) == '') {
            $.fn.guestbook.addError('联系方式为空', $('#column02'));
            return false;
        } else {
            $.fn.guestbook.removeError($('#column02'))
        }
        if ($.trim(data.column10) == '') {
            $.fn.guestbook.addError('内容不能为空', $('#column10'));
            return false;
        } else {
            $.fn.guestbook.removeError($('#column10'))
        }
        if ($.trim(code) == '') {
            $.fn.guestbook.addError('验证码不能为空', $('#code'));
            return false;
        } else {
            $.fn.guestbook.removeError($('#code'))
        }
        if ($.trim(code) != $.fn.randomCode) {
            $.fn.guestbook.addError('验证码不正确', $('#code'));
            return false;
        } else {
            $.fn.guestbook.removeError($('#code'))
        }

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





var ajaxListUrl = '/api/guestbook?case=page'

$(function(){

    var goto = function(page) {
        $.fn.ajaxArticleList.goto(page)
    }

    $('body').on('click', 'a[data-page]', function(){
        var page = $(this).attr('data-page')
        goto(page)
    })
    $('body').on('click', '#pageSubmit', function(){
        var page = $('input[id=page]').val();
        page = $.trim(page)
        if(isNaN(page)) {
            alert('页码必需为数字')
            return false;
        }
        goto(page)
    })




    $.fn.ajaxArticleList = {

        pageAmount : 10,
        goto : function(page, amount){

            var t = this
            if(typeof page == 'undefined')
                page = 1

            if(typeof amount == 'undefined')
                amount = this.pageAmount ? this.pageAmount : 10

            var type_id = $('input[type=hidden][name=type_id]').val()

            var list_search = $('input[name=list_search]').val();
            var list_year = $('input[name=list_year]').val();

            list_search = typeof(list_search) != 'undefined' && list_search ? list_search : ''
            this.url = '/api/guestbook?case=page&page='+ page +'&amount=' + amount
            $.ajax({
                url : this.url,
                type : 'get',
                dataType : 'json',
                success : function(data) {
                    console.log(data.page)
                    if(data.status == 1) {
                        $.fn.xhyPage.init({pageAmount: amount});
                        var data = {total : data.page.total, data: data.data}
                        $.fn.xhyPage.updateData(data, page)
                    }
                }
            })
        }
    }


    //1 获取数据
    //2 生成分页按钮
    $.fn.xhyPage = {
        init : function(configUpdate){
            this.renderData = []
            this.prevBtn = null
            this.nextBtn = null
            this.rangeBtn = null
            this.url = '',
                this.dataWrapId = '#dataInfo'
            this.pageWrapId = '#xhyPage'

            var config = {
                pageAmount : 1,
                page : 1,
                total : 0,
                prevPage : 1,
                nextPage : 0,
                endPage : 0 ,
            }

            if(typeof configUpdate == 'undefined')
                configUpdate = {}
            $.extend(config, configUpdate);

            console.log('----config')
            console.log(config)
            console.log('----config')

            this.pageData = config;
            console.log(config)
            console.log(this)

            $(this.dataWrapId).html('')
            $(this.pageWrapId).html('')
        },
        setPrevBtn : function(){
            var prevBtnTemplate = '<li class=" to-prev" data-page=[page]><a href="#" data-page="1" aria-label="Previous"><span aria-hidden="true">«</span></a></li> ';
            prevBtnContent = prevBtnTemplate.replace(/\[page\]/g, this.pageData.prevPage)
            this.prevBtn = prevBtnContent;
        },
        setNextBtn : function(){

            var nextBtnTemplate = '<li><a href="#" data-page=[page] aria-label="Next"><span aria-hidden="true">»</span></a></li>  ';
            nextBtnContent = nextBtnTemplate.replace(/\[page\]/g, this.pageData.endPage)
            this.nextBtn = nextBtnContent;
        },
        setRangeBtn : function (){
            var startPage = 1;
            var endPage = this.pageData.endPage
            var page = startPage
            var btnArr = []
            var tamplate = '<li class="[is_current]" ><a href="javascript:;"  data-page="[page]">[page]</a></li>';
            while(page <= endPage) {
                var btnContent = tamplate.replace(/\[page\]/g, page)

                if(page == this.pageData.page) {
                    btnContent = btnContent.replace(/\[is_current\]/, 'active');
                } else {
                    btnContent = btnContent.replace(/\[is_current\]/, '');
                }
                btnArr.push(btnContent)
                page ++;
            }
            console.log(btnArr)
            this.rangeBtn = btnArr

            this.hideSomeRangeBtn();
        },
        updateData :function (data,page){

            this.pageData.page = page
            this.renderData = []
            this.pageData.total = data.total
            if(data.data.length > 0) {
                for(var i=0; i< data.data.length; i++) {
                    this.renderData.push({
                        'id' : data.data[i]['id'],
                        'column01' : data.data[i]['column01'],
                        'column02' : data.data[i]['column02'],
                        'column10' : data.data[i]['column10'],
                        'created_at' : data.data[i]['created_at'],
                        'created_at' : data.data[i]['created_at'],
                        'verified' : data.data[i]['verified'],
                        'reply' : data.data[i]['reply'],
                    })
                }
            }



            var totalPage = Math.ceil(this.pageData.total / this.pageData.pageAmount)

            var prevPage = this.pageData.page > 1 ? this.pageData.page-1 : 1
            this.pageData.prevPage = prevPage
            var nextPage = this.pageData.totalPage > this.pageData.page ? this.pageData.page+1 : this.pageData.page
            this.pageData.nextPage = nextPage
            this.pageData.endPage = totalPage



            this.setPrevBtn()
            this.setNextBtn()
            this.setRangeBtn()

            this.updateHtml();
        },

        updatePageHtml : function(){
            //分页按钮

            var btnItemWrapper = $('<nav aria-label="..."> \
                                        <ul class="pagination"> \
                                        </ul> \
                                    </nav> \
                                    ');

            var wrapper = $(this.pageWrapId);
            btnItemWrapper.find('.pagination').prepend(this.prevBtn)
            btnItemWrapper.find('.pagination').append(this.nextBtn)
            if(this.rangeBtn.length > 0) {
                for(var i=0; i<this.rangeBtn.length; i++) {
                    var tmpLi = this.rangeBtn[i]
                    btnItemWrapper.find('a[aria-label=Next]').closest('li').before(tmpLi);
                    wrapper.append(btnItemWrapper)
                }
            }
            console.log(this.rangeBtn + 'this.rangeBtn------------')


            //总页数内容
            var showTotalPageTemplate = '<nav class="page-actions"> <ul> <li> \
                                                        &nbsp;&nbsp;&nbsp;<span style="margin-left:30px;"></span> \
                                                        共<span class="total_number">[totalPage]</span>页 \
                                                        &nbsp;&nbsp;&nbsp; \
                                                        到第 \
                                                        <input type="text" id="page" name="page" style="width: 30px;border: 1px solid #e4e4e4;"> \
                                                        页 \
                                                        &nbsp;&nbsp;&nbsp; \
                                                        <a href="javascript:;" id="pageSubmit" style="width: 50px;">确定</a> \
                            </li></ul></nav> \
                            '
            showTotalContent = showTotalPageTemplate.replace(/\[totalPage\]/g, this.pageData.endPage)
            console.log(showTotalContent)
            console.log(this.pageWrapId)

            wrapper.append(showTotalContent)
        },

        hideSomeRangeBtn : function(){

            if(this.rangeBtn.length > 7) {
                if(this.pageData.page <= 4) {
                    for(var i=0; i<this.rangeBtn.length; i++) {
                        if(i>=7) {
                            this.rangeBtn[i].addClass('hide')
                        }
                    }
                } else {
                    for(var i=0; i<this.rangeBtn.length; i++) {
                        var leftIndex = this.pageData.page - 3
                        var rightIndex = this.pageData.page + 3
                        if(i<leftIndex || i>rightIndex) {
                            this.rangeBtn[i].addClass('hide')
                        }
                    }
                }
            }
        },

        updateHtml : function() {


            this.updatePageHtml()

            //内容
            var contentTemplate = '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0" style="font-size: 12px;">\
                                        <tbody>\
                                            <tr>\
                                                <td width="60%" height="24" valign="middle" bgcolor="#E5F6CA">\
                                                    <font color="green"><b>&nbsp;作者：\
                                                           [column01]</b></font>\
                                               </td> \
                                               <td width="40%" align="right" valign="middle" bgcolor="#E5F6CA">时间：\
                                                <font class="green">[created_at]</font> \
                                                <font color="green">IP地址已记录</font>\
                                                </td>\
                                            </tr> \
                                            <tr style="height:10px; min-height:5px;max-height:10px;overflow:hidden;margin:0;padding:0;">\
                                                <td height="5px"></td> \
                                                <td align="right"></td>\
                                            </tr> \
                                            <tr>\
                                                <td colspan="2">\
                                                    <table width="100%" border="0" cellspacing="4" cellpadding="0">\
                                                    <tbody>\
                                                        <tr>\
                                                            <td width="100%" valign="top" style="font-size: 12px; padding-left: 0px;">\
                                                                <div style=""><b class="spiffy"><b class="spiffy1"><b></b></b><b class="spiffy2"><b></b></b> <b class="spiffy3"></b><b class="spiffy4"></b><b class="spiffy5"></b></b> \
                                                                <div class="spiffyfg [verified]" style="">   [column10]</div> <b class="spiffy"><b class="spiffy5"></b> <b class="spiffy4"></b> <b class="spiffy3"></b><b class="spiffy2"><b></b></b><b class="spiffy1"><b></b></b></b></div></td></tr></tbody></table></td></tr> <tr style="height:10px; min-height:5px;max-height:10px;overflow:hidden;margin:0;padding:0;"><td height="10px"></td> <td align="right"></td></tr></tbody></table>'

            var replyTemplate = '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0" style="font-size: 12px;">\
                                        <tbody style="text-indent: 2em;">\
                                            <tr>\
                                                <td width="100%" height="24" valign="middle" bgcolor="#ccc" style="background:#ccc;">\
                                                    <font color="green"><b>&nbsp;管理员回复：[column10]\
                                               </td> \
                                            </tr> \
                                             <tr style="height:10px; min-height:5px;max-height:10px;overflow:hidden;margin:0;padding:0;"><td height="10px"></td> <td align="right"></td></tr></tbody></table>'

            if(this.renderData.length > 0) {
                for(var i=0; i<this.renderData.length; i++) {
                    var renderItem = this.renderData[i]

                    var column01 = renderItem['column01']
                    var column02 = renderItem['column02']
                    var column10 = renderItem['verified'] ? renderItem['column10'] : '本条留言正在审核'
                    var created_at = renderItem['created_at']
                    var verified = renderItem['verified'] ? '' : 'not-valid'



                    var itemContent = contentTemplate.replace(/\[column01\]/g, column01)
                    itemContent = itemContent.replace(/\[column10\]/g, column10)
                    itemContent = itemContent.replace(/\[column02\]/g, column02)
                    itemContent = itemContent.replace(/\[created_at\]/g, created_at)
                    itemContent = itemContent.replace(/\[verified\]/g, verified)


                    var replyContent = '';
                    //回复内容
                    if(renderItem['reply'] && renderItem['reply'].length && renderItem['verified'] && renderItem['reply'][0]['parent_id']==renderItem['id']) {
                        
                        var replyList = renderItem['reply']
                        for(j=0; j<replyList.length; j++){

                            var created_at = replyList[j]['updated_at']
                            var column10 = replyList[j]['column10']
                            var tmpCont = ''
                            tmpCont = replyTemplate.replace(/\[created_at\]/g, created_at)
                            tmpCont = tmpCont.replace(/\[column10\]/g, column10)

                            replyContent += tmpCont
                        }
                    }

                    $(this.dataWrapId).append($(itemContent))
                    $(this.dataWrapId).append($(replyContent))
                }
            }


        }

    }
})


$(function(){
    $.fn.ajaxArticleList.goto(1)
})