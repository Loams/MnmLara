<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
			<a href="{{ url('/') }}" class="site_title"><i class="fa fa-paw"></i> <span>Mnm's Ticket</span></a>
		</div>

		<div class="clearfix"></div>

		<!-- menu profile quick info -->
		<div class="profile">
			<div class="profile_pic">
				<img src="images/img.jpg" alt="..." class="img-circle profile_img">
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
			<div class="menu_section">
				<ul class="nav side-menu" style="">
					<li>
				<a href="{{ url('/ticket') }}" ><i class="fa fa-plus"></i> Créer un Ticket</button> </a>
				<li>
				</ul>
			</div>
			<div class="menu_section active">
				<h3>General</h3>
				<ul class="nav side-menu" style="">
					<li class="active">
						<a><i class="fa fa-tachometer"></i> Dashboard </a>
					</li>
					<li>
						<a><i class="fa fa-tag"></i> Vos Tickets <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li>
								<a href="form.html">General Form</a>
							</li>
							<li>
								<a href="form_advanced.html">Advanced Components</a>
							</li>
							<li>
								<a href="form_validation.html">Form Validation</a>
							</li>
							<li>
								<a href="form_wizards.html">Form Wizard</a>
							</li>
							<li>
								<a href="form_upload.html">Form Upload</a>
							</li>
							<li>
								<a href="form_buttons.html">Form Buttons</a>
							</li>
						</ul>
					</li>
					<li>
						<a><i class="fa fa-tags"></i> Tous les tickets <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li>
								<a href="general_elements.html">General Elements</a>
							</li>
							<li>
								<a href="media_gallery.html">Media Gallery</a>
							</li>
							<li>
								<a href="typography.html">Typography</a>
							</li>
							<li>
								<a href="icons.html">Icons</a>
							</li>
							<li>
								<a href="glyphicons.html">Glyphicons</a>
							</li>
							<li>
								<a href="widgets.html">Widgets</a>
							</li>
							<li>
								<a href="invoice.html">Invoice</a>
							</li>
							<li>
								<a href="inbox.html">Inbox</a>
							</li>
							<li>
								<a href="calendar.html">Calendar</a>
							</li>
						</ul>
					</li>
					<li>
						<a><i class="fa fa-calendar"></i> Calendrier</a>
						
					</li>
					<li>
						<a><i class="fa fa-cogs"></i> Administration <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li>
								<a href="fixed_sidebar.html">Fixed Sidebar</a>
							</li>
							<li>
								<a href="fixed_footer.html">Fixed Footer</a>
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
