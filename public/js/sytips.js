;(function($){
    $.fn.extend(
        {"sytips":function(value){
            var tipsConfig;
            var defaultConfig = {defaultData:'',onContentChangeEvent:''};
            tipsConfig = $.extend({},defaultConfig,value);
            var bgColor = null;
            var txtDefault = null;
            if(value != null) {
                bgColor = value.color;
                txtDefault = value.txt;
            }else{
                bgColor = "#333";//默认颜色
                txtDefault = "添加标签";//默认提示内容
            }

            var srcID = $(this).attr('id');//获得id值
            //var self = $("#"+srcID);
            //如果有默认值，显示默认值
            $tmpData = '';
            if(tipsConfig.defaultData){
                $.each(tipsConfig.defaultData,function(k,v){
                    $tmpData += '<li>'+v+'<a>×</a></li>';
                });
            }
            var htmlContent = '<div class="sytipbox" id="'+srcID+'"><ul>'+$tmpData+'</ul><input type="text" value="'+txtDefault+'"></div>';
            $(this).replaceWith(htmlContent);
            var self = $("#"+srcID);

            var thisval = self.find("input").val();
            var thisul = self.find("ul");

            self.click(function(){
                //点击标签框的任意位置都使input获得焦点
                $(this).children("input").focus();
            });
            //标签后面的"X"绑定单击事件
            //$(".tips_content li a").live("click",function(){
            $('body').on('click','#' + srcID + ' li a',function(){
                //点击标签的"X"删除此标签
                $(this).parent().remove();
                self.trigger('fillSalary');
                return false;
            })
            self.find("input").focus(function(){
                var fristval = $(this).val();
                if(fristval == thisval){
                    $(this).val("").css("color","#333");
                }
                $(this).unbind('keydown');
                //按键弹起时，调用jquery的event方法
                $(this).keydown(function(event){
                    //定义键盘值，定义输入框的内容
                    var keycode = event.which;
                    m = $(this).val();
                    //如果按键是回车或者逗
                    if(keycode == 13||keycode == 188){
                        //取消按键的默认行为
                        event.preventDefault();
                        event.returnValue = false;
                        //去除标签前后的空格
                        var mm =$.trim(m);
                        if(mm != ""){
                            //添加li到ul
                            $("<li>"+mm+"<a>×</a></li>").appendTo(thisul);
                            //清空输入框
                            $(this).val("").unbind("appendTo");
                            self.trigger('fillSalary');
                            //fill_auto();
                        }
                        //如果按键是Backspace或者Delete
                    }else if(keycode == 46||keycode == 8){
                        //如果输入框内容为空
                        if(m == ""){
                            //删除最后一个li
                            var s = self.find('li').length;
                            if(s>0){
                                //self.find('li:last').remove().unbind(remove);
                                //alert(self.find('li:last'));
                                console.log('remove');
                                self.find('li:last').remove();
                            }
                        }
                    }
                    self.trigger('fillSalary');
                    //fill_auto();
                });
                //为中文标点"逗号"单独设置的keyup事件
                $(this).keyup(function(){
                    var searchthis = $(this).val();
                    //如果val值存在中文逗号，即按下中文逗号，执行事件
                    if(searchthis.indexOf("，") != -1){
                        //正则表达式，全局搜索val值中的中文逗号
                        var resome = /，/g;
                        //将中文逗号替换为空，去除val值前后空格
                        searchthis = $.trim(searchthis.replace(resome,""));
                        //给val返回处理完的值
                        $(this).val(searchthis);
                        //如果返回的值不为空
                        if(searchthis != ""){
                            //添加li到ul
                            $("<li>"+searchthis+"<a>×</a></li>").appendTo(thisul);
                            //清空输入框
                            $(this).val("").unbind("appendTo");
                            self.trigger('fillSalary');
                            //fill_auto();
                        };
                    };
                });
                //失去焦点时
            }).blur(function(){
                //定义input的val值
                z = $(this).val();
                //定义标签的个数
                licount = self.find('li').length;
                //如果值为空
                if(z == ""){
                    //如果标签数为0
                    if(licount == 0){
                        //返回最初状态
                        $(this).val(thisval).css("color","#999");
                    }else{
                        return false;
                    };
                    self.trigger('fillSalary');
                    //fill_auto();
                    //如果不为空
                }else{
                    //将此值变成标签
                    $("<li>"+z+"<a>×</a></li>").appendTo(thisul);
                    //清空输入框
                    $(this).val("").unbind("appendTo");
                    self.trigger('fillSalary');
                    //fill_auto();
                }
            });

            //自定义事件
            if(tipsConfig.onContentChangeEvent) {
                self.bind("fillSalary", value.onContentChangeEvent);
            }else{
                self.bind("fillSalary", function(){});
            }
            return this;
        }}
    );
})(jQuery);