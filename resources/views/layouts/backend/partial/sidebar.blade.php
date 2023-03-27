<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {}
    </script>



    {{-- <ul class="nav nav-list">
        <li class="active">
            <a href="{{ url('/dashboard') }}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Home </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="{{ route('admin.bnews') }}">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text">
                    Business News
                </span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('admin.allnews') }}">
                <i class="menu-icon fa fa-newspaper-o"></i>
                <span class="menu-text">
                    News
                </span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('admin.allnotice') }}">
                <i class="menu-icon fa fa-sticky-note"></i>
                <span class="menu-text">
                    Notice
                </span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('admin.alltourist') }}">
                <i class="menu-icon fa fa-map-marker"></i>
                <span class="menu-text">
                    Tourist Spots
                </span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('admin.allhotels') }}">
                <i class="menu-icon fa fa-hospital-o"></i>
                <span class="menu-text">
                    Hotels
                </span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('admin.allactivity') }}">
                <i class="menu-icon fa fa-history"></i>
                <span class="menu-text">
                    Activity
                </span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('admin.district.index') }}">
                <i class="menu-icon fa fa-map"></i>
                <span class="menu-text">
                    District Details
                </span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('admin.conference.index') }}">
                <i class="menu-icon fa fa-sitemap"></i>
                <span class="menu-text">
                    Conferences
                </span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('admin.messages.index') }}">
                <i class="menu-icon fa fa-commenting-o"></i>
                <span class="menu-text">
                    Message
                </span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('admin.post.index') }}">
                <i class="menu-icon fa fa-rss"></i>
                <span class="menu-text">
                    Blog
                </span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('admin.publication.index') }}">
                <i class="menu-icon fa fa-pencil"></i>
                <span class="menu-text">
                    Publications
                </span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('admin.vacancie.index') }}">
                <i class="menu-icon fa fa-gamepad"></i>
                <span class="menu-text">
                    Vacancy
                </span>
            </a>
        </li>
        <li class="">
            <a href="{{ url('admin/pagemenu') }}">
                <i class="menu-icon fa fa-columns"></i>
                <span class="menu-text">
                    Pages
                </span>
            </a>
        </li>
        <li class="">
            <a href="{{ url('admin/slider') }}">
                <i class="menu-icon fa fa-sliders"></i>
                <span class="menu-text">
                    Slider
                </span>
            </a>
        </li>
        <li class="">
            <a href="{{ url('admin/faq') }}">
                <i class="menu-icon fa fa-question-circle"></i>
                <span class="menu-text">
                    FAQ
                </span>
            </a>
        </li>
        <li class="">
            <a href="{{ url('admin/director') }}">
                <i class="menu-icon fa fa-fort-awesome"></i>
                <span class="menu-text">
                    Former Board
                </span>
            </a>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-picture-o"></i>
                <span class="menu-text"> Gallery </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="{{ url('admin/photo/gallery') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Photo Gallery
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ url('admin/photo/category') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Photo Category
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ url('admin/gallery/video') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Video
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> Chamber Member </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="{{ url('admin/MemberList') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Member List
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ url('admin/MemberCategory') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Member Category
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-handshake-o"></i>
                <span class="menu-text">Our Team </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="{{ route('admin.secretariat.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Secretariat
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ route('admin.boardDirectors.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Board of Directors
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ route('admin.boardDirectors.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Workers
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="{{ url('admin/socialinfo') }}">
                <i class="menu-icon fa fa-share-square"></i>
                <span class="menu-text">
                    Social Links
                </span>
            </a>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-shield"></i>
                <span class="menu-text"> Organization Info </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="{{ url('admin/org/primary') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Primary Info
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ url('admin/org/about') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        About
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="{{ url('admin/testimonial') }}">
                <i class="menu-icon fa fa-id-card-o"></i>
                <span class="menu-text">
                    Testimonials
                </span>
            </a>
        </li>
        <li class="">
            <a href="{{ url('admin/partner') }}">
                <i class="menu-icon fa fa-globe"></i>
                <span class="menu-text">
                    Partner
                </span>
            </a>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-handshake-o"></i>
                <span class="menu-text">Menu Setup </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="{{ route('admin.menu') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Menu
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ route('admin.submenu') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Sub Menu
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ route('admin.pagemenu') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Page Menu
                    </a>

                    <b class="arrow"></b>
                </li>

                {{-- <li class="">
                    <a href="{{ route('admin.sub_sub') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Mutlti Sub
                    </a>

                    <b class="arrow"></b>
                </li> --}}
            </ul>
        </li>
        <li class="">
            <a href="{{ url('admin/All') }}"">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text">
                    Users Panel
                </span>
            </a>
        </li>
    </ul> --}}
    <!-- /.nav-list -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
            data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
