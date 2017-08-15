<template>

      <div class="article-type-index">

      	<div class="row">
      		<h3 class="list-inline">类别管理:</h3>
			<button class="btn btn-danger btn-sm " style="margin-left: 40px;" v-on:click="$goto($config.url.web.article_type_create)">
				<span class="glyphicon glyphicon-plus"></span>
				新建
			</button>
	      	<type-tree  ></type-tree>
      	</div>

      </div>
</template>


<script>

    export default {
        t : this,
        props : {
            rootIdProp : {
                default : 0
			}
		},
        data : function(){
            return {
                //data : [],
                data:[
					rootId : this.rootIdProp
	            ]
            }
        },
        mounted : function(){
            this.columnsHeader = [
            ]
        },

        computed : {
        },
        watch : {
        },
        methods : {



        },
        complete : function(){
            
        },
        beforeMount : function(){
            this.$authToken()
            //this.$freshToken()
        },
        created : function(){
            console.log('3344----------')
        }
    }

</script>