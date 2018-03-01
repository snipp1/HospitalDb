<div class="static-sidebar-wrapper sidebar-midnightblue">
    <div class="static-sidebar">
        <div class="sidebar">
            <div class="widget">
                <div class="widget-body">
                    <div class="userinfo">
                        <div class="avatar">
                            <img src="http://placehold.it/300&text=Placeholder" class="img-responsive img-circle">
                        </div>
                        <div class="info">
                            <span class="username">Welcome </span><br>
                            <span class="username">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                            <span class="useremail">{{\Illuminate\Support\Facades\Auth::user()->email}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget stay-on-collapse" id="widget-sidebar">
                <nav role="navigation" class="widget-body">
                    <ul class="acc-menu">
                        <li class="nav-separator"><span>Main Menu</span></li>
                        {{--<li><a href="{{route('academic.year.index')}}"><i class="ti ti-pie-chart"></i><span>Dashboard</span></a></li>--}}
                        {{--<li><a href="{{route('academic.year.index')}}"><i class="ti ti-pie-chart"></i><span>Academic Year</span></a></li>--}}
                        {{--<li><a href="{{route('academic.term.index')}}"><i class="ti ti-pie-chart"></i><span>Academic Term</span></a></li>--}}
                        {{--<li><a href="{{route('member.index')}}"><i class="fa fa-user"></i><span>Members</span></a></li>--}}
                        {{--<li><a href="{{route('org.index')}}"><i class="fa fa-user"></i><span>Organisations</span></a></li>--}}
                        {{--<li><a href="{{route('bc.index')}}"><i class="fa fa-user"></i><span>Bible Class</span></a></li>--}}


                        @permission('see_patient')
                        <li><a href="javascript:;"><i class="fa fa-gear"></i><span>Patient Management</span></a>
                            <ul class="acc-menu">
                                <li><a href="{{route('patient.index')}}">Patients</a></li>
                            </ul>
                        </li>
                        @endpermission
                        @permission('see_patient_billing')
                        <li><a href="javascript:;"><i class="fa fa-gear"></i><span>Patient Bill Management</span></a>
                            <ul class="acc-menu">
                                @permission('see_patient_item_bill')
                                <li><a href="{{route('patient.billing.index')}}">Itemised Bill</a></li>
                                @endpermission
                                {{--<li><a href="{{route('patient.index')}}">Patients</a></li>--}}
                            </ul>
                        </li>
                        @endpermission
                        @permission('collect_patient_item_bill')
                        <li><a href="javascript:;"><i class="fa fa-gear"></i><span>Payments</span></a>
                            <ul class="acc-menu">

                                <li><a href="{{route('patient.billing.payment.index')}}">Pay Bill</a></li>

                                {{--<li><a href="{{route('patient.index')}}">Patients</a></li>--}}
                            </ul>
                        </li>
                        @endpermission
                        @permission('see_user')
                        <li><a href="javascript:;"><i class="fa fa-gear"></i><span>User Management</span></a>
                            <ul class="acc-menu">

                                <li><a href="{{route('users.index')}}">Users</a></li>

                            </ul>
                        </li>
                        @endpermission
                        <li><a href="javascript:;"><i class="fa fa-gear"></i><span>System Setting</span></a>
                            <ul class="acc-menu">
                                @permission('see_roles')
                                <li><a href="{{route('role.index')}}">Roles</a></li>
                                @endpermission
                                @permission('see_permission')
                                <li><a href="{{route('permission.index')}}">Permissions</a></li>
                                @endpermission
                                @permission('see_department')
                                <li><a href="{{route('department.index')}}">Departments</a></li>
                                @endpermission
                                @permission('see_hospital')
                                <li><a href="{{route('hospital.index')}}">Hospital</a></li>
                                @endpermission
                                @permission('see_hospital_profile')
                                @if(!empty(\auth()->user()->hospital))
                                <li><a href="{{route('hospital.view',\auth()->user()->hospital->id)}}">Hospital Profile</a></li>
                                @else
                                    <li><a href="{{route('hospital.view')}}">Hospital Profile</a></li>
                                    @endif
                                @endpermission
                                @permission('see_item_bill')
                                <li><a href="{{route('itemisedbill.index')}}">Itemised Bill</a></li>
                                @endpermission
                            </ul>
                        </li>

                        {{--<li><a href="javascript:;"><i class="fa fa-group"></i><span>Student Management</span></a>--}}
                            {{--<ul class="acc-menu">--}}
                                {{--<li><a href="{{route('student.index')}}">View Students</a></li>--}}
                                {{--<li><a href="{{route('student.create')}}"><span>Add Student</span></a></li>--}}
                                {{--<li><a href="{{route('bill.student.index')}}">View Billed Students</a></li>--}}
                                {{--<li><a href="{{route('bill.student.create')}}">Bill Students</a></li>--}}
                                {{--<li><a href="{{route('subject.index')}}">Class Enrollment</a></li>--}}

                            {{--</ul>--}}
                        {{--</li>--}}

                        {{--<li><a href="javascript:;"><i class="fa fa-gear"></i><span>Subject Management</span></a>--}}
                            {{--<ul class="acc-menu">--}}

                                {{--<li><a href="{{route('subject.index')}}">Subject</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a href="javascript:;"><i class="fa fa-gear"></i><span>Class Management</span></a>--}}
                            {{--<ul class="acc-menu">--}}
                                {{--<li><a href="{{route('class.index')}}">Class</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a href="javascript:;"><i class="fa fa-gear"></i><span>Academic Settings</span></a>--}}
                            {{--<ul class="acc-menu">--}}
                                {{--<li><a href="{{route('academic.year.index')}}">Academic Year</a></li>--}}
                                {{--<li><a href="{{route('academic.term.index')}}"><span>Term</span></a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a href="javascript:;"><i class="fa fa-gear"></i><span>System Settings</span></a>--}}
                            {{--<ul class="acc-menu">--}}
                                {{--<li><a href="{{route('school.index')}}">School Details</a></li>--}}
                                {{--<li><a href="{{route('users.index')}}">Users</a></li>--}}

                            {{--</ul>--}}
                        {{--</li>--}}

                        {{--<li><a href="javascript:;"><i class="fa  fa-gear"></i><span>Settings</span></a>--}}
                            {{--<ul class="acc-menu">--}}
                                {{--<li><a href="{{route('role.index')}}">User Roles</a></li>--}}
                                {{--<li><a href="{{route('member.type.index')}}">Membership Types</a></li>--}}
                                {{--<li><a href="{{route('group.type.index')}}">Group Types</a></li>--}}
                                {{--<li><a href="{{route('group.role.index')}}">Group Role Types</a></li>--}}
                                {{--<li><a href="{{route('payment.type.index')}}">Payment Type</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a href="javascript:;"><i class="ti ti-receipt"></i><span>Reports</span></a>--}}
                            {{--<ul class="acc-menu">--}}
                                {{--<li><a href="{{route('group.type.index')}}">Group Dashboard</a></li>--}}
                                {{--<li><a href="{{route('group.index')}}"><span>Groups</span></a></li>--}}
                                {{--<li><a href="{{route('member.assigngroup')}}">Assign Groups</a></li>--}}

                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li class="nav-separator"><span>Notifications</span></li>--}}
                        {{--<li><a href="{{route('dashboard')}}"><i class="ti ti-mobile"></i><span>SMS</span></a></li>--}}
                        {{--<li><a href="{{route('email.index')}}"><i class="ti  ti-email"></i><span>EMAIL</span></a></li>--}}
                        {{--<li><a href="javascript:;"><i class="ti ti-view-list-alt"></i><span>UI Kit</span></a>--}}
                            {{--<ul class="acc-menu">--}}
                                {{--<li><a href="ui-typography.html">Typography</a></li>--}}
                                {{--<li><a href="ui-buttons.html">Buttons</a></li>--}}
                                {{--<li><a href="ui-modals.html">Modal</a></li>--}}
                                {{--<li><a href="ui-progress.html">Progress</a></li>--}}
                                {{--<li><a href="ui-paginations.html">Paginations</a></li>--}}
                                {{--<li><a href="ui-breadcrumbs.html">Breadcrumbs</a></li>--}}
                                {{--<li><a href="ui-labelsbadges.html">Labels &amp; Badges</a></li>--}}
                                {{--<li><a href="ui-alerts.html">Alerts</a></li>--}}
                                {{--<li><a href="ui-tabs.html">Tabs</a></li>--}}
                                {{--<li><a href="ui-wells.html">Wells</a></li>--}}
                                {{--<li><a href="ui-icons-fontawesome.html">FontAwesome Icons</a></li>--}}
                                {{--<li><a href="ui-icons-themify.html">Themify Icons</a></li>--}}
                                {{--<li><a href="ui-helpers.html">Helpers</a></li>--}}
                                {{--<li><a href="ui-imagecarousel.html">Images &amp; Carousel</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a href="javascript:;"><i class="ti ti-control-shuffle"></i><span>Components</span></a>--}}
                            {{--<ul class="acc-menu">--}}
                                {{--<li><a href="ui-tiles.html">Tiles</a></li>--}}
                                {{--<li><a href="custom-skylo.html">Page Progress</a></li>--}}
                                {{--<li><a href="custom-bootbox.html">Bootbox</a></li>--}}
                                {{--<li><a href="custom-pines.html">Pines Notification</a></li>--}}
                                {{--<li><a href="custom-pulsate.html">Pulsate</a></li>--}}
                                {{--<li><a href="custom-knob.html">jQuery Knob</a></li>--}}
                                {{--<li><a href="custom-ionrange.html">Ion Range Slider</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a href="javascript:;"><i class="ti ti-pencil"></i><span>Forms</span></a>--}}
                            {{--<ul class="acc-menu">--}}
                                {{--<li><a href="ui-forms.html">Form Layout</a></li>--}}
                                {{--<li><a href="form-components.html">Form Components</a></li>--}}
                                {{--<li><a href="form-pickers.html">Pickers</a></li>--}}
                                {{--<li><a href="form-wizard.html">Form Wizard</a></li>--}}
                                {{--<li><a href="form-validation.html">Form Validation</a></li>--}}
                                {{--<li><a href="form-masks.html">Form Masks</a></li>--}}
                                {{--<li><a href="form-dropzone.html">Dropzone Uploader</a></li>--}}
                                {{--<li><a href="form-summernote.html">Summernote</a></li>--}}
                                {{--<li><a href="form-markdown.html">Markdown Editor</a></li>--}}
                                {{--<li><a href="form-xeditable.html">Inline Editor</a></li>--}}
                                {{--<li><a href="form-gridforms.html">Grid Forms</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="javascript:;"><i class="ti ti-settings"></i><span>Panels</span></a>--}}
                            {{--<ul class="acc-menu">--}}
                                {{--<li><a href="ui-panels.html">Panels</a></li>--}}
                                {{--<li><a href="ui-advancedpanels.html">Draggable Panels</a></li>--}}
                            {{--</ul>--}}
                        {{--<li><a href="javascript:;"><i class="ti ti-layout-grid3"></i><span>Tables</span></a>--}}
                            {{--<ul class="acc-menu">--}}
                                {{--<li><a href="ui-tables.html">Basic Tables</a></li>--}}
                                {{--<li><a href="tables-responsive.html">Responsive Tables</a></li>--}}
                                {{--<li><a href="tables-editable.html">Editable Tables</a></li>--}}
                                {{--<li><a href="tables-data.html">Data Tables</a></li>--}}
                                {{--<li><a href="tables-fixedheader.html">Fixed Header Tables</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a href="javascript:;"><i class="ti ti-stats-up"></i><span>Analytics</span></a>--}}
                            {{--<ul class="acc-menu">--}}
                                {{--<li><a href="charts-flot.html">Flot</a></li>--}}
                                {{--<li><a href="charts-sparklines.html">Sparklines</a></li>--}}
                                {{--<li><a href="charts-morris.html">Morris.js</a></li>--}}
                                {{--<li><a href="charts-easypiechart.html">Easy Pie Chart</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a href="javascript:;"><i class="ti ti-map-alt"></i><span>Maps</span></a>--}}
                            {{--<ul class="acc-menu">--}}
                                {{--<li><a href="maps-google.html">Google Maps</a></li>--}}
                                {{--<li><a href="maps-jvectormap.html">jVectorMap</a></li>--}}
                                {{--<li><a href="maps-mapael.html">Mapael</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a href="javascript:;"><i class="ti ti-file"></i><span>Pages</span></a>--}}
                            {{--<ul class="acc-menu">--}}
                                {{--<li><a href="extras-profile.html">Profile</a></li>--}}
                                {{--<li><a href="extras-invoice.html">Invoice</a></li>--}}
                                {{--<li><a href="javascript:;">Email Templates</a>--}}
                                    {{--<ul class="acc-menu">--}}
                                        {{--<li><a href="responsive-email/basic.html">Basic</a></li>--}}
                                        {{--<li><a href="responsive-email/hero.html">Hero</a></li>--}}
                                        {{--<li><a href="responsive-email/sidebar.html">Sidebar</a></li>--}}
                                        {{--<li><a href="responsive-email/sidebar-hero.html">Sidebar Hero</a></li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li><a href="coming-soon.html">Coming Soon</a></li>--}}
                                {{--<li><a href="extras-faq.html">FAQ</a></li>--}}
                                {{--<li><a href="extras-registration.html">Registration</a></li>--}}
                                {{--<li><a href="extras-forgotpassword.html">Password Reset</a></li>--}}
                                {{--<li><a href="extras-login.html">Login</a></li>--}}
                                {{--<li><a href="extras-404.html">404 Page</a></li>--}}
                                {{--<li><a href="extras-500.html">500 Page</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}

                        {{--<li class="nav-separator"><span>Extras</span></li>--}}
                        {{--<li><a href="app-inbox.html"><i class="ti ti-email"></i><span>Inbox</span><span class="badge badge-danger">3</span></a></li>--}}
                        {{--<li><a href="extras-calendar.html"><i class="ti ti-calendar	"></i><span>Calendar</span><span class="badge badge-orange">1</span></a></li>--}}
                    </ul>
                </nav>
            </div>

            {{--<div class="widget" id="widget-progress">--}}
                {{--<div class="widget-heading">--}}
                    {{--Progress--}}
                {{--</div>--}}
                {{--<div class="widget-body">--}}

                    {{--<div class="mini-progressbar">--}}
                        {{--<div class="clearfix mb-sm">--}}
                            {{--<div class="pull-left">Bandwidth</div>--}}
                            {{--<div class="pull-right">50%</div>--}}
                        {{--</div>--}}

                        {{--<div class="progress">--}}
                            {{--<div class="progress-bar progress-bar-lime" style="width: 50%"></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="mini-progressbar">--}}
                        {{--<div class="clearfix mb-sm">--}}
                            {{--<div class="pull-left">Storage</div>--}}
                            {{--<div class="pull-right">25%</div>--}}
                        {{--</div>--}}

                        {{--<div class="progress">--}}
                            {{--<div class="progress-bar progress-bar-info" style="width: 25%"></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
</div>