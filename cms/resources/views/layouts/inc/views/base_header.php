<?php
/**
 * base_header.php
 *
 * Author: pixelcave
 *
 * The header of each page (Backend)
 *
 */
?>

<!-- Header -->
<header id="header-navbar" class="content-mini content-mini-full">
    <!-- Header Navigation Right -->
    <ul class="nav-header pull-right">
        <li>
            <div class="btn-group">
                <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                    <img src="<?php echo $one->assets_folder; ?>/img/avatars/avatar10.jpg" alt="Avatar">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-header">Administrator</li>
                    <!-- < ?php if (\Auth::user()->role == 1): ?> 
                    <li>
                        <a tabindex="-1" href="< ?php echo url('/administrator'); ?>">
                            <i class="si si-eyeglasses pull-right"></i>
                            Manage Admin
                        </a>
                    </li>
                    < ?php endif ?> -->
                    <li>
                        <a tabindex="-1" href="<?php echo url('/logout') ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="si si-logout pull-right"></i>Log out
                        </a>
                        <form id="logout-form" action="<?php echo url('/logout'); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <!-- END Header Navigation Right -->

    <!-- Header Navigation Left -->
    <ul class="nav-header pull-left">
        <li class="hidden-md hidden-lg">
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                <i class="fa fa-navicon"></i>
            </button>
        </li>
        <li class="hidden-xs hidden-sm">
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                <i class="fa fa-ellipsis-v"></i>
            </button>
        </li>
    </ul>
    <!-- END Header Navigation Left -->
</header>
<!-- END Header -->
