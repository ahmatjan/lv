$().ready(function() {
 $("#base-setting").validate({
        rules: {
	   website_name:{
	   	 required: true,
	   	 rangelength:[2,25]
	   },
	   webiste_title: {
	    required: true,
	    rangelength:[2,25]
	   },
	   mate_key: {
	    required: true,
	    rangelength:[2,120]
	   },
	   mate_description: {
	    required: true,
	    rangelength:[2,255]
	   },
	   mate_author: {
	    required: true,
	    rangelength:[2,20]
	   },
	   quantity_view: {
	    required: true,
	    range:[20,60]
	   },
	   quantity_admin: {
	    required: true,
	    range:[20,60]
	   }
	  },
	        messages: {
	   website_name:{
	   	 required: "网站名不能为空！",
	   	 rangelength:"长度2——25字符之间"
	   },
	   webiste_title: {
	    required: "网站标题前缀必填",
	    rangelength:"长度2——25字符之间"
	   },
	   mate_key: {
	    required: "SEO关键词必填",
	    rangelength:"长度2——120字符之间"
	   },
	   mate_description: {
	    required: "SEO描述必填",
	    rangelength:"长度2——255字符之间"
	   },
	   mate_author: {
	    required: "SEO作者必填",
	    rangelength:"长度2——20字符之间"
	   },
	   quantity_view: {
	    required: "前台显示条数必填",
	    range:"输入值在20——60之间"
	   },
	   quantity_admin: {
	    required: "后台显示条数必填",
	    range:"输入值在20——60之间"
	   }
	  }
    });
});