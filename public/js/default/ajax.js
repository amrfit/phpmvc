$(document).ready(function(){
    showLikedPosts();
    showLikedCount();

    UpdateCart();
    showCartCount();

    $("#search").keyup(function(){
        if (input != "") {
            var input = $('#search').val();
            $.ajax({
                url: "views/layouts/header.php",
                method: "POST",
                data: {input:input},
                success:function(datas) {
                    $(".searchres").css("display","block");
                    $(".searchres").html(datas);
                }
            })
        } else {
            $(".searchres").css("display","none");
        }
    });
});

//FOR LIKE & DISLIKE POSTS

    function LikePost(postid) {
        var postlikeid = postid;
        $.post("controllers/Cmain.php",{postlikeid:postlikeid},
        function(data,status){
            var btnlike = $("#postliked"+postlikeid).children("button");
            btnlike.toggleClass('active');
            showLikedPosts();
            showLikedCount();
        });
    }

    function RemoveLikePost(postid) {
        var deletepostlikeid = postid;
        $.post("controllers/Cmain.php",{deletepostlikeid:deletepostlikeid},
        function(data,status){
            var btndislike = $("#dislikedpost"+deletepostlikeid).children("button");
            var btnlike = $("#postliked"+deletepostlikeid).children("button");
            btnlike.removeClass('active');
            btndislike.removeClass('active');
            showLikedPosts();
            showLikedCount();
        });
    }

    function showLikedPosts() {
        var displayData = "true";
        $.ajax({
            url: "controllers/Cmain.php",
            type: "post",
            data: {showLikedPosts: displayData},
            success: function(data,status) {
                $('#liketable').html(data);
            }
        });
    }

    function showLikedCount() {
        var displayData = "true";
        $.ajax({
            url: "controllers/Cmain.php",
            type: "post",
            data: {showLikedCount: displayData},
            success: function(data,status) {
                if (data > 0) {
                    $('.header_like').html('<span>'+data+'</span><i class="krs-like"></i>');
                } else {
                    $('.header_like').html('<i class="krs-like"></i>');
                }
            }
        });
    }

//FOR ADD & DELETE PRODUCTS

    function AddToCart(prdid) {
        var prdid = prdid;
        $.post("controllers/Cmain.php",{productid:prdid},function(data,status){
            console.log(status);
            UpdateCart();
            showCartCount();
        });

    }

    function UpdateCart() {
        var displayData = "true";
        $.ajax({
            url: "controllers/Cmain.php",
            type: "post",
            data: {showCartPrds: displayData},
            success: function(data,status) {
                $("#carttable").html(data);
            }
        });
    }

    function showCartCount() {
        var displayData = "true";
        $.ajax({
            url: "controllers/Cmain.php",
            type: "post",
            data: {showCartCount: displayData},
            success: function(data,status) {
                if (data > 0) {
                    $('.header_shopping').html('<span>'+data+'</span><i class="krs-shopping"></i>');
                } else {
                    $('.header_shopping').html('<i class="krs-shopping"></i>');
                }
            }
        });
    }

    function DeleteCart(prdid) {
        var prdid = prdid;
        $.post("controllers/Cmain.php",{deleteproductid:prdid},function(data,status){
            console.log(status);
            UpdateCart();
            showCartCount();
        });
    }

    function SubCart(prdid) {
        var prdid = prdid;
        $.post("controllers/Cmain.php",{subproductid:prdid},function(data,status){
            UpdateCart();
            showCartCount();
        });
    }


