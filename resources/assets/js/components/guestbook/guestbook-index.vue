<template>

    <div id="show-list" class="">

        <div class="row">

            <div class="margin-column">
 

                <button type=button class="btn btn-danger hide">
                    删除
                </button>
            </div>
 


            <table class="table table-bordered" id='datatable'> 
            </table>
        </div>

        <div class="row hide">
            <nav aria-label="Page navigation">
              <ul class="pagination">

                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li><a href="#"><</a></li>

                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>

                <li><a href="#">></a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
        </div>
        

    </div>
</template>


<script> 

    export default {
        t : this,
        props : {
            typeId : {
                default:1
            },
            columnList : {
                default : function(){

                    return [
                        { data : 'id', "title" : "id"},
                        { data : 'column01', "title" : "称呼"},
                        { data : 'column02', "title" : "联系方式"},
                        { data : 'column10', "title" : "内容"},
                        { data : 'created_at', "title" : "添加日期"}
                    ];
                }
            }
        },
        data : function(){
            return {
                data : [],
                columns : ['id', 'columne01','column02','column03','column04','column05','column10','created_at', 'updated_at'],
                showColumns : ['id', 'columne01','column02','column03','column04','column05','column10','created_at', 'updated_at'],
                tag : '',
                ue : {}, 
                columnsHeader : [], 
                contents : this.contentsValue,
                title : this.titleValue,
                type_id : this.typeId,
                datatable_obj : [],
                column_list : this.columnList
            }
        },
        mounted : function(){
            
            this.columnsHeader = [
               
                '标题',
                '类别 ',
                '创建日期',
            ]
        },

        computed : {
        },
        watch : {
            
        },
        methods : {

            inColumn : function(column){
                var columns = this.columns
                return columns.indexOf(column)  != -1;
            },
            freshPage : function(totalPage, amountPerPage, currentPage) {
                if(totalPage) {
                    this.totalPage = parseInt(totalPage / amountPerPage) + 1; 
                }
            },
           
            //刷新数据
            getListData : function(isFresh){


                if(typeof isFresh != 'undefined') {
                    $('#datatable').html('')
                    this.datatable_obj.destroy()
                }
                

                axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()

                var data = new FormData();
                var t = this
                var url = t.$config.url.api.guestbook
                url = url + '?case=page&type_id=' + t.type_id
                axios.get( url, data )
                    .then(function(json){


                        if(json.status==200 && json.data.status==1) {
  
                            t.data = json.data.data
                            var dataSet = [];
                            var showColumns = ['id', 'columne01','column02','column03','column04','column05','column10','created_at', 'updated_at']
                            if(t.data.length > 0) {
                                
                                dataSet = t.data
                                
                            }
                            console.log('dataSet -------------------------------------')
                            console.log(dataSet)

                            var columnList
                            if(typeof t.column_list == 'string') {

                                t.column_list = JSON.parse(t.column_list)
                            }
                            columnList = t.column_list
                            var columns = []
                            columns = columns.concat(columnList);
                            columns = columns.concat([
                                 {
                                        orderable: false, title: '操作', className: 'page-numeric', render: function (data, type, row) {

                                            var editStr = '';

                                            if(row['verified'] == 1) {
                                                editStr = editStr
                                                    + '<button class="btn btn-xs btn-warning"  onclick="$.fn.verified(' + row['id'] + ', 0)" title="取消审核"><span class=""><span class="glyphicon glyphicon-off"></span></button> ';
                                            } else {
                                                editStr = editStr
                                                    + '<button class="btn btn-xs btn-success"  onclick="$.fn.verified(' + row['id'] + ', 1)" title="审核通过"><span class=""><span class="glyphicon glyphicon-ok"></span></span></button> ';
                                            }


                                            var replyStr = '<button class="btn btn-xs btn-primary"  onclick="$.fn.reply(' + row['id'] + ', 1)" title="回复留言"><span class=""><span class="glyphicon glyphicon-transfer"></span></span></button> ';

                                            var displayReply = '<button class="btn btn-xs btn-info"  onclick="$.fn.displayReply(' + row['id'] + ', 1)" title="查看回复"><span class=""><span class="glyphicon glyphicon-eye-open"></span></span></button> ';


                                            editStr += replyStr;

                                            if(row['reply'] && row['reply'].length) {

                                                editStr += displayReply;
                                            }

                                     editStr = editStr +
                                         '<button class="btn btn-xs btn-danger"  onclick="$.fn.remove(' + row['id'] + ')" title="删除留言"><span class="glyphicon glyphicon-remove"></span></button> ';

                                            editStr  += "<example></example>"
                                            return editStr ;
                                        }
                                    }
                            ])
                            t.datatable_obj = $('#datatable').DataTable({
                                data: dataSet,
                                columns: columns,
                                "paginate": true,// 分页按钮,
                                "language": { 
                                    "sProcessing": "处理中...",
                                    "sLengthMenu": "每页 _MENU_ 项",
                                    "sZeroRecords": "没有匹配结果",
                                    "sInfo": "当前显示第 _START_ 至 _END_ 项，共 _TOTAL_ 项。",
                                    "sInfoEmpty": "当前显示第 0 至 0 项，共 0 项",
                                    "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                                    "sInfoPostFix": "",
                                    "sSearch": "搜索:",
                                    "sUrl": "",
                                    "sEmptyTable": "表中数据为空",
                                    "sLoadingRecords": "载入中...", 
                                    "sInfoThousands": ",",
                                    "oPaginate": {
                                        "page": "页数",
                                        "pageOf": "共",
                                        "sFirst": "首页",
                                        "sPrevious": "上页",
                                        "sNext": "下页",
                                        "sLast": "末页",
                                        "sJump": "跳转"
                                    },
                                    "oAria": {
                                        "sSortAscending": ": 以升序排列此列",
                                        "sSortDescending": ": 以降序排列此列"
                                    }
                                },
                                "order": [[4, "desc"]],
                            })
                        }
                    })

                
            },
            setTypeId :function(newValue) {
                this.type_id=newValue 
                this.getListData(true)
            },
            remove : function(id) {
                if(typeof id == 'undefined')
                    return false;
                var t = this
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()
                axios.delete(this.$config.url.api.guestbook + '/' + id)
                    .then(function(json) {
                        var message = t.$msgBag2String(json.data.message)
                        t.$alert(message)

                        if(json.data.status == 1) {
                            t.getListData(true)
                        }
                    })
            },
            verified : function(id, isOk) {
                if(typeof id == 'undefined')
                    return false;
                var t = this
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()
                axios.get(this.$config.url.api.guestbook + '?id=' + id + '&case='+(isOk ? 'verified' : 'cancelVerified'))
                    .then(function(json) {
                        var message = t.$msgBag2String(json.data.message)
                        alert(message)

                        if(json.data.status == 1) {
                            t.getListData(true)
                        }
                    })
            },
            reply : function(id, content) {
              //回复留言
                console.log('=====================content=====================================')
                console.log(content)

                if(typeof id == 'undefined' )
                    return false;
                if(typeof  content == 'undefined'){
                    alert('内容不能为空')
                    return false;
                }
                var t = this
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()

                axios.post(this.$config.url.api.guestbook + '?id=' + id +'&case=reply' ,{column10 :content, parent_id : id})
                    .then(function(json) {
                        var message = t.$msgBag2String(json.data.message)
                        alert(message)

                        $('.x_say_wrapper').html('');

                        if(json.data.status == 1) {
                            t.getListData(true)
                        }
                    })
            },
            removeEle : function(obj){
                $(obj).remove();
            },
            delReplay : function(id) {
              //回复留言
                if(typeof id == 'undefined')
                    return false;
                var t = this
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()
                axios.delete(this.$config.url.api.guestbook + '/' + id)
                    .then(function(json) {
                        var message = t.$msgBag2String(json.data.message)
                        t.$alert(message)

                        document.getElementById('reply_' + id).remove()
                    })
            },
            displayReply : function(id) {
              //显示回复记录


                axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()

                var data = new FormData();
                var t = this
                var url = t.$config.url.api.guestbook
                url = url + '?case=page&parent_id=' + id
                axios.get( url, data )
                    .then(function(json) {


                        var showReplay = function(listData) {


                            //内容
                            var headerHtml = '<div class="newsFloat list-wrapper" style="height: 80%; overflow:auto;"><table class="table table-striped"> \
                                                            <thead> \
                                                                <tr> \
                                                                    <th>#</th> \
                                                                    <th>回复内容</th> \
                                                                    <th>回复时间</th> \
                                                                    <th>操作</th> \
                                                                </tr> \
                                                            </thead> \
                                                            <tbody> \
                                                           ';
                            var footerHtml = '</tbody> \
                                                    </table>';
                            var contentTemplate = '<tr id="reply_[guestbook_id]"> \
                                                        <th scope="row">[id]</th> \
                                                        <td>[content]</td> \
                                                        <td>[time]</td> \
                                                        <td>[operation]</td> \
                                                    </tr> \
                                ';
                            var cont = ""
                            if(listData.length > 0) {
                                for(var i=0; i<listData.length; i++) {
                                    var renderItem = listData[i]

                                    var id = i+1
                                    var content = renderItem['column10']
                                    var time = renderItem['updated_at']

                                    var guestbook_id = renderItem['id']
                                    var operation = "<span class='btn btn-xs btn-primary' onclick='$.fn.delReplay("+guestbook_id+")'>删除</span>"

                                    var itemContent = contentTemplate.replace(/\[id\]/g, id)
                                    itemContent = itemContent.replace(/\[guestbook_id\]/g, guestbook_id)
                                    itemContent = itemContent.replace(/\[content\]/g, content)
                                    itemContent = itemContent.replace(/\[time\]/g, time)
                                    itemContent = itemContent.replace(/\[operation\]/g, operation)

                                    cont += itemContent
                                }
                            }

                            cont = headerHtml + cont + footerHtml
                            $.x_say_m({cont : cont, time : 100000000, size : ['780', '550'], btn : [], closeBtnCont:'x'})

                        }

                        if (json.status == 200 && json.data.status == 1) {

                            data = json.data.data
                            showReplay(data)
                        }
                    })

            },


            onContentsChange : function(val) {
                this.contents = val
                console.log(val)
            }
        },
        complete : function(){
            
        },
        beforeMount : function(){
            this.$authToken()
            //this.$freshToken()
        },
        created : function(){

            this.getListData();


            var t = this
            $.fn.remove = function(id){ 
                t.remove(id) 
            }

            $.fn.verified = function(id, isOk){
                t.verified(id, isOk)
            }

            $.fn.doReplay = function() {
                var id = $('#parent_id').val()
                var content = $('#reply_content').val();
                if(content.length < 1) {
                    alert('内容不能为空');
                    return false;
                }
                t.reply(id, content)
            }
            $.fn.reply = function(id){

                var cont = ' \
                        <form consubmit="return false;" class="text-left"> \
                            <input type="hidden" class="form-control" id="parent_id" value="'+id+'"> \
                            <div class="form-group"> \
                                <label for="exampleInputPassword1">回复内容</label> \
                                <textarea id="reply_content" style="height: 90px;"></textarea> \
                            </div> \
                            <span type="submit" class="btn btn-primary" onclick="$.fn.doReplay()">提交</span> \
                        </form>\
                    ';
                $.x_say_m({cont : cont, time : 100000000, size : ['780', '250'], btn : [], closeBtnCont:'x'})

            }

            $.fn.displayReply = function(id, isOk){
                t.displayReply(id, isOk)
            }

            $.fn.delReplay = function(id) {
                t.delReplay(id)
            }

        }
    }

</script>