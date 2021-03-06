var ConfigPlugin = {};
const host = "http://web.local"
const webHost = "http://web.local"
ConfigPlugin.install = function (Vue, options) {
    Vue.prototype.$config = {
        directory : {
            article_directory : 'uploads/article_thumb'
        },
        host : {
            img_host : host,
            api_host : host
        },
        url : {
            api : {
                article_store : host + '/api/articles',
                article_type_store : host + '/api/article-types' ,
                 
            },
            web : {
                article_type_create : webHost + '/admin/article-type-create',
                article_create : webHost + '/admin/article/create'
            }
        },
        img : {
            default_upload_img : host + '/static/img/icon_upload.png'
        }
    };
}

module.exports = ConfigPlugin;
