<template>
    <div id="show-list" class="">

        <div class="row">

            <div class="margin-column">

                <button type=button class="btn btn-danger" @click="$goto($config.url.web.article_create)">
                    <span class="glyphicon glyphicon-plus"></span>新建
                </button>

                <button type=button class="btn btn-danger hide">
                    删除
                </button>
            </div>

             
            <div id="datatable_filter" class="dataTables_filter type_filter"  > 
                <label>选择类别:</label>
                <type-tree-select   :selected="type_id"    v-on:changed="setTypeId"></type-tree-select>
            </div>


            <table class="table table-bordered" id='datatable'> 
            </table>
        </div>


    </div>
</template>


<script> 

    import $ from 'jquery'

    export default {
        t : this,
        props : ['titleValue', 'contentsValue'],
        data : function(){
            return {
                data : [],
                columns : ['id', 'title','type','created_at', 'updated_at'],
                showColumns : ['id', 'title','type','created_at', 'updated_at'],
                tag : '',
                ue : {}, 
                columnsHeader : [], 
                contents : this.contentsValue,
                title : this.titleValue,
                type_id : 0,
                datatable_obj : [],
            }
        },
        mounted : function(){
            
            this.columnsHeader = [
               
                '标题',
                '类别 ',
                '创建日期',
                '更新日期',
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
                var url = t.$config.url.api.article_store
                url = url + '?case=page&type_id=' + t.type_id
                axios.get( url, data )
                    .then(function(json){


                        if(json.status==200 && json.data.status==1) {
  
                            t.data = json.data.data
                            var dataSet = [];
                            var showColumns = ['id', 'title','type','created_at', 'updated_at']
                            if(t.data.length > 0) {
                                
                                /*
                                for(var item in t.data) {
                                    var itemTmp = []
                                    for(var k in showColumns) {
                                        var keyName = showColumns[k]
                                        if(keyName == 'type' ) {
                                           // var articleType = t.data[item].articleType;
                                            itemTmp.push(t.data[item]['articletype'].name)
                                        } else {
                                            itemTmp.push(t.data[item][keyName])
                                        }
                                    }
                                    dataSet.push(itemTmp)
                                }
                                */
                                dataSet = t.data
                                
                            }
                            console.log('dataSet -------------------------------------')
                            console.log(dataSet)

                            t.datatable_obj = $('#datatable').DataTable({
                                data: dataSet,
                                columns: [
                                    { data : 'id', "title" : "标题"},
                                    { data : 'title', "title" : "标题"},
                                    { data : 'created_at', "title" : "添加日期"},
                                    { data : 'updated_at', "title" : "更新日期"},
                                    {
                                        orderable: false, title: '操作', className: 'page-numeric', render: function (data, type, row) {

                                            var editUrl = t.$config.url.web.article_create
                                            var editStr = '<a class="btn btn-sm btn-default" href="' + editUrl + '?id='+ row['id'] + '" title="编辑"><span class="glyphicon glyphicon-pencil"></span></a>';
 
                                            editStr = editStr +
                                                '<button class="btn btn-sm btn-default"  onclick="$.fn.remove(' + row['id'] + ')" title="删除"><span class="glyphicon glyphicon-remove"></span></button> ';
 
                                            editStr += "<example></example>"
                                            return editStr ;
                                        }
                                    }
                                ],
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
                                }
                            })
                        }
                    })

                
            },
            setTypeId :function(newValue) {
                this.type_id=newValue 
                this.getListData(true)
            },
            submit : function(){
                var data = {
                    name : this.title,
                    pid : 0,
                    thumb : this.thumb,
                    content : this.contents
                }

                axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()
                axios.post(this.$config.url.api.article_type_store, data)
                    .then(function(json) {
                        console.log(json)
                    })
            },
            remove : function(id) {
                if(typeof id == 'undefined')
                    return false;
                var t = this
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()
                axios.delete(this.$config.url.api.article_store + '/' + id)
                    .then(function(json) {
                        var message = t.$msgBag2String(json.data.message)
                        t.$alert(message)

                        if(json.data.status == 1) {
                            t.getListData(true)
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

            console.log('3344----------')
            this.getListData();


            var t = this
            $.fn.remove = function(id){ 
                t.remove(id) 
            }
            

        }
    }

</script>