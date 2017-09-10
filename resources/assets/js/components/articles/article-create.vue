<template>
    <div id="article-create"  class="create-vue-wrap">

        <div>
            <span> 文章标题： </span>
            <span> <input type="text" id="title" v-model="title"   name="title"> </span>
            <span class="error"> </span>
        </div>
        <div>
            <span> 文章类别： </span>

                <type-tree-select   :selected="type_id"   v-on:changed="updateTypeId"></type-tree-select>

            <span class="error"> </span> 
        </div>
        <div>
            <span> 缩略图： </span>
            <span>
                <a href="javascript:void(0);" class='btn btn-sm btn-primary' onclick="$(this).next('input[type=file]').trigger('click')">上传</a> 
                <input type="file" class="hide" id="thumb"  v-on:change="uploadFile()" />
                <img :src="thumbSrc"   style="width: 80px; height: auto"  />
            </span>
            <span class="error"> </span>
        </div>

        <div>
            <span> 附件： </span>
            <span>

                <a v-if="attach_file" href="javascript:void(0);" class='btn btn-sm btn-primary' onclick="$(this).next('input[type=file]').trigger('click')">重新上传</a> 
                <a v-if="!attach_file" href="javascript:void(0);" class='btn btn-sm btn-primary' onclick="$(this).next('input[type=file]').trigger('click')">上传</a> 

                <input type="file" class="hide" id="attach_file"  v-on:change="uploadAttachFile()" />

                <a v-bind:href="attach_file" v-if="attach_file">下载查看</a>
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
            <span> 跳转地址： </span>
            <span> <input type="text" id="link" v-model="link"   name="link"> </span>
            <span class="error"> </span>
        </div>

        <div>
            <div class="checkbox">
                <label>
                     
                    <input type="checkbox" @change="updateIsIndex" v-model="is_index" v-bind:true-value="1" v-bind:false-value="0"  > 推荐到首页
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
            'titleValue',
            'contentsValue',
            'idProp'
        ],
        data : function(){
            return {
                token : '',
                thumb : '',
                attach_file : '',
                tag : '',
                ue : {},
                contents : this.contentsValue,
                title : this.titleValue,
                typeListData : [],
                type_id : 1,
                id : this.idProp,
                is_index : 0,
                link : '',
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

            updateIsIndex : function(){

                //var index = this.is_index 
                //alert(index) 
            },
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
            uploadAttachFile : function(){

                var t = this
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()
                var data = new FormData();
                var attach_file = document.getElementById('attach_file').files[0]

                data.append('attach_file', attach_file);
                data.append('directory', this.$config.directory.attach_file_directory);
                var url = this.$config.url.api.upload_attach
                axios.post(url, data )
                    .then(function(json){
                        console.log(json)
                        if(json && json.data.file) {
                            t.attach_file = json.data.file
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
                                t.type_id = data.type_id
                                t.thumb = data.thumb
                                t.contents = data.content
                                t.is_index = data.is_index
                                t.attach_file = data.attach_file
                                t.link = data.link
                            }
                        })
                }
            },
            submit : function(){

                var data = {
                    title : this.title,
                    type_id : this.type_id,
                    thumb : this.thumb,
                    content : this.contents,
                    is_index : this.is_index,
                    attach_file : this.attach_file,
                    link : this.link,
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
            //详情
            
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