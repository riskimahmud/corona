<?php if ($dashboard) : ?>
    <nav class="menu-classic menu-fixed menu-transparent menu-one-page" data-menu-anima="fade-bottom" data-scroll-detect="true">
        <div class="container">
            <div class="menu-brand">
                <a href="#" class="scroll-top-btn scroll-top">
                    <img class="logo-default" src="<?= base_url(); ?>assets_front/media/logo.png" alt="logo" />
                </a>
            </div>
            <i class="menu-btn"></i>
            <div class="menu-cnt">
                <ul>
                    <li>
                        <a href="#covid19">Covid-19</a>
                    </li>
                    <li>
                        <a href="#vaksinasi">Vaksinasi</a>
                    </li>
                    <li>
                        <a href="#infografik">Infografik</a>
                    </li>
                    <li>
                        <a href="#faq">FAQ</a>
                    </li>
                </ul>
                <div class="menu-right">
                    <div class="menu-custom-area">
                        <a class="btn btn-xs btn-border btn-circle" href="<?= site_url("login"); ?>">Masuk</a>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </nav>
<?php else : ?>
    <nav class="menu-classic menu-transparent menu-fixed align-right" data-menu-anima="fade-bottom">
        <div class="container">
            <div class="menu-brand">
                <a href="<?= site_url(); ?>">
                    <img class="logo-default" src="<?= base_url(); ?>assets_front/media/logo.png" alt="logo" />
                </a>
            </div>
            <i class="menu-btn"></i>
            <div class="menu-cnt">
                <ul>
                    <li><a href="<?= site_url(); ?>">Dasboard</a></li>
                    <li><a href="<?= site_url('pasien-covid'); ?>">Pasien Covid </a></li>
                    <li><a href="<?= site_url('vaksinasi'); ?>">Vaksinasi </a></li>
                </ul>
                <div class="menu-right">
                    <div class="menu-custom-area">
                        <a class="btn btn-xs btn-border btn-circle" href="<?= site_url('login'); ?>">Masuk</a>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </nav>

<?php endif; ?>