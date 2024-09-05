<div class="ic-sidenav">
    <div class="ic-sidenav-scroll">
        <ul class="metismenu" id="menu">
            <li class="menu-title border-top-0 pt-2">Main Menu</li>


            <?php if (session()->get('monica_req') == 'offfarm') : ?>
                <li><a href="#" class="ai-icon" aria-expanded="false" hx-get="/dashboard" hx-target="#konten" hx-replace-url="/dashboard"
                        hx-on--before-request="showLoading(true)"
                        hx-on::after-request="showLoading(false)">

                        <i class="flaticon-home"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (session()->get('role') == 'Superadmin') : ?>
                <li><a href="#" class="ai-icon" aria-expanded="false" hx-post="/users" hx-target="#konten" hx-replace-url="/users"
                        hx-on--before-request="showLoading(true)"
                        hx-on::after-request="showLoading(false)">
                        <i class="flaticon-user"></i>
                        <span class="nav-text">Users</span>
                    </a>
                </li>
                <li><a href="#" class="ai-icon" aria-expanded="false" hx-post="/pks" hx-target="#konten" hx-replace-url="/pks"
                        hx-on--before-request="showLoading(true)"
                        hx-on::after-request="showLoading(false)">
                        <i class="flaticon-user"></i>
                        <span class="nav-text">PKS</span>
                    </a>
                </li>
                <li><a href="#" class="ai-icon" aria-expanded="false" hx-post="/kebun" hx-target="#konten" hx-replace-url="/kebun"
                        hx-on--before-request="showLoading(true)"
                        hx-on::after-request="showLoading(false)">
                        <i class="flaticon-user"></i>
                        <span class="nav-text">Kebun</span>
                    </a>
                </li>

                <li><a href="#" class="ai-icon" aria-expanded="false" hx-post="/regional" hx-target="#konten" hx-replace-url="/regional"

                        hx-on--before-request="showLoading(true)"
                        hx-on::after-request="showLoading(false)">
                        <i class="flaticon-user"></i>
                        <span class="nav-text">Regional</span>
                    </a>
                </li>
            <?php endif; ?>

            <li>
                <a href="#" class="ai-icon" aria-expanded="false" hx-post="/stokbibit" hx-target="#konten" hx-replace-url="/stokbibit"
                    hx-on--before-request="showLoading(true)"
                    hx-on::after-request="showLoading(false)">
                    <i class="flaticon-user"></i>
                    <span class="nav-text">Stok Bibit</span>
                </a>
            </li>
            <?php if (session()->get('monica_req') == 'onfarm') : ?>

                <li>
                    <a href="#" class="ai-icon" aria-expanded="false" hx-post="/stokbibit/dashboard_data" hx-target="#konten" hx-replace-url="/stokbibit"
                        hx-on--before-request="showLoading(true)"
                        hx-on::after-request="showLoading(false)">
                        <i class="flaticon-user"></i>
                        <span class="nav-text">Dashboard Stok Bibit</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (session()->get('monica_req') == 'offfarm') : ?>

            <li><a href="#" class="ai-icon" aria-expanded="false" hx-post="/awal" hx-target="#konten" hx-replace-url="/awal"

                    hx-on--before-request="showLoading(true)"
                    hx-on::after-request="showLoading(false)">
                    <i class="flaticon-blog"></i>
                    <span class="nav-text">
                        Investasi Awal
                    </span>
                </a>
            </li>
            <li><a href="#" class="ai-icon" aria-expanded="false" hx-post="/sumberips" hx-target="#konten" hx-replace-url="/sumberips"

                    hx-on--before-request="showLoading(true)"
                    hx-on::after-request="showLoading(false)">
                    <i class="flaticon-blog"></i>
                    <span class="nav-text">
                        Sumber Ips
                    </span>
                </a>
            </li>

            <li><a href="#" class="ai-icon" aria-expanded="false" hx-post="/progresslapangan" hx-target="#konten" hx-replace-url="/progresslapangan"

                    hx-on--before-request="showLoading(true)"
                    hx-on::after-request="showLoading(false)">
                    <i class="flaticon-blog"></i>
                    <span class="nav-text">


                        Progress Lap. Investasi

                    </span>
                </a>
            </li>


            <li><a href="<?= base_url('a') ?>" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-blog"></i>
                    <span class="nav-text">
                        Pengawasan Pekerjaan Lapangan
                    </span>
                </a>
            </li>


            <li><a href="<?= base_url('a') ?>" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-blog"></i>
                    <span class="nav-text">
                        Input Uraian Pekerjaan
                    </span>
                </a>
            </li>

            <?php endif; ?>


            <li><a href="<?= base_url('a') ?>" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-blog"></i>
                    <span class="nav-text">
                        Update Progress
                    </span>
                </a>
            </li>


            <li><a href="<?= base_url('a') ?>" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-blog"></i>
                    <span class="nav-text">
                        Upload Dokumen
                    </span>
                </a>
            </li>

            <li><a href="#" class="ai-icon" aria-expanded="false" hx-get="/dashboard" hx-target="#konten">
                    <i class="flaticon-blog"></i>
                    <span class="nav-text">
                        Reset Password
                    </span>
                </a>
            </li>

    </div>
</div>