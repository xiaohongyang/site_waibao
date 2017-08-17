$(function(){

    $.fn.xhyPage = {
        init : function(config){

            this.config = {
                url : '',
                pageAmount : 10,
                page : 1,
                total : 0
            }

            if(typeof config == 'undefined')
                config = {}
            $.extend(this.url, config);
        },
    }
})