<div class="navbar-fixed">
	<nav id="navigation">
		<div class="nav-wrapper">

			<ul id="more_DD" class="dropdown-content">
				<li><a href="#" class="">About</a></li>
				<li><a href="<?php echo base_url('login/log_out') ?>" class="">Log Out</a></li>
				<li><a href="<?php echo base_url('mgr/dashboard/exit_mosmgr'); ?>">Exit Mosmgr</a></li>
			</ul>

			<a href="<?php echo base_url('mgr/dashboard'); ?>" class="brand-logo">Mosacc</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a class="bold-font" href="<?php echo base_url('mgr/profil'); ?>"><?php echo $this->session->userdata('nama_masjid'); ?></a></li>
				<li><a class="more-vert dropdown-trigger bold-font center" href="#" data-target="more_DD"><I class="material-icons">more_vert</I></a></li>
			</ul>
		</div>
	</nav>
</div>