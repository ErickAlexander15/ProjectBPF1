<div class="sidebar d-print-none" data-color="blue">
    <div class="logo">
        <a href="{{url('')}}" class="simple-text logo-normal">
            {{ __('Angkasa') }}
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="@if ($activePage == 'home') active @endif">
                <a href="{{ route('admin.home') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#master-menu">
                    <i class="fas fa-list"></i>
                    <p>
                        {{ __("Menu") }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if (@$parent == 'master') show @endif" id="master-menu">
                    <ul class="nav">
                        <li class="@if ($activePage == 'user') active @endif">
                            <a href="{{route('admin.user.index')}}">
                                <i class="now-ui-icons users_single-02"></i>
                                <p> {{ __("Pengguna") }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'field') active @endif">
                            <a href="{{route('admin.field.index')}}">
                                <i class="fas fa-money-bill"></i>
                                <p> {{ __("Lapangan") }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'ball') active @endif">
                            <a href="{{route('admin.ball.index')}}">
                                <i class="fas fa-futbol"></i>
                                <p> {{ __("Jenis Bola") }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'payment-type') active @endif">
                            <a href="{{route('admin.paymentType.index')}}">
                                <i class="fas fa-money-check"></i>
                                <p> {{ __("Metode Pembayaran") }} </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#order-menu">
                    <i class="fas fa-receipt"></i>
                    <p>
                        {{ __("Order") }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if (@$parent == 'order') show @endif" id="order-menu">
                    <ul class="nav">
                        <li class="@if ($activePage == 'list') active @endif">
                            <a href="{{route('admin.summary.index')}}">
                                <i class="fas fa-receipt"></i>
                                <p> {{ __("List Order") }} </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
