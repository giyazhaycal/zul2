<?php
/**
 * config.php
 *
 * Author: mineral
 *
 * Global configuration file
 *
 */

// Include Template class
require 'classes/Template.php';

// Create a new Template Object
$one                               = new Template(env('APP_NAME'), env('APP_VER'), 'assets'); // Name, version and assets folder's name

//Mineral CMS Assets Path
$one->assets_folder = asset('assets');

// Global Meta Data
$one->author                       = env('APP_NAME');
$one->robots                       = 'noindex, nofollow';
$one->title                        = env('APP_NAME');
$one->description                  = env('APP_NAME');

// Global Included Files (eg useful for adding different sidebars or headers per page)
$one->inc_side_overlay             = 'base_side_overlay.php';
$one->inc_sidebar                  = 'base_sidebar.php';
$one->inc_header                   = 'base_header.php';

// Global Color Theme
$one->theme                        = '';       // '' for default theme or 'amethyst', 'city', 'flat', 'modern', 'smooth'

// Global Cookies
$one->cookies                      = true;    // True: Remembers active color theme between pages (when set through color theme list), False: Disables cookies

// Global Body Background Image
$one->body_bg                      = '';       // eg 'assets/img/photos/photo10@2x.jpg' Useful for login/lockscreen pages

// Global Header Options
$one->l_header_fixed               = true;     // True: Fixed Header, False: Static Header

// Global Sidebar Options
$one->l_sidebar_position           = 'left';   // 'left': Left Sidebar and right Side Overlay, 'right': Flipped position
$one->l_sidebar_mini               = false;    // True: Mini Sidebar Mode (> 991px), False: Disable mini mode
$one->l_sidebar_visible_desktop    = true;     // True: Visible Sidebar (> 991px), False: Hidden Sidebar (> 991px)
$one->l_sidebar_visible_mobile     = false;    // True: Visible Sidebar (< 992px), False: Hidden Sidebar (< 992px)

// Global Side Overlay Options
$one->l_side_overlay_hoverable     = false;    // True: Side Overlay hover mode (> 991px), False: Disable hover mode
$one->l_side_overlay_visible       = false;    // True: Visible Side Overlay, False: Hidden Side Overlay

// Global Sidebar and Side Overlay Custom Scrolling
$one->l_side_scroll                = true;     // True: Enable custom scrolling (> 991px), False: Disable it (native scrolling)

// Global Active Page (it will get compared with the url of each menu link to make the link active and set up main menu accordingly)
// $one->main_nav_active              = basename($_SERVER['PHP_SELF']);
$one->main_nav_active              = url()->current();

// Google Maps API Key (you will have to obtain a Google Maps API key to use Google Maps, for more info please have a look at https://developers.google.com/maps/documentation/javascript/get-api-key#key)
$one->google_maps_api_key          = '';

// Global Main Menu
$the_menu = array();
$role_menu = \Auth::check() ? \Auth::user()->roleMenu() : array();

$the_menu[] = array(
    'name'  => '<span class="sidebar-mini-hide">Menu</span>',
    'type'  => 'heading'
);

$the_menu[] = array(
    'name'  => '<span class="sidebar-mini-hide">Dashboard</span>',
    'icon'  => 'si si-speedometer',
    'url'   => url('dashboard')
);

if ( in_array(config('mineral.role.categories'), $role_menu) ) {
    $the_menu[] = array(
        'name'  => '<span class="sidebar-mini-hide">List User</span>',
        'icon'  => 'si si-layers',
        'url'   => url('list-users')
    );
}

if ( in_array(config('mineral.role.categories'), $role_menu) ) {
    $the_menu[] = array(
        'name'  => '<span class="sidebar-mini-hide">List CV</span>',
        'icon'  => 'si si-layers',
        'url'   => url('listcv')
    );
}


$the_menu[] = array(
    'name'  => '<span class="sidebar-mini-hide">Website</span>',
    'type'  => 'heading'
);

// if( in_array(config('mineral.role.featured'), $role_menu) ) {
//     $the_menu[] = array(
//         'name'  => '<span class="sidebar-mini-hide">Featured</span>',
//         'icon'  => 'si si-tag',
//         'sub'   => array(
//             array(
//                 'name'  => '<span class="sidebar-mini-hide">Home Position</span>',
//                 'url'   => url('featured/position?section=home')
//             ),
//             array(
//                 'name'  => '<span class="sidebar-mini-hide">What\'s New Position</span>',
//                 'url'   => url('featured/position?section=whats')
//             )
//         )
//     );
// }

if ( in_array(config('mineral.role.setting'), $role_menu) ) {
    $menu_setting = array(
        array(
            'name'  => '<span class="sidebar-mini-hide">Others</span>',
            'url'   => url('setting-other')
        )
    ); 

    $the_menu[] = array(
        'name'  => '<span class="sidebar-mini-hide">Setting</span>',
        'icon'  => 'si si-wrench',
        'sub'   => $menu_setting
    );
}

// $the_menu[] = array(
//     'name'  => '<span class="sidebar-mini-hide">Extra</span>',
//     'type'  => 'heading'
// );


// if ( in_array(config('mineral.role.analytics'), $role_menu) ) {
//     $the_menu[] = array(
//         'name'  => '<span class="sidebar-mini-hide">Analytics</span>',
//         'icon'  => 'si si-bar-chart',
//         'sub'   => array(
//             array(
//                 'name'  => '<span class="sidebar-mini-hide">Sales</span>',
//                 'url'   => url('analytics/sales')
//             ),
//             array(
//                 'name'  => '<span class="sidebar-mini-hide">Product</span>',
//                 'url'   => url('analytics/product')
//             ),
//             array(
//                 'name'  => '<span class="sidebar-mini-hide">Google</span>',
//                 'url'   => url('analytics/google')
//             ),
//         )
//     );
// }

// if ( in_array(config('mineral.role.documentation'), $role_menu) ) {
//     $the_menu[] = array(
//         'name'  => '<span class="sidebar-mini-hide">Documentation</span>',
//         'icon'  => 'si si-notebook',
//         'url'   => env('HL_DOCUMENTATION', 'https://docs.heavenlights.co/'),
//         'target'=> true
//     );
// }


$one->main_nav = $the_menu;