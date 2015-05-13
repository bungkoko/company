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
<form method="post" action="<?php echo site_url('team/create') ?>" enctype="multipart/form-data">
	<div class="grid_4">
		<div class="box-header">Input Team</div>
		<div class="box">
			<div class="row">
	            <p><label>Name :</label></p>
	            <input type="text" name="team_name" />
	        </div>
	        <div class="row">
	        	<p><label>Avatar</label></p>
	        	<input type="file" name="team_avatar"/>
	        </div>
	        <div class="row">
	            <p><label>Description :</label></p>
				<div class="editor_option_wrapper">
					<input id="media_button" type="button" class="button small" value="Insert Media" onclick="show_media_box()"><input id="editor_toggler" type="button" class="button small" value="Hide Editor" onclick="toggleEditor('content')">
				</div>
				<?php //echo load_tiny_mce('content')?>
	            <textarea id="content" class="tinymce mceEditor" name="team_description" cols="5" rows="15"></textarea>
	        </div>
	        <div class="row">
				<input value="Simpan" name="submit" class="button small" type="submit" />
			</div>
	         
	    </div>
	   
	</div>
</form>
	<div class="grid_8">
		<div class="box-header">Team List </div>
    <div class="box table">
        <table cellspacing="0">
            <thead>
                <tr>
                    <td class="tc" width="50px">No</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td width="80px">Options</td>
                </tr>
            </thead>
            <tbody>
				<?php 
				if($list_data->num_rows() > 0):
					foreach($list_data->result() as $data):
				?>
                <tr>
                    <td class="tc"><?php echo ++$offset;?></td>
                    <td><?php echo $data->team_name; ?></td>
                    <td><?php echo word_limiter(strip_tags($data->team_description), 10); ?> [....]</td>
                   
                    <td class="tc">
						<a href="<?php //echo site_url('bt-admin/content/update/'.$data->content_id.''); ?>" title="Edit Data"><img src="<?php //echo load_image('user_edit.png');?>" alt="edit data" border="0"></a>
						<a href="<?php echo site_url('portfolio/delete_portfolio/'.$data->portfolio_id.''); ?>" title="Delete Data"><img src="<?php //echo load_image('user_delete.png');?>" alt="delete data" border="0"></a></td>
                </tr>
				<?php
					endforeach;
				else :
					echo "<tr><td colspan=\"7\">no data</td></tr>";
				endif;
				?>
            </tbody>
        </table>
    </div>
	</div>

<br class="cl" />
<!-- End Forms -->