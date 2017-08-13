<template>
    <div id="show-list" class="">

        <div class="row">

            <div class="margin-column">

                <button type=button class="btn btn-danger">
                    <span class="glyphicon glyphicon-plus"></span>新建
                </button>

                <button type=button class="btn btn-danger hide">
                    删除
                </button>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td class='hide'>
                            <label>
                                <input type="checkbox" />
                            </label>
                        </td>
                        <td v-for="row in columnsHeader">
                            {{row}}
                        </td>
                        <td>操作</td>
                    </tr>
                </thead>

                <tbody>

                    <type-tree :tree-data=data></type-tree>
                    <tr v-for="row in data">
                        <td class='hide'>
                            <label>
                                <input type="checkbox">
                            </label>
                        </td>
                        <type-tree :tree-data="leftNav"></type-tree>
                        <td>
                            <button type='button' class='btn btn-default'>
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </button>

                            <button type='button' class='btn btn-default'>
                                <span class="glyphicon glyphicon-remove " aria-hidden="true"></span>
                            </button>
                        </td>

                         
                    </tr>
                </tbody>
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
        props : ['titleValue', 'contentsValue'],
        data : function(){
            return {
                leftNav:[
                {
                        name:321,
                        text:"user center", // show text
                        url:"/user", // link which will be matched in router , it could also be '' which depend your project structure.
                        icon:"", // optional, if you wanna add icon before text
                        access:true, //optional, default true, if you wanna hide current menu ,set it to false
                        children:[
                            {   //child can have all option above, nest it as you need.
                                text:"ABC",
                                url:"",
                                name:321
                            }

                        ]
                    }
                ],
                data : [],
                columns : ['name','pid','created_at', 'updated_at'],
                tag : '',
                ue : {},
                columnsHeader : [],
                contents : this.contentsValue,
                title : this.titleValue
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

            //上传图片
            getListData : function(){


                axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()

                var data = new FormData();
                var t = this
                //axios.get('/api/article-types?case=page&page=1&amount=100000000', data )
                axios.get('/api/article-types?case=tree', data )
                    .then(function(json){

                        console.log('1111')
                        console.log(json)
                        console.log('1111')

                        if(json.status==200 && json.data.status==1) {
                            t.data = json.data.data
                        }
                    })

                
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
        }
    }

</script>