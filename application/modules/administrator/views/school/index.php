<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-home"></i><small> <?php echo $this->lang->line('manage_school'); ?></small></h3>
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
                        <?php if(has_permission(VIEW, 'administrator', 'school')){ ?>
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_school_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('school'); ?> <?php echo $this->lang->line('list'); ?></a> </li>
                       <?php } ?>
                       
                       <?php if(has_permission(ADD, 'administrator', 'school')){ ?> 
                            <?php if(isset($edit)){ ?>
                                <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="<?php echo site_url('administrator/school/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('school'); ?></a> </li>                          
                             <?php }else{ ?>
                                <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="#tab_add_school"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('school'); ?></a> </li>                          
                             <?php } ?>
                        <?php } ?>                       
                            
                        <?php if(isset($edit)){ ?>
                            <li  class="active"><a href="#tab_edit_school"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> <?php echo $this->lang->line('school'); ?></a> </li>                          
                        <?php } ?> 
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_school_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>
                                        <th><?php echo $this->lang->line('school'); ?> <?php echo $this->lang->line('name'); ?></th>
                                        <th><?php echo $this->lang->line('address'); ?></th>
                                        <th><?php echo $this->lang->line('phone'); ?></th>
                                        <th><?php echo $this->lang->line('email'); ?></th>
                                        <th><?php echo $this->lang->line('currency_symbol'); ?></th>
                                        <th><?php echo $this->lang->line('logo'); ?></th>
                                        <th><?php echo $this->lang->line('status'); ?></th>
                                        <th><?php echo $this->lang->line('action'); ?></th>                                            
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php $count = 1; if(isset($schools) && !empty($schools)){ ?>
                                        <?php foreach($schools as $obj){ ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $obj->school_name; ?></td>
                                            <td><?php echo $obj->address; ?></td>
                                            <td><?php echo $obj->phone; ?></td>
                                            <td><?php echo $obj->email; ?></td>
                                            <td><?php echo $obj->currency; ?></td>
                                            <td>
                                            <?php if($obj->logo){ ?>
                                                <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $obj->logo; ?>" alt="" width="80" style="background: #34347a; padding: 5px;" /><br/><br/>
                                            <?php } ?>
                                            </td>
                                            <td><?php echo $obj->status ? $this->lang->line('active') : $this->lang->line('in_active'); ?></td>
                                            <td>
                                                <?php if(has_permission(VIEW, 'administrator', 'school')){ ?>
                                                    <a  onclick="get_school_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-school-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a><br/>
                                                <?php } ?>    
                                                <?php if(has_permission(EDIT, 'administrator', 'school')){ ?>
                                                    <a href="<?php echo site_url('administrator/school/edit/'.$obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                <?php } ?>
                                                <?php if(has_permission(DELETE, 'administrator', 'school')){ ?>
                                                    <a href="<?php echo site_url('administrator/school/delete/'.$obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>                                
                            </div>
                        </div>

                        <div  class="tab-pane fade in <?php if(isset($add)){ echo 'active'; }?>" id="tab_add_school">
                            <div class="x_content"> 
                               <?php echo form_open_multipart(site_url('administrator/school/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('basic'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                
                                <div class="row">                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="school_code"><?php echo $this->lang->line('school_code'); ?></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_code"  id="school_code" value="<?php echo isset($post['school_code']) ?  $post['school_code'] : ''; ?>" placeholder="<?php echo $this->lang->line('school_code'); ?> "  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('school_code'); ?></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="school_name"><?php echo $this->lang->line('school'); ?> <?php echo $this->lang->line('name'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_name"  id="school_name" value="<?php echo isset($post['school_name']) ?  $post['school_name'] : ''; ?>" placeholder="<?php echo $this->lang->line('school'); ?> <?php echo $this->lang->line('name'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('school_name'); ?></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="address"><?php echo $this->lang->line('address'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="address"  id="address" value="<?php echo isset($post['address']) ?  $post['address'] : ''; ?>" placeholder="<?php echo $this->lang->line('address'); ?> " required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('address'); ?></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="phone"><?php echo $this->lang->line('phone'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="phone"  id="phone" value="<?php echo isset($post['phone']) ?  $post['phone'] : ''; ?>" placeholder="<?php echo $this->lang->line('phone'); ?> " required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('phone'); ?></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="registration_date"><?php echo $this->lang->line('registration'); ?> <?php echo $this->lang->line('date'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="registration_date"  id="add_registration_date" value="<?php echo isset($post['registration_date']) ?  $post['registration_date'] : ''; ?>" placeholder="<?php echo $this->lang->line('registration'); ?> <?php echo $this->lang->line('date'); ?> " required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('registration_date'); ?></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="email"><?php echo $this->lang->line('email'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="email"  id="email" value="<?php echo isset($post['email']) ?  $post['email'] : ''; ?>" placeholder="<?php echo $this->lang->line('email'); ?> " required="required" type="email" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('email'); ?></div> 
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="school_fax"><?php echo $this->lang->line('school_fax'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_fax"  id="school_fax" value="<?php echo isset($post['school_fax']) ?  $post['school_fax'] : ''; ?>" placeholder="<?php echo $this->lang->line('school_fax'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('school_fax'); ?></div> 
                                        </div>
                                    </div>                                   
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="footer"><?php echo $this->lang->line('footer'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="footer"  id="footer" value="<?php echo isset($post['footer']) ?  $post['footer'] : ''; ?>" placeholder="<?php echo $this->lang->line('footer'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('footer'); ?></div> 
                                        </div>
                                    </div>                                   
                                                                 
                                    
                                </div>                    
                                
                                 
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('setting'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="currency"><?php echo $this->lang->line('currency'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="currency"  id="currency" value="<?php echo isset($post['currency']) ?  $post['currency'] : ''; ?>" placeholder="<?php echo $this->lang->line('currency'); ?> " required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('currency'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="currency_symbol"><?php echo $this->lang->line('currency_symbol'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="currency_symbol"  id="currency_symbol" value="<?php echo isset($post['currency_symbol']) ?  $post['currency_symbol'] : ''; ?>" placeholder="<?php echo $this->lang->line('currency_symbol'); ?> " required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('currency_symbol'); ?></div> 
                                        </div>
                                    </div>
                                    <?php $months = get_months(); ?>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="session_start_month"><?php echo $this->lang->line('session_start_month'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="session_start_month" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach($months as $key=>$value){ ?>
                                                    <option value="<?php echo $key; ?>" <?php if(isset($post) && $post['session_start_month'] == $key){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('session_start_month'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="session_end_month"><?php echo $this->lang->line('session_end_month'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="session_end_month" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach($months as $key=>$value){ ?>
                                                    <option value="<?php echo $key; ?>" <?php if(isset($post) && $post['session_start_month'] == $key){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('session_end_month'); ?></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="enable_frontend"><?php echo $this->lang->line('enable_frontend'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="enable_frontend" required="required">
                                                <option value="1" <?php if(isset($post) && $post['enable_frontend'] == '1'){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('yes'); ?></option>
                                                <option value="0" <?php if(isset($post) && $post['enable_frontend'] == '0'){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('no'); ?></option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('enable_frontend'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="final_result_type"><?php echo $this->lang->line('exam_final_result'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="final_result_type" required="required">
                                                <option value="0" <?php if(isset($post) && $post['final_result_type'] == '0'){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('avg_of_all_exam'); ?> </option>
                                                <option value="1" <?php if(isset($post) && $post['final_result_type'] == '1'){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('only_of_fianl_exam'); ?> </option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('final_result_type'); ?></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="school_lat"><?php echo $this->lang->line('school_lat'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_lat"  id="school_lat" value="<?php echo isset($post['school_lat']) ?  $post['school_lat'] : ''; ?>" placeholder="<?php echo $this->lang->line('school_lat'); ?> "  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('school_lat'); ?></div> 
                                        </div>
                                    </div>      
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="school_lng"><?php echo $this->lang->line('school_lng'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_lng"  id="school_lng" value="<?php echo isset($post['school_lng']) ?  $post['school_lng'] : ''; ?>" placeholder="<?php echo $this->lang->line('school_lng'); ?> "  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('school_lng'); ?></div> 
                                        </div>
                                    </div>      
                                  
                                    
                                </div>
                                                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('social'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                
                                <div class="row">
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="facebook_url"><?php echo $this->lang->line('facebook_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="facebook_url"  id="facebook_url" value="<?php echo isset($post['facebook_url']) ?  $post['facebook_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('facebook_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('facebook_url'); ?></div> 
                                        </div>
                                    </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="twitter_url"><?php echo $this->lang->line('twitter_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="twitter_url"  id="twitter_url" value="<?php echo isset($post['twitter_url']) ?  $post['twitter_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('twitter_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('twitter_url'); ?></div> 
                                        </div>
                                    </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="linkedin_url"><?php echo $this->lang->line('linkedin_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="linkedin_url"  id="linkedin_url" value="<?php echo isset($post['linkedin_url']) ?  $post['linkedin_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('linkedin_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('linkedin_url'); ?></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="google_plus_url"><?php echo $this->lang->line('google_plus_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="google_plus_url"  id="google_plus_url" value="<?php echo isset($post['google_plus_url']) ?  $post['google_plus_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('google_plus_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('google_plus_url'); ?></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="youtube_url"><?php echo $this->lang->line('youtube_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="youtube_url"  id="youtube_url" value="<?php echo isset($post['youtube_url']) ?  $post['youtube_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('youtube_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('youtube_url'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="instagram_url"><?php echo $this->lang->line('instagram_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="instagram_url"  id="instagram_url" value="<?php echo isset($post['instagram_url']) ?  $post['instagram_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('instagram_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('instagram_url'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="pinterest_url"><?php echo $this->lang->line('pinterest_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="pinterest_url"  id="pinterest_url" value="<?php echo isset($post['pinterest_url']) ?  $post['pinterest_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('pinterest_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('pinterest_url'); ?></div> 
                                        </div>
                                    </div>
                                    
                                </div>

                                 <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('other'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="logo"><?php echo $this->lang->line('logo'); ?> </label>
                                            <div class="btn btn-default btn-file"><i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control col-md-7 col-xs-12"  name="logo" id="logo"  type="file">
                                            </div>
                                            <div class="help-block"><?php echo form_error('logo'); ?></div> 
                                        </div>
                                    </div>
                               
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="theme_name"><?php echo $this->lang->line('theme'); ?> </label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="theme_name">
                                                <?php foreach($themes AS $obj){ ?>
                                                    <option value="<?php echo $obj->slug; ?>" <?php if(isset($post) && $post['theme_name'] == $obj->slug){ echo 'selected="selected"';} ?>><?php echo $obj->name; ?> </option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('theme_name'); ?></div> 
                                        </div>
                                    </div>
                                    
                               </div>   

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('administrator/school/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php  echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                        <?php if(isset($edit)){ ?>
                        <div class="tab-pane fade in active" id="tab_edit_school">
                            <div class="x_content"> 
                               <?php echo form_open_multipart(site_url('administrator/school/edit/'.$school->id), array('name' => 'edit', 'id' => 'edit', 'class'=>'form-horizontal form-label-left'), ''); ?>
                               
                               
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('basic'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="school_code"><?php echo $this->lang->line('school_code'); ?></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_code"  id="school_code" value="<?php echo isset($school) ? $school->school_code : ''; ?>" placeholder="<?php echo $this->lang->line('school_code'); ?> "  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('school_code'); ?></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="school_name"><?php echo $this->lang->line('school'); ?> <?php echo $this->lang->line('name'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_name"  id="school_name" value="<?php echo isset($school) ? $school->school_name : ''; ?>" placeholder="<?php echo $this->lang->line('school'); ?> <?php echo $this->lang->line('name'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('school_name'); ?></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="address"><?php echo $this->lang->line('address'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="address"  id="address" value="<?php echo isset($school) ? $school->address : ''; ?>" placeholder="<?php echo $this->lang->line('address'); ?> " required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('address'); ?></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="phone"><?php echo $this->lang->line('phone'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="phone"  id="phone" value="<?php echo isset($school) ? $school->phone : ''; ?>" placeholder="<?php echo $this->lang->line('phone'); ?> " required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('phone'); ?></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="registration_date"><?php echo $this->lang->line('registration'); ?> <?php echo $this->lang->line('date'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="registration_date"  id="edit_registration_date" value="<?php echo isset($school) ? $school->registration_date : ''; ?>" placeholder="<?php echo $this->lang->line('registration'); ?> <?php echo $this->lang->line('date'); ?> " required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('registration_date'); ?></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="email"><?php echo $this->lang->line('email'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="email"  id="email" value="<?php echo isset($school) ? $school->email : ''; ?>" placeholder="<?php echo $this->lang->line('email'); ?> " required="required" type="email" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('email'); ?></div> 
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="school_fax"><?php echo $this->lang->line('school_fax'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_fax"  id="school_fax" value="<?php echo isset($school) ? $school->school_fax : ''; ?>" placeholder="<?php echo $this->lang->line('school_fax'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('school_fax'); ?></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="footer"><?php echo $this->lang->line('footer'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="footer"  id="footer" value="<?php echo isset($school) ? $school->footer : ''; ?>" placeholder="<?php echo $this->lang->line('footer'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('footer'); ?></div> 
                                        </div>
                                    </div>
                                    
                                                                    
                                   
                                </div>   
                                 
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('setting'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="currency"><?php echo $this->lang->line('currency'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="currency"  id="currency" value="<?php echo isset($school) ? $school->currency : ''; ?>" placeholder="<?php echo $this->lang->line('currency'); ?> " required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('currency'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="currency_symbol"><?php echo $this->lang->line('currency_symbol'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="currency_symbol"  id="currency_symbol" value="<?php echo isset($school) ? $school->currency_symbol : ''; ?>" placeholder="<?php echo $this->lang->line('currency_symbol'); ?> " required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('currency_symbol'); ?></div> 
                                        </div>
                                    </div>
                                    <?php $months = get_months(); ?>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="session_start_month"><?php echo $this->lang->line('session_start_month'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="session_start_month" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach($months as $key=>$value){ ?>
                                                    <option value="<?php echo $key; ?>" <?php if(isset($school) && $school->session_start_month == $key){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('session_start_month'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="session_end_month"><?php echo $this->lang->line('session_end_month'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="session_end_month" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach($months as $key=>$value){ ?>
                                                    <option value="<?php echo $key; ?>" <?php if(isset($school) && $school->session_end_month == $key){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('session_end_month'); ?></div> 
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="enable_frontend"><?php echo $this->lang->line('enable_frontend'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="enable_frontend" required="required">
                                                <option value="1" <?php if(isset($school) && $school->enable_frontend == 1){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('yes'); ?></option>
                                                <option value="0" <?php if(isset($school) && $school->enable_frontend == 0){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('no'); ?></option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('enable_frontend'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="final_result_type"><?php echo $this->lang->line('exam_final_result'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="final_result_type" required="required">
                                                <option value="0" <?php if(isset($school) && $school->final_result_type == 0){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('avg_of_all_exam'); ?> </option>
                                                <option value="1" <?php if(isset($school) && $school->final_result_type == 1){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('only_of_fianl_exam'); ?> </option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('final_result_type'); ?></div> 
                                        </div>
                                    </div>
                               
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="school_lat"><?php echo $this->lang->line('school_lat'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_lat"  id="school_lat" value="<?php echo isset($school) ? $school->school_lat : ''; ?>" placeholder="<?php echo $this->lang->line('school_lat'); ?> "  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('school_lat'); ?></div> 
                                        </div>
                                    </div>    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="school_lng"><?php echo $this->lang->line('school_lng'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_lng"  id="school_lng" value="<?php echo isset($school) ? $school->school_lng : ''; ?>" placeholder="<?php echo $this->lang->line('school_lng'); ?> "  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('school_lng'); ?></div> 
                                        </div>
                                    </div>    
                                    
                                </div>
                                                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('social'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                
                                <div class="row">
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="facebook_url"><?php echo $this->lang->line('facebook_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="facebook_url"  id="facebook_url" value="<?php echo isset($school) ? $school->facebook_url : ''; ?>" placeholder="<?php echo $this->lang->line('facebook_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('facebook_url'); ?></div> 
                                        </div>
                                    </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="twitter_url"><?php echo $this->lang->line('twitter_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="twitter_url"  id="twitter_url" value="<?php echo isset($school) ? $school->twitter_url : ''; ?>" placeholder="<?php echo $this->lang->line('twitter_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('twitter_url'); ?></div> 
                                        </div>
                                    </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="linkedin_url"><?php echo $this->lang->line('linkedin_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="linkedin_url"  id="linkedin_url" value="<?php echo isset($school) ? $school->linkedin_url : ''; ?>" placeholder="<?php echo $this->lang->line('linkedin_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('linkedin_url'); ?></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="google_plus_url"><?php echo $this->lang->line('google_plus_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="google_plus_url"  id="google_plus_url" value="<?php echo isset($school) ? $school->google_plus_url : ''; ?>" placeholder="<?php echo $this->lang->line('google_plus_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('google_plus_url'); ?></div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="youtube_url"><?php echo $this->lang->line('youtube_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="youtube_url"  id="youtube_url" value="<?php echo isset($school) ? $school->youtube_url : ''; ?>" placeholder="<?php echo $this->lang->line('youtube_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('youtube_url'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="instagram_url"><?php echo $this->lang->line('instagram_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="instagram_url"  id="instagram_url" value="<?php echo isset($school) ? $school->instagram_url : ''; ?>" placeholder="<?php echo $this->lang->line('instagram_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('instagram_url'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="pinterest_url"><?php echo $this->lang->line('pinterest_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="pinterest_url"  id="pinterest_url" value="<?php echo isset($school) ? $school->pinterest_url : ''; ?>" placeholder="<?php echo $this->lang->line('pinterest_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('pinterest_url'); ?></div> 
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('other'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="status"><?php echo $this->lang->line('status'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="status" required="required">
                                                <option value="1" <?php if(isset($school) && $school->status == 1){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('active'); ?></option>
                                                <option value="0" <?php if(isset($school) && $school->status == 0){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('in_active'); ?></option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('enable_frontend'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="logo"><?php echo $this->lang->line('logo'); ?> </label>
                                            <div class="btn btn-default btn-file"><i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control col-md-7 col-xs-12"  name="logo" id="logo"  type="file">
                                            </div>
                                            <div class="help-block"><?php echo form_error('logo'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="logo">&nbsp;</label>
                                            <?php if($school->logo){ ?>
                                            <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $school->logo; ?>" alt="" width="80" style="background: #34347a; padding: 5px;"/><br/><br/>
                                                 <input name="logo_prev" value="<?php echo isset($school) ? $school->logo : ''; ?>"  type="hidden">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="theme_name"><?php echo $this->lang->line('theme'); ?> </label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="theme_name">
                                                <?php foreach($themes AS $obj){ ?>
                                                    <option value="<?php echo $obj->slug; ?>" <?php if(isset($school) && $school->status == $obj->slug){ echo 'selected="selected"';} ?>><?php echo $obj->name; ?> </option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('theme_name'); ?></div> 
                                        </div>
                                    </div>
                                    
                                </div>                                 

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" value="<?php echo isset($school) ? $school->id : '' ?>" name="id" />
                                        <a href="<?php echo site_url('administrator/school/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php  echo $this->lang->line('update'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bs-school-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title"><?php echo $this->lang->line('school'); ?> <?php echo $this->lang->line('information'); ?></h4>
        </div>
        <div class="modal-body fn_school_data">            
        </div>       
      </div>
    </div>
</div>
<script type="text/javascript">
         
    function get_school_modal(school_id){
         
        $('.fn_school_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loader.gif" /></p>');
        $.ajax({       
          type   : "POST",
          url    : "<?php echo site_url('administrator/school/get_single_school'); ?>",
          data   : {school_id : school_id},  
          success: function(response){                                                   
             if(response)
             {
                $('.fn_school_data').html(response);
             }
          }
       });
    }
</script>
  


<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
 <script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
 <script type="text/javascript">
     
  $('#add_registration_date').datepicker();
  $('#edit_registration_date').datepicker();

    $(document).ready(function() {
          $('#datatable-responsive').DataTable( {
              dom: 'Bfrtip',
              iDisplayLength: 15,
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5',
                  'pageLength'
              ],
              search: true,              
              responsive: true
          });
        });
        
       $("#add").validate();  
       $("#edit").validate();  
</script>