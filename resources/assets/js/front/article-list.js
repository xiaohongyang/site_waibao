
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
            this.url = '/api/articles?case=page&type_id='+type_id+'&page='+ page +'&amount=' + amount + '&search=' + list_search + '&list_year=' + list_year
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
                        'title' : data.data[i]['title'],
                        'content' : data.data[i]['description'].substr(0, 70),
                        'thumb' : data.data[i]['thumb'],
                        'updated_at' : data.data[i]['updated_at'],
                        'attach_file' : '/down/' + data.data[i]['id'],
                        'today_count' : data.data[i]['today_count'],
                        'all_count' : data.data[i]['all_count'],
                        'all_visit_count' : data.data[i]['all_visit_count'].length,
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
            var contentTemplate = '<div class="newsFloat list-wrapper"> \
                                        <div class="thumb"> \
                                            <a href="[url]" target="_blank"> \
                                                <img class="news_img" src="[thumb]" width="150px" height="92px"> \
                                            </a> \
                                        </div> \
                                        <div class="info" style="line-height: 30px; width:auto;"> \
                                            <a href="[url]" target="_blank" \
                                               title="[title]" class="title" style="">[title]\
                                                   \
                                           </a> <span class="down-counter" style="margin-left: 2em;"> 今日下载：[today_count] 总下载：[all_count] </span> \
                                            <span class="c-red counter" >[all_visit_count]</span>   \   \
                                            <span class="time">[updated_at]</span> \
                                            <span title="[content]" class="content"> \
                                                [content] \
                                            </span> \
                                            <span class="down"><a href="[down]" target="_blank">点击下载</a> </span> \
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
                    var down = renderItem['attach_file']
                    var today_count = renderItem['today_count']
                    var all_count = renderItem['all_count']
                    var all_visit_count = renderItem['all_visit_count']


                    var itemContent = contentTemplate.replace(/\[url\]/g, url)
                    itemContent = itemContent.replace(/\[title\]/g, title)
                    itemContent = itemContent.replace(/\[content\]/g, content)
                    itemContent = itemContent.replace(/\[updated_at\]/g, updated_at)
                    itemContent = itemContent.replace(/\[thumb\]/g, thumb)
                    itemContent = itemContent.replace(/\[down\]/g, down)
                    itemContent = itemContent.replace(/\[today_count\]/g, today_count)
                    itemContent = itemContent.replace(/\[all_count\]/g, all_count)
                    itemContent = itemContent.replace(/\[all_visit_count\]/g, all_visit_count)

                    $(this.dataWrapId).append($(itemContent))
                }
            }


        }

    }
})


$(function(){
    $.fn.ajaxArticleList.goto(1)
})