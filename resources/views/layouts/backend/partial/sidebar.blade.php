<div id="sidebar" class="sidebar responsive  ace-save-state">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>

    <ul class="nav nav-list">

        <li class="active">
            <a href="{{ route('login') }}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>
        <li class="{{ request()->routeIs('investors*') ? 'active' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-user-alt"></i>
                <span class="menu-text">Investor</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="{{ route('investors.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        List
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="{{ route('investors.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Add
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="{{ request()->routeIs('deposits*') ? 'active' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-archive"></i>
                <span class="menu-text">
                    Deposit Packages
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="{{ route('deposits.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        List
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="{{ route('deposits.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Add
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
            <li class="{{ request()->routeIs('directbonus*') ? 'active' : '' }}">
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
                        Add
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="{{ request()->routeIs('designations*') ? 'active' : '' }}">
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
                    <a href="{{ Route('designations.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        List
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ Route('designations.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Add
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="{{ request()->routeIs('rank*') ? 'active' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-trophy"></i>
                <span class="menu-text">
                    Target Bonus
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
                        Add
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="{{ request()->routeIs('positions*') ? 'active' : '' }}">
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
                    <a href="{{ Route('positions.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        List
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ Route('positions.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Add
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        {{-- <li class="{{ request()->routeIs('rank*') ? 'active' : '' }}">
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
                    <a href="{{ route('rank.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        List
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ route('rank.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Add
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li> --}}
        <li class="{{ request()->routeIs('wallet_types*') ? 'active' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-dollar"></i>
                <span class="menu-text">Wallet Types</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="{{ Route('wallet_types.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        List
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="{{ request()->routeIs('wallet_types.create') ? 'active' : '' }}">
                    <a href="{{ route('wallet_types.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <span class="menu-text">Add</span>

                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="{{ request()->routeIs('wallets*') ? 'active' : '' }}">
            <a href="{{ route('wallets.index') }}">
                <i class="menu-icon fa fa-dollar"></i>
                <span class="menu-text">Wallet</span>

            </a>
        </li>

        <li class="{{ request()->routeIs('transaction*') ? 'active' : '' }}">
            <a href="{{ route('transaction.index') }}">
                <i class="menu-icon fa fa-exchange"></i>
                <span class="menu-text">
                    Transaction
                </span>
            </a>
        </li>

        <li class="">
            <a href="{{ route('invest.index') }}">
                <i class="menu-icon fa fa-dollar"></i>
                <span class="menu-text">
                    Invest
                </span>
            </a>
        </li>

        <li class="{{ request()->routeIs('configuration*') ? 'active' : ''}}">
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
