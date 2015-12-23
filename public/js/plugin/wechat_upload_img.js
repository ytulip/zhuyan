$(function(){
    wx.ready(function(){
        // 在这里调用 API
        var images = {
            localId: [],
            serverId: []
        };

        $('.wechat-img-upload').click(function(){
            var target = $(this);
            wx.chooseImage({
                success: function (res) {
                    if(res.localIds.length > 1){
                        alert('只能选择一张图片');
                    }else{
                        images.localId = res.localIds;
                        wx.uploadImage({
                            localId: images.localId[0],
                            success: function(res){
                                $.post('/api/wechat/pic-media',{media_id:res.serverId},function(data){
                                    if(data.status){
                                        target.attr('data-status',1);
                                        target.attr('src',data.data);
                                        var name = target.attr('input-name');
                                        if(name){
                                            $('input[name="'+name+'"]').val(data.data);
                                        }

                                    }else{
                                        alert(data.data);
                                    }
                                },'json');
                            }
                        });
                    }
                },
                error: function(){
                }
            });
        });
    });
});