var Plugintool = {
    /**
     * 动态加载文件到doc中，加载成功后执行的回调函数fn
     * @method loadFile
     * @param { DomDocument } document 需要加载资源文件的文档对象
     * @param { Object } options 加载资源文件的属性集合， 该集合支持的值是script标签和style标签支持的所有属性。
     * @param { Function } fn 资源文件加载成功之后执行的回调
     * @warning 对于在同一个文档中多次加载同一URL的文件， 该方法会在第一次加载之后缓存该请求，
     *           在此之后的所有同一URL的请求， 将会直接触发回调。
     * @example
     * ```javascript
     *
     * UE.utils.loadFile( document, {
     *     src:"test.js",
     *     tag:"script",
     *     type:"text/javascript",
     *     defer:"defer"
     * }, function () {
     *     console.log('加载成功');
     * } );
     *
     * ```
     */
    loadFile:function () {
        var tmpList = [];

        function getItem(doc, obj) {
            try {
                for (var i = 0, ci; ci = tmpList[i++];) {
                    if (ci.doc === doc && ci.url == (obj.src || obj.href)) {
                        return ci;
                    }
                }
            } catch (e) {
                return null;
            }

        }

        return function (doc, obj, fn) {
            var item = getItem(doc, obj);
            if (item) {
                if (item.ready) {
                    fn && fn();
                } else {
                    item.funs.push(fn)
                }
                return;
            }
            tmpList.push({
                doc:doc,
                url:obj.src || obj.href,
                funs:[fn]
            });
            if (!doc.body) {
                var html = [];
                for (var p in obj) {
                    if (p == 'tag')continue;
                    html.push(p + '="' + obj[p] + '"')
                }
                doc.write('<' + obj.tag + ' ' + html.join(' ') + ' ></' + obj.tag + '>');
                return;
            }
            if (obj.id && doc.getElementById(obj.id)) {
                return;
            }
            var element = doc.createElement(obj.tag);
            delete obj.tag;
            for (var p in obj) {
                element.setAttribute(p, obj[p]);
            }
            element.onload = element.onreadystatechange = function () {
                if (!this.readyState || /loaded|complete/.test(this.readyState)) {
                    item = getItem(doc, obj);
                    if (item.funs.length > 0) {
                        item.ready = 1;
                        for (var fi; fi = item.funs.pop();) {
                            fi();
                        }
                    }
                    element.onload = element.onreadystatechange = null;
                }
            };
            element.onerror = function () {
                throw Error('The load ' + (obj.href || obj.src) + ' fails,check the url settings of file ueditor.config.js ')
            };
            doc.getElementsByTagName("head")[0].appendChild(element);
        }
    }()
}