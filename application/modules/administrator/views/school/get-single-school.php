<div class="" data-example-id="togglable-tabs">
    <ul  class="nav nav-tabs bordered">
        <li class="active"><a href="#tab_basic_info"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-info-circle"></i> <?php echo $this->lang->line('basic'); ?> <?php echo $this->lang->line('information'); ?></a> </li>
        <li class=""><a href="#tab_setting_info"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-gear"></i> <?php echo $this->lang->line('setting'); ?> <?php echo $this->lang->line('information'); ?></a> </li>
        <li class=""><a href="#tab_social_info"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-share"></i> <?php echo $this->lang->line('social'); ?> <?php echo $this->lang->line('information'); ?></a> </li>
    </ul>
    <br/>
    
     <div class="tab-content">
        <div  class="tab-pane fade in active" id="tab_basic_info" > 
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <tbody>
                    <tr>
                        <th><?php echo $this->lang->line('school_code'); ?></th>
                        <td><?php echo $school->school_code; ?></td>        
                        <th><?php echo $this->lang->line('school'); ?> <?php echo $this->lang->line('name'); ?></th>
                        <td><?php echo $school->school_name; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo $this->lang->line('address'); ?></th>
                        <td><?php echo $school->address; ?></td>        
                        <th><?php echo $this->lang->line('phone'); ?></th>
                        <td><?php echo $school->phone; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo $this->lang->line('registration'); ?> <?php echo $this->lang->line('date'); ?></th>
                        <td><?php echo $school->registration_date; ?></td>        
                        <th><?php echo $this->lang->line('email'); ?></th>
                        <td><?php echo $school->email; ?></td>
                    </tr>
                    <tr>                         
                        <th><?php echo $this->lang->line('school_lat'); ?></th>
                        <td><?php echo $school->school_lat; ?></td> 
                        <th><?php echo $this->lang->line('school_lng'); ?></th>
                        <td><?php echo $school->school_lng; ?></td> 
                    </tr>
                    <tr>   
                        <th><?php echo $this->lang->line('school_fax'); ?></th>
                        <td><?php echo $this->lang->line($school->school_fax); ?></td>      
                        <th><?php echo $this->lang->line('footer'); ?></th>
                        <td><?php echo $school->footer; ?></td>                           
                    </tr>
                    <tr>                           
                        <th><?php echo $this->lang->line('logo'); ?></th>
                        <td>
                            <?php if($school->logo){ ?>
                                <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $school->logo; ?>" alt="" width="70" style="background: #34347a; padding: 5px;" />
                            <?php } ?>        
                        </td> 
                        <th><?php echo $this->lang->line('theme'); ?></th>
                        <td><?php echo $school->theme_name; ?></td>  
                    </tr>
                    
                </tbody>
            </table>
        </div>
         
        <div  class="tab-pane fade in" id="tab_setting_info" > 
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <tbody>           
                <tr>
                    <th><?php echo $this->lang->line('currency'); ?></th>
                    <td><?php echo $school->currency; ?></td>       
                    <th><?php echo $this->lang->line('currency_symbol'); ?></th>
                    <td><?php echo $school->currency_symbol; ?></td>
                </tr>
                <tr>
                    <th><?php echo $this->lang->line('session_start_month'); ?></th>
                    <td><?php echo $school->session_start_month; ?></td>        
                    <th><?php echo $this->lang->line('session_end_month'); ?></th>
                    <td><?php echo $school->session_end_month; ?></td>
                </tr>
                <tr>
                    <th><?php echo $this->lang->line('enable_frontend'); ?></th>
                    <td><?php echo $school->enable_frontend ? $this->lang->line('yes') : $this->lang->line('no'); ?></td>
                    <th><?php echo $this->lang->line('exam_final_result'); ?></th>
                    <td><?php echo $school->final_result_type ? $this->lang->line('only_of_fianl_exam') : $this->lang->line('avg_of_all_exam'); ?></td>        
                </tr>  
            </tbody>
        </table>
        </div>
         
        <div  class="tab-pane fade in" id="tab_social_info" > 
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <tbody>           
                <tr>
                    <th><?php echo $this->lang->line('facebook_url'); ?></th>
                    <td><?php echo $school->facebook_url; ?></td>       
                    <th><?php echo $this->lang->line('linkedin_url'); ?></th>
                    <td><?php echo $school->linkedin_url; ?></td>
                </tr>
                <tr>
                    <th><?php echo $this->lang->line('twitter_url'); ?></th>
                    <td><?php echo $school->twitter_url; ?></td>        
                    <th><?php echo $this->lang->line('google_plus_url'); ?></th>
                    <td><?php echo $school->google_plus_url; ?></td>
                </tr>
                <tr>
                    <th><?php echo $this->lang->line('instagram_url'); ?></th>
                    <td><?php echo $school->instagram_url; ?></td>        
                    <th><?php echo $this->lang->line('pinterest_url'); ?></th>
                    <td><?php echo $school->pinterest_url; ?></td>
                </tr>  
                <tr>
                    <th><?php echo $this->lang->line('youtube_url'); ?></th>
                    <td><?php echo $school->youtube_url; ?></td>        
                    <th></th>
                    <td></td>        
                </tr>  
            </tbody>
            </table>
        </div>
    </div>
</div>
