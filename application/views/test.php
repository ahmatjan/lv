<?php $c='</br>'?>

<input type="text" class="username" placeholder="帐号" name="username" value="帐号"/>

<?php echo $c.$c?>

<input type="password" class="pass" placeholder="密码" name="password"/>

<?php echo $c.$c?>

<div class="bbv" style="cursor:pointer">点我提交</div>

<!--
<script>
$(document).ready(function(){
  $(".bbv").click(function(){
  	
  	var usern=$(".username").val();
  	var pass=$(".pass").val();
  	
    $.post("user/login/ajax_login",
    {
      username: usern,
      password: pass
    },
    function(data,status){
      alert("数据：" + data + "\n状态：" + status);
    });
  });
});
</script>
-->
<script>
$(document).ready(function(){
  $(".bbv").click(function(){
  	var usern=$(".username").val();
  	var pass=$(".pass").val();
  	
    $.post("user/login/ajax_login",
    {
      username: usern,
      password: pass
    },
    function(data){
      alert("数据：" + data);
    });
  });
});
</script>