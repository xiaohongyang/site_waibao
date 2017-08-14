<template>
        <select class="SelectContainer" @change="onSelectedDrug($event)">

            <option value=0 >{{root_name}}</option>
            <template v-for="item in treeData" class="eachLi" >
            	   

                 <option v-bind:value="item.id"   v-if="select == item['id']" selected   >
                     {{"----".repeat(item['level'])}}{{item['name']}} 
                 </option>
                 <option v-bind:value="item.id"    v-else>
                     {{"----".repeat(item['level'])}}{{item['name']}} 
                 </option>

            </template>
        </select>
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
        name:"type-tree-select",
        props:{
            
            selected : {
                default : 1
            },
            rootNameProp : {
                default : '不限'
            } 
        },
        data : function(){
            return {
                select : this.selected,
                treeData:{
                    default: []
                } ,
                root_name : this.rootNameProp
            }

        },
        methods:{
           getListData : function(){


               axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()

               var data = new FormData();
               var t = this
               //axios.get('/api/article-types?case=page&page=1&amount=100000000', data )
               axios.get('/api/article-types?case=tree-list-row', data )
                   .then(function(json){

                       if(json.status==200 && json.data.status==1) {
                           t.treeData = json.data.data
                       }
                   })


           },
           onSelectedDrug : function(event ){
                 
                var value = parseInt(event.target.value) 
                this.select = value
                this.$emit('changed', value)
           }
        },
        watch : {
             
            selected : function(newValue) {
                this.select = newValue 
            }
        },
        beforeMount :function(){
            this.getListData()
        }
    } 
</script>