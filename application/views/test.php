<?php $c='</br>'?>

<input type="text" class="username" placeholder="帐号" name="username" value="帐号"/>

<?php echo $c.$c?>

<input type="password" class="pass" placeholder="密码" name="password"/>

<?php echo $c.$c?>

<div class="bbv" style="cursor:pointer">点我提交</div>

<script>
$(document).ready(function(){
  $(".bbv").click(function(){
  	var usern=$(".username").val();
  	var pass=$(".pass").val();
  	//判断验证用户输入
  	if(usern){
		//如果用户名不为空
		if(usern.length<6 || usern.length>){
			alert("小于6");
		}
	}else{
		//如果用户名为空
		alert("用户名空");
	}
	
	/*
    $.post("user/login/ajax_login",
    {
      username: usern,
      password: pass
    },
    function(data){
      alert("数据：" + data);
    });
    */
  });
});
</script>