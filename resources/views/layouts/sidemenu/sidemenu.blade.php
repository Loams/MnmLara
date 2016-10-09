<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
			<a href="{{ url('/') }}" class="site_title"><i class="fa fa-paw"></i> <span>Mnm's Ticket</span></a>
		</div>

		<div class="clearfix"></div>

		<!-- menu profile quick info -->
		<div class="profile">
			<div class="profile_pic">
				<img src="{{ url('/') }}/images/img.jpg" alt="..." class="img-circle profile_img">
			</div>
			<div class="profile_info">
				<span>Welcome,</span>
				<h2>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h2>
			</div>
		</div>
		<!-- /menu profile quick info -->

		<br>
		<!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section active">
				<br>
				<ul class="nav side-menu" style="">
					<li>
				<a href="{{ url('/ticket') }}" ><i class="fa fa-plus"></i> Créer un Ticket</button> </a>
				</li>
				
					<li class="active">
						<a><i class="fa fa-tachometer"></i> Dashboard </a>
					</li>
					<li>
						<a><i class="fa fa-tag"></i> Vos Tickets <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li>
								<a href="form.html">Tous les tickets</a>
							</li>
							<li>
								<a href="form_advanced.html">En attente PEC</a>
							</li>
							<li>
								<a href="form_validation.html">En cours</a>
							</li>
							<li>
								<a href="form_wizards.html">Attente retour</a>
							</li>
							<li>
								<a href="form_upload.html">Clôts</a>
							</li>
							<li>
								<a href="form_buttons.html">Rejeté</a>
							</li>
						</ul>
					</li>
					<li>
						<a><i class="fa fa-tags"></i> Tous les tickets <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li>
								<a href="form.html">Tous les tickets</a>
							</li>
							<li>
								<a href="form_advanced.html">En attente PEC</a>
							</li>
							<li>
								<a href="form_validation.html">En cours</a>
							</li>
							<li>
								<a href="form_wizards.html">Attente retour</a>
							</li>
							<li>
								<a href="form_upload.html">Clôts</a>
							</li>
							<li>
								<a href="form_buttons.html">Rejeté</a>
							</li>
						</ul>
					</li>
					<li>
						<a><i class="fa fa-calendar"></i> Calendrier</a>
						
					</li>
					<li>
						<a><i class="fa fa-cogs"></i>Administration<span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li>
								<a href="{{ url('/users') }}">Utilisateurs</a>
							</li>
							<li>
								<a href="{{ url('/laws') }}">Droits</a>
							</li>
							<li>
								<a href="fixed_footer.html">Listes</a>
							</li>
							<li>
								<a href="fixed_footer.html">Sauvegarde</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<!-- /sidebar menu -->
		@include('layouts.sidemenu.footer')
	</div>
</div>
