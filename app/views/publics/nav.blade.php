<div class="sidebar-menu fixed">
    <header class="logo-env">
        <!-- logo -->
        <div class="logo">
            <a href="/"> {{ HTML::image('static/template/images/logo.png') }} </a>
        </div>
        <!-- logo collapse icon -->
        <div class="sidebar-collapse">
            <a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition --> <i class="entypo-menu"></i> </a>
        </div>
        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation"><!-- add class "with-animation" to support animation --> <i class="entypo-menu"></i> </a>
        </div>
    </header>
    <ul id="main-menu" class="">
        <li id="search">
            <form method="get" action="#">
                <input type="text" name="q" class="search-input" placeholder="Search something..." />
                <button type="submit"><i class="entypo-search"></i></button>
            </form>
        </li>
        <li><a href="../../../neon-x/dashboard/main/index.html"><i class="entypo-gauge"></i><span>Dashboard</span></a>
            <ul>
                <li><a href="../../../neon-x/dashboard/main/index.html"><span>Dashboard 1</span></a></li>
                <li><a href="../../../neon-x/dashboard/main-2/index.html"><span>Dashboard 2</span></a></li>
            </ul>
        </li>
        <li class="opened active"><a href="../../../neon-x/layouts/layout-api/index.html"><i class="entypo-layout"></i><span>Layouts</span></a>
            <ul>
                <li><a href="../../../neon-x/layouts/layout-api/index.html"><span>Layout API</span></a></li>

                <li><a href="../../../neon-x/layouts/collapsed-sidebar/index.html"><span>Collapsed Sidebar</span></a></li>
                <li class="active"><a href="../../../neon-x/layouts/fixed-sidebar/index.html"><span>Fixed Sidebar</span></a></li>
                <li><a href="../../../neon-x/layouts/chat-open/index.html"><span>Chat Open</span></a></li>
                <li><a href="../../../neon-x/layouts/horizontal-menu-boxed/index.html"><span>Horizontal Menu Boxed</span></a></li>
                <li><a href="../../../neon-x/layouts/horizontal-menu-fluid/index.html"><span>Horizontal Menu Fluid</span></a></li>
                <li><a href="../../../neon-x/layouts/mixed-menus/index.html"><span>Mixed Menus</span></a></li>
                <li><a href="../../../neon-x/layouts/page-transition-fade/index.html"><span>Page Enter Transitions</span></a>
                    <ul>
                        <li><a href="../../../neon-x/layouts/page-transition-fade/index.html"><span>Fade Scale</span></a></li>
                        <li><a href="../../../neon-x/layouts/page-transition-left-in/index.html"><span>Left In</span></a></li>
                        <li><a href="../../../neon-x/layouts/page-transition-right-in/index.html"><span>Right In</span></a></li>
                        <li><a href="../../../neon-x/layouts/page-transition-fade-only/index.html"><span>Fade Only</span></a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="../../../neon-x/ui/panels/index.html"><i class="entypo-newspaper"></i><span>UI Elements</span></a>
            <ul>
                <li><a href="../../../neon-x/ui/panels/index.html"><span>Panels</span></a></li>
                <li><a href="../../../neon-x/ui/tiles/index.html"><span>Tiles</span></a></li>
                <li><a href="../../../neon-x/forms/buttons/index.html"><span>Buttons</span></a></li>
                <li><a href="../../../neon-x/ui/typography/index.html"><span>Typography</span></a></li>
                <li><a href="../../../neon-x/ui/tabs-accordions/index.html"><span>Tabs &amp; Accordions</span></a></li>
                <li><a href="../../../neon-x/ui/tooltips-popovers/index.html"><span>Tooltips &amp; Popovers</span></a></li>
                <li><a href="../../../neon-x/ui/navbars/index.html"><span>Navbars</span></a></li>
                <li><a href="../../../neon-x/ui/breadcrumbs/index.html"><span>Breadcrumbs</span></a></li>
                <li><a href="../../ui/badges-label/s.html"><span>Badges &amp; Labels</span></a></li>
                <li><a href="../../../neon-x/ui/progress-bars/index.html"><span>Progress Bars</span></a></li>
                <li><a href="../../../neon-x/ui/modals/index.html"><span>Modals</span></a></li>
                <li><a href="../../../neon-x/ui/blockquotes/index.html"><span>Blockquotes</span></a></li>
                <li><a href="../../../neon-x/ui/alerts/index.html"><span>Alerts</span></a></li>
                <li><a href="../../../neon-x/ui/pagination/index.html"><span>Pagination</span></a></li>
            </ul>
        </li>
        <li><a href="../../../neon-x/mailbox/main/index.html"><i class="entypo-mail"></i><span>Mailbox</span><span class="badge badge-secondary">8</span></a>
            <ul>
                <li><a href="../../../neon-x/mailbox/main/index.html"><i class="entypo-inbox"></i><span>Inbox</span></a></li>
                <li><a href="../../../neon-x/mailbox/compose/index.html"><i class="entypo-pencil"></i><span>Compose Message</span></a></li>
                <li><a href="../../../neon-x/mailbox/message/index.html"><i class="entypo-attach"></i><span>View Message</span></a></li>
            </ul>
        </li>

        <li><a href="../../../neon-x/forms/main/index.html"><i class="entypo-doc-text"></i><span>Forms</span></a>
            <ul>
                <li><a href="../../../neon-x/forms/main/index.html"><span>Basic Elements</span></a></li>
                <li><a href="../../../neon-x/forms/advanced/index.html"><span>Advanced Plugins</span></a></li>
                <li><a href="../../../neon-x/forms/wizard/index.html"><span>Form Wizard</span></a></li>
                <li><a href="../../../neon-x/forms/validation/index.html"><span>Data Validation</span></a></li>
                <li><a href="../../../neon-x/forms/masks/index.html"><span>Input Masks</span></a></li>
                <li><a href="../../../neon-x/forms/sliders/index.html"><span>Sliders</span></a></li>
                <li><a href="../../../neon-x/forms/file-upload/index.html"><span>File Upload</span></a></li>
                <li><a href="../../../neon-x/forms/wysiwyg/index.html"><span>Editors</span></a></li>
            </ul>
        </li>
        <li><a href="../../../neon-x/tables/main/index.html"><i class="entypo-window"></i><span>Tables</span></a>
            <ul>
                <li><a href="../../../neon-x/tables/main/index.html"><span>Basic Tables</span></a></li>
                <li><a href="../../../neon-x/tables/datatable/index.html"><span>Data Tables</span></a></li>
            </ul>
        </li>
        <li><a href="../../../neon-x/extra/icons/index.html"><i class="entypo-bag"></i><span>Extra</span><span class="badge badge-info badge-roundless">New Items</span></a>
            <ul>
                <li><a href="../../../neon-x/extra/icons/index.html"><span>Icons</span><span class="badge badge-success">3</span></a>
                    <ul>
                    <li><a href="../../../neon-x/extra/icons-fontawesome/index.html"><span>Font Awesome</span></a></li>
                    <li><a href="../../../neon-x/extra/icons-entypo/index.html"><span>Entypo</span></a></li>
                    <li><a href="../../../neon-x/extra/icons-glyphicons/index.html"><span>Glyph Icons</span></a></li>
                    </ul>
                </li>
                <li><a href="../../../neon-x/extra/portlets/index.html"><span>Portlets</span></a></li>
                <li><a href="../../../neon-x/extra/google-maps/index.html"><span>Maps</span></a>
                    <ul>
                        <li><a href="../../../neon-x/extra/google-maps/index.html"><span>Google Maps</span></a></li>
                        <li><a href="../../../neon-x/extra/vector-maps/index.html"><span>Vector Maps</span></a></li>
                    </ul>
                </li>
                <li><a href="../../../neon-x/extra/chat-api/index.html"><span>Chat API</span></a></li>
                <li><a href="../../../neon-x/extra/calendar/index.html"><span>Calendar</span></a></li>
                <li><a href="../../../neon-x/extra/lockscreen/index.html"><span>Lockscreen</span></a></li>
                <li><a href="../../../neon-x/extra/login/index.html"><span>Login</span></a></li>
                <li><a href="../../../neon-x/extra/invoice/index.html"><span>Invoice</span></a></li>
                <li><a href="../../../neon-x/extra/404/index.html"><span>404 Page</span></a></li>
                <li><a href="../../../neon-x/extra/blank-page/index.html"><span>Blank Page</span></a></li>
                <li><a href="../../../neon-x/extra/tocify/index.html"><span>Tocify</span></a></li>
                <li><a href="../../../neon-x/ui/notifications/index.html"><span>Notifications</span></a></li>
                <li><a href="../../../neon-x/extra/scrollbox/index.html"><span>Scrollbox</span></a></li>
            </ul>
        </li>
        <li><a href="../../../neon-x/extra/charts/index.html"><i class="entypo-chart-bar"></i><span>Charts</span></a></li>
        <li><a href="../../../neon-x/index.html#"><i class="entypo-flow-tree"></i><span>Menu Levels</span></a>
            <ul>
                <li><a href="../../../neon-x/index.html#"><i class="entypo-flow-line"></i><span>Menu Level 1.1</span></a></li>
                <li><a href="../../../neon-x/index.html#"><i class="entypo-flow-line"></i><span>Menu Level 1.2</span></a></li>
                <li><a href="../../../neon-x/index.html#"><i class="entypo-flow-line"></i><span>Menu Level 1.3</span></a>
                    <ul>
                        <li><a href="../../../neon-x/index.html#"><i class="entypo-flow-parallel"></i><span>Menu Level 2.1</span></a></li>
                        <li><a href="../../../neon-x/index.html#"><i class="entypo-flow-parallel"></i><span>Menu Level 2.2</span></a>
                            <ul>
                                <li><a href="../../../neon-x/index.html#"><i class="entypo-flow-cascade"></i><span>Menu Level 3.1</span></a>
                                    <ul>
                                        <li><a href="../../../neon-x/index.html#"><i class="entypo-flow-branch"></i><span>Menu Level 4.1</span></a></li>
                                    </ul>
                                </li>
                                <li><a href="../../../neon-x/index.html#"><i class="entypo-flow-cascade"></i><span>Menu Level 3.2</span></a></li>
                            </ul>
                        </li>
                        <li><a href="../../../neon-x/index.html#"><i class="entypo-flow-parallel"></i><span>Menu Level 2.3</span></a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>