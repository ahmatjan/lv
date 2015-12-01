	<!-- BEGIN CONTAINER -->   
	<div class="page-container row-fluid">

		<!-- BEGIN SIDEBAR -->

		<?php $this->public_section->get_column_left();?>

		<!-- END SIDEBAR -->

		<!-- BEGIN PAGE -->

		<div class="page-content">

			<!-- BEGIN PAGE CONTAINER-->

			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->

				<?php $this->public_section->get_user_page_header();?>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid profile">

					<div class="span12">

						<!--BEGIN TABS-->

						<div class="tabbable tabbable-custom tabbable-full-width">

							<ul class="nav nav-tabs">

								<?php if ($tab_position === 'tab_1_1' || $tab_position == NULL): ?>
								<li class="active">
								<?php else: ?>
								<li>
								<?php endif; ?>
								<a href="#tab_1_1" data-toggle="tab">个人信息</a>
								</li>

								<?php if ($tab_position === 'tab_1_3'): ?>
								<li class="active">
								<?php else: ?>
								<li>
								<?php endif; ?>
								<a href="#tab_1_3" data-toggle="tab">资料修改</a>
								</li>

								<?php if ($tab_position === 'tab_1_4'): ?>
								<li class="active">
								<?php else: ?>
								<li>
								<?php endif; ?>
								<a href="#tab_1_4" data-toggle="tab">交易管理</a>
								</li>

								<?php if ($tab_position === 'tab_1_6'): ?>
								<li class="active">
								<?php else: ?>
								<li>
								<?php endif; ?>
								<a href="#tab_1_6" data-toggle="tab">帮助</a>
								</li>

							</ul>

							<div class="tab-content">
							
								<?php if($tab_position === 'tab_1_1' || $tab_position == NULL):?>

								<div class="tab-pane row-fluid active" id="tab_1_1">
								<?php else:?>
								<div class="tab-pane row-fluid" id="tab_1_1">
								<?php endif;?>
								
									<div class="span12 user-info1">
									
										<ul class="unstyled profile-nav span3 user_portrait">

											<li><img class="lazy portrait" data-original="<?php echo $user_image?>" alt="<?php echo $nick_name?>" /> <a data-toggle="modal" href="#portrait" class="profile-edit">编辑</a></li>

											<li><a href="#">我的好友<span>3</span></a></li>

										</ul>
										
										<div class="row-fluid span9">

											<div class="span8 profile-info">

												<h1><?php echo $nick_name?></h1>

												<p><?php echo isset($user_infos['signature']) ? $user_infos['signature'] : '你还没有设置简介...<a href="'.site_url('user?tab_position=tab_1_3').'">点此设置</a>' ;?></p>

												<!--<p><a href="#">www.mywebsite.com</a></p>-->

												<ul class="unstyled inline">

													<li><i class="icon-map-marker"></i><?php echo isset($user_infos['hobby']) ? $user_infos['hobby'] : '请完善...' ;?></li>

													<li><i class="icon-calendar"></i><?php echo isset($user_infos['birthday']) ? $user_infos['birthday'] : '请完善...' ;?></li>

													<li><i class="icon-briefcase"></i><?php echo isset($user_infos['job']) ? $user_infos['job'] : '请完善...' ;?></li>

													<li><i class="icon-star"></i><?php echo isset($user_infos['location']) ? $user_infos['location'] : '请完善...' ;?></li>

													<li><i class="icon-heart"></i>资料完善度：20%</li>

												</ul>

											</div>

											<!--end span8-->

											<div class="span4">

												<div class="portlet sale-summary">

													<div class="portlet-title">

														<div class="caption">统计信息</div>

														<div class="tools">

															<a class="reload" href="javascript:;"></a>

														</div>

													</div>

													<ul class="unstyled">

														<li>

															<span class="sale-info">发表文章<i class="icon-img-up"></i></span> 

															<span class="sale-num">23</span>

														</li>

														<li>

															<span class="sale-info">文章访客<i class="icon-img-down"></i></span> 

															<span class="sale-num">87</span>

														</li>

														<li>

															<span class="sale-info">回复总数</span> 

															<span class="sale-num">2377</span>

														</li>

														<li>

															<span class="sale-info">个人主页访客</span> 

															<span class="sale-num">$37.990</span>

														</li>

													</ul>

												</div>

											</div>

											<!--end span4-->

										</div>

										<!--end row-fluid-->
									
									</div>

									<div class="span12" style="margin:0">

										<div class="tabbable tabbable-custom tabbable-custom-profile">

											<ul class="nav nav-tabs">

												<li class="active"><a href="#tab_1_11" data-toggle="tab">我的文章</a></li>

												<li class=""><a href="#tab_1_22" data-toggle="tab">我的动态</a></li>

											</ul>

											<div class="tab-content">

												<div class="tab-pane active" id="tab_1_11">

													<div class="portlet-body" style="display: block;">

														<table class="table table-striped table-bordered table-advance table-hover">

															<thead>

																<tr>

																	<th><i class="icon-briefcase"></i> Company</th>

																	<th class="hidden-phone"><i class="icon-question-sign"></i> Descrition</th>

																	<th><i class="icon-bookmark"></i> Amount</th>

																	<th></th>

																</tr>

															</thead>

															<tbody>

																<tr>

																	<td><a href="#">Pixel Ltd</a></td>

																	<td class="hidden-phone">Server hardware purchase</td>

																	<td>52560.10$ <span class="label label-success label-mini">Paid</span></td>

																	<td><a class="btn mini green-stripe" href="#">View</a></td>

																</tr>

																<tr>

																	<td>

																		<a href="#">

																		Smart House

																		</a>  

																	</td>

																	<td class="hidden-phone">Office furniture purchase</td>

																	<td>5760.00$ <span class="label label-warning label-mini">Pending</span></td>

																	<td><a class="btn mini blue-stripe" href="#">View</a></td>

																</tr>

																<tr>

																	<td>

																		<a href="#">

																		FoodMaster Ltd

																		</a>

																	</td>

																	<td class="hidden-phone">Company Anual Dinner Catering</td>

																	<td>12400.00$ <span class="label label-success label-mini">Paid</span></td>

																	<td><a class="btn mini blue-stripe" href="#">View</a></td>

																</tr>

																<tr>

																	<td>

																		<a href="#">

																		WaterPure Ltd

																		</a>

																	</td>

																	<td class="hidden-phone">Payment for Jan 2013</td>

																	<td>610.50$ <span class="label label-danger label-mini">Overdue</span></td>

																	<td><a class="btn mini red-stripe" href="#">View</a></td>

																</tr>

																<tr>

																	<td><a href="#">Pixel Ltd</a></td>

																	<td class="hidden-phone">Server hardware purchase</td>

																	<td>52560.10$ <span class="label label-success label-mini">Paid</span></td>

																	<td><a class="btn mini green-stripe" href="#">View</a></td>

																</tr>

																<tr>

																	<td>

																		<a href="#">

																		Smart House

																		</a>  

																	</td>

																	<td class="hidden-phone">Office furniture purchase</td>

																	<td>5760.00$ <span class="label label-warning label-mini">Pending</span></td>

																	<td><a class="btn mini blue-stripe" href="#">View</a></td>

																</tr>

																<tr>

																	<td>

																		<a href="#">

																		FoodMaster Ltd

																		</a>

																	</td>

																	<td class="hidden-phone">Company Anual Dinner Catering</td>

																	<td>12400.00$ <span class="label label-success label-mini">Paid</span></td>

																	<td><a class="btn mini blue-stripe" href="#">View</a></td>

																</tr>

															</tbody>

														</table>

													</div>

												</div>

												<!--tab-pane-->

												<div class="tab-pane" id="tab_1_22">

													<div class="tab-pane active" id="tab_1_1_1">

														<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">

															<ul class="feeds">

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-success">                        

																					<i class="icon-bell"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					You have 4 pending tasks.

																					<span class="label label-important label-mini">

																					Take action 

																					<i class="icon-share-alt"></i>

																					</span>

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			Just now

																		</div>

																	</div>

																</li>

																<li>

																	<a href="#">

																		<div class="col1">

																			<div class="cont">

																				<div class="cont-col1">

																					<div class="label label-success">                        

																						<i class="icon-bell"></i>

																					</div>

																				</div>

																				<div class="cont-col2">

																					<div class="desc">

																						New version v1.4 just lunched!   

																					</div>

																				</div>

																			</div>

																		</div>

																		<div class="col2">

																			<div class="date">

																				20 mins

																			</div>

																		</div>

																	</a>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-important">                      

																					<i class="icon-bolt"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					Database server #12 overloaded. Please fix the issue.                      

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			24 mins

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-info">                        

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			30 mins

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-success">                        

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			40 mins

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-warning">                        

																					<i class="icon-plus"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New user registered.                

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			1.5 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-success">                        

																					<i class="icon-bell-alt"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					Web server hardware needs to be upgraded. 

																					<span class="label label-inverse label-mini">Overdue</span>             

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			2 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label">                       

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			3 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-warning">                        

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			5 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-info">                        

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			18 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label">                       

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			21 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-info">                        

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			22 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label">                       

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			21 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-info">                        

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			22 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label">                       

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			21 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-info">                        

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			22 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label">                       

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			21 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-info">                        

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			22 hours

																		</div>

																	</div>

																</li>

															</ul>

														</div>

													</div>

												</div>

												<!--tab-pane-->

											</div>

										</div>

									</div>

									<!--end span9-->

								</div>

								<!--end tab-pane-->
								
								<?php if($tab_position === 'tab_1_3'):?>

								<div class="tab-pane row-fluid profile-account active" id="tab_1_3">
								<?php else:?>
								<div class="tab-pane row-fluid profile-account" id="tab_1_3">

								<?php endif;?>

									<div class="row-fluid">

										<div class="span12">

											<div class="span3">

												<ul class="ver-inline-menu tabbable margin-bottom-10">

													<li class="active">

														<a data-toggle="tab" href="#tab_1-1">

														<i class="icon-cog"></i> 

														基本信息

														</a> 

														<span class="after"></span>                                    

													</li>

													<li class=""><a data-toggle="tab" href="#tab_3-3"><i class="icon-lock"></i>修改密码</a></li>

													<li class=""><a data-toggle="tab" href="#tab_4-4"><i class="icon-eye-open"></i>隐私设置</a></li>

												</ul>

											</div>

											<div class="span9">

												<div class="tab-content">

													<div id="tab_1-1" class="tab-pane active">

														<div style="height: auto;" id="accordion1-1" class="accordion collapse">

															<form action="<?php echo site_url('user/user_center/edit_userinfo')?>" method="post" enctype="multipart/form-data">

																<label class="control-label">用户名<span style="color:#B5B1B1">用于登陆且不可修改！</span></label>

																<?php if($user_infos['username_edit'] == '0' && $user_infos['register_style'] !== 'user_name' && $user_infos['register_style'] !== 'email'):?>
																<input type="text" placeholder="第三方登陆用户可以修改一次..." value="<?php echo $user_name?>" class="m-wrap span12" name="user_name" title="第三方登陆用户可以修改一次"/>
																<?php else:?>
																<input type="text" placeholder="用于登陆且不可修改..." value="<?php echo $user_name?>" disabled="true" class="m-wrap span12" name="user_name" />
																<?php endif;?>
																
																<label class="control-label">邮箱</label>

																<input type="text" placeholder="填写你的邮箱..." class="m-wrap span12" value="<?php echo $email;?>" name="email"/>
																
																<label class="control-label">微信</label>

																<input type="text" placeholder="填写你的微信号..." class="m-wrap span12" value="<?php echo $wechat;?>" name="wechat"/>
																
																<label class="control-label">QQ</label>

																<input type="text" placeholder="填写你的QQ号..." class="m-wrap span12" value="<?php echo $qq ;?>" name="qq" />

																<label class="control-label">昵称</label>

																<input type="text" placeholder="填写你的昵称..." class="m-wrap span12" value="<?php echo $nick_name;?>" name="nick_name"/>

																<label class="control-label">手机号</label>

																<input type="text" placeholder="填写你的手机号..." class="m-wrap span12" value="<?php echo $mobile?>" name="mobile"/>
																
																<label class="control-label">兴趣爱好</label>

																<input type="text" placeholder="请填写你的兴趣爱好..." class="m-wrap span12" value="<?php echo $hobby;?>" name="hobby"/>

																<label class="control-label">职业</label>

																<input type="text" placeholder="请填写你的职业..." class="m-wrap span12" value="<?php echo $job; ?>" name="job"/>

																<label class="control-label">所在地</label>

																<div class="controls">

																	<div class="selectList"> 
																	<select class="province span4" name="location[]"> 
																	<option>请选择</option> 
																	</select> 
																	<select class="city span4" name="location[]"> 
																	<option>请选择</option> 
																	</select> 
																	<select class="district span4" name="location[]"> 
																	<option>请选择</option> 
																	</select> 
																	</div>

																	<p class="help-block"><span class="muted">省->市->县</span></p>

																</div>
																
																<label class="control-label">生日</label>
																<div class="ymdselect">
																<?php if(!empty($birthday)):?>
																<select name="year">
																<option value="<?php echo date('Y',strtotime($birthday))?>"><?php echo date('Y',strtotime($birthday))?></option>
																</select>
																<select name="month">
																<option value="<?php echo date('m',strtotime($birthday))?>"><?php echo date('m',strtotime($birthday))?></option>
																</select>
																<select name="day">
																<option value="<?php echo date('d',strtotime($birthday))?>"><?php echo date('d',strtotime($birthday))?></option>
																</select>
																<?php else:?>
																<select name="year"><option>年</option></select>
																<select name="month"><option>月</option></select>
																<select name="day"><option>日</option></select>
																<?php endif;?>
																</div>

																<label class="control-label">个人简介</label>

																<textarea class="span12 m-wrap" rows="3" placeholder="个人简介（个性签名）..." name="signature"><?php echo $signature?></textarea>

																<label class="control-label">个人博客</label>

																<input type="text" placeholder="填写QQ空间、新浪博客或微博的链接..." class="m-wrap span12" value="<?php echo $blog?>" name="blog"/>

																<div class="submit-btn">
																
																	<input type="hidden" value="<?php echo $user_infos['user_name']?>" name="old_user_name"/>

																	<button type="submit" class="btn green">保存</button>

																	<button type="reset" class="btn">取消</button>

																</div>

															</form>

														</div>

													</div>

													<div id="tab_3-3" class="tab-pane">

														<div style="height: auto;" id="accordion3-3" class="accordion collapse">

															<form action="#">

																<label class="control-label">当前密码</label>

																<input type="password" class="m-wrap span8" />

																<label class="control-label">新密码</label>

																<input type="password" class="m-wrap span8" />

																<label class="control-label">确认新密码</label>

																<input type="password" class="m-wrap span8" />

																<div class="submit-btn">

																	<a href="#" class="btn green">修改密码</a>

																	<a href="#" class="btn">取消</a>

																</div>

															</form>

														</div>

													</div>

													<div id="tab_4-4" class="tab-pane">

														<div style="height: auto;" id="accordion4-4" class="accordion collapse">

															<form action="#">

																<div class="profile-settings row-fluid">

																	<div class="span9">

																		<p>关闭个人空间，不允许任何人查看我的个人主页</p>

																	</div>

																	<div class="control-group span3">

																		<div class="controls">

																			<label class="radio">

																			<input type="radio" name="optionsRadios1" value="option1" />

																			是

																			</label>

																			<label class="radio">

																			<input type="radio" name="optionsRadios1" value="option2" checked />

																			否

																			</label>  

																		</div>

																	</div>

																</div>

																<!--end profile-settings-->

																<div class="profile-settings row-fluid">

																	<div class="span9">

																		<p>什么人可以搜索到我</p>

																	</div>

																	<div class="control-group span3">

																		<div class="controls">

																			<label class="checkbox">

																			<input type="checkbox" value="" /> 所有人

																			</label>

																			<label class="checkbox">

																			<input type="checkbox" value="" /> 好友

																			</label>

																		</div>

																	</div>

																</div>

																<!--end profile-settings-->

																<div class="profile-settings row-fluid">

																	<div class="span9">

																		<p>加我为好友需要确认</p>

																	</div>

																	<div class="control-group span3">

																		<div class="controls">

																			<label class="checkbox">

																			<input type="checkbox" value="" /> 是

																			</label>

																		</div>

																	</div>

																</div>

																<!--end profile-settings-->

																<div class="profile-settings row-fluid">

																	<div class="span9">

																		<p>允许转载我的文章及图片</p>

																	</div>

																	<div class="control-group span3">

																		<div class="controls">

																			<label class="checkbox">

																			<input type="checkbox" value="" /> 是

																			</label>

																		</div>

																	</div>

																</div>

																<!--end profile-settings-->

																<div class="profile-settings row-fluid">

																	<div class="span9">

																		<p>让搜索引擎可以抓取我的文章</p>

																	</div>

																	<div class="control-group span3">

																		<div class="controls">

																			<label class="checkbox">

																			<input type="checkbox" value="" /> 是

																			</label>

																		</div>

																	</div>

																</div>

																<!--end profile-settings-->

																<div class="space5"></div>

																<div class="submit-btn">

																	<a href="#" class="btn green">保存</a>

																	<a href="#" class="btn">取消</a>

																</div>

															</form>

														</div>

													</div>

												</div>

											</div>

											<!--end span9-->                                   

										</div>

									</div>

								</div>

								<!--end tab-pane-->
								
								<?php if($tab_position == 'tab_1_4'):?>

								<div class="tab-pane active" id="tab_1_4">
								<?php else:?>
								<div class="tab-pane" id="tab_1_4">
								<?php endif;?>

									<div class="row-fluid add-portfolio">

										<div class="pull-left">

											<span>502 Items sold this week</span>

										</div>

										<div class="pull-left">

											<a href="#" class="btn icn-only green">Add a new Project <i class="m-icon-swapright m-icon-white"></i></a>                          

										</div>

									</div>

									<!--end add-portfolio-->

									<div class="row-fluid portfolio-block">

										<div class="span5 portfolio-text">

											<img src="<?php echo base_url('public/image/logo_metronic.jpg')?>" alt="" />

											<div class="portfolio-text-info">

												<h4>Metronic - Responsive Template</h4>

												<p>Lorem ipsum dolor sit consectetuer adipiscing elit.</p>

											</div>

										</div>

										<div class="span5" style="overflow:hidden;">

											<div class="portfolio-info">

												Today Sold

												<span>187</span>

											</div>

											<div class="portfolio-info">

												Total Sold

												<span>1789</span>

											</div>

											<div class="portfolio-info">

												Earns

												<span>$37.240</span>

											</div>

										</div>

										<div class="span2 portfolio-btn">

											<a href="#" class="btn bigicn-only"><span>Manage</span></a>                      

										</div>

									</div>

									<!--end row-fluid-->

									<div class="row-fluid portfolio-block">

										<div class="span5 portfolio-text">

											<img src="<?php echo base_url('public/image/logo_azteca.jpg')?>" alt="" />

											<div class="portfolio-text-info">

												<h4>Metronic - Responsive Template</h4>

												<p>Lorem ipsum dolor sit consectetuer adipiscing elit.</p>

											</div>

										</div>

										<div class="span5">

											<div class="portfolio-info">

												Today Sold

												<span>24</span>

											</div>

											<div class="portfolio-info">

												Total Sold

												<span>660</span>

											</div>

											<div class="portfolio-info">

												Earns

												<span>$7.060</span>

											</div>

										</div>

										<div class="span2 portfolio-btn">

											<a href="#" class="btn bigicn-only"><span>Manage</span></a>                      

										</div>

									</div>

									<!--end row-fluid-->

									<div class="row-fluid portfolio-block">

										<div class="span5 portfolio-text">

											<img src="<?php echo base_url('public/image/logo_conquer.jpg')?>" alt="" />

											<div class="portfolio-text-info">

												<h4>Metronic - Responsive Template</h4>

												<p>Lorem ipsum dolor sit consectetuer adipiscing elit.</p>

											</div>

										</div>

										<div class="span5" style="overflow:hidden;">

											<div class="portfolio-info">

												Today Sold

												<span>24</span>

											</div>

											<div class="portfolio-info">

												Total Sold

												<span>975</span>

											</div>

											<div class="portfolio-info">

												Earns

												<span>$21.700</span>

											</div>

										</div>

										<div class="span2 portfolio-btn">

											<a href="#" class="btn bigicn-only"><span>Manage</span></a>                      

										</div>

									</div>

									<!--end row-fluid-->

								</div>

								<!--end tab-pane-->
								
								<?php if($tab_position == 'tab_1_6'):?>
								<div class="tab-pane row-fluid active" id="tab_1_6">
								<?php else:?>

								<div class="tab-pane row-fluid" id="tab_1_6">
								
								<?php endif;?>

									<div class="row-fluid">

										<div class="span12">

											<div class="span3">

												<ul class="ver-inline-menu tabbable margin-bottom-10">

													<li class="active">

														<a data-toggle="tab" href="#tab_1">

														<i class="icon-briefcase"></i> 

														General Questions

														</a> 

														<span class="after"></span>                                    

													</li>

													<li><a data-toggle="tab" href="#tab_2"><i class="icon-group"></i> Membership</a></li>

													<li><a data-toggle="tab" href="#tab_3"><i class="icon-leaf"></i> Terms Of Service</a></li>

													<li><a data-toggle="tab" href="#tab_1"><i class="icon-info-sign"></i> License Terms</a></li>

													<li><a data-toggle="tab" href="#tab_2"><i class="icon-tint"></i> Payment Rules</a></li>

													<li><a data-toggle="tab" href="#tab_3"><i class="icon-plus"></i> Other Questions</a></li>

												</ul>

											</div>

											<div class="span9">

												<div class="tab-content">

													<div id="tab_1" class="tab-pane active">

														<div style="height: auto;" id="accordion1" class="accordion collapse">

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_1" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">

																	Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ?

																	</a>

																</div>

																<div class="accordion-body collapse in" id="collapse_1">

																	<div class="accordion-inner">

																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.

																	</div>

																</div>

															</div>

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_2" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">

																	Pariatur cliche reprehenderit enim eiusmod highr brunch ?

																	</a>

																</div>

																<div class="accordion-body collapse" id="collapse_2">

																	<div class="accordion-inner">

																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.

																	</div>

																</div>

															</div>

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_3" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">

																	Food truck quinoa nesciunt laborum eiusmod nim eiusmod high life accusamus  ?

																	</a>

																</div>

																<div class="accordion-body collapse" id="collapse_3">

																	<div class="accordion-inner">

																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.

																	</div>

																</div>

															</div>

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_4" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">

																	High life accusamus terry richardson ad ?

																	</a>

																</div>

																<div class="accordion-body collapse" id="collapse_4">

																	<div class="accordion-inner">

																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.

																	</div>

																</div>

															</div>

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_5" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">

																	Reprehenderit enim eiusmod high life accusamus terry quinoa nesciunt laborum eiusmod ?

																	</a>

																</div>

																<div class="accordion-body collapse" id="collapse_5">

																	<div class="accordion-inner">

																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.

																	</div>

																</div>

															</div>

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_6" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">

																	Wolf moon officia aute non cupidatat skateboard dolor brunch ?

																	</a>

																</div>

																<div class="accordion-body collapse" id="collapse_6">

																	<div class="accordion-inner">

																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.

																	</div>

																</div>

															</div>

														</div>

													</div>

													<div id="tab_2" class="tab-pane">

														<div style="height: auto;" id="accordion2" class="accordion collapse">

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_2_1" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">

																	Cliche reprehenderit, enim eiusmod high life accusamus enim eiusmod ?

																	</a>

																</div>

																<div class="accordion-body collapse in" id="collapse_2_1">

																	<div class="accordion-inner">

																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.

																	</div>

																</div>

															</div>

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_2_2" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">

																	Pariatur cliche reprehenderit enim eiusmod high life non cupidatat skateboard dolor brunch ?

																	</a>

																</div>

																<div class="accordion-body collapse" id="collapse_2_2">

																	<div class="accordion-inner">

																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.

																	</div>

																</div>

															</div>

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_2_3" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">

																	Food truck quinoa nesciunt laborum eiusmod ?

																	</a>

																</div>

																<div class="accordion-body collapse" id="collapse_2_3">

																	<div class="accordion-inner">

																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.

																	</div>

																</div>

															</div>

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_2_4" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">

																	High life accusamus terry richardson ad squid enim eiusmod high ?

																	</a>

																</div>

																<div class="accordion-body collapse" id="collapse_2_4">

																	<div class="accordion-inner">

																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.

																	</div>

																</div>

															</div>

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_2_5" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">

																	Reprehenderit enim eiusmod high life accusamus terry quinoa nesciunt laborum eiusmod ?

																	</a>

																</div>

																<div class="accordion-body collapse" id="collapse_2_5">

																	<div class="accordion-inner">

																		<p>

																			Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.

																		</p>

																		<p> 

																			moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmodBrunch 3 wolf moon tempor

																		</p>

																	</div>

																</div>

															</div>

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_2_6" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">

																	Wolf moon officia aute non cupidatat skateboard dolor brunch ?

																	</a>

																</div>

																<div class="accordion-body collapse" id="collapse_2_6">

																	<div class="accordion-inner">

																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.

																	</div>

																</div>

															</div>

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_2_7" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">

																	Reprehenderit enim eiusmod high life accusamus terry quinoa nesciunt laborum eiusmod ?

																	</a>

																</div>

																<div class="accordion-body collapse" id="collapse_2_7">

																	<div class="accordion-inner">

																		<p>

																			Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.

																		</p>

																		<p> 

																			moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmodBrunch 3 wolf moon tempor

																		</p>

																	</div>

																</div>

															</div>

														</div>

													</div>

													<div id="tab_3" class="tab-pane">

														<div style="height: auto;" id="accordion3" class="accordion collapse">

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_3_1" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">

																	Cliche reprehenderit, enim eiusmod ?

																	</a>

																</div>

																<div class="accordion-body collapse in" id="collapse_3_1">

																	<div class="accordion-inner">

																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.

																	</div>

																</div>

															</div>

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_3_2" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">

																	Pariatur skateboard dolor brunch ?

																	</a>

																</div>

																<div class="accordion-body collapse" id="collapse_3_2">

																	<div class="accordion-inner">

																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.

																	</div>

																</div>

															</div>

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_3_3" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">

																	Food truck quinoa nesciunt laborum eiusmod ?

																	</a>

																</div>

																<div class="accordion-body collapse" id="collapse_3_3">

																	<div class="accordion-inner">

																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.

																	</div>

																</div>

															</div>

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_3_4" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">

																	High life accusamus terry richardson ad squid enim eiusmod high ?

																	</a>

																</div>

																<div class="accordion-body collapse" id="collapse_3_4">

																	<div class="accordion-inner">

																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.

																	</div>

																</div>

															</div>

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_3_5" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">

																	Reprehenderit enim eiusmod high  eiusmod ?

																	</a>

																</div>

																<div class="accordion-body collapse" id="collapse_3_5">

																	<div class="accordion-inner">

																		<p>

																			Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.

																		</p>

																		<p> 

																			moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmodBrunch 3 wolf moon tempor

																		</p>

																	</div>

																</div>

															</div>

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_3_6" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">

																	Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ?

																	</a>

																</div>

																<div class="accordion-body collapse" id="collapse_3_6">

																	<div class="accordion-inner">

																		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.

																	</div>

																</div>

															</div>

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_3_7" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">

																	Reprehenderit enim eiusmod high life accusamus aborum eiusmod ?

																	</a>

																</div>

																<div class="accordion-body collapse" id="collapse_3_7">

																	<div class="accordion-inner">

																		<p>

																			Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.

																		</p>

																		<p> 

																			moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmodBrunch 3 wolf moon tempor

																		</p>

																	</div>

																</div>

															</div>

															<div class="accordion-group">

																<div class="accordion-heading">

																	<a href="#collapse_3_8" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">

																	Reprehenderit enim eiusmod high life accusamus terry quinoa nesciunt laborum eiusmod ?

																	</a>

																</div>

																<div class="accordion-body collapse" id="collapse_3_8">

																	<div class="accordion-inner">

																		<p>

																			Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.

																		</p>

																		<p> 

																			moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmodBrunch 3 wolf moon tempor

																		</p>

																	</div>

																</div>

															</div>

														</div>

													</div>

												</div>

											</div>

											<!--end span9-->                                   

										</div>

									</div>

								</div>

								<!--end tab-pane-->

							</div>

						</div>

						<!--END TABS-->

					</div>

				</div>

				<!-- END PAGE CONTENT-->

			</div>

			<!-- END PAGE CONTAINER--> 

		</div>

		<!-- END PAGE -->    
		</div>
	</div>
	
	<div id="portrait" class="modal hide fade" tabindex="-1" data-replace="true" style="width:511px">

		<div class="modal-header">

			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

			<h3>修改头像</h3>

		</div>

		<div class="modal-body">

			<div class="container">
				<div class="imageBox">
					<div class="thumbBox"></div>
					<div class="spinner" style="display: none">Loading...</div>
				</div>
				<div class="action"> 
				<!-- <input type="file" id="file" style=" width: 200px">-->
				<div class="new-contentarea tc"> <a href="javascript:void(0)" class="upload-img">
					<label for="upload-file">上传图像</label>
					</a>
					<input type="file" class="" name="upload-file" id="upload-file" />
				</div>
				<input type="button" id="btnCrop"  class="Btnsty_peyton" value="裁切">
				<input type="button" id="btnZoomIn" class="Btnsty_peyton" value="+"  >
				<input type="button" id="btnZoomOut" class="Btnsty_peyton" value="-" >
				</div>
				<div class="cropped"></div>
				</div>

		</div>

		<div class="modal-footer">

			<button type="button" data-dismiss="modal" id="submit-portrait" class="btn blue">确认提交</button>

		</div>

	</div>
	
	<!--头像上传-->
	<script src="<?php echo base_url('public/min/?f=public/js/loading/portrait.js')?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/min/?f=public/js/loading/portrait_app.js')?>" type="text/javascript"></script>
	<!--头像上传-->

	<!-- END CONTAINER -->

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.slimscroll.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.blockui.min.js')?>" type="text/javascript"></script>  

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.cookie.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.uniform.min.js')?>" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script type="text/javascript" src="<?php echo base_url('public/min/?f=public/js/bootstrap-fileupload.js')?>"></script>

	<script type="text/javascript" src="<?php echo base_url('public/min/?f=public/js/chosen.jquery.min.js')?>"></script>
	
	<script src="<?php echo base_url('public/min/?f=public/js/loading/linkage.js')?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/min/?f=public/js/loading/ymdselect.js')?>" type="text/javascript"></script>

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="<?php echo base_url('public/min/?f=public/js/app.js')?>"></script>      

	<!-- END PAGE LEVEL SCRIPTS -->
	<script>

		jQuery(document).ready(function() {       

		   // initiate layout and plugins

		   App.init();

		});

	</script>

	<!-- END JAVASCRIPTS -->

<!-- END BODY -->

</html>