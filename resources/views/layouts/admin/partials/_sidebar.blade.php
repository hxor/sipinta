<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li class="text-muted menu-title">Navigation</li>

                <li class="">
                    <a href="{{ route('home') }}" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span></a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-package"></i><span> Data Paket </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.loan.index') }}">Pinjaman</a></li>
                        <li><a href="{{ route('admin.deposit.index') }}">Tabungan</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-star"></i> <span> Anggota </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.member.index') }}">Daftar Anggota</a></li>
                    </ul>
                </li>
                
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-pencil-alt"></i><span> Transaksi </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.transaction.loan.index') }}">Pinjam</a></li>
                        <li><a href="{{ route('admin.transaction.deposit.index') }}">Tabungan</a></li>
                        <li><a href="{{ route('admin.transaction.claim.index') }}">Kasbon</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-id-badge"></i><span> Staff </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.group.index') }}">Group</a></li>
                        <li><a href="{{ route('admin.staff.index') }}">Staff</a></li>
                    </ul>
                </li>

                <li class="">
                    <a href="{{ route('admin.user.index') }}" class="waves-effect"><i class="ti-user"></i> <span> Users </span></a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-settings"></i><span> Settings </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.setting.general.index') }}">Aplikasi</a></li>
                        <li><a href="{{ route('admin.setting.cost.index') }}">Persentase</a></li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
