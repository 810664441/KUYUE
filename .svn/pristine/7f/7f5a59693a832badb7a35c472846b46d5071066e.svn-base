$(function () {
    var goodlistFun = (function () {
        //加载更多logo
        function addMore(x, y) {
            var flag = true;
            //点击发起ajax请求更多内容
            x.click(function () {
                $('.sb-logo ul').removeClass('sb-logo-ul2').addClass('sb-logo-ul');
                $('.s-brand').addClass('s-brand-1');
                x.hide();
                y.show();
                if (flag) {
                    flag = false;
                    $.ajax({
                        type: "post",
                        url: "../api/goodlogo.php",
                        data: {
                            type: '声卡'
                        },
                        dataType: 'json',
                        success: function (data) {
                            addCont(data)
                        }
                    })
                }
            });
            //点击收起
            y.click(function () {
                $('.sb-logo ul').removeClass('sb-logo-ul').addClass('sb-logo-ul2');
                $('.s-brand').removeClass('s-brand-1');
                x.show();
                y.hide();
            })
            //添加内容
            function addCont(obj) {
                var len = obj.length;
                for (var i = 0; i < len; i++) {
                    var dLi = $("<li>"),
                        dA = $('<a>');
                    dA.append('<img src="../images/goodlist/' + obj[i]['images'] + '"class=".sb-img">' + obj[i]['logo']);
                    dLi.append(dA);
                    $('.sb-logo ul').append(dLi);
                }
            }
        }
        //价格筛选
        function priceButton(obj1) {
            obj1.mousedown(function (e) {
                e.preventDefault();
                obj1.addClass('button-shadow');
            })
            obj1.mouseup(function (e) {
                e.preventDefault();
                obj1.removeClass('button-shadow');
            })
        }
        //更多筛选条件
        function moreSelect(obj1, obj2) {
            obj1.hover(function () {
                obj1.parent().addClass('s-more-top2');
            }, function () {
                obj1.parent().removeClass('s-more-top2');
            })
            obj1.click(function () {
                $('.s-wrap-flow').show();
                obj1.hide().siblings().show().parent().addClass('s-more-top');

            })
            obj2.click(function () {
                $('.s-wrap-flow').hide();
                obj2.hide().siblings().show().parent().removeClass('s-more-top');

            })
        }
        //达人推荐loop
        function sectionLoop(obj1, obj2) {
            //创建节点并添加
            obj1.children('li').eq(0).clone(true, true).appendTo(obj1);
            var len = obj1.children().length,
                liw = obj1.children().eq(0).outerWidth(),
                lix = 0,
                btx = 0;
            //loop动画
            obj2.children().eq(0).addClass('s-control');
            function move() {
                lix++;
                btx++;
                if (btx == len - 1) {
                    btx = 0;
                }
                if (lix == len) {
                    lix = 1;
                    obj1.css({ marginLeft: 0 });
                }
                obj1.stop(true, true).animate({
                    marginLeft: -liw * lix
                }, 1000)
                obj2.children().eq(btx).addClass('s-control').siblings().removeClass('s-control');
            }
            //绑定点击事件
            obj2.on('click', 'a', function (e) {
                e.stopPropagation();
                e.preventDefault();
                var lix = $(this).index();
                $(this).addClass('s-control').siblings().removeClass('s-control');
                obj1.stop(true, true).animate({
                    marginLeft: -lix * liw
                }, 1000)
            })
            //loop自动滚动计时器
            function time() {
                move();
                clearTimeout(loopTime);
                loopTime = setTimeout(time, 3000);
            }
            var loopTime = setTimeout(time, 3000);
            //鼠标悬停清空计时器，结束自动切换
            obj1.parent().hover(
                function () {
                    if (loopTime) {
                        clearTimeout(loopTime);
                    }
                },
                function () {
                    loopTime = setTimeout(time, 3000);
                })
        }
        //goods-list商品列表             
        //商品ajax获取数据
        function goodlist() {
            //鼠标经过icon小图切换对应大图
            var flag = true;
            $(document).ready(function () {
                if (flag) {
                    flag = false;
                    $.ajax({
                        type: 'post',
                        url: "../api/goodlist.php",
                        data: {
                            type: '声卡',
                            page: 1
                        },
                        dataType: 'json',
                        success: function (data) {
                            addlist(data);
                            pageAdd(data);
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr, status, error)
                        }
                    })
                }
            })
        }
        //分页数据添加
        function addlist(data) {
            var result = data.res,
                html = ejs.render($('#tpl').html(), { goods: result });
            $('.gl-warp').html(html);
            goShop();
            for (var i = 0; i < result.length; i++) {
                var ulStr = "",
                    divStr = "";
                for (var key in result[i]) {
                    if (key == 'simages') {
                        var img = result[i][key].split("/");
                        for (var j = 0; j < img.length; j++) {
                            ulStr += "<li class='active-slide'><img src=\"../images/goodlist/trade/" + img[j] + "\"></img></li>";
                        }

                    }
                    if (key == 'bimages') {
                        var bImg = result[i][key].split("/");
                        for (var j = 0; j < bImg.length; j++) {
                            divStr += "<img src=\"images/goodlist/trade/" + bImg[j] + "\">";
                        }
                    }
                }
                $(".thumbs ul").eq(i).html(ulStr);
                $('.p-img a').eq(i).append(divStr);
            }

            //鼠标经过切换图片
            $('.thumbs ul').on('mouseover', 'li', function () {
                var index = $(this).index();
                $(this).addClass('thumbs-border').siblings().removeClass('thumbs-border');
                $(this).closest('.gl-i-wrap').children().eq(0).children().children().eq(index).show().siblings().hide();
            })
        }
        //页码添加及页码点击事件
        function pageAdd(data) {
            //添加页码
            var len = data.len,
                l = Math.ceil(len / 24);
            for (var j = 0; j < l; j++) {
                $('.m-page').append($('<a>').html(j + 1));
            }
            $('.s-page span i').html(l);
            //添加上下页按钮
            $('.m-page').append($('<strong>').html('下一页'));
            $('.m-page').prepend($('<strong>').html('上一页'));
            $('.m-page').children('strong').eq(0).hide();
            $('.m-page').children('a').eq(0).addClass('z-crt');
            $('.m-page').children('.z-crt').attr({ 'flag': 'false' });
          
            //页码长度为1时 上一页和下一页隐藏
            if ($('.m-page').children('a').length == 1) {
                $('.m-page').children('strong').eq(1).hide();
                $('.m-page').children('strong').eq(0).hide();
            }
            //上下页面隐藏
            function pageHide(x) {
                if (x > 1) {
                    $('.m-page').children('strong').eq(0).show();
                } else {
                    $('.m-page').children('strong').eq(0).hide();
                }
                if (x == l) {
                    $('.m-page').children('strong').eq(1).hide();
                } else if (x < l) {
                    $('.m-page').children('strong').eq(1).show();
                }
                $('.m-page').children().eq(x).addClass('z-crt').siblings().removeClass('z-crt');
                $('.m-page').children('.z-crt').attr({ 'flag': 'false' }).siblings().attr({ 'flag': 'true' });
            }         
            //页码添加点击事件      
            $('.m-page').on('click', 'a', function () {
                k = $(this).html();
                $(this).addClass('z-crt').siblings().removeClass('z-crt');
                pageHide(k);
                if ($(this).attr('flag') == true) {
                    $.ajax({
                        type: 'post',
                        url: "../api/goodlist.php",
                        data: {
                            type: '声卡',
                            page: k
                        },
                        dataType: 'json',
                        success: function (data) {
                            addlist(data);
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr, status, error)
                        }
                    })
                }
            })
            var ht=$('.m-page').children('.z-crt').html();
            $('.s-page span b').html(ht);
            //上下页切换点击事件
            var k = $('.m-page').children('.z-crt').html();
            $('.m-page').children('strong').eq(0).click(function () {
                var p;
                p = k - 1;
                pageHide(p);
                $.ajax({
                    type: 'post',
                    url: "../api/goodlist.php",
                    data: {
                        type: '声卡',
                        page: p
                    },
                    dataType: 'json',
                    success: function (data) {
                        addlist(data);
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr, status, error)
                    }
                })
            })         
            $('.m-page').children('strong').eq(1).click(function () {
                var p;
                p = k + 1;
                pageHide(p);
                $.ajax({
                    type: 'post',
                    url: "../api/goodlist.php",
                    data: {
                        type: '声卡',
                        page: p
                    },
                    dataType: 'json',
                    success: function (data) {
                        addlist(data);
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr, status, error)
                    }
                })
            })
            $('.page-btn').children('a').eq(0).click(function () {
                var p;
                p = k - 1;
                if(p>1){
                    $.ajax({
                        type: 'post',
                        url: "../api/goodlist.php",
                        data: {
                            type: '声卡',
                            page: p
                        },
                        dataType: 'json',
                        success: function (data) {
                            addlist(data);
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr, status, error)
                        }
                    })
                }
            })
            $('.page-btn').children('a').eq(1).click(function () {
                var p;
                p = k + 1;
                if(p<l){
                    $.ajax({
                        type: 'post',
                        url: "../api/goodlist.php",
                        data: {
                            type: '声卡',
                            page: p
                        },
                        dataType: 'json',
                        success: function (data) {
                            addlist(data);
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr, status, error)
                        }
                    })
                }
            })

        }
        //商品添加购物车
        function goShop() {
            $('.gl-amount-btns').on('click','.gl-add', function () {
                var k=parseInt($(this).parent().parent().children().eq(0).html());
                    k=k+1;
                $(this).parent().parent().children().eq(0).html(k);
            })
            $('.gl-amount-btns').on('click','.gl-sub', function () {
                var k=parseInt($(this).parent().parent().children().eq(0).html());
                if(k>1){
                    k=k-1;
                }            
                $(this).parent().parent().children().eq(0).html(k);
            })          
        }

        
        


        return {
            addmore: addMore,
            priceButton: priceButton,
            moreSelect: moreSelect,
            sectionLoop: sectionLoop,
            goodlist: goodlist
        }
    })()
    goodlistFun.addmore($('.sb-ext'), $('.sb-ext2'));
    goodlistFun.priceButton($('.s-price a'));
    goodlistFun.moreSelect($('.s-open'), $('.s-close'));
    goodlistFun.sectionLoop($('.s-loop-box ul'), $('.s-loop-box .s-loop-button'));
    goodlistFun.goodlist();
})
