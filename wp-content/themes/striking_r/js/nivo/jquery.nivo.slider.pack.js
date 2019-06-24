/*
 * jQuery Nivo Slider v3.2
 * http://nivo.dev7studios.com
 *
 * Copyright 2012, Dev7studios
 * Free to use and abuse under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * Adjusted by The Themebuilders to support Retina images
 */

!function(t){t.fn.nivoSlider=function(e){return this.each(function(i,n){var a=t(this);if(a.data("nivoslider"))return a.data("nivoslider");var r=new function(e,i){var n=t.extend({},t.fn.nivoSlider.defaults,i),a={currentSlide:0,currentImage:"",totalSlides:0,running:!1,paused:!1,stop:!1,controlNavEl:!1},r=t(e);r.data("nivo:vars",a).addClass("nivoSlider");var s=r.children();s.each(function(){var e=t(this),i="";e.is("img")||(e.is("a")&&(e.addClass("nivo-imageLink"),i=e),e=e.find("img:first"));var n=0===n?e.attr("width"):e.width(),r=0===r?e.attr("height"):e.height();""!==i&&i.css("display","none"),e.css("display","none"),a.totalSlides++}),n.randomStart&&(n.startSlide=Math.floor(Math.random()*a.totalSlides)),n.startSlide>0&&(n.startSlide>=a.totalSlides&&(n.startSlide=a.totalSlides-1),a.currentSlide=n.startSlide),t(s[a.currentSlide]).is("img")?a.currentImage=t(s[a.currentSlide]):a.currentImage=t(s[a.currentSlide]).find("img:first"),t(s[a.currentSlide]).is("a")&&t(s[a.currentSlide]).css("display","block");var o=t("<img/>").addClass("nivo-main-image");o.attr("src",a.currentImage.attr("src")).show(),a.currentImage.get(0).hasAttribute("srcset")&&o.attr("srcset",a.currentImage.attr("srcset")),r.append(o),t(window).resize(function(){r.children("img").width(r.width()),o.attr("src",a.currentImage.attr("src")),a.currentImage.get(0).hasAttribute("srcset")&&o.attr("srcset",a.currentImage.attr("srcset")),o.stop().height("auto"),t(".nivo-slice").remove(),t(".nivo-box").remove()}),r.append(t('<div class="nivo-caption"></div>'));var c=function(e){var i=t(".nivo-caption",r);if(""!=a.currentImage.attr("title")&&null!=a.currentImage.attr("title")){var n=a.currentImage.attr("title");"#"==n.substr(0,1)&&(n=t(n).html()),"block"==i.css("display")?setTimeout(function(){i.html(n)},e.animSpeed):(i.html(n),i.stop().fadeIn(e.animSpeed))}else i.stop().fadeOut(e.animSpeed)};c(n);var l=0;if(!n.manualAdvance&&s.length>1&&(l=setInterval(function(){h(r,s,n,!1)},n.pauseTime)),n.directionNav&&(r.append('<div class="nivo-directionNav"><a class="nivo-prevNav">'+n.prevText+'</a><a class="nivo-nextNav">'+n.nextText+"</a></div>"),t(r).on("click","a.nivo-prevNav",function(){if(a.running)return!1;clearInterval(l),l="",a.currentSlide-=2,h(r,s,n,"prev")}),t(r).on("click","a.nivo-nextNav",function(){if(a.running)return!1;clearInterval(l),l="",h(r,s,n,"next")})),n.controlNav){a.controlNavEl=t('<div class="nivo-controlNav"></div>'),r.after(a.controlNavEl);for(var d=0;d<s.length;d++)if(n.controlNavThumbs){a.controlNavEl.addClass("nivo-thumbs-enabled");var u=s.eq(d);u.is("img")||(u=u.find("img:first")),u.attr("data-thumb")&&a.controlNavEl.append('<a class="nivo-control" rel="'+d+'"><img src="'+u.attr("data-thumb")+'" alt="" /></a>')}else a.controlNavEl.append('<a class="nivo-control" rel="'+d+'">'+(d+1)+"</a>");t("a:eq("+a.currentSlide+")",a.controlNavEl).addClass("active"),t("a",a.controlNavEl).bind("click",function(){return!a.running&&!t(this).hasClass("active")&&(clearInterval(l),l="",o.attr("src",a.currentImage.attr("src")),a.currentImage.get(0).hasAttribute("srcset")&&o.attr("srcset",a.currentImage.attr("srcset")),a.currentSlide=t(this).attr("rel")-1,void h(r,s,n,"control"))})}n.pauseOnHover&&r.hover(function(){a.paused=!0,clearInterval(l),l=""},function(){a.paused=!1,""!==l||n.manualAdvance||(l=setInterval(function(){h(r,s,n,!1)},n.pauseTime))}),r.bind("nivo:animFinished",function(){o.attr("src",a.currentImage.attr("src")),a.currentImage.get(0).hasAttribute("srcset")&&o.attr("srcset",a.currentImage.attr("srcset")),a.running=!1,t(s).each(function(){t(this).is("a")&&t(this).css("display","none")}),t(s[a.currentSlide]).is("a")&&t(s[a.currentSlide]).css("display","block"),""!==l||a.paused||n.manualAdvance||(l=setInterval(function(){h(r,s,n,!1)},n.pauseTime)),n.afterChange.call(this)});var m=function(e,i,n){t(n.currentImage).parent().is("a")&&t(n.currentImage).parent().css("display","block"),t('img[src="'+n.currentImage.attr("src")+'"]',e).not(".nivo-main-image,.nivo-control img").width(e.width()).css("visibility","hidden").show();for(var a=t('img[src="'+n.currentImage.attr("src")+'"]',e).not(".nivo-main-image,.nivo-control img").parent().is("a")?t('img[src="'+n.currentImage.attr("src")+'"]',e).not(".nivo-main-image,.nivo-control img").parent().height():t('img[src="'+n.currentImage.attr("src")+'"]',e).not(".nivo-main-image,.nivo-control img").height(),r=0;r<i.slices;r++){var s=Math.round(e.width()/i.slices);if(r===i.slices-1){var c="";n.currentImage.get(0).hasAttribute("srcset")&&(c=' srcset="'+n.currentImage.attr("srcset")+'" '),e.append(t('<div class="nivo-slice" name="'+r+'"><img src="'+n.currentImage.attr("src")+'"'+c+' style="position:absolute; width:'+e.width()+"px; height:auto; display:block !important; top:0; left:-"+(s+r*s-s)+'px;" /></div>').css({left:s*r+"px",width:e.width()-s*r+"px",height:a+"px",opacity:"0",overflow:"hidden"}))}else c="",n.currentImage.get(0).hasAttribute("srcset")&&(c=' srcset="'+n.currentImage.attr("srcset")+'" '),e.append(t('<div class="nivo-slice" name="'+r+'"><img src="'+n.currentImage.attr("src")+'"'+c+' style="position:absolute; width:'+e.width()+"px; height:auto; display:block !important; top:0; left:-"+(s+r*s-s)+'px;" /></div>').css({left:s*r+"px",width:s+"px",height:a+"px",opacity:"0",overflow:"hidden"}))}t(".nivo-slice",e).height(a),o.stop().animate({height:t(n.currentImage).height()},i.animSpeed)},v=function(e,i,n){t(n.currentImage).parent().is("a")&&t(n.currentImage).parent().css("display","block"),t('img[src="'+n.currentImage.attr("src")+'"]',e).not(".nivo-main-image,.nivo-control img").width(e.width()).css("visibility","hidden").show();for(var a=Math.round(e.width()/i.boxCols),r=Math.round(t('img[src="'+n.currentImage.attr("src")+'"]',e).not(".nivo-main-image,.nivo-control img").height()/i.boxRows),s=0;s<i.boxRows;s++)for(var c=0;c<i.boxCols;c++)if(c===i.boxCols-1){var l="";n.currentImage.get(0).hasAttribute("srcset")&&(l=' srcset="'+n.currentImage.attr("srcset")+'" '),e.append(t('<div class="nivo-box" name="'+c+'" rel="'+s+'"><img src="'+n.currentImage.attr("src")+'"'+l+' style="position:absolute; width:'+e.width()+"px; height:auto; display:block; top:-"+r*s+"px; left:-"+a*c+'px;" /></div>').css({opacity:0,left:a*c+"px",top:r*s+"px",width:e.width()-a*c+"px"})),t('.nivo-box[name="'+c+'"]',e).height(t('.nivo-box[name="'+c+'"] img',e).height()+"px")}else l="",n.currentImage.get(0).hasAttribute("srcset")&&(l=' srcset="'+n.currentImage.attr("srcset")+'" '),e.append(t('<div class="nivo-box" name="'+c+'" rel="'+s+'"><img src="'+n.currentImage.attr("src")+'"'+l+' style="position:absolute; width:'+e.width()+"px; height:auto; display:block; top:-"+r*s+"px; left:-"+a*c+'px;" /></div>').css({opacity:0,left:a*c+"px",top:r*s+"px",width:a+"px"})),t('.nivo-box[name="'+c+'"]',e).height(t('.nivo-box[name="'+c+'"] img',e).height()+"px");o.stop().animate({height:t(n.currentImage).height()},i.animSpeed)},h=function(e,i,n,a){var r=e.data("nivo:vars");if(r&&r.currentSlide===r.totalSlides-1&&n.lastSlide.call(this),(!r||r.stop)&&!a)return!1;n.beforeChange.call(this),a?("prev"===a&&(o.attr("src",r.currentImage.attr("src")),r.currentImage.get(0).hasAttribute("srcset")&&o.attr("srcset",r.currentImage.attr("srcset"))),"next"===a&&(o.attr("src",r.currentImage.attr("src")),r.currentImage.get(0).hasAttribute("srcset")&&o.attr("srcset",r.currentImage.attr("srcset")))):(o.attr("src",r.currentImage.attr("src")),r.currentImage.get(0).hasAttribute("srcset")&&o.attr("srcset",r.currentImage.attr("srcset"))),r.currentSlide++,r.currentSlide===r.totalSlides&&(r.currentSlide=0,n.slideshowEnd.call(this)),r.currentSlide<0&&(r.currentSlide=r.totalSlides-1),t(i[r.currentSlide]).is("img")?r.currentImage=t(i[r.currentSlide]):r.currentImage=t(i[r.currentSlide]).find("img:first"),n.controlNav&&(t("a",r.controlNavEl).removeClass("active"),t("a:eq("+r.currentSlide+")",r.controlNavEl).addClass("active")),c(n),t(".nivo-slice",e).remove(),t(".nivo-box",e).remove();var s=n.effect,l="";"random"===n.effect&&(l=new Array("sliceDownRight","sliceDownLeft","sliceUpRight","sliceUpLeft","sliceUpDown","sliceUpDownLeft","fold","fade","boxRandom","boxRain","boxRainReverse","boxRainGrow","boxRainGrowReverse"),void 0===(s=l[Math.floor(Math.random()*(l.length+1))])&&(s="fade")),-1!==n.effect.indexOf(",")&&(l=n.effect.split(","),void 0===(s=l[Math.floor(Math.random()*l.length)])&&(s="fade")),r.currentImage.attr("data-transition")&&(s=r.currentImage.attr("data-transition")),r.running=!0;var d=0,u=0,h="",g="",f="",x="";if("sliceDown"===s||"sliceDownRight"===s||"sliceDownLeft"===s)m(e,n,r),d=0,u=0,h=t(".nivo-slice",e),"sliceDownLeft"===s&&(h=t(".nivo-slice",e)._reverse()),h.each(function(){var i=t(this);i.css({top:"0px"}),u===n.slices-1?setTimeout(function(){i.animate({opacity:"1.0"},n.animSpeed,"",function(){e.trigger("nivo:animFinished")})},100+d):setTimeout(function(){i.animate({opacity:"1.0"},n.animSpeed)},100+d),d+=50,u++});else if("sliceUp"===s||"sliceUpRight"===s||"sliceUpLeft"===s)m(e,n,r),d=0,u=0,h=t(".nivo-slice",e),"sliceUpLeft"===s&&(h=t(".nivo-slice",e)._reverse()),h.each(function(){var i=t(this);i.css({bottom:"0px"}),u===n.slices-1?setTimeout(function(){i.animate({opacity:"1.0"},n.animSpeed,"",function(){e.trigger("nivo:animFinished")})},100+d):setTimeout(function(){i.animate({opacity:"1.0"},n.animSpeed)},100+d),d+=50,u++});else if("sliceUpDown"===s||"sliceUpDownRight"===s||"sliceUpDownLeft"===s){m(e,n,r),d=0,u=0;var b=0;h=t(".nivo-slice",e),"sliceUpDownLeft"===s&&(h=t(".nivo-slice",e)._reverse()),h.each(function(){var i=t(this);0===u?(i.css("top","0px"),u++):(i.css("bottom","0px"),u=0),b===n.slices-1?setTimeout(function(){i.animate({opacity:"1.0"},n.animSpeed,"",function(){e.trigger("nivo:animFinished")})},100+d):setTimeout(function(){i.animate({opacity:"1.0"},n.animSpeed)},100+d),d+=50,b++})}else if("fold"===s)m(e,n,r),d=0,u=0,t(".nivo-slice",e).each(function(){var i=t(this),a=i.width();i.css({top:"0px",width:"0px"}),u===n.slices-1?setTimeout(function(){i.animate({width:a,opacity:"1.0"},n.animSpeed,"",function(){e.trigger("nivo:animFinished")})},100+d):setTimeout(function(){i.animate({width:a,opacity:"1.0"},n.animSpeed)},100+d),d+=50,u++});else if("fade"===s)m(e,n,r),(g=t(".nivo-slice:first",e)).css({width:e.width()+"px"}),g.animate({opacity:"1.0"},2*n.animSpeed,"",function(){e.trigger("nivo:animFinished")});else if("slideInRight"===s)m(e,n,r),(g=t(".nivo-slice:first",e)).css({width:"0px",opacity:"1"}),g.animate({width:e.width()+"px"},2*n.animSpeed,"",function(){e.trigger("nivo:animFinished")});else if("slideInLeft"===s)m(e,n,r),(g=t(".nivo-slice:first",e)).css({width:"0px",opacity:"1",left:"",right:"0px"}),g.animate({width:e.width()+"px"},2*n.animSpeed,"",function(){g.css({left:"0px",right:""}),e.trigger("nivo:animFinished")});else if("boxRandom"===s)v(e,n,r),f=n.boxCols*n.boxRows,u=0,d=0,(x=p(t(".nivo-box",e))).each(function(){var i=t(this);u===f-1?setTimeout(function(){i.animate({opacity:"1"},n.animSpeed,"",function(){e.trigger("nivo:animFinished")})},100+d):setTimeout(function(){i.animate({opacity:"1"},n.animSpeed)},100+d),d+=20,u++});else if("boxRain"===s||"boxRainReverse"===s||"boxRainGrow"===s||"boxRainGrowReverse"===s){v(e,n,r),f=n.boxCols*n.boxRows,u=0,d=0;var w=0,S=0,I=[];I[w]=[],x=t(".nivo-box",e),"boxRainReverse"!==s&&"boxRainGrowReverse"!==s||(x=t(".nivo-box",e)._reverse()),x.each(function(){I[w][S]=t(this),++S===n.boxCols&&(S=0,I[++w]=[])});for(var y=0;y<2*n.boxCols;y++){for(var R=y,N=0;N<n.boxRows;N++)R>=0&&R<n.boxCols&&(function(i,a,r,o,c){var l=t(I[N][a]),d=l.width(),u=l.height();"boxRainGrow"!==s&&"boxRainGrowReverse"!==s||l.width(0).height(0),o===c-1?setTimeout(function(){l.animate({opacity:"1",width:d,height:u},n.animSpeed/1.3,"",function(){e.trigger("nivo:animFinished")})},100+r):setTimeout(function(){l.animate({opacity:"1",width:d,height:u},n.animSpeed/1.3)},100+r)}(0,R,d,u,f),u++),R--;d+=100}}},p=function(t){for(var e,i,n=t.length;n;e=parseInt(Math.random()*n,10),i=t[--n],t[n]=t[e],t[e]=i);return t},g=function(t){this.console&&void 0!==console.log&&console.log(t)};return this.stop=function(){t(e).data("nivo:vars").stop||(t(e).data("nivo:vars").stop=!0,g("Stop Slider"))},this.start=function(){t(e).data("nivo:vars").stop&&(t(e).data("nivo:vars").stop=!1,g("Start Slider"))},n.afterLoad.call(this),this}(this,e);a.data("nivoslider",r)})},t.fn.nivoSlider.defaults={effect:"random",slices:15,boxCols:8,boxRows:4,animSpeed:500,pauseTime:3e3,startSlide:0,directionNav:!0,controlNav:!0,controlNavThumbs:!1,pauseOnHover:!0,manualAdvance:!1,prevText:"Prev",nextText:"Next",randomStart:!1,beforeChange:function(){},afterChange:function(){},slideshowEnd:function(){},lastSlide:function(){},afterLoad:function(){}},t.fn._reverse=[].reverse}(jQuery);