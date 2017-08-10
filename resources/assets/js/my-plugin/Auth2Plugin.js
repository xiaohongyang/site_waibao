var Toast = {};
Toast.install = function (Vue, options) {
    Vue.prototype.$msg = 'Hello World';
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
