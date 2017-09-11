<template>
    <div>
        <script id="container" name="content" type="text/plain">{{value}}</script>
    </div>
</template>


<script>
    export default {
        props : ['value'],
        data : function(){
            return {
                myValue : this.value
            }
        },
        mounted :function () {
            var t = this
            this.ue = UE.getEditor('container');
            this.ue.ready(function() {
                //this.ue.execCommand('serverparam', '_token', '321321');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
            });
            this.ue.addListener("selectionchange", function(){
                t.myValue = t.ue.getContent()
            })
        },
        watch : {
            myValue : function(newValue, oldValue) {
                console.log('newVallue:' + newValue)
                //调用父类方法更新父类数据
                this.$emit('changed', newValue)
                parent.value = newValue;
                console.log(parent.value)
            },
            value : function(newValue) {


                var t = this
                this.myValue = newValue

                this.ue.addListener("ready", function () {  
                        // editor准备好之后才可以使用  
                    t.ue.setContent(newValue)
                });  
                
            }
        }
    }
</script>