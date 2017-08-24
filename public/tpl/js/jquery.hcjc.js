/**
 * 模糊搜索
 */
function FuzzySearch(){
		var self = this;
		this.input = null;
		this.searchWrap = null;
		this.isShow = false;
		this.searchList = null;
		$('input[data-search-input]').on('click',function(e){
			e.stopPropagation();
			self.hide();
			self.setInput($(this));
		});
}
FuzzySearch.prototype = {
	 setInput : function(input){
	 	var self = this;
	 	this.input = input;
	 	self.input.on('keyup',function(){
	 		self.search($(this).val(),$.trim($(this).attr('data-search-input')));
	 	});
	 },
	 //显示搜索内容框
	 show : function(){
	 	var self = this;
	 	if(!self.searchList){
	 		var html = '<div id="select-search-list">'+
							'<ul>'+
							'</ul>'+
						'</div>';
	 		$('body').append(html);
	 		self.searchWrap = $('#select-search-list');
	 		self.searchList = self.searchWrap.find('ul');
 			self.searchWrap.show();
 			self.isShow = true;
 			self.setPos();
	 		self.searchList.on('click','li',function(e){
	 				e.stopPropagation();
	 				self.input.val($(this).text());
	 				self.input.siblings('input:hidden').val($(this).attr('data-id'));
	 				self.hide();
	 		});
	 		$(document).on('click',function(){
	 			self.hide();
	 		});
	 	}else{
 			self.searchWrap.show();
 			self.isShow = true;
 			self.setPos();
 		}
	 	$('.option').hide(0,function(){
               $('.selected').removeClass('cur');
        });
	 },
	 //隐藏搜索内容框
	 hide : function(){
	 	if(this.isShow){
	 		this.searchWrap.hide();
			this.isShow = false;
	 	}
	 },
	 //搜索方法
	 search : function(val,url){
	 	if($.trim(url)=='departmentDataList.do'||$.trim(url)=='officeDataList.do'||$.trim(url)=='professionDataList.do'||$.trim(url)=='serviceDataList.do'||$.trim(url)=='publicityDataList.do'||$.trim(url)=='cityDataList.do'){
	 		//在这里写异步方法  val为文本框的值 url为地址
	 		var self = this;
	 		$.ajax({
				type:"post",
				url:url,
				data:{value:val},
				dataType:"json",
				async:true,
				success:function(data){			
						var list=data.list;
						var html='';
						if (list!=null && list!=undefined && list.length>0){
							for(var i=0;i<list.length;i++){
								var model=list[i];
							html += '<li data-id="'+model.id+'">'+model.name+'</li>';
			                      
							}
							self.show();
					 		self.searchList.html(html);
						}
					}
				});
	 	}
	 	if($.trim(url)=='areaDataList.do'){
	 		//在这里写异步方法  val为文本框的值 url为地址
	 		var self = this;
	 		$.ajax({
				type:"post",
				url:url,
				data:{value:val},
				dataType:"json",
				async:true,
				success:function(data){			
						var list=data.list;
						var html='';
						if (list!=null && list!=undefined && list.length>0){
							for(var i=0;i<list.length;i++){
								var model=list[i];
							html += '<li data-id="'+model.name+'">'+model.name+'</li>';
			                      
							}
							self.show();
					 		self.searchList.html(html);
						}
					}
				});
	 	}
	 	if($.trim(url)=='dateDataList.do'){
	 		//在这里写异步方法  val为文本框的值 url为年份
	 		var self = this;
	 		$.ajax({
				type:"post",
				url:url,
				data:{value:val},
				dataType:"json",
				async:true,
				success:function(data){			
						var list=data.list;
						var html='';
						if (list!=null && list!=undefined && list.length>0){
							for(var i=list.length-1;i>=0;i--){
								var model=list[i];
								html += '<li data-id="' + model.year + '" style="width: 187px; color: rgb(102, 102, 102);">' + model.year + '</li>';
							}
							self.show();
					 		self.searchList.html(html);
						}
					}
				});
	 	}
	 		},
	 //设置位置
	 setPos : function(){
	 	var self = this;
	 	setPos();
	 	function setPos(){
	 		if(!self.isShow)return;
	 		console.log(self.input.width());
	 		self.searchWrap.css({
	 			top : self.input.offset().top+29+'px',
	 			left : self.input.offset().left+'px',
	 			width : self.input.width()+46+'px'
 			});
	 	}
 		$(window).on('resize',function(){
 			setPos();
 		}); 
	 }
}
var fuzzySearch  = new FuzzySearch();
jQuery.fn.extend({
    /**
	 * 元素显示或隐藏
	 * config{
	 *      eventName : 触发事件类名；默认'click'； 如'click' 'mouseover'；
	 *      curName : 选中状态样式；默认'cur';
	 *      showElement : 需要显示的元素；
	 * 		wrapElement : 触发元素与需要显示元素的包裹元素；
	 * 		init : 页面加载初始化函数；
	 * 	    showInit : 第一次显示初始化函数;可接收两个参数，第一个对当前调用对象，第二个为配置对象；
	 * 	    hideCall : 隐藏回调函数;可接收三个参数，第一个为调用者对象，第二个为配置对象,第三个为当前触发事件元素在绑定该事件元素集合中的Index值，;
	 *      showCall : 显示回调函数；可接收三个参数，第一个为调用者对象，第二个为配置对象,第三个为当前触发事件元素在绑定该事件元素集合中的Index值,；
	 * }
	 */
	showOrHide: function(userConfig) {
		var
			config = {
				eventName: 'click',
				showElement: null,
				wrapElement: null,
				curName: 'cur',
				init : null,
				showInit: null,
				hideCall : null,
				showCall : null,
				iSsoq:false,
				isAnimate : false
			},
			self = $(this),
			index = null;
		$.extend(config, userConfig);
		if(typeof config.init === 'function'){
			config.init(self,config);
			config.init = null;
		}
		if (config.eventName !== 'click') {
			   self.on(config.eventName,function(event) {
					self.addClass(config.curName);
					config.showElement.show(0, function() {
						if (typeof config.showInit === 'function') {
							config.showInit();
							config.showInit = null;
						}
					});
				});
				config.wrapElement.on('mouseleave', function() {
					config.showElement.hide();
					self.removeClass(config.curName);
				});
				
		} else {
		   if(config.iSsoq){
			   $(document).on(config.eventName,self.selector,function(event) {
				   self = $(self.selector);
				   config.showElement = $(config.showElement.selector);
				   var
						curIndex = self.index($(this));
						if($.browser.msie&&($.browser.version == "7.0")){
						//IE7
						} 
					/*$(this).addClass(config.curName).children(".sub_nav_menu").slideDown();
					$(this).siblings().children(".sub_nav_menu").slideUP();*/
					if(index !== null){
						if(index === curIndex){
							config.showElement.eq(curIndex).slideToggle();	
							$(this).toggleClass(config.curName);		
						}else{
							config.showElement.eq(curIndex).slideDown();
							config.showElement.eq(index).slideUp();		
							self.eq(index).removeClass(config.curName);
						    $(this).addClass(config.curName);
						}
					}else{
					
						config.showElement.eq(curIndex).slideDown();
						
						config.showElement.not(config.showElement.eq(curIndex)).slideUp();
						self.removeClass(config.curName);
						$(this).addClass(config.curName);
					}
					index = curIndex;	
					if(typeof config.showCall === 'function'){
						config.showCall(self,config,index);
					}
				});
		   }else{			 
					self.on(config.eventName, function(event) {
							index = self.index($(this));
							if (config.showElement.eq(index).is(':visible')) {
								config.showElement.eq(index).hide(0,function(){
									if(typeof config.hideCall === 'function'){
										 config.hideCall(self,config,index);
									}
								});
							} else {
								self.removeClass(config.curName);
								self.eq(index).addClass(config.curName);
								config.showElement.eq(index).show(0, function() {
									if (typeof config.showInit === 'function') {
										config.showInit();
										config.showInit = null;
									}
									if(typeof config.showCall === 'function'){
										config.showCall(self,config,index);
									}
								});
							}
						});
					}
				
		}
	},
    /**
	 * 下拉选框
	 */
    freeSelect : function(userConfig){
        var
            config = {
                style : 'lightGray',
                curName :  'cur',
                width : -1,
                color : '#C5C5C5',
                conColor : '#7F7F7F',
                conBgColor : '#F5F5F5',
                conHoverBgColor :'',
                scrollBgColor : '#CCC',
                scrollBarBgColor : '#303962',
                call : null
            };
        $.extend(config,userConfig);
        var
            self = $(this),
            selected = self.children('.selected'),
            option = self.children('.option'),
            optionUl = option.children('ul'),
            text = selected.children('p'),
            hide = selected.children(':hidden'),
            optionLi = option.find('li'),
            inputE = selected.find('.select-input'),
            curWidth = 0,
            style = '',
            optionWidth = 0;

        if(config.width === -1){
            curWidth = self.outerWidth();
        }else{
            curWidth = config.width;
        }
        switch(config.style){
            case 'lightGray':
                optionWidth = curWidth;
            break;
            case 'darkGrey':
                style = 'dark-grey';
                optionWidth = curWidth;
            break;
            default :
                optionWidth = curWidth;
            break;
        }
        self.addClass(style).width(curWidth);
        text.width(curWidth-47).css({color:config.color});
        inputE.width(curWidth-47).css({color:config.color});
        option.width(optionWidth).css({backgroundColor:config.conBgColor});
        optionUl.width(optionWidth);
        optionLi.width(optionWidth).css({color:config.conColor});
        function init(_this){
            var
                id = new Date().getTime()+'';
            optionUl.attr('id',id);
           // fleXenv.fleXcrollMain(id);
            self.find('.vscrollerbase').css({backgroundColor:config.scrollBgColor}),
            self.find('.vscrollerbar').css({backgroundColor:config.scrollBarBgColor});
        }
        //外部操作接口对象
        var options ={
        	refresh : function(id){
    			//更新内容区后刷新操作,id为下拉选框最外层的id
      		var 
      				optionE = $(id),
        			optionUlE = optionE.find('ul'),
        			optionUlId = optionUlE.attr('id');
    			optionUlE.attr('style','width:'+curWidth+'px;').attr('class',style);
        		fleXenv.fleXcrollMain(optionUlId);
        		optionE.find('.vscrollerbase').css({backgroundColor:config.scrollBgColor});
            	optionE.find('.vscrollerbar').css({backgroundColor:config.scrollBarBgColor});
        	}
        }
        self.on('click',function(event){
            event.stopPropagation();
            event.preventDefault();
        });
		selected.each(function(){
			var _this=$(this).siblings('.option');
		   $(this).on('click',function(event){
				event.stopPropagation();
				event.preventDefault();
				fuzzySearch && fuzzySearch.hide(); 
				if(!_this.is(':visible')){
					option.hide(0,function(){
						  selected.removeClass(config.curName);
					});
					$(this).addClass(config.curName);
					_this.show(0,function(){
						if(typeof  init === 'function'){
							init(_this);
							init = null;
						}
					});
				}else{
					option.hide(0,function(){
					   selected.removeClass(config.curName);
				   });
				}
			});
	    })
        optionUl.on('click','li',function(event){
            var
                cur = $(this),
                curId = cur.attr('data-id'); 
            event.stopPropagation();
            event.preventDefault();
            text.text($.trim(cur.text()));
            inputE.val($.trim(cur.text()));
            hide.val(curId)
            option.hide(0,function(){
                selected.removeClass(config.curName);
                if(typeof config.call === 'function'){
                	config.call(curId,options);
                }
            });
        });
        if($.trim(config.conHoverBgColor) !== ''){
            optionLi.on('mouseover ',function(){
                $(this).css({backgroundColor:config.conHoverBgColor});
            }).on('mouseout',function(){
                $(this).css({backgroundColor:config.conBgColor});
            });
        }
       $(document).on('click',function(event){
           option.hide(0,function(){
               selected.removeClass(config.curName);
           });
       });
    },
    /**
     * 时间轴
     */
    timeShaft : function(){
        var
            panle = $(this),
            timeContent = panle.children('.con'),
            timeShaft = panle.children('.shaft'),
            lContentCountH = 20,
            rContentCountH = 50,
            contentCountH = 0,
            lTop = 20,
            rTop = 50;
        timeContent.each(function(i,n){
            if(i%2 === 0){
                lContentCountH += $(n).outerHeight();
            }else{
                rContentCountH += $(n).outerHeight();
            }
        });
        contentCountH = Math.max(lContentCountH,rContentCountH);
        panle.height(contentCountH+51);
        timeShaft.height(contentCountH+51);
        timeContent.each(function(i,n){
            var
                cur = $(n),
                curHeight = cur.outerHeight();
            if(i%2 === 0){
                cur.css({'top':lTop+'px'});
                lTop += curHeight;
            }else{
                cur.addClass('right');
                cur.css({'top':rTop+'px'});
                rTop += curHeight;
            }
        });
    },
    /**
     * 返回指定位置
     */
    goAnyPlace : function(userConfig){
        var
            config = {
                positionE : $(document)
            }
        $.extend(config,userConfig);
        $(this).on('click',function(){
               $('body,html').animate({scrollTop:config.positionE.offset().top},200);
        });
    },
    /**
     * 复选框
     */
    freeCheckbox : function(userConfig){
        var
            config = {
                curName : 'cur'
            };
        $.extend(config,userConfig);
        $(this).parent().on('click',function(event){
    	    event.preventDefault();
            var
                cur = $(this);
                curCk = cur.find(':checkbox');
            curCk.attr('checked',(curCk.attr('checked') === undefined ?true:false));
            cur.find('.checkbox').toggleClass(config.curName);
        });
//      $(this).on('click',function(event){
//          event.preventDefault();
//          var
//              cur = $(this);
//              curCk = cur.children(':checkbox');
//          curCk.attr('checked',(curCk.attr('checked') === undefined ?true:false));
//          cur.toggleClass(config.curName);
//      });
    },
     /**
     * 输入框
     * config{
     * 	 initColor : 文本框边框初始颜色;
     *   focusColor : 文本框边框获得焦点颜色；
     * }
     */
    freeInput: function(userConfig){
        var
            config = {
                initColor : '#D2D2D2',
                focusColor : '#ADD053',
                noBorder : false
                
            }
        $.extend(config,userConfig);
        function Input(cur){
        	this.input = cur;
        }
        Input.prototype.start = function(){
        var
        	self = this.input,
	    	input = self.children('input'),
	        label = self.children('label');
	        label.show(); 
	        input.on('focus',function(){
	            var
	                cur = $(this);
	            if(!config.noBorder){
	            	cur.css({borderColor:config.focusColor});	
	            }
	            label.hide();
	        }).on('blur',function(){
	            var
	                cur = $(this);
	            if(!config.noBorder){
	            	cur.css({borderColor:config.initColor});	
	            }
	            if($.trim(cur.val()) === '' && label.show());
	        });
        }
        $(this).each(function(i,n) {    
        	new Input($(n)).start();	                                                          
        });       
    },
      /**
     * 单选框
     * config {
     *      curName : 反馈样式类名 默认'cur'，
     * 		call : 点击之后的回调函数，可接收参数有两个，第一个为选中的单选框的值，第二个为单选框的Name值,
     * }
     */
    freeRadio : function(userConfig){

    	return;
        var
            config = {
                curName : 'cur',
                call : null
            }
        $.extend(config,userConfig);
        var
            self = $(this),
            radioList = self.children('input'),
            len = radioList.length,
            radioGrounp  = [],
            tempName = '',
            index = 0;
        for(var i = 0;i<len;i++){
            radioGrounp[i] = [];
        }
        for(var m = 0;m<len;m++){
            var
                cur = radioList.eq(m),
                curName = $.trim(cur.attr('name')),
                isOk = false;
            if(m === 0){
                radioGrounp[0].push(cur);
                cur.attr('data-gr',0);
                tempName = curName;
                index = m;
                continue;
            }
            if(curName === tempName){
                radioGrounp[index].push(cur);
                cur.attr('data-gr',index);
                tempName = curName;
                continue;
            }
            for(var i = 0,l = radioGrounp.length;i<l;i++){
            	if(i === index){continue;}
                var
                    length = radioGrounp[i].length;
                if(length <= 0){
                    radioGrounp[i].push(cur);
                    cur.attr('data-gr',i);
                    index = i;
                    tempName = curName;
                    break;
                }
                for(var j = 0;j<length;j++){
                    tempName = radioGrounp[i][j].attr('name');
                    if(tempName === curName){
                        radioGrounp[i].push(cur);
                        cur.attr('data-gr',i);
                        index = i;
                        isOk = true;
                        tempName = curName;
                        break;
                    }
                }
                if(isOk){
                    isOk = false;
                    break;
                }
            }
        }
        self.on('click',function(){
            var
                cur = $(this),
                curRadio = cur.children('input'),
                index = parseInt(curRadio.attr('data-gr'));
            for(var i = 0,len = radioGrounp[index].length;i<len;i++){
                radioGrounp[index][i].attr('checked',false).parent().removeClass(config.curName)
            }
            cur.addClass(config.curName);
            curRadio.attr('checked',true);
            if(typeof config.call === 'function'){
            	config.call(curRadio.attr('value'),curRadio.attr('name'));
            }
        });
    },
    /**
     * 添加联系人
     */
 /*   addContact : function(userConfig){
    	var
    		config = {
    			con : null,
    			max :4
    		}
		$.extend(config,userConfig);
		var
			count = 0,
			cur = null;
		
		$(this).on('click',function(){
			  $(".remove").css("display","block");		
			 if(count < config.max){
				cur = config.con.clone(true);
				if(count%2 === 0){
					cur.each(function(){
						if ($(this).index()%2 == 0) {
							$(this).css({"background":"#fff"});
						}else{
							$(this).css({"background":"#f2eff1"});
						};												
					});
				}else{
					cur.each(function(){
						if ($(this).index()%2 == 1) {
							$(this).css({"background":"#f2eff1"});
						}else{
							$(this).css({"background":"#fff"});
						};
					});
				}
				cur.find('input[type="text"]').each(function(){
					var _self = $(this);
					_self.attr('name',_self.attr('name')+parseInt(count+1)).val('');
				})
			 	$(this).before(cur);
			 	count++;	
				 
			 }else{
			 	alert('最多可以添加'+(count+1)+'个人');
			 }
		});
		
    }*/
    addContact : function(userConfig){
    	var
    		config = {
    			con : null,
    			max :5
    		}
		$.extend(config,userConfig);
		var
			count = 1,
			cur = null,
			nameArray = [];
		
		$(this).on('click',function(){
			  $(".remove").css("display","block");
			  cur = config.con.clone(true);
			  cur.find('input[type="text"]').each(function(){
				  $(this).val('');
			  });
			 if(count < config.max){
				$(this).before(cur);
			 	setBgColor(1);
			 	count++;
			 	$("#count").val(count);
			 }else{
			 	alert('最多可以添加'+(count)+'个人');
			 }
		});
		//设置背景颜色
		function setBgColor(isSetValue){
			
			$('.train-repeat-con').each(function(i,n){
				if(i%2 === 0){
					$(n).css({background:'#fff'})
				}else{
					$(n).css({background:'#F1F1F1'});
				}
				if(nameArray.length === 0)
				{
					$(this).find('input[type="text"]').each(function(){
						var _self = $(this);
						nameArray.push(_self.attr('name'));
					});
				}
				if(i===0){
					$(this).find('input[type="text"]').each(function(j){
						var _self = $(this);
						(isSetValue === 1) && _self.attr('name',nameArray[j]);
					});
				}else{
					$(this).find('input[type="text"]').each(function(j){
						var _self = $(this);
						(isSetValue === 1) && _self.attr('name',nameArray[j]+i);
					});
				}
			});
		}
		//移除
		$(document).on('click','.remove',function(){
			if(confirm('确认删除？')){
				$(this).parent().parent().remove();
				setBgColor(1);
				count--;
				$("#count").val(count);
				if(count<=1){
					 $(".remove").css("display","none");
				}
			}
		});
		
    }
});
