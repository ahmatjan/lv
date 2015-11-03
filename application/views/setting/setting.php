	<!-- 1BEGIN CONTAINER -->   

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

						<!-- BEGIN SAMPLE FORM PORTLET-->   

						<div class="portlet box blue">

							<div class="portlet-title">

								<div class="caption"><i class="icon-reorder"></i><?php echo $text_select?></div>

							</div>

							<!--BEGIN TABS-->

							<div class="tabbable tabbable-custom" style="margin-bottom: 0">

								<ul class="nav nav-tabs" style="background-color: #FFF">

									<?php if ($tab_position === 'tab_1_1' || $tab_position == NULL): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_1" data-toggle="tab">基础设置</a>
									</li>

									<?php if ($tab_position === 'tab_1_2'): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_2" data-toggle="tab">后台左栏</a>
									</li>

									<?php if ($tab_position === 'tab_1_3'): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_3" data-toggle="tab">帮助左栏</a>
									</li>
									
									<?php if ($tab_position === 'tab_1_4'): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_4" data-toggle="tab">前台顶部</a>
									</li>
									
									<?php if ($tab_position === 'tab_1_5'): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_5" data-toggle="tab">后台顶部</a>
									</li>
									
									<?php if ($tab_position === 'tab_1_6'): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_6" data-toggle="tab">消息群发</a>
									</li>
									
									<?php if ($tab_position === 'tab_1_7'): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_7" data-toggle="tab">公告</a>
									</li>

								</ul>

								<div class="tab-content">

									<?php if ($tab_position === 'tab_1_1' || $tab_position == NULL): ?>
									<div class="tab-pane active" id="tab_1_1">
									<?php else :?>
									<div class="tab-pane" id="tab_1_1">
									<?php endif;?>

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											这一页是网站的基础设置，如果你不是最高权限管理员，请离开！

										</p>
									
										<!-- BEGIN FORM-->

										<form id="base-setting" action="<?php echo site_url('setting/Setting/updata_setting')?>" method="post" enctype="multipart/form-data" class="form-horizontal">

											<div class="control-group">

												<label class="control-label">网站名：</label>

												<div class="controls">

													<input type="text" id="firstName" class="m-wrap span12" placeholder="网站首页的名称，在SEO上有关系..." name="website_name" value="<?php echo $website_name?>">

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">标题前缀：</label>

												<div class="controls">

													<input type="text" id="firstName" class="m-wrap span12" placeholder="这个前缀是显示在所有页面的标题的前端文字..." name="website_title" value="<?php echo $website_title?>">

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">meta标签关键词：</label>

												<div class="controls">

													<input type="text" id="firstName" class="m-wrap span12" placeholder="搜索引擎优化的关键字..." name="mate_key" value="<?php echo $mate_key?>">

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">meta标签描述：</label>

												<div class="controls">

													<input type="text" id="firstName" class="m-wrap span12" placeholder="搜索引擎优化的描述..." name="mate_description" value="<?php echo $mate_description?>">

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">meta标签作者：</label>

												<div class="controls">

													<input type="text" id="firstName" class="m-wrap span12" placeholder="搜索引擎优化的作者..." name="mate_author" value="<?php echo $mate_author?>">

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">每页显示信息数（前台）：</label>

												<div class="controls">

													<input type="text" id="firstName" class="m-wrap span12" placeholder="每页显示多少条信息..." name="quantity_view" value="<?php echo $quantity_view?>">

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">每页显示信息数（后台）：</label>

												<div class="controls">

													<input type="text" id="firstName" class="m-wrap span12" placeholder="每页显示多少条信息..." name="quantity_admin" value="<?php echo $quantity_admin?>">

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">注册用户默认组：</label>

												<div class="controls">
												
												<!--###############################################################-->
												<select data-placeholder="请选择一个默认注册组..." class="chosen span12" tabindex="-1" id="selS0V" name="register_group">

													<?php if (isset($register_group)): ?>
													<?php foreach ($user_groupalls as $user_groupall): ?><!--遍历用户组-->
													<?php if ($register_group==$user_groupall['group_id']): ?>
													<option value="<?php echo $user_groupall['group_id']?>"><?php echo $user_groupall['name']?></option>
													<?php endif; ?>
													<?php endforeach; ?>
													<?php else: ?>

													<option value="">---请选择一个默认注册组---</option>
													
													<?php endif; ?>

													<optgroup label="用户组">

														<?php foreach ($user_groupalls as $user_groupall): ?>
													
														<option value="<?php echo $user_groupall['group_id']?>"><?php echo $user_groupall['name']?></option>
														
														<?php endforeach; ?>

													</optgroup>

												</select>
												<!--###############################################################-->
										
												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">访客默认用户组：</label>

												<div class="controls">
												
												<!--###############################################################-->
												<select data-placeholder="请选择一个访客默认组..." class="chosen span12" tabindex="-1" id="selS0V1" name="visitors_group">

													<?php if (isset($visitors_group)): ?>
													<?php foreach ($user_groupalls as $user_groupall): ?><!--遍历用户组-->
													<?php if ($visitors_group==$user_groupall['group_id']): ?>
													<option value="<?php echo $user_groupall['group_id']?>"><?php echo $user_groupall['name']?></option>
													<?php endif; ?>
													<?php endforeach; ?>
													<?php else: ?>

													<option value="">---请选择一个访客默认组---</option>
													
													<?php endif; ?>

													<optgroup label="用户组">

														<?php foreach ($user_groupalls as $user_groupall): ?>
													
														<option value="<?php echo $user_groupall['group_id']?>"><?php echo $user_groupall['name']?></option>
														
														<?php endforeach; ?>

													</optgroup>

												</select>
												<!--###############################################################-->
										
												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">是否审核文章：</label>

												<div class="controls">
												
													<label class="radio">
													
													<?php if ($article_check == '1'): ?>

													<input type="radio" name="article_check" value="1" checked />

													是
													
													<?php else: ?>
													
													<input type="radio" name="article_check" value="1" />

													是
													<?php endif; ?>
													</label>
													
													<label class="radio">
													
													<?php if ($article_check !== '1'): ?>

													<input type="radio" name="article_check" value="0" checked />

													否
													
													<?php else: ?>

													<input type="radio" name="article_check" value="0"/>

													否
													
													<?php endif; ?> 
													
													</label> 
													
												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">是否允许作者审核评论：</label>

												<div class="controls">

													<label class="radio">
													
													<?php if ($author_check == '1'): ?>

													<input type="radio" name="author_check" value="1" checked/>

													是
													
													<?php else: ?>
													
													<input type="radio" name="author_check" value="1" />

													是
													
													<?php endif; ?> 

													</label>

													<label class="radio">

													<?php if ($author_check !== '1'): ?>

													<input type="radio" name="author_check" value="0" checked/>

													否
													
													<?php else: ?>
													
													<input type="radio" name="author_check" value="0" />

													否
													
													<?php endif; ?> 

													</label>  

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">PC端https：</label>

												<div class="controls">

													<label class="radio">
													
													<?php if ($https_pc == '1'): ?>

													<input type="radio" name="https_pc" value="1" checked/>

													是
													
													<?php else: ?>
													
													<input type="radio" name="https_pc" value="1" />

													是
													
													<?php endif; ?> 

													</label>

													<label class="radio">

													<?php if ($https_pc !== '1'): ?>

													<input type="radio" name="https_pc" value="0" checked/>

													否
													
													<?php else: ?>
													
													<input type="radio" name="https_pc" value="0" />

													否
													
													<?php endif; ?> 

													</label>  

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">移动端https：</label>

												<div class="controls">

													<label class="radio">
													
													<?php if ($https_mobile == '1'): ?>

													<input type="radio" name="https_mobile" value="1" checked/>

													是
													
													<?php else: ?>
													
													<input type="radio" name="https_mobile" value="1" />

													是
													
													<?php endif; ?> 

													</label>

													<label class="radio">

													<?php if ($https_mobile !== '1'): ?>

													<input type="radio" name="https_mobile" value="0" checked/>

													否
													
													<?php else: ?>
													
													<input type="radio" name="https_mobile" value="0" />

													否
													
													<?php endif; ?> 

													</label>  

												</div>

											</div>
												
											<div class="form-actions">

												<button type="submit" class="btn blue">提交</button>

												<button type="button" class="btn">取消</button>                            
											</div>

										</form>

										<!-- END FORM-->  

									</div>

									<?php if ($tab_position === 'tab_1_2'): ?>
									<div class="tab-pane active" id="tab_1_2">
									<?php else :?>
									<div class="tab-pane" id="tab_1_2">
									<?php endif;?>

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											生成用户后台左栏的导航

										</p>
									
										<div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">

											<!-- BEGIN EXAMPLE TABLE PORTLET-->

											<div class="portlet box grey">

												<div class="portlet-title">

													<div class="caption"><i class="icon-user"></i>后台左栏列表</div>

													<div class="actions">

														<a href="<?php echo site_url('setting/setting_form')?>" class="btn blue"><i class="icon-pencil"></i>

														添加

														</a>    
														
														<div class="btn-group">

															<a class="btn green" href="#" data-toggle="dropdown">

															<i class="icon-cogs"></i> 编辑

															<i class="icon-angle-down"></i>

															</a>

															<ul class="dropdown-menu pull-right">

																<!--<li><a href="#"><i class="icon-pencil"></i>修改</a></li>-->

																<li><a href="#"><i class="icon-trash"></i>删除</a></li>

																<li><a href="#"><i class="icon-ban-circle"></i>不显示</a></li>

																<li class="divider"></li>

																<li><a href="#"><i class="i"></i>禁止修改</a></li>

															</ul>

														</div>

													</div>

												</div>

												<div class="portlet-body">

													<table class="table table-striped table-bordered table-hover" id="sample_2">

														<thead>

															<tr>

																<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" /></th>

																<th>名称</th>
																
																<th class="hidden-480">上一级目录</th>

																<th class="hidden-480">图标</th>

																<th>链接</th>
																
																<th>显示位置</th>
																
																<th class="hidden-480">是否显示</th>
																
																<th class="hidden-480">允许修改</th>
																
																<th>修改</th>

															</tr>

														</thead>

														<tbody>

															<?php foreach ($navs as $item): ?>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="<?php echo $item['nav_id']?>" /></td>

																<td><?php echo $item['nav_name']?></td>
																
																<td>-----无-----</td>

																<td class="hidden-480"><i class="<?php echo 'icon-'.$item['nav_ico']?>"></i><?php echo $item['nav_ico']?></td>

																<td class="hidden-480"><?php echo $item['nav_url']?></td>
																
																<td><?php echo $item['nav_class']?></td>
																
																<?php if ($item['view_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>
																
																<?php if ($item['edit_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>
																
																<td><a href="<?php echo site_url('setting/setting_form').'?nav_id='.$item['nav_id'].'&tab_position=tab_1_3'?>"><span class="label label-success">修改</span></a></td>

															</tr>

															<?php if ($item['childs'] && is_array($item['childs'])): ?>
															<?php foreach ($item['childs'] as $childs): ?>
															
															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="<?php echo $childs['nav_child_id']?>" /></td>

																<td><?php echo $item['nav_name'].'=>'.$childs['nav_child_name']?></td>
																
																<td class="hidden-480"><?php echo $item['nav_name']?></td>

																<td class="hidden-480">-----无-----</td>

																<td><?php echo $childs['nav_child_url']?></td>
																
																<td><?php echo $item['nav_class']?></td>
																
																<?php if ($childs['view_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>
																
																<?php if ($childs['edit_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>
																
																<td><a href="<?php echo site_url('setting/setting_form').'?nav_child_id='.$childs['nav_child_id'].'&tab_position=tab_1_3'?>"><span class="label label-success">修改</span></a></td>

															</tr>

															<?php endforeach; ?>

															<?php endif; ?>

															<?php endforeach; ?>

														</tbody>

													</table>

												</div>

											</div>

											<!-- END EXAMPLE TABLE PORTLET-->

										</div>

									</div>

									<?php if ($tab_position === 'tab_1_3'): ?>
									<div class="tab-pane active" id="tab_1_3">
									<?php else :?>
									<div class="tab-pane" id="tab_1_3">
									<?php endif;?>

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											生成帮助中心左栏的导航

										</p>
									
										<div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">

											<!-- BEGIN EXAMPLE TABLE PORTLET-->

											<div class="portlet box grey">

												<div class="portlet-title">

													<div class="caption"><i class="icon-user"></i>帮助中心左栏列表</div>

													<div class="actions">

														<a href="<?php echo site_url('setting/setting_form')?>" class="btn blue"><i class="icon-pencil"></i>

														添加

														</a>    
														
														<div class="btn-group">

															<a class="btn green" href="#" data-toggle="dropdown">

															<i class="icon-cogs"></i> 编辑

															<i class="icon-angle-down"></i>

															</a>

															<ul class="dropdown-menu pull-right">

																<!--<li><a href="#"><i class="icon-pencil"></i> 修改</a></li>-->

																<li><a href="#"><i class="icon-trash"></i> 删除</a></li>

																<li><a href="#"><i class="icon-ban-circle"></i> 不显示</a></li>

																<li class="divider"></li>

																<li><a href="#"><i class="i"></i>禁止修改</a></li>

															</ul>

														</div>

													</div>

												</div>

												<div class="portlet-body">

													<table class="table table-striped table-bordered table-hover" id="sample_3">

														<thead>

															<tr>

																<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes" /></th>

																<th>名称</th>

																<th class="hidden-480">上一级目录</th>

																<th class="hidden-480">图标</th>
																
																<th>链接</th>
																
																<th class="hidden-480">显示</th>
																
																<th class="hidden-480">允许修改</th>
																
																<th>修改</th>

															</tr>

														</thead>

														<tbody>

															<?php foreach ($nav_helpers as $nav_helper): ?>
														
															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="<?php echo $nav_helper['nav_id']?>" /></td>

																<td><?php echo $nav_helper['nav_name']?></td>

																<td>-----无-----</td>

																<td class="hidden-480"><i class="<?php echo 'icon-'.$nav_helper['nav_ico']?>"></i><?php echo $nav_helper['nav_ico']?></td>

																<td><?php echo $nav_helper['nav_url']?></td>
																
																<?php if ($nav_helper['view_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>
																
																<?php if ($nav_helper['edit_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>
																
																<td><a href="<?php echo site_url('setting/setting_form').'?nav_id='.$nav_helper['nav_id'].'&tab_position=tab_1_3'?>"><span class="label label-success">修改</span></a></td>
																
															</tr>
															
															<?php if ($nav_helper['childs'] && is_array($nav_helper['childs'])): ?>
															<?php foreach ($nav_helper['childs'] as $helper_childs): ?>
															
															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="<?php echo $helper_childs['nav_child_id']?>" /></td>

																<td><?php echo $nav_helper['nav_name'].'=>'.$helper_childs['nav_child_name']?></td>
																
																<td><?php echo $nav_helper['nav_name']?></td>

																<td class="hidden-480">-----无-----</td>

																<td><?php echo $helper_childs['nav_child_url']?></td>

																<?php if ($helper_childs['view_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>

																<?php if ($helper_childs['edit_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>
																
																<td><a href="<?php echo site_url('setting/setting_form').'?nav_child_id='.$helper_childs['nav_child_id'].'&tab_position=tab_1_3'?>"><span class="label label-success">修改</span></a></td>
																
															</tr>

															<?php endforeach; ?>

															<?php endif; ?>
															
															<?php endforeach; ?>

														</tbody>

													</table>

												</div>

											</div>

											<!-- END EXAMPLE TABLE PORTLET-->

										</div>

									</div>
									
									<?php if ($tab_position === 'tab_1_4'): ?>
									<div class="tab-pane active" id="tab_1_4">
									<?php else :?>
									<div class="tab-pane" id="tab_1_4">
									<?php endif;?>

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											前台顶部分类显示

										</p>
									
										<div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">

											<!-- BEGIN EXAMPLE TABLE PORTLET-->

											<div class="portlet box grey">

												<div class="portlet-title">

													<div class="caption"><i class="icon-user"></i>前台分类列表</div>

													<div class="actions">

														<a href="<?php echo site_url('setting/setting_form')?>" class="btn blue"><i class="icon-pencil"></i>

														添加

														</a>    
														
														<div class="btn-group">

															<a class="btn green" href="#" data-toggle="dropdown">

															<i class="icon-cogs"></i> 编辑

															<i class="icon-angle-down"></i>

															</a>

															<ul class="dropdown-menu pull-right">

																<!--<li><a href="#"><i class="icon-pencil"></i> Edit</a></li>-->

																<li><a href="#"><i class="icon-trash"></i>删除</a></li>

																<li><a href="#"><i class="icon-ban-circle"></i>不显示</a></li>

																<li class="divider"></li>

																<li><a href="#"><i class="i"></i>禁止其它管理员修改</a></li>

															</ul>

														</div>

													</div>

												</div>

												<div class="portlet-body">

													<table class="table table-striped table-bordered table-hover" id="sample_4">

														<thead>

															<tr>

																<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_4 .checkboxes" /></th>

																<th>名称</th>

																<th class="hidden-480">上一级目录</th>

																<th class="hidden-480">图标</th>
																
																<th>链接</th>
																
																<th class="hidden-480">显示</th>
																
																<th class="hidden-480">允许修改</th>
																
																<th>修改</th>

															</tr>

														</thead>

														<tbody>

															<?php foreach ($nav_view_tops as $nav_view_top): ?>
														
															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="<?php echo $nav_view_top['nav_id']?>" /></td>

																<td><?php echo $nav_view_top['nav_name']?></td>

																<td>-----无-----</td>

																<td class="hidden-480"><i class="<?php echo 'icon-'.$nav_view_top['nav_ico']?>"></i><?php echo $nav_view_top['nav_ico']?></td>

																<td><?php echo $nav_view_top['nav_url']?></td>
																
																<?php if ($nav_view_top['view_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>
																
																<?php if ($nav_view_top['edit_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>
																
																<td><a href="<?php echo site_url('setting/setting_form').'?nav_id='.$nav_view_top['nav_id'].'&tab_position=tab_1_3'?>"><span class="label label-success">修改</span></a></td>
																
															</tr>
															
															<?php if ($nav_view_top['childs'] && is_array($nav_view_top['childs'])): ?>
															<?php foreach ($nav_view_top['childs'] as $nav_view_top_childs): ?>
															
															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="<?php echo $nav_view_top_childs['nav_child_id']?>" /></td>

																<td><?php echo $nav_view_top['nav_name'].'=>'.$nav_view_top_childs['nav_child_name']?></td>
																
																<td><?php echo $nav_view_top['nav_name']?></td>

																<td class="hidden-480">-----无-----</td>

																<td><?php echo $nav_view_top_childs['nav_child_url']?></td>

																<?php if ($nav_view_top_childs['view_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>

																<?php if ($nav_view_top_childs['edit_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>
																
																<td><a href="<?php echo site_url('setting/setting_form').'?nav_child_id='.$nav_view_top_childs['nav_child_id'].'&tab_position=tab_1_3'?>"><span class="label label-success">修改</span></a></td>
																
															</tr>

															<?php endforeach; ?>

															<?php endif; ?>
															
															<?php endforeach; ?>

														</tbody>

													</table>

												</div>

											</div>

											<!-- END EXAMPLE TABLE PORTLET-->

										</div>

									</div>
									
									<?php if ($tab_position === 'tab_1_5'): ?>
									<div class="tab-pane active" id="tab_1_5">
									<?php else :?>
									<div class="tab-pane" id="tab_1_5">
									<?php endif;?>

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											后台顶部分类

										</p>
										
										<div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">

											<!-- BEGIN EXAMPLE TABLE PORTLET-->

											<div class="portlet box grey">

												<div class="portlet-title">

													<div class="caption"><i class="icon-user"></i>后台顶部列表</div>

													<div class="actions">

														<a href="<?php echo site_url('setting/setting_form')?>" class="btn blue"><i class="icon-pencil"></i>

														添加

														</a>    
														
														<div class="btn-group">

															<a class="btn green" href="#" data-toggle="dropdown">

															<i class="icon-cogs"></i> 编辑

															<i class="icon-angle-down"></i>

															</a>

															<ul class="dropdown-menu pull-right">

																<!--<li><a href="#"><i class="icon-pencil"></i> Edit</a></li>-->

																<li><a href="#"><i class="icon-trash"></i>删除</a></li>

																<li><a href="#"><i class="icon-ban-circle"></i>不显示</a></li>

																<li class="divider"></li>

																<li><a href="#"><i class="i"></i>禁止其它管理员修改</a></li>

															</ul>

														</div>

													</div>

												</div>

												<div class="portlet-body">

													<table class="table table-striped table-bordered table-hover" id="sample_5">

														<thead>

															<tr>

																<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_5 .checkboxes" /></th>

																<th>名称</th>

																<th class="hidden-480">上一级目录</th>

																<th class="hidden-480">图标</th>
																
																<th>链接</th>
																
																<th class="hidden-480">显示</th>
																
																<th class="hidden-480">允许修改</th>
																
																<th>修改</th>

															</tr>

														</thead>

														<tbody>

															<?php foreach ($nav_admin_tops as $nav_admin_top): ?>
														
															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="<?php echo $nav_admin_top['nav_id']?>" /></td>

																<td><?php echo $nav_admin_top['nav_name']?></td>

																<td>-----无-----</td>

																<td class="hidden-480"><i class="<?php echo 'icon-'.$nav_admin_top['nav_ico']?>"></i><?php echo $nav_admin_top['nav_ico']?></td>

																<td><?php echo $nav_admin_top['nav_url']?></td>
																
																<?php if ($nav_admin_top['view_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>
																
																<?php if ($nav_admin_top['edit_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>
																
																<td><a href="<?php echo site_url('setting/setting_form').'?nav_id='.$nav_admin_top['nav_id']?>"><span class="label label-success">修改</span></a></td>
																
															</tr>
															
															<?php if ($nav_admin_top['childs'] && is_array($nav_admin_top['childs'])): ?>
															<?php foreach ($nav_admin_top['childs'] as $nav_admin_top_childs): ?>
															
															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="<?php echo $nav_admin_top_childs['nav_child_id']?>" /></td>

																<td><?php echo $nav_admin_top['nav_name'].'=>'.$nav_admin_top_childs['nav_child_name']?></td>
																
																<td><?php echo $nav_admin_top['nav_name']?></td>

																<td class="hidden-480">-----无-----</td>

																<td><?php echo $nav_admin_top_childs['nav_child_url']?></td>

																<?php if ($nav_admin_top_childs['view_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>

																<?php if ($nav_admin_top_childs['edit_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>
																
																<td><a href="<?php echo site_url('setting/setting_form').'?nav_child_id='.$nav_admin_top_childs['nav_child_id'].'&tab_position=tab_1_3'?>"><span class="label label-success">修改</span></a></td>
																
															</tr>

															<?php endforeach; ?>

															<?php endif; ?>
															
															<?php endforeach; ?>

														</tbody>

													</table>

												</div>

											</div>

											<!-- END EXAMPLE TABLE PORTLET-->

										</div>

									</div>
									
									<?php if ($tab_position === 'tab_1_6'): ?>
									<div class="tab-pane active" id="tab_1_6">
									<?php else :?>
									<div class="tab-pane" id="tab_1_6">
									<?php endif;?>

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											给你用户群发信息

										</p>
									
										<div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">

											<!-- BEGIN EXAMPLE TABLE PORTLET-->

											<div class="portlet box grey">

												<div class="portlet-title">

													<div class="caption"><i class="icon-user"></i>群发消息列表</div>

													<div class="actions">

														<a href="<?php echo site_url('setting/setting_form')?>" class="btn blue"><i class="icon-pencil"></i>

														添加

														</a>    
														
														<div class="btn-group">

															<a class="btn green" href="#" data-toggle="dropdown">

															<i class="icon-cogs"></i> 编辑

															<i class="icon-angle-down"></i>

															</a>

															<ul class="dropdown-menu pull-right">

																<!--<li><a href="#"><i class="icon-pencil"></i> Edit</a></li>-->

																<li><a href="#"><i class="icon-trash"></i>删除</a></li>

																<li><a href="#"><i class="icon-ban-circle"></i>不显示</a></li>

																<li class="divider"></li>

																<li><a href="#"><i class="i"></i>禁止其它管理员修改</a></li>

															</ul>

														</div>

													</div>

												</div>

												<div class="portlet-body">

													<table class="table table-striped table-bordered table-hover" id="sample_6">

														<thead>

															<tr>

																<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_6 .checkboxes" /></th>

																<th>Username</th>

																<th class="hidden-480">Email</th>

																<th class="hidden-480">Status</th>

															</tr>

														</thead>

														<tbody>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>shuxer</td>

																<td class="hidden-480"><a href="mailto:shuxer@gmail.com">shuxer@gmail.com</a></td>

																<td><span class="label label-success">Approved</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>looper</td>

																<td class="hidden-480"><a href="mailto:looper90@gmail.com">looper90@gmail.com</a></td>

																<td><span class="label label-warning">Suspended</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>userwow</td>

																<td class="hidden-480"><a href="mailto:userwow@yahoo.com">userwow@yahoo.com</a></td>

																<td><span class="label label-success">Approved</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>user1wow</td>

																<td class="hidden-480"><a href="mailto:userwow@gmail.com">userwow@gmail.com</a></td>

																<td><span class="label label-inverse">Blocked</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>restest</td>

																<td class="hidden-480"><a href="mailto:userwow@gmail.com">test@gmail.com</a></td>

																<td><span class="label label-success">Approved</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>foopl</td>

																<td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>

																<td><span class="label label-success">Approved</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>weep</td>

																<td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>

																<td><span class="label label-success">Approved</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>coop</td>

																<td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>

																<td><span class="label label-success">Approved</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>pppol</td>

																<td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>

																<td><span class="label label-success">Approved</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>test</td>

																<td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>

																<td><span class="label label-success">Approved</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>userwow</td>

																<td class="hidden-480"><a href="mailto:userwow@gmail.com">userwow@gmail.com</a></td>

																<td><span class="label label-inverse">Blocked</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>test</td>

																<td class="hidden-480"><a href="mailto:userwow@gmail.com">test@gmail.com</a></td>

																<td><span class="label label-success">Approved</span></td>

															</tr>

														</tbody>

													</table>

												</div>

											</div>

											<!-- END EXAMPLE TABLE PORTLET-->

										</div>

									</div>
									
									<?php if ($tab_position === 'tab_1_7'): ?>
									<div class="tab-pane active" id="tab_1_7">
									<?php else :?>
									<div class="tab-pane" id="tab_1_7">
									<?php endif;?>

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											站内公告

										</p>
										
										<div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">

											<!-- BEGIN EXAMPLE TABLE PORTLET-->

											<div class="portlet box grey">

												<div class="portlet-title">

													<div class="caption"><i class="icon-user"></i>公告列表</div>

													<div class="actions">

														<a href="<?php echo site_url('setting/setting_form')?>" class="btn blue"><i class="icon-pencil"></i>

														添加

														</a>    
														
														<div class="btn-group">

															<a class="btn green" href="#" data-toggle="dropdown">

															<i class="icon-cogs"></i> 编辑

															<i class="icon-angle-down"></i>

															</a>

															<ul class="dropdown-menu pull-right">

																<!--<li><a href="#"><i class="icon-pencil"></i> Edit</a></li>-->

																<li><a href="#"><i class="icon-trash"></i>删除</a></li>

																<li><a href="#"><i class="icon-ban-circle"></i>不显示</a></li>

																<li class="divider"></li>

																<li><a href="#"><i class="i"></i>禁止其它管理员修改</a></li>

															</ul>

														</div>

													</div>

												</div>

												<div class="portlet-body">

													<table class="table table-striped table-bordered table-hover" id="sample_7">

														<thead>

															<tr>

																<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_7 .checkboxes" /></th>

																<th>Username</th>

																<th class="hidden-480">Email</th>

																<th class="hidden-480">Status</th>

															</tr>

														</thead>

														<tbody>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>shuxer</td>

																<td class="hidden-480"><a href="mailto:shuxer@gmail.com">shuxer@gmail.com</a></td>

																<td><span class="label label-success">Approved</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>looper</td>

																<td class="hidden-480"><a href="mailto:looper90@gmail.com">looper90@gmail.com</a></td>

																<td><span class="label label-warning">Suspended</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>userwow</td>

																<td class="hidden-480"><a href="mailto:userwow@yahoo.com">userwow@yahoo.com</a></td>

																<td><span class="label label-success">Approved</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>user1wow</td>

																<td class="hidden-480"><a href="mailto:userwow@gmail.com">userwow@gmail.com</a></td>

																<td><span class="label label-inverse">Blocked</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>restest</td>

																<td class="hidden-480"><a href="mailto:userwow@gmail.com">test@gmail.com</a></td>

																<td><span class="label label-success">Approved</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>foopl</td>

																<td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>

																<td><span class="label label-success">Approved</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>weep</td>

																<td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>

																<td><span class="label label-success">Approved</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>coop</td>

																<td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>

																<td><span class="label label-success">Approved</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>pppol</td>

																<td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>

																<td><span class="label label-success">Approved</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>test</td>

																<td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>

																<td><span class="label label-success">Approved</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>userwow</td>

																<td class="hidden-480"><a href="mailto:userwow@gmail.com">userwow@gmail.com</a></td>

																<td><span class="label label-inverse">Blocked</span></td>

															</tr>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="1" /></td>

																<td>test</td>

																<td class="hidden-480"><a href="mailto:userwow@gmail.com">test@gmail.com</a></td>

																<td><span class="label label-success">Approved</span></td>

															</tr>

														</tbody>

													</table>

												</div>

											</div>

											<!-- END EXAMPLE TABLE PORTLET-->

										</div>

									</div>

								</div>

							</div>

							<!--END TABS-->

						</div>

						<!-- END SAMPLE FORM PORTLET-->

				<!-- END PAGE CONTENT-->

			</div>

			<!-- END PAGE CONTAINER--> 

		</div>

		<!-- END PAGE -->    
		</div>
	</div>

	<!-- END CONTAINER -->
	
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<script src="<?php echo base_url('public/js/jquery.slimscroll.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/js/jquery.blockui.min.js')?>" type="text/javascript"></script>  

	<script src="<?php echo base_url('public/js/jquery.cookie.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/js/jquery.uniform.min.js')?>" type="text/javascript" ></script>
	
	<script src="<?php echo base_url('public/js/jquery.validate.js')?>" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script type="text/javascript" src="<?php echo base_url('public/js/bootstrap-fileupload.js')?>"></script>

	<script type="text/javascript" src="<?php echo base_url('public/js/chosen.jquery.min.js')?>"></script>
	
	<script type="text/javascript" src="<?php echo base_url('public/js/select2.min.js')?>"></script>

	<script type="text/javascript" src="<?php echo base_url('public/js/bootstrap-datetimepicker.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/js/jquery.inputmask.bundle.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/js/jquery.input-ip-address-control-1.0.min.js')?>"></script>

	<script type="text/javascript" src="<?php echo base_url('public/js/date.js')?>"></script>
	
	<script type="text/javascript" src="<?php echo base_url('public/js/jquery.multi-select.js')?>"></script>

	<script type="text/javascript" src="<?php echo base_url('public/js/daterangepicker.js')?>"></script> 
	
	<script type="text/javascript" src="<?php echo base_url('public/js/jquery.dataTables.js')?>"></script>
	
	<script type="text/javascript" src="<?php echo base_url('public/js/DT_bootstrap.js')?>"></script>

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="<?php echo base_url('public/js/setting.js')?>"></script>
	<script src="<?php echo base_url('public/js/app.js')?>"></script>
	<script src="<?php echo base_url('public/js/form-samples.js')?>"></script>
	<script src="<?php echo base_url('public/js/form-components.js')?>"></script>
	<script src="<?php echo base_url('public/js/table-managed.js')?>"></script>

	<!-- END PAGE LEVEL SCRIPTS -->

	
	<script>

		jQuery(document).ready(function() {       

		   // initiate layout and plugins

		   App.init();
		   FormSamples.init();
		   FormComponents.init();
		   TableManaged.init();

		});

	</script>

	<!-- END JAVASCRIPTS -->

<!-- END BODY -->

</html>