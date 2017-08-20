<template>
    <div id="config-edit " class="edit-vue-wrap"  >


        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th >名称</th>
                <th >值</th>
                <th >是否启用</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="data in listData"    >
                    <td class="col-md-4">  {{data['name']}} </td>
                    <td class="col-md-4"> <input type="text"  v-model="data['value']"/></td>
                    <td>
                        <select v-model="data['is_use']">
                            <option value="1">启用</option>
                            <option value="2">停用</option>
                        </select>
                    </td>
                </tr>
            </tbody>

        </table>

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
        ],
        data : function(){
            return {
                listData : []
            }
        },
        mounted : function(){

        },

        computed : {
        },
        watch : {

        },
        methods : {

            getEdit :function () {

                var t = this
                var url = this.$config.url.api.config + '?case=page'
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()
                axios.get( url)
                    .then(function(json){
                        if(json.status==200 && json.data.status==1) {
                            t.listData = json.data.data
                            console.log(json.data.data)
                        }
                    })
            },
            submit : function(){

                var data = {
                   listData : this.listData
                }

                for(var i in this.listData) {
                    if($.trim(this.listData[i].value).length==0){
                        this.$alert('值不能空');
                        return false;
                    }
                }

                var t = this
                var url = this.$config.url.api.config + '/all/?type=batch_update'
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()
                axios.put(url, data)
                    .then(function(json) {
                        if(json.data.status == 1) {
                            t.$alert("保存成功");
                        } else {
                            var message = t.$msgBag2String( json.data.message )

                            t.$alert(message)
                        }
                    })
            },
            //上传图片
            
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