<?php 
if ($this->session->flashdata('message')): ?>
<!-- Start Notification -->
<div class="grid_12">
	<div style="display: block;" class="notification success"> 
		<span class="strong">Sukses!</span>
		<span class="close" title="Dismiss"></span>
		<p><?php echo $this->session->flashdata('message'); ?></p>
	</div>
</div>
<!-- Start Notification -->
<?php endif; ?>

<!-- Start Table -->
<div class="grid_12">
    <div class="box-header">Article's List </div>
    <div class="box table">
        <table cellspacing="0">
            <thead>
                <tr>
                    <td class="tc">No</td>
                    <td>Subject</td>
                    <td width="250px">Your Post</td>
					<td width="50px">Your Publish</td>
                    <td width="150px">Date Of Publish</td>
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
                    <td><?php echo $data->articles_subject; ?></td>
                    <td><?php echo word_limiter(strip_tags($data->articles_post), 10); ?> [....]</td>
					<td><a href="<?php echo site_url('articles/status/'.$data->articles_id.'/'.$data->articles_status)?>"><?php echo $data->articles_status;?></a></td>
                    <td><?php echo $data->articles_date; ?></td>
                    <td class="tc">
						<a href="<?php echo site_url('articles/update/'.$data->articles_id.''); ?>" title="Edit Data"><img src="<?php echo base_url();?>/assets/admin/images/user_edit.png" alt="edit data" border="0"></a>
						<a href="<?php echo site_url('articles/delete/'.$data->articles_id.''); ?>" title="Delete Data"><img src="<?php echo base_url();?>/assets/admin/images/user_delete.png" alt="delete data" border="0"></a></td>
                </tr>
				<?php
					endforeach;
				else :
					echo "<tr><td colspan=\"6\">no data</td></tr>";
				endif;
				?>
            </tbody>
        </table>
    </div>
</div>
<br class="cl" />
<!-- End Table -->