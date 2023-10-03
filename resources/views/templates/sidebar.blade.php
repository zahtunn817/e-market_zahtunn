            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('adminlte3') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            @auth
                                {{ auth()->user()->name }}
                            @else
                                Guest
                            @endauth
                        </a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        @auth
                            <li class="nav-item">
                                <a href="{{ url('user') }}" class="nav-link">
                                    <i class="nav-icon fas fa-user-tie"></i>
                                    <p>
                                        User
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('pelanggan') }}" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Pelanggan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('pemasok') }}" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Pemasok
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('pembelian') }}" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Data Pembelian
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('transaksiPembelian') }}" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Transaksi Pembelian
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('akses') }}" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Akses
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('barang') }}" class="nav-link">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>
                                        Barang
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('produk') }}" class="nav-link">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>
                                        Produk
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('profile') }}" class="nav-link">
                                    <i class="nav-icon fas fa-user-alt"></i>
                                    <p>
                                        Profile
                                    </p>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ url('faq') }}" class="nav-link">
                                    <i class=" nav-icon far fa-question-circle"></i>
                                    <p>
                                        FAQ
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('contact') }}" class="nav-link">
                                    <i class="nav-icon fas fa-address-book"></i>
                                    <p>
                                        Contact
                                    </p>
                                </a>
                            </li>
                        @endauth
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
            </aside>
