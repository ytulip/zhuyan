/**
 *
 * @param config
 * @constructor
 */
function LeftLoatBar(config ){
    var re = new RegExp("(.*)/+[^/]+$","g");
    var matchs = re.exec(LeftLoatBar.baseURI);
    var baseURI = matchs[1];

    var defaultConfig = {
        baseURI:baseURI
    }


    this.config = $.extend(defaultConfig,config);
    this.baseURI = this.config.baseURI;

    Plugintool.loadFile(document,{
        href: this.baseURI + "/css/left-float-bar.css",
        tag:"link",
        type:"text/css",
        rel:"stylesheet"
    });

    var htmlInner = '<div class="left-float-bar" style="position:fixed;right:15px;bottom:40px;min-height:70px;min-width:40px;background-color:#4cffff"><a><img src="'+this.baseURI+'/image/iconfont-list.png"></a> <a><img src="'+this.baseURI+'/image/iconfont-feedback.png"></a></div>';
    $('body').append(htmlInner);
}

LeftLoatBar.baseURI = document.currentScript.src;
