<?if(!check_bitrix_sessid()) return;?>
<?
echo CAdminMessage::ShowNote(GetMessage("MOD_INST_OK"));
?>
<p><a href="/bitrix/admin/settings.php?lang=ru&mid=beono.flashmessage"><?=GetMessage("BEONO_MODULE_FLASHMESSAGE_INSTALL_OK")?></a></p>
<form action="<?echo $APPLICATION->GetCurPage()?>">
    <input type="hidden" name="lang" value="<?echo LANG?>">
    <input type="submit" name="" value="<?echo GetMessage("MOD_BACK")?>">
<form>