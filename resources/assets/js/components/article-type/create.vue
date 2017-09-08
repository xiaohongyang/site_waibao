<template>
    <div id="center-article-type-create" class="create-vue-wrap" >
        <div>
            <span> 类别标题 </span>
            <span> <input type="text" id="title" v-model="title"   name="title"> </span>
            <span class="error"> </span>
        </div>
        <div>
            <span> 上级类别 </span>

                <type-tree-select   :selected="parentId" root-name-prop="无" v-on:click="setParentId" v-on:changed="updateParentId"></type-tree-select>

            <span class="error"> </span> 
        </div>
        <div>
            <span> 图片 </span>
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
            <span>显示类别 </span>

            <show-type-select   :selected="show_type"   v-on:changed="updateShowType"></show-type-select>

            <span class="error"> </span>
        </div>
        <div> 
            <span> 排序  </span>
            <span> <input type="text" name="sort" v-model="sort" >  </span>
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
                tag : '',
                ue : {},
                contents : this.contentsValue,
                title : this.titleValue,
                typeListData : [],
                parentId : 0,
                id : this.idProp,
                sort : 0,
                show_type : 1,
                is_index : 0,
            }
        },
        mounted : function(){

        },

        computed : {
            thumbSrc : function(){
                return this.thumb && this.thumb!=0 ? this.$config.host.img_host + '/' + this.thumb :  this.$config.img.default_upload_img
            }
        },
        watch : {

        },
        methods : {

            updateIsIndex : function(){

                //this.is_index = this.is_index==0 ? 1 : 0;
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
            getEditType :function () {

                var t = this
                var id = this.id
                if(id > 0) {
                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()
                    axios.get('/api/article-types/' + id )
                        .then(function(json){

                            if(json.status==200 && json.data.status==1) {
                                var data = json.data.data
                                t.title = data.name
                                t.parentId = data.pid
                                t.thumb = data.thumb
                                t.contents = data.content
                                t.sort = data.sort
                                t.show_type = data.show_type
                                t.is_index = data.is_index
                            }
                        })
                }
            },
            submit : function(){

                var data = {
                    name : this.title,
                    pid : this.parentId,
                    thumb : this.thumb,
                    content : this.contents,
                    sort : this.sort,
                    show_type : this.show_type,
                    is_index : this.is_index,
                }

                if(this.id==0) {
                    var t = this
                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()
                    axios.post(this.$config.url.api.article_type_store, data)
                        .then(function(json) {
                            if(json.data.status == 1) {
                                t.$alert("新建成功");
                                window.location.href=window.location.href
                            } else { 
                                var message = t.$msgBag2String( json.data.message )

                                t.$alert(message)
                            }
                        })
                } else {
                    var t = this

                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authToken()
                    axios.put(this.$config.url.api.article_type_store + '/' + this.id, data)
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
            updateParentId : function(val) {
                this.parentId = val
                console.log(val)
            },
            updateShowType : function(val) {
                this.show_type = val
            },
            setParentId : function(val) {
                alert(val)
            }
        },
        complete : function(){

        },
        beforeMount : function(){
            this.$authToken()
            this.$freshToken()

        },
        created : function(){
            this.getEditType()
        }
    }

</script>