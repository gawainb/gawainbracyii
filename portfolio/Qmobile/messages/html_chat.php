<?php
	$i = 0;
	
	if(isset($lastid)) { } else { $lastid = 0; }

	if($lastid == '' || $lastid == 0)
	{
		$lastid = 0; // for pagination
	}

	$limit_clause = ' ORDER BY id DESC LIMIT '.$db->escape($lastid).','.$perpage;

	$messages = $msg->get_messages($user_id, $limit_clause);
	
	if(is_array($messages)) 
	{ 
		$total = $msg->count_($msg->get_messages($user_id));
		$current = $msg->count_($messages); 
	} else { 
		$total = 0; 
		$current = 0;
	}
	
?>

<?php if(!isset($load_more)) { ?> 
<div class="active-message">
    <div class="media">
        <a href="#" class="pull-left">
            <img src="<?php echo profile_picture($user_id, $base_url); ?>" class="media-object" width="65" height="65">
        </a>
        <div class="media-body innerBox-topbottom innerBox-right">
            <div class="innerBox-top innerBox-half pull-right message-btn-target">
            <a href="#type" class="btn btn-default btn-sm" id="type-a-message" data-toggle="collapse">
                <i class="glyphicon glyphicon-pencil"></i> Write
            </a>
            </div>
            <h4 class="pull-left strong no-margin">
				<?php echo $msg->return_display_name($user_id); ?>
            	<br />
                <span id="last-seen">
					<?php 
						$last_seen = $msg->last_seen($user_id);
						if($last_seen !== false)
						{
							echo $msg->calculate_last_seen($last_seen, $user_id);
						}
					?>
                </span>
            </h4>
        </div>
    </div>
</div>

<div id="type" class="collapse border-top">
	<div id="chat-toolbar">
    	<a id="emoticons" href="#"><span class="glyphicon glyphicon-tree-deciduous" title="emoticons"></span></a>
        <a id="send-photo" href="#"><span class="glyphicon glyphicon-camera" title="send photo"></span></a>
        <a id="send-location" href="#"><span class="glyphicon glyphicon-asterisk" title="send location"></span></a>
        <a id="send-file" class="pull-right" href="#"><span class="glyphicon glyphicon-upload" title="send file"></span></a>
        <div class="clearfix"></div>
    </div>
    <textarea type="text" class="type-a-message-box form-control border-none" id="<?php echo $user_id; ?>" placeholder="Write a message"></textarea>
</div>
<?php } ?>

<?php
$more = $lastid + 1;
if($more == 1)
{
	$account = $total - $perpage;
} else {
	$account = $total - $more - 1;	
}

if($account > 0)
{
	if($total > $current && $total !== $more)
	{
		echo '<div id="more'.$lastid.'" class="more-messages-parent bg-gray innerBox innerBox-half text-center margin-none border-top border-bottom">';
			echo '<a href="#" class="load-more-messages text-muted" id="'.$lastid.'" rel="'.$user_id.'">View older messsages (<span id="count-old-messages">'.$account.'</span>)</a>';
		echo '</div>';
	}
}

?>

<?php if(!isset($load_more)) { ?>
<div id="type" class="collapse border-top">
    <textarea type="text" class="form-control border-none" id="type-a-message-box" placeholder="Escreva a mensagem"></textarea>
</div>

<div class="border-top" id="text-messages">
<?php } ?>
	
    <?php if($messages !== false) { ?>
    	
        <?php foreach($messages as $message) {  
			
				if($i > 0) { $class = ' border-top'; }
				if($message['user_id'] == $msg->logged_user_id)
				{
					$chat_name = 'You';
				} else {
					$chat_name = $msg->return_display_name($message['user_id']);	
				}
				
				if(!isset($new_msg))
				{
					if($message['status'] == 'unread')
					{
						$msg->update_message_status($message['id'], $user_id);	
					}	
				}
			?>
            <div class="media innerBox msg-div" id="u_msg<?php echo $message['id']; ?>">
            <a href="profile.php?id=<?php echo $message['user_id']; ?>" class="pull-left hidden-xs">
                <img src="<?php echo profile_picture($message['user_id'], $base_url); ?>" class="media-object" width="60" height="60">
            </a>
            <div class="media-body">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="chat-style">
                            <div class="media">
                                <div class="pull-left">
                                    <span class="innerBox-right text-muted visible-xs"><?php echo $msg->format_date_default($message['time']); ?> </span>
                                </div>
                                <div class="media-body">
                                    <a href="profile.php?id=<?php echo $message['user_id']; ?>" class="strong text-inverse"><?php echo $chat_name; ?></a><br />
                                    <?php echo $msg->read_messages($message['message']); ?>
                                </div>
                            </div>
                        </div>	
                    </div>
                    <div class="col-sm-2 hidden-xs">
                        <span class="pull-right innerBox-right text-muted"><i class="pull-right remove-message" id="<?php echo $message['id']; ?>" data-user="<?php echo $message['user_id']; ?>">&times;</i> <?php echo $msg->format_date_default($message['time']); ?></span>
                    </div>
                </div>
            </div>
        </div>
            
        <?php $i++; } ?>
        
    <?php } else { ?>
    	<p class="innerBox border-top no-messages">No Messages</p>
    <?php } ?>
 
<?php if(!isset($load_more)) { ?>    
</div>
<?php } ?>
