<div class="borders">

    <div class="col-md-4 listWrapper">
        <div class="innerBox" id="contacts-search">
            <form autocomplete="off" class="form-inline margin-none">
                <div class="input-group input-group-sm">
                    <input class="form-control" id="contacts-search-input" placeholder="Filter Contacts ..." type="text">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-xs pull-right"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
        <div id="tabs-control" class="bg-gray strong border-top border-bottom text-center">
        	<div class="col-md-6 padding-none"><a href="#" id="tab-chats" class="tab border-right active-tab">
            	<div id="loadingDiv-chats"></div>
            	<span class="glyphicon glyphicon-envelope"></span> Chats</a>
            </div>
            <div class="col-md-6 padding-none"><a href="#" id="tab-contacts" class="tab">
            	<div id="loadingDiv-contacts"></div>
            	<span class="glyphicon glyphicon-user"></span> Contacts (<?php echo $msg->count_contacts($msg->logged_user_id); ?>)</a>
            </div>
            <div class="clearfix"></div>
        </div>
        <?php 	
			$init_load = true;
			$chat_tab = true;
			include('html_chat_list.php'); 
		?>
    </div>

    <div class="col-md-8 messageWrapper">
        <div id="loadingDiv"></div>
        <div id="errorDiv"></div>
        <div id="text-messages-request">
            <p class="innerBox">Read your messages by selecting a contact...</p>
        </div>
    </div>

</div>