<div class="sidebar-menu">
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
        <li class="opened active">
            <a href="/"><i class="entypo-gauge"></i><span>虚拟货物</span></a>
            <ul>
                <li><a href="../../../neon-x/dashboard/main/index.html"><i class="entypo-home"></i><span>我的注册码</span></a>
                    <ul>
                        <li><a href=""><i class="entypo-compass"></i><span>申请注册码</span></a></li>
                        <li><a href=""><i class="entypo-archive"></i><span>已申注册码</span></a></li>
                    </ul>
                </li>
                <li class="opened active"><a href="/regcode"><i class="entypo-doc-text-inv"></i><span>注册码管理</span></a>
                    <ul>
                        <li><a href="/regcode"><i class="entypo-plus-squared"></i><span>添加注册码</span></a></li>
                        <li><a href=""><i class="entypo-help"></i><span>未申注册码</span></a></li>
                        <li class="active"><a href=""><i class="entypo-flag"></i><span>已申注册码</span></a></li>
                        <li><a href=""><i class="entypo-cancel-squared"></i><span>已删注册码</span></a></li>
                        <li><a href=""><i class="entypo-doc-text"></i><span>管理注册码</span></a></li>
                    </ul>
                </li>
            </ul>
        </li>
        {{-- 实物管理 S --}}
        <li class="opened active">
            <a href="/"><i class="entypo-gauge"></i><span>实体货物</span></a>
            <ul>
                <li class="opened active"><a href="/regcode"><i class="entypo-doc-text-inv"></i><span>实物管理</span></a>
                    <ul>
                        <li><a href="/regcode"><i class="entypo-plus-squared"></i><span>快速查询</span></a></li>
                        <li><a href="/regcode"><i class="entypo-plus-squared"></i><span>添加商品</span></a></li>
                        <li><a href=""><i class="entypo-help"></i><span>实物类别管理</span></a></li>
                        <li class="active"><a href=""><i class="entypo-flag"></i><span>实物商品管理</span></a></li>
                        <li><a href=""><i class="entypo-doc-text"></i><span>实物销售管理</span></a></li>
                        <li><a href=""><i class="entypo-doc-text"></i><span>实物贮存管理</span></a></li>
                        <li><a href=""><i class="entypo-doc-text"></i><span>实物退货管理</span></a></li>
                        <li><a href=""><i class="entypo-doc-text"></i><span>实物换货管理</span></a></li>
                        <li><a href=""><i class="entypo-cancel-squared"></i><span>过期实物商品</span></a></li>
                    </ul>
                </li>
            </ul>
        </li>
        {{-- 实物管理 E --}}

    </ul>
</div>