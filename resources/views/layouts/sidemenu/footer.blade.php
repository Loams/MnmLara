<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
	<a data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> </a>
	<a data-toggle="tooltip" data-placement="top" title="" data-original-title="FullScreen"> <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span> </a>
	<a data-toggle="tooltip" data-placement="top" title="" data-original-title="Lock"> <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> </a>
	<a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <span class="glyphicon glyphicon-off"></span>
    </a>
    <form action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>
<!-- /menu footer buttons -->