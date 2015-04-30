<!-- Start Dashboard -->
<div class="grid_12">
    <div class="box-header"> &nbsp </div>
    <div class="box">
        <h2>Selamat datang <?php echo $this->session->userdata('user_display_name'); ?></h2>
        <p> Ini adalah halaman dashboard, untuk keluar dari sistem silakan klik <?php echo anchor('bt-logout', 'Keluar'); ?>. Terima kasih.</p>
    </div>
</div>
<br class="cl" />
<!-- End Formatting -->