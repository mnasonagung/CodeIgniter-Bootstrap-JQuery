<fieldset>
<legend>Register Event</legend>
 <?php     
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open('regevent', $attributes); ?>
<div class="control-group">
    <label for="parti_id" class="control-label">Participant Name</label>
    <div class='controls'>
        <label for="parti_name" class="text-left">
        <?php echo $participant['0']['parti_name'] . ',' . $participant['0']['title']; ?>
        </label>
        <input type="hidden" name="parti_id" value="<?php echo $participant['0']['parti_id']; ?>"/>
        
    </div>
</div>
<div class="control-group">
    <label for="event_id" class="control-label">Event Name
</label>
    <div id="event" class="controls">
    <?php echo form_dropdown("event_id", $event_list,"","id='event_id'"); ?>
                <?php echo form_error('event_id'); ?>
    </div>
    
</div>
<div class="control-group">
    <div class='controls'>
    <label for="event_type" class="checkbox">
    <input type="checkbox" id="main_flag" name="main_flag" value="1" class="" <?php echo set_checkbox('main_flag', '1'); ?>>
    Symposium
    </label>		
    </div>
</div>
<div class="control-group">
    <label for="parti_type_id" class="control-label">Participant Type</label>
    <div class='controls'>
        <label class="text-left">
        <?php 
        $i = $participant['0']['parti_type'];
        switch ($i) {
            case 1:
                echo "Specialist";
                break;
            case 2:
                echo "General Practitioner";
                break;
            case 3:
                echo "Nurse";
                break;
        }        
        ?>
        </label>
        <input type="hidden" id="parti_type_id" name="parti_type_id" value="<?php echo $participant['0']['parti_type']; ?>"/>        
    <div id="parti_type_amount">
       <input id="main_amount" type="hidden" name="main_amount" maxlength="10" value="<?php echo set_value('main_amount'); ?>"  disabled/>
    </div>
    </div>
</div>
<div>
    <div class='controls'>
    <label for="event_type" class="checkbox">
    <input type="checkbox" id="link_flag" name="link_flag" value="1" class="" <?php echo set_checkbox('link_flag', '1'); ?>>
    Workshop
    </label>		
    </div>
    <?php echo form_error('event_type'); ?>
</div>
<div class="control-group">
    <label for="link_id" class="control-label">Workshop</label>
<div id="link" class="controls">

<?php echo form_dropdown("link_id", array('Select Event'=>'- Select event first -','1' => 'Satu'),"")?>
            <?php echo form_error('link_id'); ?>
</div>
    
</div>
<div class="control-group">
    <label for="link_amount" class="control-label">Workshop Amount</label>
    <div id="link_amt" class='controls'>
       <input id="link_amount" type="hidden" name="link_amount" maxlength="10" value="<?php echo set_value('link_amount'); ?>"  />
             <?php echo form_error('link_amount'); ?>
    </div>
</div>
<div class="control-group">
    <label></label>
    <div class='controls'>
        <?php echo form_submit( 'submit', 'Submit'); ?>
    </div>
</div>
<?php echo form_close(); ?>
</fieldset>
<script type="text/javascript">
        $("#event_id").change(function(){
                var event_id = {event_id:$("#event_id").val()};
                $.ajax({
                        type: "POST",
                        url : "<?php echo site_url('regevent/select_link')?>",
                        data: event_id,
                        success: function(msg){
                            $('#link').html(msg);
                        }
                    });
                var event_parti = {event_id:$("#event_id").val(), parti_type_id:$("#parti_type_id").val()};
                $.ajax({
                        type: "POST",
                        url : "<?php echo site_url('regevent/get_main_amt')?>",
                        data: event_parti,
                        success: function(msg){
                            $('#parti_type_amount').html(msg);
                        }
                    });
        });

        $('body').delegate("#link_id","change", function() {
                var event_link = {event_id:$("#event_id").val(), link_id:$("#link_id").val()};
                $.ajax({
                        type: "POST",
                        url : "<?php echo site_url('regevent/get_link_amt')?>",
                        data: event_link,
                        success: function(msg){
                            $('#link_amt').html(msg);
                        }
                    });
        });        
</script>