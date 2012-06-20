var t = n = 0, count;
	$(document).ready(function(){	
		count=$("#banner_list a").length;
		$("#banner_list a:not(:first-child)").hide();
		$("#banner_info").html($("#banner_list a:first-child").find("img").attr('alt'));
		$("#banner_info").click(function(){window.open($("#banner_list a:first-child").attr('href'), "_blank")});
		$("#banner li").click(function() {
			var i = $(this).text() - 1;
			n = i;
			if (i >= count) return;
			$("#banner_info").html($("#banner_list a").eq(i).find("img").attr('alt'));
			$("#banner_info").unbind().click(function(){window.open($("#banner_list a").eq(i).attr('href'), "_blank")})
			$("#banner_list a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
			document.getElementById("banner").style.background="";
			$(this).toggleClass("on");
			$(this).siblings().removeAttr("class");
		});
		t = setInterval("showAuto()", 4000);
		$("#banner").hover(function(){clearInterval(t)}, function(){t = setInterval("showAuto()", 4000);});
	})
	
	function showAuto()
	{
		n = n >=(count - 1) ? 0 : ++n;
		$("#banner li").eq(n).trigger('click');
	}
	
	
	
//<![CDATA[
$(document).ready(function(){

	$("#jquery_jplayer_1").jPlayer({
		ready: function () {
			$(this).jPlayer("setMedia", {
				mp3:"http://www.jplayer.org/audio/mp3/TSP-01-Cro_magnon_man.mp3"
			});
		},
		swfPath: "js",
		supplied: "mp3",
		wmode: "window"
	});
});