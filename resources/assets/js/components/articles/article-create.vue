<template>
    <div id="article-create"  >

        <div>
            <span> 文章标题 </span>
            <span> <input type="text" id="title" v-model="title"   name="title"> </span>
            <span class="error"> </span>
        </div>
        <div>
            <span> 文章类别 </span>

                <type-tree-select   :selected="type_id"   v-on:changed="updateTypeId"></type-tree-select>

            <span class="error"> </span> 
        </div>
        <div>
            <span> 缩略图 </span>
            <span>
                <input type="file" id="thumb"  v-on:change="uploadFile()" />
                <img :src="thumbSrc"   style="width: 80px; height: auto"  />
            </span>
            <span class="error"> </span>
        </div>
        

        <div>
            <span> 详情 </span>
            <span>
                <Ueditor :value="contents" v-on:changed="onContentsChange"></Ueditor>
            </span>
            <span class="error"> </span>
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
            'titleValue',
            'contentsValue',
            'idProp'
        ],
        data : function(){
            return {
                token : '',
                thumb : '',
                tag : '',
                ue : {},
                contents : this.contentsValue,
                title : this.titleValue,
                typeListData : [],
                type_id : 1,
                id : this.idProp
                
            }
        },
        mounted : function(){

        },

        computed : {
            thumbSrc : function(){
                return this.thumb ? this.$config.host.img_host + '/' + this.thumb :  this.$config.img.default_upload_img
            }
        },
        watch : {

        },
        methods : {
            //上传图片
            uploadFile : function(){

                var t = this
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()
                var data = new FormData();
                var thumb = document.getElementById('thumb').files[0]

                data.append('thumb', thumb);
                data.append('directory', this.$config.directory.article_directory);

                axios.post('/api/upload_image', data )
                    .then(function(json){
                        console.log(json)
                        if(json && json.data.file) {
                            t.thumb = json.data.file
                        }
                    })
            },
            getEditArticle :function () {

                var t = this
                var id = this.id
                var url = this.$config.url.api.article_store
                if(id > 0) {
                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()
                    axios.get( url + '/' + id )
                        .then(function(json){

                            if(json.status==200 && json.data.status==1) {
                                var data = json.data.data
                                t.title = data.title
                                t.type_id = data.pid
                                t.thumb = data.thumb
                                t.contents = data.content
                            }
                        })
                }
            },
            submit : function(){

                var data = {
                    title : this.title,
                    type_id : this.type_id,
                    thumb : this.thumb,
                    content : this.contents
                }

                if(this.id==0) {
                    var t = this
                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()
                    axios.post(this.$config.url.api.article_store, data)
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
                    axios.put(this.$config.url.api.article_store + '/' + this.id, data)
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
            this.getEditArticle()
        }
    }

</script>