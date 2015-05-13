<script type="text/javascript">
function toggleEditor(id) {
    if (!tinyMCE.get(id)) {
        tinyMCE.execCommand('mceAddControl', false, id);
        $('input#editor_toggler').attr('value', 'Hide Editor');
    } else {
        tinyMCE.execCommand('mceRemoveControl', false, id);
        $('input#editor_toggler').attr('value', 'Show Editor');
    }
}

function show_media_box() {
    $.fancybox({
        'type': 'iframe',
        'height': 500,
        'width': 750,
        'padding': 0,
        'href': '<?php echo site_url('inf-backend/media/m_browser ')?>'
    });
}

function add_to_textarea(textareaID, val) {
    if (tinyMCE.get(textareaID)) {
        tinyMCE.execCommand('mceInsertRawHTML', false, val);
        //alert("yay");
        } else {
        var textareaID = document.getElementById(textareaID);
        //IE support
        if (document.selection) {
            textareaID.focus();
            sel = document.selection.createRange();
            sel.text = val;
        }
        //MOZILLA/NETSCAPE support
        else if (textareaID.selectionStart || textareaID.selectionStart == '0') {
            var startPos = textareaID.selectionStart;
            var endPos = textareaID.selectionEnd;
            textareaID.value = textareaID.value.substring(0, startPos) + val + textareaID.value.substring(endPos, textareaID.value.length);
        } else {
            textareaID.value += val;
        }
        //alert("aaw");
        //$("#"+textareaID).val($("#"+textareaID).val() +val) ;
        }
}
</script>
<?php if (isset($error)): ?>
<!-- Start Notification -->
<div class="grid_12">
	<div style="display: block;" class="notification error"> 
		<span class="strong">Maaf!</span>
		<span class="close" title="Dismiss"></span>
		<p><?php echo $error; ?></p>
	</div>
</div>
<!-- Start Notification -->
<?php endif; ?>

<!-- Start Forms -->

<form method="post" action="<?php echo current_url(); ?>">
	<div class="grid_8">
		<div class="box-header">New Article</div>
		<div class="box">
			<div class="row">
	            <p><label>Subject :</label></p>
	            <input type="text" value="<?php echo $get_data->articles_subject;?>" name="articles_subject" />
	        </div>

			<div class="row">
	            <p><label>Post :</label></p>
				<div class="editor_option_wrapper">
					<input id="media_button" type="button" class="button small" value="Insert Media" onclick="show_media_box()"><input id="editor_toggler" type="button" class="button small" value="Hide Editor" onclick="toggleEditor('content')">
				</div>
				<?php //echo load_tiny_mce('content')?>
	            <textarea id="content" class="tinymce mceEditor" name="articles_post" cols="5" rows="15"><?php echo $get_data->articles_post;?></textarea>
	        </div>
		</div>
	</div>
	<div class="grid_4">
		<div class="box-header">Article Setting</div>
		<div class="box">
			<div class="row">
                <p><label>Publish :</label></p>
                <input name="articles_status" class="radio" type="radio" value="y" <?php echo ($get_data->articles_status=='y')?"checked=\"checked\"":"";?>/ /><label class="radio">Publish</label>
                <input name="articles_status" class="radio" type="radio" value="n" <?php echo ($get_data->articles_status=='n')?"checked=\"checked\"":"";?>/ checked="checked" /><label class="radio">Draft</label>
                <br class="cl" />
            </div>
			<div class="row">
				<input value="Simpan" name="submit" class="button small" type="submit" />
			</div>
		</div>
	</div>
</form>
<br class="cl" />
<!-- End Forms -->