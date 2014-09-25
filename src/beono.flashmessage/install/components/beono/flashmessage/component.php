<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!CModule::IncludeModule('beono.flashmessage')) {
	ShowError('Module "beono.flashmessage" is not installed');
	return false;
}

if ($_SERVER['X-Requested-With'] == 'XMLHttpRequest' || $_REQUEST['bxajaxid'] || $_REQUEST['AJAX_CALL'] == 'Y') {
	return false;	
} 
	
if($arMessage = COption::GetOptionString('beono.flashmessage', "message")) {
	$arMessage = unserialize($arMessage);
	
	if (!$arMessage['active'] || !$arMessage['text'] || !$arMessage['id']) {
		return false;		
	}
	$arResult['MESSAGE']['TEXT'] = substr($arMessage['text'], 0, 800); 
	$arResult['MESSAGE']['ID'] = $arMessage['id']; 
	$arResult['MESSAGE']['ACTIVE'] = $arMessage['active']; 
	
	$arResult['COOKIE_PREFIX'] = COption::GetOptionString("main", "cookie_name", "BITRIX_SM");
	
	// if user didn't close this message, then we need to show message
	if ($APPLICATION->get_cookie('FLASH_MESSAGE') != $arResult['MESSAGE']['ID']) {
		$this->IncludeComponentTemplate();
	}
}	

?>