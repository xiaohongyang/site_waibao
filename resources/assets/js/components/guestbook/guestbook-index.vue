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
        props : {typeId : {default:1}, 
            columnList : {
            default : [
                { data : 'id', "title" : "标题"},
                { data : 'column01', "title" : "主题"},
                { data : 'column02', "title" : "公司名称"},
                { data : 'column03', "title" : "姓名"},
                { data : 'column04', "title" : "电话"},
                { data : 'column05', "title" : "电邮"},
                { data : 'column10', "title" : "内容"},
                { data : 'created_at', "title" : "添加日期"}
            ]
        }},
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
 
                                            editStr = editStr +
                                                '<button class="btn btn-sm btn-default"  onclick="$.fn.remove(' + row['id'] + ')" title="删除"><span class="glyphicon glyphicon-remove"></span></button> ';
 
                                            editStr += "<example></example>"
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
                                }
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