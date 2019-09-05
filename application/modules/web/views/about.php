<section class="page-breadcumb-area bg-with-black">
    <div class="container text-center">
        <h2 class="title"><?php echo $this->lang->line('about'); ?> <?php echo $this->lang->line('school'); ?></h2>
        <ul class="links">
            <li><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
            <li><a href="javascript:void(0);"><?php echo $this->lang->line('about'); ?> <?php echo $this->lang->line('school'); ?></a></li>
        </ul>
    </div>
</section>

<?php if(isset($school->about_text) && !empty($school->about_text)){ ?>
<section class="top-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="top-banner-content">
                    <h3 class="intro"><?php echo $this->lang->line('welcome_to'); ?></h3>
                    <h2 class="title">
                        <?php if(isset($school->school_name)){ ?>
                            <?php echo $school->school_name; ?>
                        <?php }else{ ?>
                              <?php echo SMS; ?>
                        <?php } ?>
                    </h2>
                    <p class="text">                        
                         <?php echo $school->about_text; ?>                       
                    </p>                    
                </div>
            </div>            
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center">
                <div class="top-banner-img">
                    <?php if(isset($school->about_image) && !empty($school->about_image)){ ?>
                            <img src="<?php echo UPLOAD_PATH; ?>about/<?php echo $school->about_image; ?>" alt="">
                    <?php } ?>                     
                </div>
            </div>
        </div>
    </div>
</section>
 <?php } ?> 
