$(function () {

    var G_myFun = (function ($) {
        // 请求接口
        function sousuojiekou() {
            $(".head-middle-text").keyup(function () {

                var valuess = $(this).val()
                $.ajax({
                    type: "get",
                    url: "https://www.ingping.com/search/solrCheck?",
                    data: {
                        term: valuess
                    },
                    dataType: 'jsonp',
                    //    async: true, 
                    success: function (data) {
                        console.log(data);
                        var liStr = "";
                        $(".head-middle-seek ul").html("");
                        for (var i = 0; i < data.length; i++) {
                            $(".head-middle-seek").show();
                            liStr += "<li>" + data[i] + "</li>";
                        }
                        $(".head-middle-seek ul").append(liStr);
                    }
                })

            })
        }
        // tab切换
        function tab() {
            $(".microphone-list a").click(function () {
                $(this).css({ backgroundColor: "#f60", color: "white" }).siblings().css({ backgroundColor: "white", color: "black" })

            })
            $(".page-number-list a").click(function (e) {
                e.preventDefault();
                $(this).css({ backgroundColor: "#f60", color: "white" }).siblings().css({ backgroundColor: "white", color: "black", border: "1px solid #ddd" })
            })
        }
        // 商品分类隐藏兰
        function hoverHdo(obj) {
            obj.hover(
                function () {
                    $(this).children().eq(1).show();
                },
                function () {
                    $(this).children().eq(1).hide();
                }
            );
        }
        // 商品分类隐藏栏右侧
        function hoverPll(obj) {
            obj.hover(
                function () {
                    $(this).children().eq(2).show();
                    // $(this).css({"background":"white"});
                    $(this).addClass("active");
                    if ($(this).data("flag")) {
                        return;
                    } else {
                        $(this).data("flag", true);
                        var addDiv = $(this);
                        $.ajax({
                            type: "post",
                            url: "api/index-api/listgoods.php",
                            data: { index: $(this).index() },
                            dataType: 'json',
                            success: function (data) {
                                // 生成内容的大盒子
                                console.log(data);
                                var contentbox = $("<div>");
                                contentbox.addClass("product-list-3 clearfix");
                                addDiv.append(contentbox);
                                // 生成内容的小盒子
                                var smallbox = $("<div>");
                                smallbox.addClass("pop clearfix");
                                contentbox.append(smallbox);
                                // 生成内容左边的盒子
                                var ltbox = $("<div>");
                                ltbox.addClass("product-list-left clearfix");
                                smallbox.append(ltbox);
                                // 生成右边盒子
                                var lrbox = $("<div>");
                                lrbox.addClass("product-list-right");
                                smallbox.append(lrbox);
                                // 生成右边上部盒子
                                var lrtbox = $("<div>");
                                lrtbox.addClass("product-list-right-top");
                                lrbox.append(lrtbox);
                                // 生成右边下部盒子
                                var lrdbox = $("<div>");
                                lrdbox.addClass("product-list-right-down");
                                lrbox.append(lrdbox);

                                $.each(data, function (key, value) {
                                    if (key !== "imgs") {
                                        // 生成类
                                        var pllbox = $("<div>");
                                        pllbox.addClass("product-list-fenlei clearfix");
                                        var aObj = $("<a>");
                                        aObj.attr("href", "#");
                                        aObj.html(key);
                                        pllbox.append(aObj);
                                        ltbox.append(pllbox);
                                        // 生成类列表
                                        var plobox = $("<div>");
                                        plobox.addClass("product-list-one clearfix")
                                        for (var i = 0; i < value.length; i++) {
                                            var aObj = $("<a>");
                                            aObj.attr("href", "goodsList.html");
                                            aObj.html(value[i]);
                                            plobox.append(aObj);
                                        }
                                        ltbox.append(plobox);

                                    } else {
                                        var strText = ["录音编曲 >", "网络主播 >", "手机直播 >", "演出音响 >", "家庭KTV >", "影视录音 >", "乐器设备 >", "音乐欣赏 >"]
                                        var dlTop = $('<dl><dt>套装分类</dt></dl>');
                                        var dlDown = $('<dl><dt>品牌精选</dt></dl>');
                                        var ddTop = $("<dd>");
                                        var ddDown = $("<dd>");
                                        var strOne = "";
                                        var strTwo = "";
                                        for (var j = 0; j < data.imgs.length; j++) {
                                            strOne += '<a href="#">' + strText[j] + '</a>';
                                            strTwo += '<a href="#"><img src="images/index/' + data.imgs[j] + '" alt="提示文字"/></a>';
                                        }
                                        strOne += '<a href="#">会议工程 ></a>';
                                        strOne += '<a href="#">家庭影院 ></a>';

                                        ddTop.html(strOne);
                                        ddDown.html(strTwo);

                                        dlTop.append(ddTop);
                                        dlDown.append(ddDown);

                                        lrtbox.append(dlTop);
                                        lrdbox.append(dlDown);
                                    }

                                });
                            }
                        })
                    }
                },
                function () {
                    $(this).children().eq(2).hide();
                    $(this).removeClass("active");
                    //  $(this).css({"background":"rgba(50, 50, 50, 0.1)",});
                }
            );
        }
        // 改变小轮播上箭头颜色
        function hoverup(obj) {
            obj.hover(
                function () {
                    $(this).css({
                        "backgroundImage": "url(images/navList1/uph.png)"
                    })
                },
                function () {
                    $(this).css({
                        "backgroundImage": "url(images/navList1/upb.png)"
                    })
                }
            )
        }
        // 改变小轮播下箭头颜色
        function hoverdown(obj) {
            obj.hover(
                function () {
                    $(this).css({
                        "backgroundImage": "url(images/navList1/downh.png)"
                    })
                },
                function () {
                    $(this).css({
                        "backgroundImage": "url(images/navList1/downb.png)"
                    })
                }
            )

        }
        // 小轮播
        function banner(obj, obj1, obj2) {
            obj.children().eq(0).clone("true").appendTo(".head-down-three-L ul");
            var imgH = obj.children().eq(0).innerHeight(),
                len = obj.children().length,
                imgX = 0;
            obj2.click(function () {
                xia();
            })
            function xia() {
                imgX++;
                if (imgX == len) {
                    imgX = 1;
                    obj.css({ marginTop: 0 })
                }
                obj.stop(true, true).animate({ marginTop: -imgX * imgH });
            }
            obj1.click(function () {

                if (imgX <= 0) {
                    imgX = len - 1;
                    obj.css({ marginTop: -imgX * imgH })
                }
                imgX--;
                obj.stop(true, true).animate({ marginTop: -imgX * imgH });
            })
            // 悬浮停止
            obj.parent().hover(
                function () {
                    if (tim) {
                        clearInterval(tim);
                    }
                },
                function () {
                    tim = setInterval(xia, 2000);
                }
            )
            // 自动播放
            var tim = setInterval(xia, 2000);
        }
        // 内容中部搜索栏悬浮
        function contentSeek() {
            $(window).scroll(function () {
                var offsetTop = $(".suit-top-yun").offset().top;
                // console.log(offsetTop);
                var scroll = $(window).scrollTop();
                // console.log(scroll + "    222222");
                var offsetTop1 = $(".page-number-list").offset().top;

                // console.log(offsetTop1 + "      1111111");
                if (scroll > offsetTop && scroll < offsetTop1 - 100) {
                    $(".suit-top-up").css({
                        "display": "block"
                    })
                } else if (scroll < offsetTop) {
                    $(".suit-top-up").css({
                        "display": "none"
                    })
                } else if (scroll >= offsetTop1 - 100) {
                    $(".suit-top-up").css({
                        "display": "none"
                    });
                }
            })

        }
        // 图片懒加载
        function lazypic() {
            $("img").each(function () {
                var arrSrc = $(this).attr("src");
                $(this).data("lazySrc", arrSrc);
                $(this).attr("src", "images/navList1/lazypic.gif");
            })
            loading();
            $(window).scroll(function () {
                loading();
            })
            function loading() {
                var windowHeight = $(window).height();
                var scrollHeight = $(window).scrollTop();
                var len = $("img").length;
                for (var i = 0; i < len; i++) {
                    var offsetTop = $("img").eq(i).offset().top;
                    if (offsetTop - (windowHeight + scrollHeight) < 10) {
                        var arr = $("img").eq(i).data("lazySrc");
                        $("img").eq(i).attr("src", arr);
                    }
                }
            }
        }


        function zhujiaohu() {

            $.ajax({
                type: "post",
                url: "api/navList11.php",
                dataType: "json",
                success: function (data) {

                    for (var i = 0; i < data.length; i++) {
                        // console.log(data[i])
                        // console.log(data.length)
                        // if (key !== "images") {
                        //     for (var j = 0; j < value.length; j++) {
                        // 创建suit-list-pandect盒子
                        var suitListpandect = $("<div>");
                        suitListpandect.addClass("suit-list-pandect container clearfix");
                        $(".suit-list-01").append(suitListpandect);
                        // 创建suit-list盒子
                        var suitList = $("<div>");
                        suitList.addClass("suit-list clearfix");
                        suitListpandect.append(suitList);
                        // 创建suit-list1盒子
                        var suitList1 = $("<div>");
                        suitList1.addClass("suit-list1 clearfix");
                        suitList.append(suitList1);
                        // 创建suit-list1-pic盒子
                        var suitList1Pic = $("<div>");
                        suitList1Pic.addClass("suit-list1-pic clearfix");
                        suitList1.append(suitList1Pic);
                        // 创建suit-list1-introduce盒子
                        var suitList1Introduce = $("<div>");
                        suitList1Introduce.addClass("suit-list1-introduce clearfix");
                        suitList1.append(suitList1Introduce);
                        // 创建a标签
                        var aBiao = $("<a>");
                        aBiao.attr("href", "#");
                        aBiao.html(data[i].TZ);
                        suitList1Introduce.append(aBiao);
                        // 创建suit-list2盒子
                        var suitList2 = $("<div>");
                        suitList2.addClass("suit-list2 clearfix");
                        suitList.append(suitList2);
                        // 创建ul标签
                        var ul = $("<ul>");
                        suitList2.append(ul);
                        // 创建suit-list-price盒子
                        var suitListPrice = $("<div>");
                        suitListPrice.addClass("suit-list-price clearfix");
                        suitListpandect.append(suitListPrice);
                        // 创建suit-list-price盒子
                        var suitListPromotion = $("<div>");
                        suitListPromotion.addClass("suit-list-promotion");
                        suitListPrice.append(suitListPromotion);
                        // 创建suit-list-save盒子
                        var suitListSave = $("<div>");
                        suitListSave.addClass("suit-list-save");
                        suitListPrice.append(suitListSave);
                        // 创建lisheng-price盒子
                        var lishengPrice = $("<P>");
                        lishengPrice.addClass("lisheng-price");
                        lishengPrice.html(data[i].ZZLJ);
                        suitListSave.append(lishengPrice);
                        // 创建old-price盒子
                        var oldPrice = $("<P>");
                        oldPrice.addClass("old-price");
                        oldPrice.html(data[i].YJ);
                        suitListSave.append(oldPrice);
                        // 创建suit-list-operation盒子
                        var suitlistoperation=$("<div>");
                        suitlistoperation.addClass("suit-list-operation");
                        suitListPrice.append(suitlistoperation);
                        // 创建new-price标签
                        var newprice=$("<p>");
                        newprice.addClass("new-price");
                        newprice.html("<span>套装价：</span>"+data[i].XJ);
                        suitlistoperation.append(newprice);
                        // 创建shopping-trolley标签
                        var shoppingtrolley=$("<p>");
                        shoppingtrolley.addClass("shopping-trolley");
                        suitlistoperation.append(shoppingtrolley);
                        // 创建a标签
                        var Abiaoqian = $("<a>");
                        Abiaoqian.attr("href", "#");
                        Abiaoqian.html("加入购物车");
                        shoppingtrolley.append(Abiaoqian);
                        // 创建detailed-list标签
                        var detailedlist=$("<p>");
                        detailedlist.addClass("detailed-list");
                        detailedlist.html("套装清单：共"+data[i].TZQD+"件");
                        suitlistoperation.append(detailedlist);
                        for (var key in data[i]) {
                            // console.log(data[i])
                            if (key !== "images") {
                                // 创建img标签
                                var img = $("<img>");
                                img.attr("src", "images/navList1/pic/" + data[i].bigimg[0]);
                                // 创建P标签
                                var p1 = $("<p>");

                                p1.html('<span>套装标签:</span><a href="#">' + data[i].TZBQ + '</a></p>');
                                // 创建P标签
                                var p2 = $("<p>");
                                p2.addClass("suit-list1-introduce-p2")
                                p2.html('<span>推荐理由:</span>' + data[i].TJLY + '</p>');
                            } else {
                                var long=data[i].images;
                                console.log(long);
                                for (var j = 0; j < long.length; j++) {
                                    // console.log(long.length);
                                    // 创建li标签
                                    var li = $("<li>");
                                    ul.append(li);
                                    // 创建a标签
                                    var A = $("<a>");
                                    A.attr("href", "#");
                                    li.append(A);
                                    // 创建img标签
                                    var img1 = $("<img>");
                                    img1.attr("src", "images/navList1/pic/" + long[j].img);
                                    A.append(img1);
                                    // 创建div
                                    var divone=$("<div>");
                                    li.append(divone);
                                    // 创建p
                                    var ptwo = $("<p>");
                                    ptwo.html("￥"+long[j].price+"<span>x"+long[j].num+"</span>");
                                    divone.append(ptwo);
                                }
                            }
                        }
                        suitList1Pic.append(img);
                        suitList1Introduce.append(p1);
                        suitList1Introduce.append(p2);
                    }
                }
            })
        }
        return {
            // 商品分类隐藏兰
            hoverHdo: hoverHdo,
            // ab切换
            tab: tab,
            // 商品分类隐藏栏右侧
            hoverPll: hoverPll,
            // 改变小轮播上箭头颜色
            hoverup: hoverup,
            // 改变小轮播下箭头颜色
            hoverdown: hoverdown,
            // 小轮播
            banner: banner,
            // 内容中部搜索栏悬浮
            contentSeek: contentSeek,
            // 顶部搜索栏
            sousuojiekou: sousuojiekou,
            // 图片懒加载
            lazypic: lazypic,

            zhujiaohu: zhujiaohu
        }

    })(jQuery);
    // 商品分类隐藏兰
    G_myFun.hoverHdo($(".head-down-one"));
    // ab切换
    G_myFun.tab();
    // 商品分类隐藏栏右侧
    G_myFun.hoverPll($(".product-list-li"));
    // 改变小轮播下箭头颜色
    G_myFun.hoverdown($(".head-down-three-R-down"));
    // 改变小轮播上箭头颜色
    G_myFun.hoverup($(".head-down-three-R-up"));
    // 轮播图
    G_myFun.banner($(".head-down-three-L ul"), $(".head-down-three-R-up"), $(".head-down-three-R-down"));
    // 内容中部搜索栏悬浮
    G_myFun.contentSeek();
    // 顶部搜索栏
    G_myFun.sousuojiekou();
    // 图片懒加载
    G_myFun.lazypic();

    G_myFun.zhujiaohu();
    if (!document.cookie) {
        $(".head-one-two").show();
        // $(".head.three").show();
        // location.href = "./login.html";
    } else {
        $(".head-one-two").hide();
        // $(".head.three").hide();
    }
});