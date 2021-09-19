$(document).ready(function(){
    load();
    $("#navbarText li").click(function(){
        $('.nav-item').removeClass("active");
        $(this).addClass("active");
    })
});
function reaction(){
    var data = {
        "token": $("#token").val(),
        "soLuong": $("#soLuong").val(),
        "camXuc": $("#radio:checked").val()
    };
    $.ajax({
        url: "modules/reaction.php",
        type: "post",
        data: data,
        success: function(result){
            $(".result").html(result);
            $("#alert_popover").fadeTo(5000, 500).slideUp(500);
        },
        error: function(e){
            console.log(e);
        }
    });
}
function load(a){
    if(a == null){
        var data = {
            "call": "autoLike"
        };
    } else {
        var data = {
            "call": $(a).data("call")
        };
    }
    $.ajax({
        url: "modules/load.php",
        type: "post",
        data: data,
        success: function(result){
            $(".main").html(result);
        },
        error: function(e){
            console.log(e);
        }
    });
}
function getToken(){
    var data = {
        "user": $("#user").val(),
        "pass": $("#password").val()
    };
    $.ajax({
        url: "modules/gettoken.php",
        type: "post",
        data: data,
        success: function(result){
            $(".result").html(result);
        },
        error: function(e){
            console.log(e);
        }
    });
}
function tokenFilter(){
    var obj = $.parseJSON($("#fullToken").val());
    var data = {
        "username": obj["identifier"],
        "token": obj["access_token"]
    };
    $.ajax({
        url: "modules/tokenfilter.php",
        type: "post",
        data: data,
        success: function(result){
            $(".result").html(result);
        },
        error: function(e){
            console.log(e);
        }
    });
}
function vipAuto(){
    var data = {
        "token": $("#token").val(),
        "camXuc": $("#radio:checked").val(),
        "comment": $("#comment").val()
    };
    $.ajax({
        url: "modules/vipauto.php",
        type: "post",
        data: data,
        success: function(result){
            $(".result").html(result);
        },
        error: function(e){
            console.log(e);
        }
    })
}