<template>
    <div>
        <script id="container" name="content" type="text/plain">{{value}}</script>
    </div>
</template>


<script>
    export default {
        props : {
            value : {
                default:''
            },
            time : {
                default : 10
            }
         },
        data : function(){
            return {
                myValue : this.value,
                myTime : this.time
            }
        },
        mounted :function () {
            var t = this
            this.x_alert = $.x_alert({cont : t.myValue, time : t.myValue})

        },
        watch : {
            myValue : function(newValue, oldValue) {
                /*console.log('newVallue:' + newValue)
                //调用父类方法更新父类数据
                this.$emit('changed', newValue)
                parent.value = newValue;
                console.log(parent.value)*/
            },
            value : function(newValue) {

                var t = this
                this.myValue = newValue
                /*this.ue.addListener("ready", function () {
                        // editor准备好之后才可以使用
                    t.ue.setContent(newValue)
                });
                if (t.ue) {
                    t.ue.setContent(newValue)
                }*/

            }
        }
    }
</script>