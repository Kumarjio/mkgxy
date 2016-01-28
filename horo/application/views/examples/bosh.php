<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="/cisco/jaxl.js"></script>
<script type="text/javascript">jaxl.pollUrl = "<?php echo BOSHCHAT_POLL_URL; ?>";</script>
<script type="text/javascript">
var boshchat = {
	payloadHandler: function(payload) {
		if(payload.jaxl == 'authFailed') {
			jaxl.connected = false;
			$('#button input').val('Connect');
		}
		else if(payload.jaxl == 'connected') {
				jaxl.connected = true;
				jaxl.jid = payload.jid;
				obj = new Object;
                obj['jaxl'] = 'message1';
                obj['message'] = 'hello world';
                jaxl.sendPayload(obj);
		} else if(payload.jaxl == 'disconnected') {
                jaxl.connected = false;
                jaxl.disconnecting = false;

                $('#read').css('display', 'none');
                $('#write').css('display', 'none');
                $('#uname').css('display', 'block');
                $('#passwd').css('display', 'block');
                $('#button input').val('Connect');

                console.log('disconnected');
        } else if(payload.jaxl == 'message') {
			boshchat.appendMessage(jaxl.urldecode(payload.message));
            jaxl.ping();
        }
        else if(payload.jaxl == 'pinged') {
            jaxl.ping();
        }
	},
	appendMessage: function(message) {
		console.log(message);
		$('#chat').prepend(message);
	}
}
jQuery(function($) {
    $(document).ready(function() {
		jaxl.payloadHandler = new Array('boshchat', 'payloadHandler');
		$('#button input').click(function() {
			if($(this).val() == 'Connect') {
				$(this).val('Connecting...');
				obj = new Object;
				obj['user'] = $('#uname input').val();
				obj['pass'] = $('#passwd input').val();
				
				jaxl.connect(obj);
			} else if($(this).val() == 'Disconnect') {
				
			}
		});
		
	});
});
</script>
</head>

<body>
 <center>
                        <h1>Bosh Sample</h1>
                        <div id="uname">
                                <label>Username:</label>
                                <input type="text" value=""/>
                        </div>
                        <div id="passwd">
                                <label>Password:</label>
                                <input type="password" value=""/>
                        </div>
                        <div id="read"></div>
                        <div id="button">
                                <label></label>
                                <input type="button" value="Connect"/>
                        </div>
                </center>
<div id="chat">

</div>
</body>
</html>