var curPage0,curPage1 = 1; //当前页码 
var total0,pageSize0,totalPage0,total1,pageSize1,totalPage1; //总记录数，每页显示数，总页数 
//获取数据 
function getData0(page){  
    $.ajax({ 
        type: 'POST', 
        url: 'getmessage0.php', 
        data: {'pageNum':page-1}, 
        dataType:'json', 
        beforeSend:function(){ 
        	$("#list_message0").empty();//清空数据区
            $("#list_message0").append("<tr><td>加载中...</td></tr>");//显示加载动画 
        }, 
        success:function(json){ 
            $("#list_message0").empty();//清空数据区 
            total0 = json.total; //总记录数 
            pageSize0 = json.pageSize; //每页显示条数 
            curPage0 = page; //当前页 
            totalPage0 = json.totalPage; //总页数 
            var li = ""; 
            var list = json.list; 
            $.each(list,function(index,array){ //遍历json数据列 
                li += "<tr><td>"+array['name']+"</td><td>"+array['email'] 
                +"</td><td>"+array['phone'] 
                +"</td><td>"+array['type'] 
                +"</td><td>"+array['lastdate'] 
                +"</td><td><a class='show' href='javascript:void(0)' rel='" + array['id'] + "'><input type='image' src='images/icn_search.png' title='查看'></a><a class='delete' href='javascript:void(0)' rel='" + array['id'] + "' onclick=\"if(confirm('确实要删除该条记录吗？')) return true;else return false;\"><input type='image' src='images/icn_trash.png' title='删除'></a></td></tr>"; 
            }); 
            $("#list_message0").append(li); 
        }, 
        complete:function(){ //生成分页条 
            getPageBar0(); 
        }, 
        error:function(){ 
            alert("数据加载失败"); 
        } 
    }); 
}
function getData1(page){  
    $.ajax({ 
        type: 'POST', 
        url: 'getmessage1.php', 
        data: {'pageNum':page-1}, 
        dataType:'json', 
        beforeSend:function(){ 
            $("#list_message1").empty();//清空数据区
            $("#list_message1").append("<tr><td>加载中...</td></tr>");//显示加载动画 
        }, 
        success:function(json){ 
            $("#list_message1").empty();//清空数据区 
            total1 = json.total; //总记录数 
            pageSize1 = json.pageSize; //每页显示条数 
            curPage1 = page; //当前页 
            totalPage1 = json.totalPage; //总页数 
            var li = ""; 
            var list = json.list; 
            $.each(list,function(index,array){ //遍历json数据列 
                li += "<tr><td>"+array['name']+"</td><td>"+array['email'] 
                +"</td><td>"+array['phone'] 
                +"</td><td>"+array['type'] 
                +"</td><td>"+array['lastdate'] 
                +"</td><td><a class='show' href='javascript:void(0)' rel='" + array['id'] + "'><input type='image' src='images/icn_search.png' title='查看'></a><a class='delete' href='javascript:void(0)' rel='" + array['id'] + "' onclick=\"if(confirm('确实要删除该条记录吗？')) return true;else return false;\"><input type='image' src='images/icn_trash.png' title='删除'></a></td></tr>"; 
            }); 
            $("#list_message1").append(li); 
        }, 
        complete:function(){ //生成分页条 
            getPageBar1(); 
        }, 
        error:function(){ 
            alert("数据加载失败"); 
        } 
    }); 
}
//获取分页条 
function getPageBar0(){ 
    //页码大于最大页数 
    if(curPage0>totalPage0) curPage=totalPage0; 
    //页码小于1 
    if(curPage0<1) curPage0=1; 
    pageStr = "<span>共"+total0+"条</span><span>"+curPage0
    +"/"+totalPage0+"</span>"; 
     
    //如果是第一页 
    if(curPage0==1){ 
        pageStr += "<span>首页</span><span>上一页</span>"; 
    }else{ 
        pageStr += "<span><a href='javascript:void(0)' rel='1'>首页</a></span><span><a href='javascript:void(0)' rel='"+(curPage0-1)+"'>上一页</a></span>"; 
    } 
     
    //如果是最后页 
    if(curPage0>=totalPage0){ 
        pageStr += "<span>下一页</span><span>尾页</span>"; 
    }else{ 
        pageStr += "<span><a href='javascript:void(0)' rel='"+(parseInt(curPage0)+1)+"'>下一页</a></span><span><a href='javascript:void(0)' rel='"+totalPage0+"'>尾页</a></span>"; 
    } 
         
    $("#pagecount0").html(pageStr); 
}
function getPageBar1(){ 
    //页码大于最大页数 
    if(curPage1>totalPage1) curPage1=totalPage1; 
    //页码小于1 
    if(curPage1<1) curPage=1; 
    pageStr = "<span>共"+total1+"条</span><span>"+curPage1
    +"/"+totalPage1+"</span>"; 
     
    //如果是第一页 
    if(curPage1==1){ 
        pageStr += "<span>首页</span><span>上一页</span>"; 
    }else{ 
        pageStr += "<span><a href='javascript:void(0)' rel='1'>首页</a></span><span><a href='javascript:void(0)' rel='"+(curPage1-1)+"'>上一页</a></span>"; 
    } 
     
    //如果是最后页 
    if(curPage1>=totalPage1){ 
        pageStr += "<span>下一页</span><span>尾页</span>"; 
    }else{ 
        pageStr += "<span><a href='javascript:void(0)' rel='"+(parseInt(curPage1)+1)+"'>下一页</a></span><span><a href='javascript:void(0)' rel='"+totalPage1+"'>尾页</a></span>"; 
    } 
         
    $("#pagecount1").html(pageStr); 
}

function getMessageDetail(id){
	$.ajax({ 
        type: 'POST', 
        url: 'getmessagedetail.php', 
        data: {'id':id}, 
        dataType:'json', 
        beforeSend:function(){ 
        	$("#message_detail").empty();//清空数据区
            $("#message_detail").append("<div class='message'><p>加载中...</p></div>");//显示加载动画 
            document.getElementById("post_id").value=id;
        }, 
        success:function(json){
            var list = json.list;
            var li = ""; 
            $.each(list,function(index,array){ //遍历json数据列 
                $("#message_detail").empty();//清空数据区 
                li += "<div class='message'><p><strong>" + array['name'] + "</strong>&nbsp;&nbsp;<font color='red'>【" + array['status'] + "】</font></strong></p><p><strong>" + array['phone'] + "</strong></p><p>" + array['lastdate'] + "</p><p>"+ array['comments'] +"</p></div>"; 
                li += "<div class='message'><p>【处理信息】：</p><p>" + array['process'] + "</p></div>"; 
            });
            $("#message_detail").append(li); 
            
        }, 
        error:function(){ 
            alert("数据加载失败"); 
        } 
    }); 
}

function deleteMessage(id){
    $.ajax({ 
        type: 'POST', 
        url: 'process.php?m=del', 
        data: {'post_id':id}, 
        dataType:'text', 
        success:function(){
            getData0(1);
            getData1(1);
        }, 
        error:function(){ 
            alert("数据加载失败"); 
        } 
    }); 
}

$(function(){ 
    getData0(1); 
    getData1(1); 
    $("#pagecount0 span a").live('click',function(){ 
        var rel = $(this).attr("rel"); 
        if(rel){ 
            getData0(rel); 
        } 
    });
    $("#pagecount1 span a").live('click',function(){ 
        var rel = $(this).attr("rel"); 
        if(rel){ 
            getData1(rel); 
        } 
    });

    $(".show").live('click',function(){ 
        var rel = $(this).attr("rel"); 
        if(rel){ 
            getMessageDetail(rel); 
        } 
    });

    $(".delete").live('click',function(){ 
        var rel = $(this).attr("rel"); 
        if(rel){ 
            deleteMessage(rel); 
        } 
    });

    $('#process').submit(function(){
        var action = $(this).attr('action');
        $('#submit')
            .attr('disabled','disabled');

        $.post(action, $('#process').serialize(),
            function(data){
                getMessageDetail(document.getElementById("post_id").value);
                $('#submit').attr('disabled','');
                getData0(1);
                getData1(1);
                document.getElementById("process_info").value = '';
            }
        );

        return false;

    });
}); 
