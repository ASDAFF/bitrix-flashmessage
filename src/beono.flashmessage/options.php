<?
IncludeModuleLangFile(__FILE__);
$APPLICATION->SetTitle(GetMessage("BEONO_MODULE_FLASHMESSAGE_OPTIONS_TAB_1"));		
if ($USER->IsAdmin()):
	
	if ($_POST['text'] && check_bitrix_sessid()) {
		
		$message_data = array (
			'active' => $_POST['active'],
			'text' => $_POST['text'],
			'id' => $_POST['id']
		);
		
		if ($_POST['create'] || !$_POST['id']) {
			$message_data['id'] = time();
		}
			
		COption::SetOptionString('beono.flashmessage', "message", serialize($message_data));
		
		if (!$error) {	
			CAdminMessage::ShowNote(GetMessage('BEONO_MODULE_FLASHMESSAGE_SAVED'));
			LocalRedirect($APPLICATION->GetCurPageParam());
		}
	}
	
	if ($error) {
		CAdminMessage::ShowMessage($error);
	}
	
	if($arFormField = COption::GetOptionString('beono.flashmessage', "message")) {
		$arFormField = unserialize($arFormField);
	}
	
	echo BeginNote();
	echo GetMessage("BEONO_MODULE_FLASHMESSAGE_DESCRIPTION");
	echo EndNote();
	
	$aTabs = array();
	$aTabs[] = array("DIV" => "edit1", "TAB" => GetMessage("BEONO_MODULE_FLASHMESSAGE_OPTIONS_TAB_1"), "ICON" => "settings", "TITLE" => GetMessage("BEONO_MODULE_FLASHMESSAGE_OPTIONS_TAB_1_TITLE"));
	
	$tabControl = new CAdminTabControl("tabControl", $aTabs);
	$tabControl->Begin();?>
	<form method="post" action="<?echo $APPLICATION->GetCurPage()?>?mid=<?=urlencode($mid)?>&amp;lang=<?echo LANGUAGE_ID?>">
		<?=bitrix_sessid_post();?>
		<?$tabControl->BeginNextTab();?>
			<tr>
				<td valign="top" class="field-name"><label for="flashmessage_text"><?=GetMessage('BEONO_MODULE_FLASHMESSAGE_OPTIONS_MESSAGE');?>:</label>
				</td>
				<td><textarea maxlength="800" name="text" id="flashmessage_text" cols="50" rows="10" required="required"><?=$arFormField['text'];?></textarea>
				</td>
			</tr>
			<?if(is_numeric($arFormField['id'])):?>
			<tr>
				<td class="field-name"><label for="flashmessage_id"><?=GetMessage('BEONO_MODULE_FLASHMESSAGE_OPTIONS_ID');?>:</label>
				</td>
				<td>
					<?=date('Y-m-d H:i:s', $arFormField['id']);?>
					<input type="hidden" name="id" value="<?=intval($arFormField['id']);?>" />
				</td>
			</tr>
			<?endif;?>
			<tr>
				<td valign="top" class="field-name"><?=GetMessage('BEONO_MODULE_FLASHMESSAGE_OPTIONS_STATUS');?>:
				</td>
				<td>
					<label><input type="checkbox" name="active" value="1" <?if($arFormField['active'] || !$arFormField['id']):?>checked="checked"<?endif;?> /> <?=GetMessage('BEONO_MODULE_FLASHMESSAGE_OPTIONS_ON');?></label>
				</td>
			</tr>
		<?$tabControl->Buttons();?>
		<input type="submit" name="create" class="adm-btn-save" value="<?=GetMessage("BEONO_MODULE_FLASHMESSAGE_OPTIONS_NEWMESSAGE")?>">
		<?if(is_numeric($arFormField['id'])):?>
		<input type="submit" name="update" value="<?=GetMessage("MAIN_SAVE")?>">
		<?endif;?>
		<?$tabControl->End();?>
	</form>
<?endif;?>