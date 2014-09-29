$(function(){
	// getjilu();
	setInterval("getjilu()",300);
	setInterval("getmessage()",100);
	setInterval("getonline()",100);
	setInterval("getoffline()",100);
	// getmessage();
	$(".logout").click(function(){

		$.ajax({
			url:"ajax.php",
			type:"POST",
			data:{flag:"logout"},
			success:function(res){
				window.location.reload();
			}
		});
		
	});


	$(document).on("click",".biaoLi",function(){
		addbiaoqing($(this));
	});


	$(".friendli").attr("huihuashow","false");
	/*好友列表上不三个按钮*/ 
	// $(".qqdiv").draggable({ containment: "parent" });
	$(".fenzuIn").click(function(){
		$(".fenzuIn").removeClass("fenzudetail");
		$(this).addClass("fenzudetail");
	});
	$(document).on("click",".friendli",function(){
		chatjilu($(this));
		showChatFrm($(this));
		$(this).find(".friendLiL").find(".redcircle").hide();
		// changesate();
	});
/*好友列表底部按钮*/ 
	$(".qqbottomli").click(function(){
		$(".qqbottomli").removeClass("qqbottomclick");
		$(this).addClass("qqbottomclick");
	});
	$("#qqbottomli1").click(function(){
		$(".qqbottomlipic").css("background-image","");
		$(this).find("#qqbottomli1pic").css("background-image",'url("Images/b1.png")');
		$(".qqbottomspan").css("color","");
		$(this).find(".qqbottomspan1").css("color","#fff");
	});
	$("#qqbottomli2").click(function(){
		$(".qqbottomlipic").css("background-image","");
		$(this).find("#qqbottomli2pic").css("background-image",'url("Images/a1.png")');
		$(".qqbottomspan").css("color","");
		$(this).find(".qqbottomspan").css("color","#fff");
	});
	$("#qqbottomli3").click(function(){
		$(".qqbottomlipic").css("background-image","");
		$(this).find("#qqbottomli3pic").css("background-image",'url("Images/c1.png")');
		$(".qqbottomspan").css("color","");
		$(this).find(".qqbottomspan").css("color","#fff");
	});
	$("#qqbottomli4").click(function(){
		$(".qqbottomlipic").css("background-image","");
		$(this).find("#qqbottomli4pic").css("background-image",'url("Images/d1.png")');
		$(".qqbottomspan").css("color","");
		$(this).find(".qqbottomspan").css("color","#fff");

	});
	/*好友分组*/ 
// var listkindnumber1=2;
	$(".friendlistkind").attr("haveopen","false");
	$(".list1").attr("haveopen","true");
	$(".friendlistkind").click(function(){
		
		var d=$(this).attr("kid");
		if($(this).attr("haveopen")=="false"){
			$(".friendlist[lid="+d+"]").show();
			$(this).attr("haveopen","true");
							}
			else{
				$(".friendlist[lid="+d+"]").hide();
				$(this).attr("haveopen","false");
			}
	});

	// 好友列表上部三个分组
	$(".fenzuIn").click(function(){
		var f=$(this).attr("FIid");
		$(".friendbody[FBid="+f+"]").show();
		$(".friendbody[FBid!="+f+"]").hide();
	});
	// // 好友列表下部四个分组
	 $(".qqbottomli").click(function(){
	 	var f=$(this).attr("BLIid");
	 	$(".BBottom[BID="+f+"]").show();
	 	$(".BBottom[BID!="+f+"]").hide();
	 });
	/*点击好友出现聊天窗体*/ 
	$(".friendli").attr("isshow","false");
	$(".friendli").attr("isadd","false");

	$(document).on("click",".windowbottombtn",function(){
		sendMessage($(this));
	});

	$(document).on("click",".qqwindow",function(){
		maxindex($(this));
	});

	$(document).on("click",".zuixiaohua",function(){
		zuixiao($(this));
		return false;
	});
	$(document).on("click",".miniwin",function(){
		normalsize($(this));

	});
	$(document).on("click",".windowclosebtn",function(){
		closewin($(this));
	});

	$(document).on("click",".delebtn",function(){
		delejilu($(this));
		return false();

	});
    
   
	$(".titleR").click(function(){
		huanfu();
		hunfuN++;
		if(hunfuN>3){
			hunfuN=0;
		}
	});

	$(document).on("click",".windowbiaoqing",function(){
		biaoqingkuang($(this));
		return false;
	});

	$(document).on("click",".closebiao",function(){
		$(".biaoqing").animate({left:"-720px"},1000);
	});
	
});
// var fromID="";
var jiluID="";
function showChatFrm(ele){

	var FId = ele.attr("fid");//好友ID
		jiluID=FId;
		$(".miniwin[miniId="+FId+"]").remove();
		//先把窗体至于最上层再return结束执行语句
		$(".qqwindow[WID="+FId+"]").css("z-index","104");
	    $(".qqwindow[WID!="+FId+"]").css("z-index","100");
		var UserName = ele.attr("username");//好友昵称
		
		var winID="Wid"+FId;
		var html="";
		html+='				<div WID='+FId+' class="qqwindow" id="'+winID+'">';//此次弹出窗体Id等于点击的好友ID
		html+='					<div class="windowtop Backcolorclass">';
		html+='						<div class="windowLbtn btnstyle">';
		html+='							<span class="windowLbtnpic"></span>';
		html+='						</div>';
		html+='						<div class="windowtopname">'+UserName+'</div>';//此次弹出窗体顶部名称就是好友昵称
		html+='						<div closeId='+FId+' class="windowclosebtn btnstyle">关闭</div>';//关闭按钮的ID等于聊天桌面的ID
		html+='						<div Zid='+FId+' class="windowclosebtn zuixiaohua btnstyle">最小化</div>';
		html+='					</div>';
		html+='					<div class="windowbody" bid='+FId+'>';//窗体聊天桌面的ID等于窗体ID
		html+='					</div>';
		html+='					<div class="windowbottom Backcolorclass">';
		html+='						<div class="windowbiaoqing" wbiaoId='+FId+'></div>';
		html+='						<input class="windowbottomtext" maxlength="4000" tid='+FId+'></input>';//输入文本的ID等于聊天桌面的ID
		html+='						<div class="windowbottombtn btnborcolor btnstyle" BtnId='+FId+'>发送</div>';//发送按钮的ID等于聊天桌面的ID
		html+='					</div>';
		html+='				</div>';
		if(ele.attr("isshow")=="false"){
			$(".bodyA").append(html);
			ele.attr("isshow","true");
			// $(".Backcolorclass").css("background","linear-gradient(#F0F0F0,#218e0c)");
		}
		else{
			$(".qqwindow[WID="+FId+"]").show();
		}
		
		$(".qqwindow[WID="+FId+"]").css("z-index","104");//将本次点击弹出的窗体至于最上层
	    $(".qqwindow[WID!="+FId+"]").css("z-index","100");
	   
		var topsize=(FId%4)*50+20;
		var leftsize=(FId%10)*10+10;
		$("#"+winID).css("top",topsize+"px");
		$("#"+winID).css("left",leftsize+"px");
		$( ".qqwindow" ).draggable({containment:"parent"});
		$(".qqwindow").draggable({ handle:".windowtopname"});
		// fromID= FId;
		// addfrmjilu();

addfrmjilu();
}
 // $(".qqwindow").draggable({ cancel: "windowclosebtn" });
var lastmessage="";
function sendMessage(ele){
	var btnId=ele.attr("BtnId");//取出本次点击的发送按钮的Id
	var message=$(".windowbottomtext[tid="+btnId+"]").val();//取出id等于发送按钮Id输入文本的文本
	for (var i =0;i<message.length/3;i++) {
		message=message.replace("[微笑]","<img src='Images/biaoqing/1.gif'/>");
		message=message.replace("[撇嘴]","<img src='Images/biaoqing/2.gif'/>");
		message=message.replace("[色]","<img src='Images/biaoqing/3.gif'/>");
		message=message.replace("[发呆]","<img src='Images/biaoqing/4.gif'/>");
		message=message.replace("[得意]","<img src='Images/biaoqing/5.gif'/>");
		message=message.replace("[流泪]","<img src='Images/biaoqing/6.gif'/>");
		message=message.replace("[害羞]","<img src='Images/biaoqing/7.gif'/>");
		message=message.replace("[闭嘴]","<img src='Images/biaoqing/8.gif'/>");
		message=message.replace("[睡]","<img src='Images/biaoqing/9.gif'/>");
		message=message.replace("[大哭","<img src='Images/biaoqing/10.gif'/>");
		message=message.replace("[尴尬]","<img src='Images/biaoqing/11.gif'/>");
		message=message.replace("[大怒]","<img src='Images/biaoqing/12.gif'/>");
		message=message.replace("[调皮]","<img src='Images/biaoqing/13.gif'/>");
		message=message.replace("[呲牙]","<img src='Images/biaoqing/14.gif'/>");
		message=message.replace("[惊讶]","<img src='Images/biaoqing/15.gif'/>");
		message=message.replace("[难过]","<img src='Images/biaoqing/16.gif'/>");
		message=message.replace("[酷]","<img src='Images/biaoqing/17.gif'/>");
		message=message.replace("[冷汗]","<img src='Images/biaoqing/18.gif'/>");
		message=message.replace("[抓狂]","<img src='Images/biaoqing/19.gif'/>");
		message=message.replace("[吐]","<img src='Images/biaoqing/20.gif'/>");
	};
	var MyName=$(".namespan").html();
	var senderpic=$(".myheadimg").attr("src");
	// alert(senderpic);
	// var MyName=$(".namespan").html();
	var html="";
	html+='						<div class="GotmessageAll">';
	html+='							<div class="GotmessageAllL">';
	html+='								<div class="sentname">'+MyName+'</div>';
	html+='								<div class="gotmessage">'+message+'</div>';//本次发送的文本添加给本次点击弹出的聊天记录
	html+='							</div>';
	html+='							<div class="GotmessageAllR">';
	html+="                          <a ><img class='senderimg' src="+senderpic+" /> </a>";
	html+='							</div>';
	html+='						</div>';
	lastmessage=$(".windowbottomtext[tid="+btnId+"]").val();
	// $(".jiluspan[jiluspanid="+btnId+"]").html(lastmessage);
	$(".windowbody[bid="+btnId+"]").append(html);//id等于发送按钮Id的聊天桌面添加聊天记录
	$(".windowbottomtext[tid="+btnId+"]").val("");
	facekind="";



	 var senderid=$(".namespan").attr("userId");
		var receiverid= btnId;
		var msg=lastmessage;
		// var msg=$(".windowbottomtext[tid="+receiverid+"]").val();
		// alert(msg);
		$.ajax({
			url:"ajax.php",
			type:"POST",
			data:{flag:'send',sendID:senderid,receiveID:receiverid,MSG:msg},
			success:function(res){
				// alert(res);
			}
		});

}

function maxindex(ele){
	var w=$(ele).attr("WID");
    jiluID=w;
	$(".qqwindow").css("z-index","100");
	$(ele).css("z-index","104");
}

function zuixiao(ele){
	var z=$(ele).attr("Zid");
	$(".qqwindow[WID="+z+"]").fadeOut();
	var html="";
	var name=$(".friendli[fid="+z+"]").attr("username");
	html+='<li class="miniwin" miniId='+z+' miniisopen="1">'+name+'</li>';
	$(".minimenu").append(html);

	$( ".minimenu" ).sortable({
      revert: true
    });
    $( "ul,li" ).disableSelection();
}

function normalsize(ele){
	var z=$(ele).attr("miniId");
	$(".qqwindow[WID="+z+"]").fadeIn();
	$(ele).hide();
}

function closewin(ele){
	var CloseID=$(ele).attr("closeId");//取出关闭按钮的Id	
	$(".qqwindow[WID="+CloseID+"]").hide();//聊天窗体的Id等于关闭按钮的关闭
	// $(".friendli[fid="+CloseID+"]").attr("isshow","false");
}

var fromname="";
function chatjilu(ele){
	var tmp = $(ele).attr("huihuashow");
	var UserName=$(ele).attr("username");
	fromname=UserName;
	var FId=$(ele).attr("fid");//好友ID
	var html="";
	html+='						<li position="relative"  class="huihuafriendli friendli "  fid='+FId+' username='+UserName+'>';
	html+='							<div class="friendLiL">';
	html+='								<a><img src="Images/head/1.jpg"/> </a>';
	html+='							</div>';
	html+='							<div class="friendLiR">';
	html+='								<div class="webname">';
	html+='									'+UserName+'';
	html+='									<span>(fisher)</span>';
	html+='								</div>';
	html+='								<div class="shuoshuo">';
	html+='									<span class="jiluspan" jiluspanid='+FId+'>[在线]</span>';
	html+='								</div>';
	html+='                       		<div class="delebtn" delebtnId='+FId+'>删除</div>';
	html+='							</div>';
	html+='						</li>';

	if($(ele).attr("huihuashow")=="false"){
		$("#huihua").append(html);
		$(ele).attr("huihuashow","true");
	}
	else{
		$(".qqwindow[WID="+FId+"]").show();
	}
}

function delejilu(ele){
	var bID=$(ele).attr("delebtnId");
	$(ele).parent().parent().remove();
	$(".qqwindow[WID="+bID+"]").remove();
	$(".friendli[fid="+bID+"]").attr("isshow","false");
	$(".friendli[fid="+bID+"]").attr("huihuashow","false");
}
 var hunfuN=1;
function huanfu(){
	$(".yangshi").attr("href","css/index"+hunfuN+".css");
}
var biaoID;
function biaoqingkuang(ele){
	$(".biaoqing").animate({left:"0px"},1000);
	biaoID=$(ele).attr("wbiaoId");
}

var facekind="";
var facemessage;
function addbiaoqing(ele){ 
	facekind+=$(ele).attr("biaoqingId");
	$(".qqwindow").each(function(){
		if($(this).css("z-index")==104)
		{
			$(this).find(".windowbottomtext").val(facekind);
		}
	});
}

function showerror(){
	$(".error").show();
}
function hideerror(){
	$(".error").hide();
}
var sender="";
function getmessage(){
	$.ajax({
		url:"ajax.php",
		type:"POST",
		data:{flag:'getmsg'},
		success:function(res){
			var objs=eval("("+res+")");
			$.each(objs,function(){
				var Content=this.msgContent;
				for(var i=0;i<Content.length;i++){
					Content=Content.replace("[微笑]","<img src='Images/biaoqing/1.gif'/>");
					Content=Content.replace("[撇嘴]","<img src='Images/biaoqing/2.gif'/>");
					Content=Content.replace("[色]","<img src='Images/biaoqing/3.gif'/>");
					Content=Content.replace("[发呆]","<img src='Images/biaoqing/4.gif'/>");
					Content=Content.replace("[得意]","<img src='Images/biaoqing/5.gif'/>");
					Content=Content.replace("[流泪]","<img src='Images/biaoqing/6.gif'/>");
					Content=Content.replace("[害羞]","<img src='Images/biaoqing/7.gif'/>");
					Content=Content.replace("[闭嘴]","<img src='Images/biaoqing/8.gif'/>");
					Content=Content.replace("[睡]","<img src='Images/biaoqing/9.gif'/>");
					Content=Content.replace("[大哭","<img src='Images/biaoqing/10.gif'/>");
					Content=Content.replace("[尴尬]","<img src='Images/biaoqing/11.gif'/>");
					Content=Content.replace("[大怒]","<img src='Images/biaoqing/12.gif'/>");
					Content=Content.replace("[调皮]","<img src='Images/biaoqing/13.gif'/>");
					Content=Content.replace("[呲牙]","<img src='Images/biaoqing/14.gif'/>");
					Content=Content.replace("[惊讶]","<img src='Images/biaoqing/15.gif'/>");
					Content=Content.replace("[难过]","<img src='Images/biaoqing/16.gif'/>");
					Content=Content.replace("[酷]","<img src='Images/biaoqing/17.gif'/>");
					Content=Content.replace("[冷汗]","<img src='Images/biaoqing/18.gif'/>");
					Content=Content.replace("[抓狂]","<img src='Images/biaoqing/19.gif'/>");
					Content=Content.replace("[吐]","<img src='Images/biaoqing/20.gif'/>");
				}
				sender=this.msgSender;
				var headpic=$(".fheadimg").attr("src");
				// var Content=this.msgContent;
				// alert(headpic);
				var html="";
				html+="<div class='receivemsg'>";
				html+="<div class='receivemsgL'><img class='frompic' src="+headpic+"  /></div>";
				html+="<div class='receivemsgR'>";
				html+="<div class='msgname'>"+fromname+"</div>";
				html+="<div class='recemessage'>"+Content+"</div>";
				html+="</div>";
				html+="</div>";
				// alert(RECEID);
				// alert("append");
				$(".windowbody[bid="+sender+"]").append(html);

				var Wopen=$(".friendli[fid="+sender+"]").attr("isshow");
				if(Wopen=="true"){
					// alert(Wopen);
					changesate();
				}
				else{
					$(".friendli[fid="+sender+"]").find(".friendLiL").find(".redcircle").show();
					// alert(Wopen);
				}
			});
			// alert(res);
			//  $(".windowbody[bid="+RECEID+"]").append(res);
			// //$(".windowbody").append(res);
		}
	});
  $(".friendli[fid="+sender+"]").attr("isadd","true");
}

 function changesate(){
 	/*alert("CHANGE");*/
	$.ajax({
		url:"ajax.php",
		type:"POST",
		data:{flag:'changesate',FromID:sender}
	});
 } 

 function getonline(){
 	$.ajax({
		url:"ajax.php",
		type:"POST",
		data:{flag:'getonline'},
		success:function(res){
			
			var array =res.split(",");
			var nums = [ ];
			for (var i=0 ; i< array.length-1 ; i++)
			{
			    nums.push(parseInt(array[i]));
			    // alert(nums[i]);
			    $(".fheadimg[ppid="+nums[i]+"]").removeClass("lixian");
			    // $(".fheadimg[ppid="+nums[i]+"]").addClass("zaixian");
			}
		}
	});
 }

function getoffline(){
 	$.ajax({
		url:"ajax.php",
		type:"POST",
		data:{flag:'getoffline'},
		success:function(res){
			
			var array1 =res.split(",");
			var nums1 = [ ];
			for (var i=0 ; i< array1.length-1 ; i++)
			{
			    nums1.push(parseInt(array1[i]));
			    // alert(nums[i]);
			    $(".fheadimg[ppid="+nums1[i]+"]").addClass("lixian");
			    //$(".fheadimg[ppid="+nums[i]+"]").addClass("zaixian");
			}
		}
	});
 }
var lastjilu="";
function getjilu(){
	var myID=$(".namespan").attr("userId");
	var chatID=jiluID;
	$.ajax({
		url:"ajax.php",
		type:"POST",
		data:{flag:'getjilu',myid:myID, chatid:chatID},
		success:function(res){
			var array=res.split(",");
			var n=array.length-2;
			lastjilu=array[n];
			$(".jiluspan[jiluspanid="+jiluID+"]").html(lastjilu);
		}
	});
}

function addfrmjilu(){
   var myID=$(".namespan").attr("userId");
   var chatID=jiluID;
   $.ajax({
	   	url:"ajax.php",
	   	type:"POST",
	   	data:{flag:'addfrmjilu',myid:myID, chatid:chatID},
	   	success:function(res){
		   		var objs=eval("("+res+")");
		   		var arrayID;
		   		var arrayCO;
		   		var arrayRE;
		   		$.each(objs,function(){
		   				arrayID=this.msgSender;
		   			 arrayCO=this.msgContent;
		   			 arrayRE=this.msgReceiver;
		   		});
		   	 if(arrayID==myID){
		   	 					if($(".friendli[fid="+arrayRE+"]").attr("isadd")=="false"){
		   	 									var MyName=$(".namespan").html();
			             var senderpic=$(".myheadimg").attr("src");
																var html="";
																html+='						<div class="GotmessageAll">';
																html+='							<div class="GotmessageAllL">';
																html+='								<div class="sentname">'+MyName+'</div>';
																html+='								<div class="gotmessage">'+arrayCO+'</div>';//本次发送的文本添加给本次点击弹出的聊天记录
																html+='							</div>';
																html+='							<div class="GotmessageAllR">';
																html+="                          <a ><img class='senderimg' src="+senderpic+" /> </a>";
																html+='							</div>';
																html+='						</div>';
																// $(".jiluspan[jiluspanid="+btnId+"]").html(lastmessage);
																$(".windowbody[bid="+arrayRE+"]").append(html);//id等于发送按钮Id的聊天桌面添加聊天记录
										     	$(".friendli[fid="+arrayRE+"]").attr("isadd","true")
		   	 					}
		   	 }else{
		   	 					if($(".friendli[fid="+arrayID+"]").attr("isadd")=="false"){
		   	 									var headpic=$(".fheadimg").attr("src");
						   	 	    var html="";
																html+="<div class='receivemsg'>";
																html+="<div class='receivemsgL'><img class='frompic' src="+headpic+" /></div>";
																html+="<div class='receivemsgR'>";
																html+="<div class='msgname'>"+fromname+"</div>";
																html+="<div class='recemessage'>"+arrayCO+"</div>";
																html+="</div>";
																html+="</div>";
																$(".windowbody[bid="+arrayID+"]").append(html);
																$(".friendli[fid="+arrayID+"]").attr("isadd","true")
		   	 					}
		   	 }
	   }
		});
}
