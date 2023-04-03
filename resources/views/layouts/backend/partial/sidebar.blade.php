<div id="sidebar" class="sidebar responsive  ace-save-state">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>

    <ul class="nav nav-list">

        <li class="active">
            <a href="{{ route('dashboard') }}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>
        <li class="">
            <a href="{{ route('invest.index') }}">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text">Invest</span>
            </a>

            <b class="arrow"></b>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text">
                    Deposit Packages
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="{{ Route('deposits.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        List Deposit Packages
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="{{ Route('deposits.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create Deposit Packages
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
            <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fas fa-gift"></i>
                <span class="menu-text">
                    Direct Bouns
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="{{ Route('directbonus.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        List Direct Bouns
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="{{ Route('directbonus.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create Direct Bouns
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-trophy"></i>
                <span class="menu-text">
                    Rank
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="{{ Route('rank.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        List Rank
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ Route('rank.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create Rank
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-trophy"></i>
                <span class="menu-text">
                    Tranzaction
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="{{ Route('rank.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        List Tranzaction
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ Route('rank.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create Tranzaction
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-trophy"></i>
                <span class="menu-text">
                    Positions
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="{{ Route('rank.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        List Positions
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ Route('rank.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create Positions
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-trophy"></i>
                <span class="menu-text">
                    Designation
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="{{ Route('rank.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        List Designation
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ Route('rank.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create Designation
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="{{ route('investors.index') }}">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text">Investor</span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="{{ route('configuration.index') }}">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text">Configration</span>
            </a>
            <b class="arrow"></b>
        </li>

        {{-- <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text">
                    Reward
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="{{ Route('deposits.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        All Reward
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text"> Transaction </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="tables.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                       All Transaction
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>



        <li class="">
            <a href="calendar.html">
                <i class="menu-icon fa fa-calendar"></i>

                <span class="menu-text">
                    Calendar

                    <span class="badge badge-transparent tooltip-error" title="2 Important Events">
                        <i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
                    </span>
                </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="gallery.html">
                <i class="menu-icon fa fa-picture-o"></i>
                <span class="menu-text"> Gallery </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-tag"></i>
                <span class="menu-text"> More Pages </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="profile.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        User Profile
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="inbox.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Inbox
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="pricing.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Pricing Tables
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="invoice.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Invoice
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="timeline.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Timeline
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="search.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Search Results
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="email.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Email Templates
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="login.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Login &amp; Register
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-file-o"></i>

                <span class="menu-text">
                    Other Pages

                    <span class="badge badge-primary">5</span>
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="faq.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        FAQ
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="error-404.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Error 404
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="error-500.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Error 500
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="grid.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Grid
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="blank.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Blank Page
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li> --}}
    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
