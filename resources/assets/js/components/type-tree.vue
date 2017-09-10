<template>
        <ul class="menuContainer">
            <li v-for="item in treeData" class="eachLi"  >
            	 
                	{{"----".repeat(item['level']-1)}}(id:{{item['id']}}) {{item['name']}}

	                
		                <button type="button" class="btn   btn-default margin-row edit"
								v-on:click="$goto($config.url.web.article_type_create, 'id=' + item.id)">
		                	<span class="glyphicon glyphicon-pencil"></span>
		                </button>

		                <button type="button" class="btn  btn-default remove "
								v-on:click="remove(item.id)">
		                	<span class="glyphicon glyphicon-remove"></span>
		                </button>
	                
                
                 
                
            </li>
        </ul>
</template>
<style scoped lang="less">
	.menuContainer{
		li{
			font-weight: bold;
			font-size: 14px;
			margin-top: 5px ;
			margin-bottom: 5px;

		}
	}
</style>
<script>
    export default {
        name:"type-tree",
        props:{
            
        },
        data : function(){
            return {
                treeData : []
            }
        },

        methods:{
            remove : function(id) {
                var t = this
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()
                axios.delete(this.$config.url.api.article_type_store + '/' + id)
                    .then(function(json) {
                        var message = t.$msgBag2String(json.data.message)
                        t.$alert(message)

						if(json.data.status == 1) {
                            t.getListData()
						}
                    })
			},

            //上传图片
            getListData : function(){


                axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()

                var data = new FormData();
                var t = this
                //axios.get('/api/article-types?case=page&page=1&amount=100000000', data )
                axios.get('/api/article-types?case=tree-list-row', data )
                    .then(function(json){

                        console.log('1111')
                        console.log(json)
                        console.log('1111')

                        if(json.status==200 && json.data.status==1) {
                            t.treeData = json.data.data
                        }
                    })


            }
        },
		created : function(){
            this.getListData()
		}
    } 
</script>