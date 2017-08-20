<template>
    <div id="config-create " class="create-vue-wrap"  >

        <div>
            <span> 名称： </span>
            <span> <input type="text" id="name" v-model="name"   name="name"> </span>
            <span class="error"> </span>
        </div>
        <div>
            <span> 值： </span>
            <span> <textarea name="value" id="value" v-model="value" cols="30" rows="10"></textarea> </span>
            <span class="error"> </span>
        </div>
         

        <div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" v-if="is_use==1" checked="checked" @click="updateIsUse()">
                    <input type="checkbox" v-else @click="updateIsUse()" > 启用
                </label>
            </div>
        </div>


        <div>
            <span>
                <button v-on:click="submit()">提交</button>
            </span>
        </div>
    </div>
</template>


<script>

    export default {
        props : [
            'idProp'
        ],
        data : function(){
            return {
                name : '',
                value : '',
                is_use : 1,
                id : this.idProp,
            }
        },
        mounted : function(){

        },

        computed : {
        },
        watch : {

        },
        methods : {

            updateIsUse : function(){

                this.is_use = this.is_use==0 ? 1 : 0;
            },
            getEdit :function () {

                var t = this
                var id = this.id
                var url = this.$config.url.api.config
                if(id > 0) {
                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()
                    axios.get( url + '/' + id )
                        .then(function(json){

                            if(json.status==200 && json.data.status==1) {
                                var data = json.data.data

                                t.name = data.name
                                t.value = data.value
                                t.is_use = data.is_use
                            }
                        })
                }
            },
            submit : function(){

                var data = {
                    name : this.name,
                    value : this.value,
                    is_use : this.is_use,
                }

                if(this.id==0) {
                    var t = this
                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()
                    axios.post(this.$config.url.api.config, data)
                        .then(function(json) {
                            if(json.data.status == 1) {
                                t.$alert("新建成功");
                            } else { 
                                t.$alert("新建失败")
                            }
                        })
                } else {
                    var t = this

                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()
                    axios.put(this.$config.url.api.config + '/' + this.id, data)
                        .then(function(json) {
                            if(json.data.status == 1) {
                                t.$alert("更新成功");
                            } else {
                                var message = t.$msgBag2String( json.data.message )

                                t.$alert(message)
                            }
                        })
                }

                
            },
            //上传图片
            
            onContentsChange : function(val) {
                this.contents = val
                console.log(val)
            },
            updateTypeId : function(val) {
                this.type_id = val
                console.log(val)
            },
            setTypeId : function(val) {
                this.type_id = val
            }
        },
        complete : function(){

        },
        beforeMount : function(){
            this.$authToken()
            this.$freshToken()

        },
        created : function(){
            this.getEdit()
        }
    }

</script>