  <!-- Left Panel -->

  <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ url('/back') }}"><img src="{{ asset('/others') }}/" alt="Logo"></a>
            <a class="navbar-brand hidden" href="{{ url('/back') }}"><img src="{{ asset('/others') }}/" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ url('/back/') }}"> <i class="menu-icon fa fa-dashboard"></i>Accueil </a>
                </li>
                
                
                    <li><a href="{{ url('/back/permission') }}"><i class="menu-icon fa fa-share-square-o"></i> Permissions</a></li>
                
                
                
                    <li><a href="{{ url('/back/roles') }}"><i class="menu-icon fa fa-fire"></i> Roles</a></li>
                
                

                
                    <li><a href="{{ url('/back/albums') }}"><i class="menu-icon fa fa-picture-o"></i> Albums</a></li>
                

                
                    <li><a href="{{ url('/back/aboutus') }}"><i class="menu-icon fa fa-info-circle"></i> A propos</a></li>
                


                
                    <li><a href="{{ url('/back/accounts') }}"><i class="menu-icon fa fa-users"></i> Comptes</a></li>
                

                
                    <li><a href="{{ url('/back/settings') }}"><i class="menu-icon fa fa-gears"></i> Paramètres</a></li>
                
                

              
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->