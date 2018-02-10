<header id="topnav" class="navbar navbar-kbth navbar-fixed-top" role="banner">

    <div class="logo-area">
		<span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
			<a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
				<span class="icon-bg">
					<i class="ti ti-menu"></i>
				</span>
			</a>
		</span>
        <a class="" href="#"><h3 style="color: #fff">{{ !empty(\auth()->user()->hospital)? \auth()->user()->hospital->name : "Hospital DB"}}</h3></a>



    </div><!-- logo-area -->

    <ul class="nav navbar-nav toolbar pull-right">



        <li class="dropdown toolbar-icon-bg">
            <a href="#" class="dropdown-toggle username" data-toggle="dropdown">
                <img class="img-circle" src="http://placehold.it/300&text=Placeholder" alt="" />
            </a>
            <ul class="dropdown-menu userinfo arrow">
                <li><a href="#/"><i class="ti ti-user"></i><span>Profile</span><span class="badge badge-info pull-right">80%</span></a></li>

                <li class="divider"></li>
                <li><a href="{{route('logout')}}"><i class="ti ti-shift-right"></i><span>Sign Out</span></a></li>
            </ul>
        </li>

    </ul>

</header>