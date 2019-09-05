<div class="" data-example-id="togglable-tabs">
    <ul  class="nav nav-tabs bordered">
        <li  class="active"><a href="#tab_pop_twilio_setting"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i> <?php echo $this->lang->line('twilio'); ?></a> </li>                          
        <li  class=""><a href="#tab_pop_clickatell_setting"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i> <?php echo $this->lang->line('clicktell'); ?> </a> </li>                          
        <li  class=""><a href="#tab_pop_bulk_setting"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i> <?php echo $this->lang->line('bulk'); ?> </a> </li>                          
        <li  class=""><a href="#tab_pop_msg91_setting"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i> <?php echo $this->lang->line('msg91'); ?> </a> </li>                          
        <li  class=""><a href="#tab_pop_plivo_setting"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i> <?php echo $this->lang->line('plivo'); ?> </a> </li>                          
        <li  class=""><a href="#tab_pop_textlocal_setting"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i> <?php echo $this->lang->line('text_local'); ?> </a> </li>                          
        <li  class=""><a href="#tab_pop_smscountry_setting"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i> <?php echo $this->lang->line('sms_country'); ?> </a> </li>                          
    </ul>
    <br/>
    
     <div class="tab-content">   
        <div  class="tab-pane fade in active" id="tab_pop_twilio_setting" > 
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <tbody>           
                <tr>
                    <th><?php echo $this->lang->line('twilio'); ?> <?php echo $this->lang->line('account_sid'); ?></th>
                    <td><?php echo $sms_setting->twilio_account_sid; ?></td> 
                </tr>                    
                <tr>
                    <th><?php echo $this->lang->line('twilio'); ?> <?php echo $this->lang->line('auth_token'); ?></th>
                    <td><?php echo $sms_setting->twilio_auth_token; ?></td>
                </tr>                
                <tr>
                    <th><?php echo $this->lang->line('twilio'); ?> <?php echo $this->lang->line('from_number'); ?></th>
                    <td><?php echo $sms_setting->twilio_from_number; ?></td>
                </tr>                
                <tr>
                    <th><?php echo $this->lang->line('twilio'); ?> <?php echo $this->lang->line('is_active'); ?></th>
                    <td><?php echo $sms_setting->twilio_status ? $this->lang->line('yes'): $this->lang->line('no'); ?></td>
                </tr>               
               
            </tbody>
        </table>
        </div>
         
        <div  class="tab-pane fade in" id="tab_pop_clickatell_setting" > 
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <tbody>           
                <tr>
                    <th><?php echo $this->lang->line('clicktell'); ?> <?php echo $this->lang->line('username'); ?></th>
                    <td><?php echo $sms_setting->clickatell_username; ?></td> 
                </tr>                    
                <tr>
                    <th><?php echo $this->lang->line('clicktell'); ?> <?php echo $this->lang->line('password'); ?></th>
                    <td><?php echo $sms_setting->clickatell_password; ?></td> 
                </tr>                    
                <tr>
                    <th><?php echo $this->lang->line('clicktell'); ?> <?php echo $this->lang->line('api_key'); ?></th>
                    <td><?php echo $sms_setting->clickatell_api_key; ?></td> 
                </tr>                    
                <tr>
                    <th><?php echo $this->lang->line('clicktell'); ?> <?php echo $this->lang->line('from_number'); ?></th>
                    <td><?php echo $sms_setting->clickatell_from_number; ?></td> 
                </tr>         
                <tr>
                    <th><?php echo $this->lang->line('clicktell'); ?> <?php echo $this->lang->line('clickatell_mo_no'); ?></th>
                    <td><?php echo $sms_setting->clickatell_mo_no; ?></td> 
                </tr>         
                <tr>
                    <th><?php echo $this->lang->line('clicktell'); ?> <?php echo $this->lang->line('is_active'); ?></th>
                    <td><?php echo $sms_setting->clickatell_status ? $this->lang->line('yes'): $this->lang->line('no'); ?></td>
                </tr>               
               
            </tbody>
        </table>
        </div>
         
        <div  class="tab-pane fade in" id="tab_pop_bulk_setting" > 
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <tbody>           
                <tr>
                    <th><?php echo $this->lang->line('bulk'); ?> <?php echo $this->lang->line('username'); ?></th>
                    <td><?php echo $sms_setting->bulk_username; ?></td> 
                </tr>         
                <tr>
                    <th><?php echo $this->lang->line('bulk'); ?> <?php echo $this->lang->line('password'); ?></th>
                    <td><?php echo $sms_setting->bulk_password; ?></td> 
                </tr>         
                <tr>
                    <th><?php echo $this->lang->line('bulk'); ?> <?php echo $this->lang->line('is_active'); ?></th>
                    <td><?php echo $sms_setting->bulk_status ? $this->lang->line('yes'): $this->lang->line('no'); ?></td>
                </tr> 
            </tbody>
            </table>
        </div>
         
        <div  class="tab-pane fade in" id="tab_pop_msg91_setting" > 
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <tbody>           
                <tr>
                    <th><?php echo $this->lang->line('msg91'); ?> <?php echo $this->lang->line('auth_key'); ?></th>
                    <td><?php echo $sms_setting->msg91_auth_key; ?></td> 
                </tr>         
                <tr>
                    <th><?php echo $this->lang->line('msg91'); ?> <?php echo $this->lang->line('sender_id'); ?></th>
                    <td><?php echo $sms_setting->msg91_sender_id; ?></td> 
                </tr>  
                <tr>
                    <th><?php echo $this->lang->line('msg91'); ?> <?php echo $this->lang->line('is_active'); ?></th>
                    <td><?php echo $sms_setting->msg91_status ? $this->lang->line('yes'): $this->lang->line('no'); ?></td>
                </tr> 
            </tbody>
            </table>
        </div>
         
        <div  class="tab-pane fade in" id="tab_pop_plivo_setting" > 
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <tbody>           
                <tr>
                    <th><?php echo $this->lang->line('plivo'); ?> <?php echo $this->lang->line('auth_id'); ?></th>
                    <td><?php echo $sms_setting->plivo_auth_id; ?></td> 
                </tr> 
                <tr>
                    <th><?php echo $this->lang->line('plivo'); ?> <?php echo $this->lang->line('auth_token'); ?></th>
                    <td><?php echo $sms_setting->plivo_auth_token; ?></td> 
                </tr> 
                <tr>
                    <th><?php echo $this->lang->line('plivo'); ?> <?php echo $this->lang->line('from_number'); ?></th>
                    <td><?php echo $sms_setting->plivo_from_number; ?></td> 
                </tr> 
                <tr>
                    <th><?php echo $this->lang->line('plivo'); ?> <?php echo $this->lang->line('is_active'); ?></th>
                    <td><?php echo $sms_setting->plivo_status ? $this->lang->line('yes'): $this->lang->line('no'); ?></td>
                </tr> 
            </tbody>
            </table>
        </div>
         
        <div  class="tab-pane fade in" id="tab_pop_textlocal_setting" > 
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <tbody>           
                <tr>
                    <th><?php echo $this->lang->line('textlocal'); ?> <?php echo $this->lang->line('username'); ?></th>
                    <td><?php echo $sms_setting->textlocal_username; ?></td> 
                </tr>                  
                <tr>
                    <th><?php echo $this->lang->line('textlocal'); ?> <?php echo $this->lang->line('hash_key'); ?></th>
                    <td><?php echo $sms_setting->textlocal_hash_key; ?></td> 
                </tr>                  
                <tr>
                    <th><?php echo $this->lang->line('textlocal'); ?> <?php echo $this->lang->line('sender_id'); ?></th>
                    <td><?php echo $sms_setting->textlocal_sender_id; ?></td> 
                </tr>                  
                <tr>
                    <th><?php echo $this->lang->line('textlocal'); ?> <?php echo $this->lang->line('is_active'); ?></th>
                    <td><?php echo $sms_setting->textlocal_status ? $this->lang->line('yes'): $this->lang->line('no'); ?></td>
                </tr> 
            </tbody>
            </table>
        </div>
         
         
        <div  class="tab-pane fade in" id="tab_pop_smscountry_setting" > 
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <tbody>           
                <tr>
                    <th><?php echo $this->lang->line('smscountry'); ?> <?php echo $this->lang->line('username'); ?></th>
                    <td><?php echo $sms_setting->smscountry_username; ?></td> 
                </tr>                 
                <tr>
                    <th><?php echo $this->lang->line('smscountry'); ?> <?php echo $this->lang->line('password'); ?></th>
                    <td><?php echo $sms_setting->smscountry_password; ?></td> 
                </tr>                 
                <tr>
                    <th><?php echo $this->lang->line('smscountry'); ?> <?php echo $this->lang->line('sender_id'); ?></th>
                    <td><?php echo $sms_setting->smscountry_sender_id; ?></td> 
                </tr>           
                <tr>
                    <th><?php echo $this->lang->line('smscountry'); ?> <?php echo $this->lang->line('is_active'); ?></th>
                    <td><?php echo $sms_setting->smscountry_status ? $this->lang->line('yes'): $this->lang->line('no'); ?></td>
                </tr> 
            </tbody>
            </table>
        </div>
         
    </div>
</div>
