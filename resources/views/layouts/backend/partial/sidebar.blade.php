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
                    <a href="{{ Route('deposits.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="{{ Route('deposits.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        List
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
                        List
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="{{ Route('directbonus.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create
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
                        List
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ Route('rank.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-trophy"></i>
                <span class="menu-text">
                    Transaction
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="{{ Route('rank.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        List
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ Route('rank.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create
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
                        List
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ Route('rank.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create
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
                        List
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ Route('rank.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create
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
                <span class="menu-text">Configuration</span>
            </a>
            <b class="arrow"></b>
        </li>
    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
