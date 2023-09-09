<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route('listdpt') }}" aria-expanded="false">
                        <i data-feather="users" class="feather-icon"></i>

                        <span class="hide-menu">DPT</span>
                    </a>
                </li>
                @auth('koordinator')
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="/KoorTPS" aria-expanded="false">
                        <i data-feather="user" class="feather-icon"></i>
                        <span class="hide-menu">Koor.Tps</span>
                    </a>
                </li>
                @endauth
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="/ListPemilih" aria-expanded="false">
                        <i data-feather="user" class="feather-icon"></i>
                        <span class="hide-menu">Pemilih</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
