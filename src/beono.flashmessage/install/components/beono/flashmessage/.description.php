<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage('BEONO_FLASHMESSAGE_NAME'),
	"DESCRIPTION" => GetMessage('BEONO_FLASHMESSAGE_DESC'),
	"ICON" => "/images/icon.gif",
	"SORT" => 10,
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "utility",
		"CHILD" => array(
			"ID" => "user",
		),
	),
	"COMPLEX" => "N",
);

?>