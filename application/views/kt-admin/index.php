<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>assets/admin/css/base.css" />
        <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>assets/admin/css/jquery-ui.css" />
        <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>assets/admin/css/grid.css" />
        <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>assets/admin/css/visualize.css" />
        <title></title>
        <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/excanvas.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/visualize.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/functions.js"></script>
        <script>
            $(function() {
              $( "#start" ).datepicker({
                dateFormat:'yy-mm-dd'
              });
              $( "#finish" ).datepicker({
                dateFormat:'yy-mm-dd'
              });
            });
        </script>
    </head>
    <body style="cursor: auto;">
        <!-- Start Header -->
        <div id="header">
            <div class="header-top tr">
                <p>Hello <strong><?php echo $this->session->userdata('user_display');?></strong> | <?php echo anchor('bt-admin/setting', 'Setting'); ?> | <?php echo anchor('kt-logout', 'Keluar'); ?></p>
            </div>
            <div class="header-middle">
                                <!-- Start Nav -->
                <ul id="nav" class="fr ">
                    <!-- Nav - Start Help -->
                    <li class="help"><a class="help" href="#">Help</a>
                        <ul>
                            <li><a href="#">Report Bug</a></li>
                            <li><a href="#">Our Product</a></li>
                            <li><a href="#">About</a></li>
                        </ul>
                    </li>
                    <!-- Nav - End Help -->
                </ul>
                <!-- End Nav -->

                <!-- Start Logo -->
                <img id="logo" src="<?php //echo load_image('logo_baitusoft.png'); ?>" alt="<?php //echo get_setting('sitename'); ?>" />
                <!-- End Logo -->
                <br class="cl" />
            </div>
            <div class="header-bottom">
                <!-- Start Breadcrumbs -->
                <ul id="breadcrumbs">
                    <li><a href="#">Base</a> »</li>
                    <li><a href="#">Level One</a> »</li>
                    <li><a href="#">Level Two</a></li>
                </ul>
                <!-- End Breadcrumbs -->
            </div>
        </div>
        <!-- End Header -->

        <div id="page-wrapper">
            <div class="page">
                <!-- Start Sidebar -->
                <div id="sidebar">
                    <!-- Start Live Search  -->
                    <form class="searchform" action="#">
                        <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" id="livesearch" onblur="if (this.value == '') {this.value = 'Live Search...';}" onfocus="if (this.value == 'Live Search...') {this.value = '';}" value="Live Search..." class="searchfield ui-autocomplete-input" type="text" />
                        <input value="Go" class="searchbutton" type="button" />
                    </form>
                    <!-- End Live Search  -->
                    <!-- Start Content Nav  --> 
                    <span class="ul-header"><a id="toggle-contentsnav" href="#" class="toggle visible">Berita</a></span>
                    <ul id="contentsnav">
                        <li><?php echo anchor('bt-admin/content', 'Daftar Berita'); ?></li>
                        <li><?php echo anchor('bt-admin/content/create', 'Tambah Berita'); ?></li>
                        <li><?php echo anchor('bt-admin/content-category', 'Kategori Berita'); ?></li>
                    </ul>
                    <!-- End Content Nav  --> 
                    <!-- Start Content Nav  --> 
                    <span class="ul-header"><a id="toggle-pagesnav" href="#" class="toggle visible">Halaman</a></span>
                    <ul id="pagesnav">
                        <li><?php echo anchor('bt-admin/page', 'Daftar Halaman'); ?></li>
                        <li><?php echo anchor('bt-admin/page/create', 'Tambah Halaman'); ?></li>
                    </ul>
                    <!-- End Content Nav  -->
                    <!-- Start Gallery Nav  --> 
                    <span class="ul-header"><a id="toggle-imagesnav" href="#" class="toggle visible">Gallery</a></span>
                    <ul style="display: block;" id="imagesnav">
                        <li><?php echo anchor('bt-admin/gallery/photo', 'Daftar Photo'); ?></li>
                        <li><?php echo anchor('bt-admin/gallery/addPhoto', 'Tambah Photo'); ?></li>
                        <li><?php echo anchor('bt-admin/gallery/album', 'Daftar Album'); ?></li>
                    </ul>
                    <!-- End Gallery Nav  -->
                    <!-- Start consult Nav  --> 
                    <span class="ul-header"><a id="toggle-consultsnav" href="#" class="toggle visible">Konsultasi</a></span>
                    <ul style="display: block;" id="consultsnav">
                        <li><?php echo anchor('bt-admin/consult/', 'Daftar Konsultasi'); ?></li>
                    </ul>
                    <!-- End consult Nav  -->
                    <!-- Start testimony Nav  --> 
                    <span class="ul-header"><a id="toggle-testimonysnav" href="#" class="toggle visible">Testimoni</a></span>
                    <ul style="display: block;" id="testimonysnav">
                        <li><?php echo anchor('bt-admin/testimony/', 'Daftar Testimoni'); ?></li>
                        <li><?php echo anchor('bt-admin/testimony/create', 'Tambah Testimoni'); ?></li>
                    </ul>
                    <!-- End testimony Nav  -->
                    <!-- Start Guestbook Nav  --> 
                    <span class="ul-header"><a id="toggle-guestbooksnav" href="#" class="toggle visible">Buku Tamu</a></span>
                    <ul id="guestbooksnav">
                        <li><?php echo anchor('bt-admin/guestbook/', 'Daftar Bukutamu'); ?></li>
                    </ul>
                    <!-- End Guestbook Nav  --> 
                    <!-- Start Messenger Nav  --> 
                    <span class="ul-header"><a id="toggle-messengersnav" href="#" class="toggle visible">Messenger</a></span>
                    <ul id="messengersnav">
                        <li><?php echo anchor('bt-admin/messenger/', 'Daftar ID'); ?></li>
                    </ul>
                    <!-- End Messenger Nav  --> 
                    <!-- Start Messenger Nav  --> 
                    <span class="ul-header"><a id="toggle-settingsnav" href="#" class="toggle visible">Setting</a></span>
                    <ul id="settingsnav">
                        <li><?php echo anchor('bt-admin/setting/', 'Konfigurasi situs'); ?></li>
                        <li><?php echo anchor('bt-admin/setting/user', 'Konfigurasi pengguna'); ?></li>
                        <li><?php echo anchor('bt-admin/setting/gallery', 'Konfigurasi gallery'); ?></li>
                    </ul>
                    <!-- End Messenger Nav  -->
                    <!-- Start Trash Nav  --> 
                    <span class="ul-header"><a id="toggle-trashsnav" href="#" class="toggle visible">Recycle Bin</a></span>
                    <ul id="trashsnav">
                        <li><?php echo anchor('bt-admin/content/trashed', 'Berita'); ?></li>
                        <li><?php echo anchor('bt-admin/page/trashed', 'Halaman'); ?></li>
                    </ul>
                    <!-- End Trash Nav  --> 



                    <!-- Start Statistics Area  -->
                    <span class="ul-header">Statistics</span>
                    <ul>
                        
                        <li>Comments: <?php echo $total_contact;?></li>
                        
                    </ul>
                    <!-- End Statistics Area  -->
                </div>
                <!-- End Sidebar  -->

                <!-- Star Page Content  -->
                <div id="page-content">
                    <!-- Start Page Header -->
                    <div id="page-header">
                        <h1><?php echo $page_title; ?></h1>
                    </div>
                    <!-- End Page Header -->

                    <!-- Start Content -->
                    <div class="container_12">
						<?php $this->load->view($content); ?>
					</div>
					 <!-- End Content -->
                </div>
                <!-- End Page Content  -->
            </div>
        </div>
        <!-- Start Footer -->
        <div class="footer"> Copyright ©2010, A <?php //echo anchor('http://www.baitusoft.com/', 'Baitusoft Technologies'); ?> for <?php //echo anchor(base_url(), get_setting('sitename')); ?>. </div>
        <!-- End Footer -->
        <ul style="z-index: 1; top: 0px; left: 0px; display: none;" aria-activedescendant="ui-active-menuitem" role="listbox" class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all"></ul>		
	</body>
</html>