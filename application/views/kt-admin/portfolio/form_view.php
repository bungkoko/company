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
<form method="post" action="<?php echo site_url('portfolio/create') ?>" enctype="multipart/form-data">
	<div class="grid_4">
		<div class="box-header">New Portfolio</div>
		<div class="box">
			<div class="row">
	            <p><label>Subject :</label></p>
	            <input type="text" name="portfolio_subject" />
	        </div>
	        <div class="row">
	        	<p><label>Portfolio Image</label></p>
	        	<input type="file" name="portfolio_image"/>
	        </div>
	        <div>
	        	<p><label>Service</label></p>
	        	<select name="tb_service_service_id">
	        		<?php foreach($dropdown_service->result() as $dropdown):?>
	        		<option value="<?php echo $dropdown->service_id?>"><?php echo $dropdown->service_name;?></option>
	        		<?php endforeach;?>
	        	</select>
	        </div>
			<div class="row">
	            <p><label>Description :</label></p>
				<div class="editor_option_wrapper">
					<input id="media_button" type="button" class="button small" value="Insert Media" onclick="show_media_box()"><input id="editor_toggler" type="button" class="button small" value="Hide Editor" onclick="toggleEditor('content')">
				</div>
				<?php //echo load_tiny_mce('content')?>
	            <textarea id="content" class="tinymce mceEditor" name="portfolio_description" cols="5" rows="15"></textarea>
	        </div>
	         
	    </div>
	    <div class="box-header">Portfolio Schedule</div>
		<div class="box">
	        <div class="row">
	        	<p><label>Project Start:</label></p>
	        	<input type="text" name="portfolio_start" id="start">
	        </div>
	        <div class="row">
	        	<p><label>Project Finish:</label></p>
	        	<input type="text" name="portfolio_finish" id="finish">
	        </div>
	   
	        <div class="row">
				<input value="Simpan" name="submit" class="button small" type="submit" />
			</div>
		</div>
	</div>
</form>
	<div class="grid_8">
		<div class="box-header">Services List </div>
    <div class="box table">
        <table cellspacing="0">
            <thead>
                <tr>
                    <td class="tc" width="50px">No</td>
                    <td>Project Portfolio</td>
                    <td>Part of Project</td>
                    <td width="100px">Project Start</td>
                    <td width="100px">Project Finish</td>
                    <td width="150px">Description</td>
                    
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
                    <td><?php echo $data->portfolio_subject; ?></td>
                    <td><?php echo $data->service_name;?></td>
                     <td><?php echo $data->portfolio_start;?></td>
                    <td><?php echo $data->portfolio_finish;?></td>
                    <td><?php echo word_limiter(strip_tags($data->portfolio_description), 10); ?> [....]</td>
                   
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