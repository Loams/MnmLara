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
				<h2>{{ $user->firstname }} {{ $user->lastname }}</h2>
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
				
					<li>
						<a href="{{ url('/') }}"><i class="fa fa-tachometer"></i> Dashboard </a>
					</li>
					<li>
						<a><i class="fa fa-tag"></i> Vos Tickets <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li>
								<a href="{{route('tickets.allyour', ['id' => $user->id])}}">Tous les tickets<span class="badge ">{{ $tickets_all_your }}</span></a>
							</li>

							@foreach($status as $statuss)
								<li>
									<a href="{{route('tickets.createby', ['status' => $statuss->id, 'id' => $user->id])}}">{{ $statuss->name }}<span class="badge ">{{ $statuss->getNbTicketByUser( $user->id ) }}</span></a>
								</li>

							@endforeach
						</ul>
					</li>
					@if( $user->law->name != 'User' )
					<li>
						<a><i class="fa fa-tags"></i> Tous les tickets <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li>
								<a href="{{route('tickets.index')}}">Tous les tickets<span class="badge ">{{ $tickets_all }}</span></a>
							</li>
							
							@foreach($status as $statuss)
							<li>
								<a href="{{route('tickets.status', [$statuss->id])}}">{{ $statuss->name }}<span class="badge ">{{ $statuss->getNbTicket() }}</span></a>
							</li>

							@endforeach
						</ul>
					</li>
					@endif
					<li>
						<a><i class="fa fa-calendar"></i> Calendrier</a>
						
					</li>
					@permission(('admin-menu'))
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
								<a href="{{ url('/societies') }}">Societies</a>
							</li>
							<li>
								<a href="{{ url('/categories') }}">Categories</a>
							</li>
							<li>
								<a href="{{ url('/status') }}">Status</a>
							</li>
							<li>
								<a href="{{ url('/priorities') }}">Priorities</a>

							<li>
								<a href="{{ url('/permissions') }}">Permissions</a>
							</li>
							<li>
								<a>Roles<span class="fa fa-chevron-down"></a>
								<ul class="nav child_menu">
									<li><a href="{{ url('/roles') }}"> Tous les roles</a></li>
									@foreach($menu_roles as $menu_role)
										<li><a href="{{route('role.editpermission', [$menu_role->id])}}">{{ $menu_role->display_name }}</a></li>
									@endforeach
								</ul>
							</li>
							<li>
								<a href="fixed_footer.html">Sauvegarde</a>
							</li>
						</ul>
					</li>
					@endpermission
				</ul>
			</div>
		</div>
		<!-- /sidebar menu -->
		@include('layouts.sidemenu.footer')
	</div>
</div>
