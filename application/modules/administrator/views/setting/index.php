<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-gears "></i><small> <?php echo $this->lang->line('general'); ?> <?php echo $this->lang->line('setting'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>                
            </div>    
            
            <div class="x_content quick-link">
                 <span><?php echo $this->lang->line('quick_link'); ?>:</span>
                <?php if(has_permission(VIEW, 'administrator', 'setting')){ ?>
                    <a href="<?php echo site_url('administrator/setting'); ?>"><?php echo $this->lang->line('general'); ?> <?php echo $this->lang->line('setting'); ?></a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'administrator', 'school')){ ?>
                   | <a href="<?php echo site_url('administrator/school'); ?>"><?php echo $this->lang->line('manage_school'); ?></a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'administrator', 'payment')){ ?>
                    | <a href="<?php echo site_url('administrator/payment'); ?>"><?php echo $this->lang->line('payment'); ?> <?php echo $this->lang->line('setting'); ?></a>
                <?php } ?>                    
                <?php if(has_permission(VIEW, 'administrator', 'sms')){ ?>
                    | <a href="<?php echo site_url('administrator/sms'); ?>"><?php echo $this->lang->line('sms'); ?> <?php echo $this->lang->line('setting'); ?></a>
                <?php } ?>      
                <?php if(has_permission(VIEW, 'administrator', 'year')){ ?>
                    | <a href="<?php echo site_url('administrator/year'); ?>"><?php echo $this->lang->line('academic_year'); ?></a>
                <?php } ?>                  
                <?php if(has_permission(VIEW, 'administrator', 'role')){ ?>
                   | <a href="<?php echo site_url('administrator/role'); ?>"><?php echo $this->lang->line('user_role'); ?></a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'administrator', 'permission')){ ?>
                   | <a href="<?php echo site_url('administrator/permission'); ?>"><?php echo $this->lang->line('role_permission'); ?></a>                   
                <?php } ?>
                <?php if(has_permission(VIEW, 'administrator', 'user')){ ?>
                   | <a href="<?php echo site_url('administrator/user'); ?>"><?php echo $this->lang->line('manage_user'); ?></a>                
                <?php } ?>
                <?php if(has_permission(VIEW, 'administrator', 'superadmin')){ ?>
                   | <a href="<?php echo site_url('administrator/superadmin'); ?>"><?php echo $this->lang->line('super_admin'); ?></a>                
                <?php } ?>
                <?php if(has_permission(EDIT, 'administrator', 'password')){ ?>
                   | <a href="<?php echo site_url('administrator/password'); ?>"><?php echo $this->lang->line('reset_user_password'); ?></a>                   
                <?php } ?>
                <?php if(has_permission(VIEW, 'administrator', 'emailtemplate')){ ?>
                   | <a href="<?php echo site_url('administrator/emailtemplate'); ?>"><?php echo $this->lang->line('email'); ?> <?php echo $this->lang->line('template'); ?></a>                  
                <?php } ?>
                <?php if(has_permission(VIEW, 'administrator', 'smstemplate')){ ?>
                   | <a href="<?php echo site_url('administrator/smstemplate'); ?>"><?php echo $this->lang->line('sms'); ?> <?php echo $this->lang->line('template'); ?></a>                  
                <?php } ?>
                <?php if(has_permission(VIEW, 'administrator', 'activitylog')){ ?>
                   | <a href="<?php echo site_url('administrator/activitylog'); ?>"><?php echo $this->lang->line('activity_log'); ?></a>                  
                <?php } ?>
                <?php if(has_permission(VIEW, 'administrator', 'feedback')){ ?>
                   | <a href="<?php echo site_url('administrator/feedback'); ?>"><?php echo $this->lang->line('guardian'); ?> <?php echo $this->lang->line('feedback'); ?></a>                  
                <?php } ?>
                <?php if(has_permission(VIEW, 'administrator', 'backup')){ ?>
                   | <a href="<?php echo site_url('administrator/backup'); ?>"><?php echo $this->lang->line('backup'); ?> <?php echo $this->lang->line('database'); ?></a>                  
                <?php } ?>
            </div>
            
             <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                     <ul  class="nav nav-tabs bordered">                     
                        <li  class="active"><a href="#tab_setting"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i> <?php echo $this->lang->line('general'); ?> <?php echo $this->lang->line('setting'); ?></a> </li> 
                     </ul>
                     <br/>
                     <div class="tab-content">
                         <div class="tab-pane fade in active"id="tab_setting">
                            <div class="x_content"> 
                                <?php $action = isset($setting) ? 'edit' : 'add'; ?>
                                <?php echo form_open_multipart(site_url('administrator/setting/'. $action), array('name' => 'setting', 'id' => 'setting', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                <input type="hidden" value="<?php echo isset($setting) ? $setting->id : ''; ?>" name="id" />
                                  
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="brand_name"><?php echo $this->lang->line('brand'); ?> <?php echo $this->lang->line('name'); ?> <span class="required">*</span></label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">                                      
                                        <input  class="form-control col-md-7 col-xs-12"  name="brand_name"  id="brand_name" value="<?php echo isset($setting) ?  $setting->brand_name : ''; ?>" placeholder="<?php echo $this->lang->line('brand'); ?> <?php echo $this->lang->line('name'); ?> " required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('brand_name'); ?></div> 
                                    </div>
                                </div>
                                
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="language"><?php echo $this->lang->line('language'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="language"  required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php foreach($fields as $field){ ?>
                                                <?php  if($field == 'id' || $field == 'label'){ continue; } ?>
                                            <option value="<?php echo $field; ?>" <?php if(isset($setting) && $setting->language == $field){ echo 'selected="selected"';} ?>><?php echo ucfirst($field); ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('language'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                   <label  class="control-label col-md-3 col-sm-3 col-xs-12" for="enable_rtl"><?php echo $this->lang->line('enable_rtl'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="enable_rtl" required="required">
                                            <option value="0" <?php if(isset($setting) && $setting->enable_rtl == 0){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('no'); ?></option>
                                            <option value="1" <?php if(isset($setting) && $setting->enable_rtl == 1){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('yes'); ?></option>
                                        </select>
                                        <div class="help-block"><?php echo form_error('enable_rtl'); ?></div> 
                                    </div>
                                </div>
                                
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="enable_frontend"><?php echo $this->lang->line('enable_frontend'); ?> <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12"  name="enable_frontend" required="required">
                                                <option value="1" <?php if(isset($setting) && $setting->enable_frontend == '1'){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('yes'); ?></option>
                                                <option value="0" <?php if(isset($setting) && $setting->enable_frontend == '0'){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('no'); ?></option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('enable_frontend'); ?></div> 
                                        </div>
                                    </div>
                               
                                
                                <div class="item form-group">
                                    <label  class="control-label col-md-3 col-sm-3 col-xs-12"  for="default_time_zone"><?php echo $this->lang->line('default_time_zone'); ?> <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <?php $timezones = get_timezones(); ?>
                                        <select  class="form-control col-md-7 col-xs-12"  name="time_zone" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php foreach($timezones as $key=>$value){ ?>
                                                <option value="<?php echo $key; ?>" <?php if(isset($setting) && $setting->time_zone == $key){ echo 'selected="selected"';} ?>><?php echo $value; ?> </option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('time_zone'); ?></div> 
                                    </div>
                                </div>
                               

                              
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date_format"><?php echo $this->lang->line('date_format'); ?> <span class="required">*</span></label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php $dates = get_date_format(); ?>
                                    <select  class="form-control col-md-7 col-xs-12"  name="date_format" required="required">
                                        <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                        <?php foreach($dates as $key=>$value){ ?>
                                            <option value="<?php echo $key; ?>" <?php if(isset($setting) && $setting->date_format == $key){ echo 'selected="selected"';} ?>><?php echo $value; ?> </option>
                                        <?php } ?>
                                    </select>
                                    <div class="help-block"><?php echo form_error('date_format'); ?></div> 
                                    </div>
                                </div>
                                
                                                  

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo"><?php echo $this->lang->line('brand'); ?> <?php echo $this->lang->line('logo'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                         <?php if(isset($setting) && $setting->brand_logo){ ?>
                                        <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $setting->brand_logo; ?>" alt="" width="70" style="background: #001f67;" /><br/><br/>
                                             <input name="logo_prev" value="<?php echo isset($setting) ? $setting->brand_logo : ''; ?>"  type="hidden">
                                        <?php } ?>
                                        <div class="btn btn-default btn-file"><i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                            <input  class="form-control col-md-7 col-xs-12"  name="logo" id="logo" type="file">
                                        </div>
                                        <div class="help-block"><?php echo form_error('logo'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="front_logo"><?php echo $this->lang->line('frontend'); ?> <?php echo $this->lang->line('logo'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                         <?php if(isset($setting) && $setting->front_logo){ ?>
                                        <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $setting->front_logo; ?>" alt="" width="120" style="background: #001f67;" /><br/><br/>
                                             <input name="front_logo_prev" value="<?php echo isset($setting) ? $setting->front_logo : ''; ?>"  type="hidden">
                                        <?php } ?>
                                        <div class="btn btn-default btn-file"><i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                            <input  class="form-control col-md-7 col-xs-12"  name="front_logo" id="front_logo" type="file">
                                        </div>
                                        <div class="help-block"><?php echo form_error('front_logo'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="brand_footer"><?php echo $this->lang->line('brand'); ?> <?php echo $this->lang->line('footer'); ?> <span class="required">*</span></label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">                                      
                                        <input  class="form-control col-md-7 col-xs-12"  name="brand_footer"  id="brand_footer" value="<?php echo isset($setting) ?  $setting->brand_footer : ''; ?>" placeholder="<?php echo $this->lang->line('brand'); ?> <?php echo $this->lang->line('footer'); ?> " required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('brand_footer'); ?></div> 
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="google_analytics"> <?php echo $this->lang->line('google_analytics'); ?> </label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">                                      
                                        <input  class="form-control col-md-7 col-xs-12"  name="google_analytics"  id="google_analytics" value="<?php echo isset($setting) ?  $setting->google_analytics : ''; ?>" placeholder="<?php echo $this->lang->line('google_analytics'); ?> " type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('google_analytics'); ?></div> 
                                    </div>
                                </div>
                                

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('dashboard'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php  echo $action == 'add' ? $this->lang->line('submit') : $this->lang->line('update'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>  
                        </div>  
                     </div>
                </div>
             </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#setting").validate();  
</script>