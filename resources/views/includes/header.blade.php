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
    @role('developer')
<div class="col-sm-5">
    <br>
    <form action="{{route('change_dep')}}" method="post" id="change_dep">
        {{csrf_field()}}
        <div class="col-sm-6">
            <select name="change_h_id" class="form-control" id="change_h_id">
                <option value="">-- Select Hospital --</option>
                @foreach($hos as $item)
                    <option value="{{$item->id}}" {{auth()->user()->hospital_id==$item->id ? 'selected' : ''}}>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-6">
            <select name="change_dep_id" class="form-control" id="change_dep_id">
                <option value="">-- Select Department --</option>
                @if(!empty($deps))
                @foreach($deps as $item)
                    <option value="{{$item->id}}" {{auth()->user()->department_id==$item->id ? 'selected' : ''}}>{{$item->description}}</option>
                @endforeach
                    <option value="all">All</option>
                    @endif
            </select>
        </div>

    </form>
</div>
@endrole

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