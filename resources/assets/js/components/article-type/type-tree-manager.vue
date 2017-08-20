<template>

      <div class="article-type-index">

      	<div class="row">
      		<h3 class="list-inline">类别管理:</h3>
			<a class="btn btn-danger btn-sm " style="margin-left: 40px;" v-bind:href="createlink" >
				<span class="glyphicon glyphicon-plus"></span>
				新建
			</a>
	      	<type-tree  ></type-tree>
      	</div>

      </div>
</template>


<script>

    export default {
        t : this,
        props : [],
        data : function(){
            return {
                //data : [],
                data: {
                    createlink: ''
                }
            }
        },
        mounted : function(){
            this.columnsHeader = [
            ];

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
			this.createlink = this.$config.url.web.article_type_create
        }
    }

</script>