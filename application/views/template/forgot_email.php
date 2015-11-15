<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Demystifying Email Design</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">	
		<tr>
			<td style="padding: 10px 0 30px 0;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
					<tr>
						<td align="center" bgcolor="#70bbd9" style="background-color:#0f4e74; padding: 10px;text-align: left; color: #FFF; font-size: 18px; font-weight: bold; font-family: Arial, sans-serif;">
							<img src="<?php echo base_url('public/image/logo.png');?>" alt="Creating Email Magic" width="104" height="22" style="display: block;float: left;" />
							<span style="float: right;">找回密码</span>
						</td>
					</tr>
					<tr>
						<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
										<b>xxxcc：你好!</b>
									</td>
								</tr>
								<tr>
									<td style="padding: 20px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
										这是一封来自【旅行兔网站】的邮件，你收到这封邮件是因为你提交了一个找回密码的申请，<a href="<?php echo site_url($token)?>">修改密码请单击此处</a><br/><br/>如果不能打开链接，你可以把下页的链接复制到浏览器打开<br/><?php echo site_url($token)?><br/><br/>如果不是你本人操作，请忽略！<br/>系统邮件，请勿回复！
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td bgcolor="#ee4c50" style="padding: 10px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
										<font color="#ffffff">2013 &copy; 旅行兔版权所有！|滇ICP备15003514号-1</font>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>