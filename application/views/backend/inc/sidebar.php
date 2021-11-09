<div class="sidebar" id="sidebar">
	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<a href="<?php echo site_url("login/logout"); ?>" class="btn btn-small btn-danger">
				<i class="icon-signout"></i>
			</a>

			<a href="<?php echo site_url("admin/reset_password"); ?>" class="btn btn-small btn-info">
				<i class="icon-key"></i>
			</a>

			<a href="<?php echo site_url("admin/profil"); ?>" class="btn btn-small btn-warning">
				<i class="icon-user"></i>
			</a>
		</div>
	</div>
	<!--#sidebar-shortcuts-->

	<ul class="nav nav-list">
		<li class="margin-10">
			<div style="padding:10px;">
				<span style="font-size:15px;" title="<?php echo get_userdata_user("nama"); ?>">
					<i class="icon-user orange home-icon"></i> <?php echo substr(get_userdata_user("nama"), 0, 18); ?>
				</span>
				<br>
				<small class="text-muted" style="margin-left:20px;">
					<?php echo level_user(); ?>
				</small>
			</div>
		</li>
		<li>
			<a href="<?php echo site_url("admin/home"); ?>">
				<i class="icon-dashboard"></i>
				<span class="menu-text"> Dashboard </span>
			</a>
		</li>
		<li>
			<a href="<?php echo site_url("sebaran"); ?>">
				<i class="icon-briefcase"></i>
				<span class="menu-text"> Laporan </span>
			</a>
		</li>
		<li>
			<a href="<?php echo site_url("pasien"); ?>">
				<i class="icon-group"></i>
				<span class="menu-text"> Pasien Covid </span>
			</a>
		</li>
		<!-- <li>
			<a href="<?php echo site_url("sebaran"); ?>">
				<i class="icon-medkit"></i>
				<span class="menu-text"> Vaksinasi </span>
			</a>
		</li> -->
		<li>
			<a href="#" class="dropdown-toggle">
				<i class="icon-medkit"></i>
				<span class="menu-text"> Vaksinasi </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="<?php echo site_url("pasien-vaksinasi"); ?>">
						<i class="icon-group"></i>
						<span class="menu-text"> Pasien Vaksinasi </span>
					</a>
				</li>
				<li>
					<a href="<?php echo site_url("jadwal-vaksinasi"); ?>">
						<i class="icon-calendar"></i>
						<span class="menu-text"> Jadwal Vaksinasi </span>
					</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="#" class="dropdown-toggle">
				<i class="icon-briefcase"></i>
				<span class="menu-text"> Master </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="<?php echo site_url("m_tempat_rawat"); ?>">
						<i class="icon-hospital"></i>
						<span class="menu-text"> Tempat Rawat </span>
					</a>
				</li>
				<li>
					<a href="<?php echo site_url("m_puskesmas"); ?>">
						<i class="icon-ambulance"></i>
						<span class="menu-text"> Puskesmas </span>
					</a>
				</li>
				<li>
					<a href="<?php echo site_url("m_kelurahan"); ?>">
						<i class="icon-tags"></i>
						<span class="menu-text"> Kelurahan </span>
					</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="#" class="dropdown-toggle">
				<i class="icon-desktop"></i>
				<span class="menu-text"> Info Publik </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="<?php echo site_url("m_hoax"); ?>">
						<i class="icon-remove"></i>
						<span class="menu-text"> Lawan HOAX </span>
					</a>
				</li>
				<li>
					<a href="<?php echo site_url("m_berita"); ?>">
						<i class="icon-list"></i>
						<span class="menu-text"> Infografik </span>
					</a>
				</li>
				<li>
					<a href="<?php echo site_url("m_dokumen"); ?>">
						<i class="icon-book"></i>
						<span class="menu-text"> Dokumen </span>
					</a>
				</li>
				<li>
					<a href="<?php echo site_url("m_faq"); ?>">
						<i class="icon-info"></i>
						<span class="menu-text"> FAQ </span>
					</a>
				</li>
				<li>
					<a href="<?php echo site_url("m_galeri"); ?>">
						<i class="icon-picture"></i>
						<span class="menu-text"> Galeri </span>
					</a>
				</li>
			</ul>
		</li>
		<!-- <li>
			<a href="#" class="dropdown-toggle">
				<i class="icon-briefcase"></i>
				<span class="menu-text"> Laporan </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="<?php echo site_url("positif"); ?>">
						<i class="icon-double-angle-right"></i>
						Positif
					</a>
				</li>
				<li>
					<a href="<?php echo site_url("gorontalo"); ?>">
						<i class="icon-double-angle-right"></i>
						Gorontalo
					</a>
				</li>
				<li>
					<a href="<?php echo site_url("sebaran"); ?>">
						<i class="icon-double-angle-right"></i>
						Sebaran
					</a>
				</li>
			</ul>
		</li> -->
	</ul>
	<!--/.nav-list-->
</div>