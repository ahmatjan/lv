/*--------------------------------------------------------------
--省的字段是：province
--市的字段是：city
--县的字段是：area
-----------------------------------------------------------------
<script>
$(function(){
	$.linkage({ 
		province: "#province1",		//雪花的最小尺寸
		city: "#city1", 	//雪花的最大尺寸
		area: #area1		//雪花出现的频率 这个数值越小雪花越多
	});
});
</script>
*/
(function($){
	//资源载入完成，用ajax去调省市三级联动
	$.fn.linkage = function(options){
		
		if (document.getElementById(options.province)!=undefined || document.getElementById(options.city)!=undefined || document.getElementById(options.area)!=undefined){
			//先判断对应的三级联动的id是否存在
			$.get(location.protocol+"//"+window.location.host+"/common/linkages/province",function(data){
				//调省
				//var obj=eval(data);
				var data = JSON.parse(data);
				var shen = data.shen;
				var province = data.province;
				
				var p_value='"';
				var p_length = province.length;
				
				for(var i=0;i<p_length;i++){
					if(province[i]['name'] == shen){
						$("#"+options.province).append("<option value="+p_value+province[i]['code']+p_value+" selected="+p_value+"selected"+p_value+">"+province[i]['name']+"</option>");
					}else{
						$("#"+options.province).append("<option value="+p_value+province[i]['code']+p_value+">"+province[i]['name']+"</option>");
					}
				}
			
		    });
		    
		    //当省改变的时候，调市
		}else{
			console.log('p/c/a不存在');
		}
	};
})(jQuery);