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
        <!-- <li id="search">
            <form method="get" action="#">
                <input type="text" name="q" class="search-input" placeholder="Search something..." />
                <button type="submit"><i class="entypo-search"></i></button>
            </form>
        </li> -->
        {{-- 虚拟管理模块 S --}}
        <li class="opened active">
            <a href="#"><i class="entypo-gauge"></i><span>虚拟货物</span></a>
            <ul>
                <li><a href="#"><i class="entypo-home"></i><span>我的注册码</span></a>
                    <ul>
                        <li><a href=""><i class="entypo-compass"></i><span>申请注册码</span></a></li>
                        <li><a href=""><i class="entypo-archive"></i><span>已申注册码</span></a></li>
                    </ul>
                </li>
                <li class="active opened"><a href="#"><i class="entypo-doc-text-inv"></i><span>注册码管理</span></a>
                    <ul>
                        <li><a href="/regcode/regcode-add"><i class="entypo-plus-squared"></i><span>添加注册码</span></a></li>
                        <li><a href=""><i class="entypo-help"></i><span>未申注册码</span></a></li>
                        <li class="active"><a href=""><i class="entypo-flag"></i><span>已申注册码</span></a></li>
                        <li><a href=""><i class="entypo-cancel-squared"></i><span>已删注册码</span></a></li>
                        <li><a href=""><i class="entypo-doc-text"></i><span>管理注册码</span></a></li>
                        <li><a href="#"><i class="entypo-cog"></i><span>注册码配置</span></a>
                            <ul>
                                <li><a href="/regconf/config-add"><i class="entypo-list-add"></i><span>添加配置信息</span></a></li>
                                <li><a href="/regconf/type-list"><i class="entypo-flow-tree"></i><span>类型管理</span></a></li>
                                <li><a href="/regconf/terminal-list"><i class="entypo-monitor"></i><span>使用终端管理</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        {{-- 虚拟管理模块 E --}}
        {{-- 实物管理模块 S --}}
        <li class="active">
            <a href="/"><i class="entypo-gauge"></i><span>实体货物</span></a>
            <ul>
                <li class=""><a href="/regcode"><i class="entypo-doc-text-inv"></i><span>实物管理</span></a>
                    <ul>
                        <li><a href="/regcode"><i class="entypo-plus-squared"></i><span>快速查询</span></a></li>
                        <li><a href="/regcode"><i class="entypo-plus-squared"></i><span>添加商品</span></a></li>
                        <li><a href=""><i class="entypo-help"></i><span>实物类别管理</span></a></li>
                        <li class=""><a href=""><i class="entypo-flag"></i><span>实物商品管理</span></a></li>
                        <li><a href=""><i class="entypo-doc-text"></i><span>实物销售管理</span></a></li>
                        <li><a href=""><i class="entypo-doc-text"></i><span>实物贮存管理</span></a></li>
                        <li><a href=""><i class="entypo-doc-text"></i><span>实物退货管理</span></a></li>
                        <li><a href=""><i class="entypo-doc-text"></i><span>实物换货管理</span></a></li>
                        <li><a href=""><i class="entypo-cancel-squared"></i><span>过期实物商品</span></a></li>
                    </ul>
                </li>
            </ul>
        </li>
        {{-- 实物管理模块 E --}}
        {{-- 系统管理模块 S --}}
        <li class="active">
            <a href="#"><i class="entypo-gauge"></i><span>系统管理</span></a>
            <ul>
                <li><a href="#"><i class="entypo-home"></i><span>员工管理</span></a>
                    <ul class="active">
                        <li><a href="/user/user-list"><i class="entypo-users"></i><span>员工账户设置</span></a></li>
                        <li><a href="/user/user-add"><i class="entypo-user-add"></i><span>添加新员工</span></a></li>
                    </ul>
                </li>
                <li class="active"><a href="#"><i class="entypo-flow-tree"></i><span>部门管理</span></a>
                    <ul>
                        <li><a href="/role/role-list"><i class="entypo-cog"></i><span>部门设置</span></a></li>
                        <li><a href="/role/role-add"><i class="entypo-flow-cascade"></i><span>添加部门</span></a></li>
                    </ul>
                </li>
                <li class="active"><a href="#"><i class="entypo-flow-tree"></i><span>销售平台</span></a>
                    <ul>
                        <li><a href="/system/platform-list"><i class="entypo-compass"></i><span>平台设置</span></a></li>
                        <li><a href="/system/platform-add"><i class="entypo-plus"></i><span>添加平台</span></a></li>
                    </ul>
                </li>
            </ul>
        </li>
        {{-- 系统管理模块 E --}}
    </ul>
</div>