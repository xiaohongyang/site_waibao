$(function(){
	$(".select-input").focus(function(){
			if($(this).attr("readonly")!="readonly" && $(this).val()==this.defaultValue){  
				$(this).val("");  
			}  
		  }).blur(function(){
			if($(this).attr("readonly")!="readonly" && $(this).val()==""){  
			   $(this).val(this.defaultValue)
			}  
	});

    //头部 Blobal Websites 显示or隐藏
    $('#global-websites-tl').showOrHide({
        eventName:'mouseover',
        showElement:$('#global-websites-con'),
        wrapElement:$('#global-websites-wp'),
        showInit:function(){
            fleXenv.fleXcrollMain('global-websites');
        }
    });
    //关于我们 发展历程 时间轴
    $('#time-shaft').timeShaft();
    //关于我们 发展历程 返回
    $('#timer-shaft-go').goAnyPlace({
        positionE:$('#time-shaft-postion')
    });
	
	//资质荣誉
	$('.free-input').freeInput({
		noBorder : true
	});
	$('#free-select1').freeSelect();
	$('#free-select2').freeSelect();
    $('#free-select3').freeSelect({color:"#666",conColor:"#666"});
	$('#free-select4').freeSelect({color:"#666",conColor:"#666"});
	$('#free-select5').freeSelect({width:160});
    $('#free-select6').freeSelect({width:160});
    $('#free-select7').freeSelect({width:160});
    $('#free-select8').freeSelect({color:"#666",conColor:"#666"}); 
	$('#free-select9').freeSelect({color:"#666",conColor:"#666"});
	$('#free-select10').freeSelect({color:"#666"});
	
	//咨询订阅 下拉选框
	/*$('#free-select11').freeSelect({
		  width:237,
		  style : 'darkGrey',
		  color:"#666666"
	});*/
	$('#free-select12').freeSelect({
		  width:237,
		  style : 'darkGrey',
		  color:"#666666"
	});
	$('#free-select13').freeSelect({
		  width:237,
		  style : 'darkGrey',
		  color:"#666666"
	});
	$('#free-select14').freeSelect({
		  width:237,
		  style : 'darkGrey',
		  color:"#666666"
	});
	/*$('#free-select15').freeSelect({
		width:237,
	    style : 'darkGrey',
	    color:"#666666"
	})*/
	$('#free-select16').freeSelect({
		width:237,
	    color:"#666666"
	})
	$('#free-select17').freeSelect({
		width:237,
	    color:"#666666"
	})
	/*$('#free-select18').freeSelect({
		style : 'darkGrey',
		width:150,
	    color:"#666666",
	})*/
	$('#free-select19').freeSelect({
	 style : 'darkGrey',
		width:150,
	    color:"#666666"
	})
	$('#free-select20').freeSelect({
		style : 'darkGrey',
		width:150,
	    color:"#666666"
	})
	//咨询订阅 订阅内容
	$('.checkbox').freeCheckbox();
	
	
 //联系我们 隐藏内容 || 评价项目公示
  
    //我们的服务
 /*  $('.center').showOrHide({
		showElement : $('.allcontent'),
		iSsoq:true		
   });
*/
	 

	//资讯订阅 
	$('.newsSubscribe').find('.free-input').freeInput();
	$('.radio').freeRadio();
	
	$('#train-add-btn').addContact({
	 	 con : $('.train-repeat-con')
	});
   
   
    //我们的服务
   $('.service_show').showOrHide({
		showElement : $('.sub_nav_menu'),
		iSsoq:true		
   });
	
	//股票信息
	(function(){
		var 
			index  = 0,
			$nav = 	$('.nav_message'), 
			$showElement = $nav.find('.no-picture'),
			$aList = $nav.find('.picture').children('h3'); 

		    $aList.on('click',function(){
				$aList.eq(index).removeClass('cur');
				//$showElement.eq(index).hide();
				index =  $aList.index($(this));
				$(this).addClass('cur');
				//$showElement.eq(index).show();
				
		    });
    })();
	
	//证书查询
	//(function(){
		//var 
			//index  = 0,
			//$nav = 	$('.res_query'), 
			//$showElement = $nav.find(''),
			//$aList = $nav.find('.query').children('a'); 
		   // $aList.on('click',function(){
				//$aList.eq(index).removeClass('cur');
				//$showElement.eq(index).hide();
				//index =  $aList.index($(this));
				//$(this).addClass('cur');
				//$showElement.eq(index).show();
		   // });
  //  })();
	
	//首页，按行业，按服务
	(function(){
		var 
			index  = 0,
			$nav = 	$('.main_by1'), 
			$showElement = $nav.find('.show_ul'),
			$aList = $nav.find('.choose1').children('a'); 
		    $aList.on('mouseover',function(){
				$aList.eq(index).removeClass('cur');
				$showElement.eq(index).hide();
				index =  $aList.index($(this));
				$(this).addClass('cur');
				$showElement.eq(index).show();
		    });
    })();
	//公司新闻，行业快讯
	(function(){
		var 
			index  = 0,
			$nav = 	$('.main_by1'), 
			$showElement = $nav.find('.main_pic_all'),
			$aList = $nav.find('.choose_news').children('a'); 
		    $aList.on('mouseover',function(){
				$aList.eq(index).removeClass('cur');
				$showElement.eq(index).hide();
				index =  $aList.index($(this));
				$(this).addClass('cur');
				$showElement.eq(index).show();
		    });
    })();
    /**
     * 头部下拉 begin
     */
	var
		$header = $("#header"),
		$t = $header.find('.t'),
		$b = $header.find('.b'),
		isHide = false;
    $(window).on('scroll',function(){
      var scrolltop=$(window).scrollTop();
      if(scrolltop>80 && !isHide){
      	 	  $t.hide();
		      $b.hide();
			  $header.stop().animate({height:'35px'},100).addClass("cur1");
			  isHide = true;
			$header.on('mouseenter',function(){
		      $header.stop().animate({height:'122px'},100,function(){
		      	$(this).attr('style','height: 122px;');
		      }).removeClass("cur1");
		      $t.show();
	          $b.show();
	        }).on('mouseleave',function(){ 
	          $t.hide();
		      $b.hide();
			  $header.stop().animate({height:'35px'},100).addClass("cur1");
	       }); 	  
	  }
      if(scrolltop<=80 && isHide){
      	   $header.off('mouseenter mouseleave');
		   $header.stop().animate({height:'122px'},100,function(){
		   		$(this).attr('style','height: 122px;');
		   }).removeClass("cur1");
	       $t.show();
           $b.show();
	  	   isHide = false;
      }
    });	

//头部的下拉效果
	var
		$navTitle = $(".nav_title"), 
		$navSub = $navTitle.find('.sub_nav_child');
   $navTitle.on('mouseenter',function(){
		$navSub.eq($navTitle.index($(this))).stop().slideDown(500);
   }).on('mouseleave',function(){
   		$navSub.hide();
  }); 
  $navSub.on('mouseleave',function(){
  		$navSub.hide();
  });

   //网站地图的下拉效果
   var
   		$gw = $(".global-websites"),
   		$gwCon = $gw.find('.con');
	$gw.hover(function(){ 
	        $gwCon.stop().slideDown(500); 		 
	            }, 
	   function(){ 
	        $gwCon.hide(); 
	}) 
	$gwCon.on('mouseleave',function(){
  		$gwCon.hide();
     });
     
    //侧边栏
    $('#fix_right_bar').children('i').on('click',function(){
    	if($(this).hasClass('cur')){
    		$(this).removeClass('cur');
    		$('#fix_right_bar').animate({right:'10px'},200);
    		
    	}else{
    		$(this).addClass('cur');
    		$('#fix_right_bar').animate({right:'-105px'},200);
    	}
    });
});  

//IE8提示信息不显示问题，将下面的代码加到hcjc.js底部；


/*var PlaceHolder = {
    _support: (function() {
        return 'placeholder' in document.createElement('input');
    })(),
 
    // 提示文字的样式，需要在页面中其他位置定义
    className: 'abc',
    init: function() {
        if (!PlaceHolder._support) {
            // 未对textarea处理，需要的自己加上
            var inputs = $('input');
            PlaceHolder.create(inputs);
        }
    },
 
    create: function(inputs) {
        var input;
        if (inputs.length === 0) {return false;}
        
        for (var i = 0, length = inputs.length; i < length; i++) {
            input = inputs.eq(i);
            if (!PlaceHolder._support){
                PlaceHolder._setValue(input);
            	input.on('focus',function(e){
            		var _self = $(this);
            		if(_self.attr('data-type') === 'password'){
            			var _s = _self.hide().blur().siblings('input').eq(0);
            			_s.show(1,function(){
            				_s.focus();
            			});
            			return;
            		}
            		if (_self.val() === _self.attr(placeholder)){
                        _self.val('');
                    }
            		
            	}).on('blur',function(){
            		var _self = $(this);
            		if (_self.val() === '') {
                        PlaceHolder._setValue(_self);
                    }
            	});
            }
        }
    },
 
    _setValue: function(input) {
        input.val(input.attr('placeholder'));
    }
};*/


var PlaceHolder = {
	    _support: (function() {
	        return 'placeholder' in document.createElement('input');
	    })(),
	 
	    // 提示文字的样式，需要在页面中其他位置定义
	    className: 'abc',
	    init: function() {
	        if (!PlaceHolder._support) {
	            // 未对textarea处理，需要的自己加上
	            var inputs = $('input');
	            PlaceHolder.create(inputs);
	        }else{
	        	$('input[type="password"]').show().each(function(i,n){
	        		$(n).siblings('input').eq(0).hide();
	        	});
	        }
	    },
	 
	    create: function(inputs) {
	        var input;
	        if (inputs.length === 0) {return false;}
	        
	        for (var i = 0, length = inputs.length; i < length; i++) {
	            input = inputs.eq(i);
	            if (!PlaceHolder._support){
	                PlaceHolder._setValue(input);
	            	input.on('focus',function(e){
	            		var _self = $(this);
	            		if(_self.attr('data-type') && _self.attr('data-type') === 'password'){
	            			var _s = _self.hide().blur().siblings('input').eq(0);
	            			_s.show(0,function(){
	            				_s.focus();
	            			});
	            			return;
	            		}
	            		if (_self.val() === _self.attr('placeholder')){
	                        _self.val('');
	                    }
	            		
	            	}).on('blur',function(){
	            		var _self = $(this);
	            		if(_self.attr('type') === 'password' && _self.val() === ''){
	            			 _self.hide().siblings('input').eq(0).show();
	            			return;
	            		}
	            		if (_self.val() === '') {
	                        PlaceHolder._setValue(_self);
	                    }
	            		
	            	});
	            }
	        }
	    },
	 
	    _setValue: function(input) {
	        input.val(input.attr('placeholder'));
	    }
	};
	PlaceHolder.init();
	//分类
	(function(){
		
		
		var showCon = $('#show-classify-con');
		
		//一级
		var oneLi = showCon.children('ul').children('li'),
			oneH3 = oneLi.children('h3'),
			oneUl = oneLi.children('ul');
		
		oneH3.on('click',function(e){
			e.stopPropagation();
			oneUl.removeClass('cur').eq(oneH3.index($(this))).addClass('cur');	
		});
		
		//二级
		var twoLi = oneUl.children('li'),	
			twoH4 = twoLi.children('h4'),
			twoUl = twoLi.children('ul');
		
		twoH4.on('click',function(e){
			e.stopPropagation();
			twoUl.removeClass('cur').eq(twoH4.index($(this))).addClass('cur');
		});
		
		showCon.find('li').on('click',function(e){
			e.stopPropagation();
		});
		
		
	})();