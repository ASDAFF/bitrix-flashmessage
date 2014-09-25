function beono_flashmessage_close (message_id, cookie_prefix) {

	var message_element;
	var date = new Date();
	date.setDate(date.getDate() + 365);
	
	document.cookie = cookie_prefix + '_FLASH_MESSAGE=' + message_id + ';path=/;expires='+date.toUTCString();
	if(message_element = document.getElementById('beono_flashmessage_'+message_id)) {
		message_element.style.display = 'none'; 
	}
}