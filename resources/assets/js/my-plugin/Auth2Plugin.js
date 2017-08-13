var Toast = {};
Toast.install = function (Vue, options) {
    Vue.prototype.$msg = 'Hello World';
    Vue.prototype.$alert = function(msg){
        alert(msg)
    },
    Vue.prototype.$goto = function(link, params){
        if( params != undefined)
            link = link + "?" + params
        window.location.href = link
    },
    Vue.prototype.$msgBag2String = function(msgBag){
        var message
        if(typeof msgBag == 'string'){
            message = msgBag
        } else if(Object.keys(msgBag) && Object.keys(msgBag).length>0)
            message = msgBag[Object.keys(msgBag)[0]][0]
        else if(Object.keys(msgBag)){
            message = msgBag[Object.keys(msgBag)[0]]
        }
        return message;
    },

    Vue.prototype.$authToken = function(){
        var token = window.localStorage.getItem('token');
        if(token){
            console.log(token)
            return token;
        }
        else {
            axios.get('/getToken')
                .then(function(json){
                    console.log(token)
                    if(json.data.token)
                        window.localStorage.setItem('token', json.data.token)
                })
        }
    }
    Vue.prototype.$freshToken = function(){

        axios.get('/getToken')
            .then(function(json){
                console.log(json)
                if(json.data.token)
                    window.localStorage.setItem('token', json.data.token)
            })
    }

}

module.exports = Toast;
