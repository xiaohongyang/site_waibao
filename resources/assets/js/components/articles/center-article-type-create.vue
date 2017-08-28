<template>
    <div id="center-article-type-create" class="hide">
        <div>
            <span> 类别标题 </span>
            <span> <input type="text" id="title" v-model="title"   name="title"> </span>
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
        <!--<div>
            <span> tag </span>
            <span> <input type="text" name="tag" v-model="tag" >  </span>
            <span class="error"> </span>
        </div>-->

        <div>
            <span> 详情 </span>
            <span>
                <Ueditor :value="contents" v-on:changed="onContentsChange"></Ueditor>
            </span>
            <span class="error"> </span>
        </div>

        <div>
            <span> 排序 </span>
            <span> <input type="text" name="sort" v-model="sort" >  </span>
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
        props : ['titleValue', 'contentsValue'],
        data : function(){
            return {
                token : '',
                thumb : '',
                tag : '',
                ue : {},
                contents : this.contentsValue,
                title : this.titleValue,
                sort : 0
            }
        },
        mounted : function(){

        },

        computed : {
            thumbSrc : function(){
                return this.thumb && this.thumb!=0 ? this.$config.host.img_host + '/' + this.thumb : '';
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
            submit : function(){
                var data = {
                    name : this.title,
                    pid : 0,
                    thumb : this.thumb,
                    content : this.contents,
                    sort : this.sort
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
            this.$freshToken()
        },
        created : function(){
        }
    }

</script>