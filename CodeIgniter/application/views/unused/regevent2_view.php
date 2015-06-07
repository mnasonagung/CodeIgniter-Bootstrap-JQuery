<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('regevent2', $attributes); ?>

<p>
        <label for="parti_id">Participant Id <span class="required">*</span></label>
        <?php echo form_error('parti_id'); ?>
        <br /><input id="parti_id" type="text" name="parti_id"  value="<?php echo set_value('parti_id'); ?>"  />
</p>

<p>
        <label for="event_id">Event Id <span class="required">*</span></label>
        <?php echo form_error('event_id'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
                                                  ''  => 'Please Select',
                                                  'example_value1'    => 'example option 1'
                                                ); ?>

        <br /><?php echo form_dropdown('event_id', $options, set_value('event_id'))?>
</p>                                             
                        
<p>
	
        <?php echo form_error('event_type'); ?>
        
        <?php // Change the values/css classes to suit your needs ?>
        <br /><input type="checkbox" id="event_type" name="event_type" value="enter_value_here" class="" <?php echo set_checkbox('event_type', 'enter_value_here'); ?>> 
                   
	<label for="event_type">Event Type</label>
</p> 
<p>
        <label for="parti_type">Parti Type</label>
        <?php echo form_error('parti_type'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
                                                  ''  => 'Please Select',
                                                  'example_value1'    => 'example option 1'
                                                ); ?>

        <br /><?php echo form_dropdown('parti_type', $options, set_value('parti_type'))?>
</p>                                             
                        
<p>
        <label for="link_id">Link Id</label>
        <?php echo form_error('link_id'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
                                                  ''  => 'Please Select',
                                                  'example_value1'    => 'example option 1'
                                                ); ?>

        <br /><?php echo form_dropdown('link_id', $options, set_value('link_id'))?>
</p>                                             
                        
<p>
        <label for="main_amount">Main Amount</label>
        <?php echo form_error('main_amount'); ?>
        <br /><input id="main_amount" type="text" name="main_amount"  value="<?php echo set_value('main_amount'); ?>"  />
</p>

<p>
        <label for="link_amount">Link Amount</label>
        <?php echo form_error('link_amount'); ?>
        <br /><input id="link_amount" type="text" name="link_amount"  value="<?php echo set_value('link_amount'); ?>"  />
</p>


<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>
