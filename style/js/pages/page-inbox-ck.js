function inboxWidthFunctions(e){$("#content").css("padding","0 15px");var t=$("#sidebar-left").outerHeight(),n=$("#content").height(),r=$("#content").outerHeight(),i=$(".navbar-brand").width(),s=$(window).height(),o=$(window).width();if(o>767){var u=Math.max(t,r);$(".inbox-menu").css("min-height",u);$(".contacts").css("min-height",u);$(".messages").css("min-height",u);$(".message").css("min-height",u)}else{$(".inbox-menu").css("min-height","");$(".contacts").css("min-height","");$(".messages").css("min-height","");$(".message").css("min-height","")}if(o>767&&$("#sidebar-left").hasClass("minified")){var a=i-40;$(".inbox-menu").css("width",a);$(".contacts").css("width",a).css("margin-right","-14px");if($("#sidebar-left").is(":visible"))var f=(o-40)/2-a;else var f=o/2-a;$(".messages").css("width",f);$(".message").css("width",f)}else{$(".inbox-menu").css("width","");$(".contacts").css("width","");$(".messages").css("width","");$(".message").css("width","")}o<768}$(window).bind("resize",inboxWidthFunctions);$(document).ready(function(){inboxWidthFunctions();$("#main-menu-min").click(function(){inboxWidthFunctions()});$("#main-menu-toggle").click(function(){inboxWidthFunctions()})});$(document).ready(function(){if($(".messages-list").length){$(".messages-list").on("click",".fa-square-o",function(){$(this).removeClass("fa-square-o").addClass("fa-check-square-o")});$(".messages-list").on("click",".fa-check-square-o",function(){$(this).removeClass("fa-check-square-o").addClass("fa-square-o")});$(".messages-list").on("click",".fa-star-o",function(){$(this).removeClass("fa-star-o").addClass("fa-star")});$(".messages-list").on("click",".fa-star",function(){$(this).removeClass("fa-star").addClass("fa-star-o")});$(".action").find("i.fa-square-o").replaceWith('<i class="fa fa-square-o"></i><i class="fa fa-square"></i>');$(".action").find("i.fa-star-o").replaceWith('<i class="fa fa-star-o"></i><i class="fa fa-star bg"></i>');$(".messages-list > li").click(function(){$(this).parent().find("li").each(function(){$(this).removeClass("active")});$(this).addClass("active").removeClass("unread")})}$("input, textarea").placeholder();$("textarea").autosize()});