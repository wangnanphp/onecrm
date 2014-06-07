<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="Laborator.co" />
    <title>Neon | Fixed Sidebar</title>
    {{ HTML::style('static/template/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css', ['id' => 'style-resource-1']) }}
    {{ HTML::style('static/template/css/font-icons/entypo/css/entypo.css', ['id' => 'style-resource-2']) }}
    {{ HTML::style('static/template/css/font-icons/entypo/css/animation.css', ['id' => 'style-resource-3']) }}
    <!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"  id="style-resource-4"> -->
    {{ HTML::style('static/template/css/googleapis/fonts.css', ['id' => 'style-resource-4']) }}
    {{ HTML::style('static/template/css/neon.css', ['id' => 'style-resource-5']) }}
    {{ HTML::style('static/template/css/custom.css', ['id' => 'style-resource-6']) }}
    {{ HTML::script('static/template/js/jquery-1.10.2.min.js') }}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- TS1387507087: Neon - Responsive Admin Template created by Laborator -->
</head>
<body class="page-body page-fade">
    <div class="page-container">
        {{-- Nav S --}}
        @include('publics.nav')
        {{-- Nav E --}}

        {{-- Main S --}}
        <div class="main-content">
            {{-- Header S --}}
            @include('publics.header')
            {{-- Header E --}}

            {{-- breadcrumb S --}}
            @include('publics.breadcrumb')
            {{-- breadcrumb E --}}

            {{-- content S --}}
            @yield('content')
            {{-- content E --}}

            {{-- Footer S --}}
            @include('publics.footer')
            {{-- Footer E --}}
        </div>
        {{-- Main E --}}

        {{-- Chat S --}}
        @include('publics.chat')
        {{-- Chat E --}}
    </div>
    <!-- script src="../../../neon-x/assets/js/gsap/main-gsap.js" id="script-resource-1"></script -->
    {{ HTML::script('static/template/js/gsap/main-gsap.js', ['id' => 'script-resource-1']) }}
    <!-- script src="../../../neon-x/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script -->
    {{ HTML::script('static/template/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js', ['id' => 'script-resource-2']) }}
    <!-- script src="../../../neon-x/assets/js/bootstrap.min.js" id="script-resource-3"></script -->
    {{ HTML::script('static/template/js/bootstrap.min.js', ['id' => 'script-resource-3']) }}
    <!-- script src="../../../neon-x/assets/js/joinable.js" id="script-resource-4"></script -->
    {{ HTML::script('static/template/js/joinable.js', ['id' => 'script-resource-4']) }}
    <!-- script src="../../../neon-x/assets/js/resizeable.js" id="script-resource-5"></script -->
    {{ HTML::script('static/template/js/resizeable.js', ['id' => 'script-resource-5']) }}
    <!-- script src="../../../neon-x/assets/js/neon-api.js" id="script-resource-6"></script -->
    {{ HTML::script('static/template/js/neon-api.js', ['id' => 'script-resource-6']) }}
    <!-- script src="../../../neon-x/assets/js/neon-chat.js" id="script-resource-7"></script -->
    {{ HTML::script('static/template/js/neon-chat.js', ['id' => 'script-resource-7']) }}
    <!-- script src="../../../neon-x/assets/js/neon-custom.js" id="script-resource-8"></script -->
    {{ HTML::script('static/template/js/neon-custom.js', ['id' => 'script-resource-8']) }}
    <!-- script src="../../../neon-x/assets/js/neon-demo.js" id="script-resource-9"></script -->
    {{ HTML::script('static/template/js/neon-demo.js', ['id' => 'script-resource-9']) }}
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-28991003-3']);
        _gaq.push(['_setDomainName', 'laborator.co']);
        _gaq.push(['_setAllowLinker', true]);
        _gaq.push(['_trackPageview']);

        (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
</body>
</html>