var ajaxListUrl = '/api/articles?case=page'
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
        goto : function(page, amount){
            if(typeof page == 'undefined')
                page = 1

            if(typeof amount == 'undefined')
                amount = 10

            var type_id = $('input[type=hidden][name=type_id]').val()

            this.url = '/api/articles?case=page&type_id='+type_id+'&page='+ page +'&amount=' + amount

            $.ajax({
                url : this.url,
                type : 'get',
                dataType : 'json',
                success : function(data) {
                    if(data.status == 1) {
                        $.fn.xhyPage.init();
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
        init : function(config){
            this.renderData = []
            this.prevBtn = null
            this.nextBtn = null
            this.rangeBtn = null
            this.url = '',
            this.dataWrapId = '#dataInfo'
            this.pageWrapId = '#xhyPage'

            var config = {
                pageAmount : 10,
                page : 1,
                total : 0,
                prevPage : 1,
                nextPage : 0,
                endPage : 0 , 
            }

            if(typeof config == 'undefined')
                config = {}
            $.extend(config, config);

            this.pageData = config;
            console.log(config)
            console.log(this)

            $(this.dataWrapId).html('')
            $(this.pageWrapId).html('')
        },
        setPrevBtn : function(){
            var prevBtnTemplate = '<a href="javascript:;" class="past to-prev" data-page="[page]">&nbsp;</a>';
            prevBtnContent = prevBtnTemplate.replace(/\[page\]/g, this.pageData.prevPage)             
            this.prevBtn = $(prevBtnContent);
        },
        setNextBtn : function(){
            var nextBtnTemplate = '<a href="javascript:;" data-page="[page]" class="next tp-next">&nbsp;</a>';

            var page = this.pageData.page >1 ? this.pageData.page-1 : this.pageData.page;
            nextBtnContent = nextBtnTemplate.replace(/\[page\]/g, page)             
            this.nextBtn = $(nextBtnContent);
        },
        setRangeBtn : function (){
            var startPage = 1;
            var endPage = this.pageData.endPage
            var page = startPage
            var btnArr = []
            var tamplate = '<a href="javascript:;"   data-page="[page]">[page]</a>';
            while(page <= endPage) {
                var btnContent = tamplate.replace(/\[page\]/g, page)
                var btn = $(btnContent);
                if(page == this.pageData.page) {
                    btn.addClass('cur-page')
                }
                btnArr.push(btn) 
                page ++;
            }
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
                        'title' : data.data[i]['title'],
                        'content' : data.data[i]['description'].substr(0, 70),
                        'thumb' : data.data[i]['thumb'],
                        'updated_at' : data.data[i]['updated_at'],
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
            var wrapper = $(this.pageWrapId);
            wrapper.append(this.prevBtn)
            if(this.rangeBtn.length > 0) {
                for(var i=0; i<this.rangeBtn.length; i++) {
                    wrapper.append(this.rangeBtn[i])
                }
            }
            wrapper.append(this.nextBtn)

            //总页数内容
            var showTotalPageTemplate = '&nbsp;&nbsp;&nbsp; \
                            共<span class="total_number">[totalPage]</span>页 \
                            &nbsp;&nbsp;&nbsp; \
                            到第 \
                            <input type="text" id="page" name="page" style="width: 30px;border: 1px solid #e4e4e4;"> \
                            页 \
                            &nbsp;&nbsp;&nbsp; \
                            <a href="javascript:;" id="pageSubmit" style="width: 50px;">确定</a> \
                            '
            showTotalContent = showTotalPageTemplate.replace(/\[totalPage\]/g, this.pageData.endPage)
            wrapper.append($(showTotalContent))
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
            var contentTemplate = '<div class="newsFloat"> \
                                        <div id="div_hidden"> \
                                            <a href="[url]" target="blank"> \
                                                <img class="news_img" src="[thumb]" width="150px" height="92px"> \
                                            </a> \
                                        </div> \
                                    <div class="go_left"> \
                                        <a href="[url]" target="blank" \
                                           title="[title]">[title]</a> \
                                        <p class="time">[updated_at]</p> \
                                        <p title="[content]"> \
                                            [content] \
                                        </p> \
                                    </div> \
                                </div>'

            if(this.renderData.length > 0) {
                for(var i=0; i<this.renderData.length; i++) {
                    var renderItem = this.renderData[i]
                    var url = '/detail/' + renderItem['id']
                    var title = renderItem['title']
                    var content = renderItem['content']
                    var thumb = renderItem['thumb']
                    var updated_at = renderItem['updated_at']


                    var itemContent = contentTemplate.replace('[url]', url)
                    itemContent = itemContent.replace(/\[title\]/g, title)
                    itemContent = itemContent.replace(/\[content\]/g, content)
                    itemContent = itemContent.replace(/\[updated_at\]/g, updated_at)
                    itemContent = itemContent.replace(/\[thumb\]/g, thumb)

                    $(this.dataWrapId).append($(itemContent))
                }
            } 


        } 

    }
})


$(function(){
    $.fn.ajaxArticleList.goto(1)
})