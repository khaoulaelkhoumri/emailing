
    <!-- Sidebar wrapper start -->
    <nav id="sidebar" class="sidebar-wrapper">
        <!-- Sidebar brand start  -->
        <div class="sidebar-brand">
            <a href="{{route('Accueil')}}" class="logo">
                <img src="{{ asset('front/assets/img/logo.png')}}" alt="Le Rouge Admin Dashboard" />
            </a>
        </div>
        <!-- Sidebar brand end  -->
        <!-- Sidebar content start -->
        <div class="sidebar-content">
            <!-- sidebar menu start -->
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">General</li>
                    <li>
                        <a href="{{route('Accueil')}}">
                            <i class="icon-devices_other"></i>
                            <span class="menu-text">Tableau de bord</span>
                        </a>
                    </li>
                    <li class="sidebar-dropdown  {{(Request::segment(2)=="Contacts")?" active":""}}">
                        <a href="#">
                            <i class="icon-phone1"></i>
                            <span class="menu-text">Contacts</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="{{route('Contacts.Liste_Contacts')}}" class="{{(Request::segment(3)=="Liste_Contacts")?"current-page":""}}">List Contacts</a>
                                </li>
                                <li>
                                    <a href="{{route('Contacts.Nouveaux_Contact')}}" class="{{(Request::segment(3)=="Nouveaux_Contact")?"current-page":""}}">Nouveau Contact</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown {{(Request::segment(2)=="Emails")?" active":""}}">
                        <a href="#">
                            <i class="icon-email"></i>
                            <span class="menu-text">Emails</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#">Newsletters</a>
                                </li>
                                <li>
                                    <a href="{{route('Emails.Compagnes.Liste_Compagne')}}" class="{{(Request::segment(4)=="Liste_Compagne")?"current-page":""}}">Compagnes</a>
                                </li>
                                <li>
                                    <a href="#">Statistiques</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown  {{(Request::segment(2)=="Parametrages")?" active":""}}">
                        <a href="#">
                            <i class="icon-settings1"></i>
                            <span class="menu-text">Parametrages</span>
                        </a>
                        <div class="sidebar-submenu ">
                            <ul>
                                <li>
                                    <a href="{{route('Parametrages.Entiter')}}" class="{{(Request::segment(3)=="Entiter")?"current-page":""}}">Entite</a>
                                </li>
                                <li>
                                    <a href="{{ route('Parametrages.Project')}}" class="{{(Request::segment(3)=="Project")?"current-page":""}}">Projets</a>
                                </li>
                                <li>
                                    <a href="#">Configuration</a>
                                </li>
                                <li>
                                    <a href="{{ route('Parametrages.Utilisateurs.Liste_Utilisateurs')}}" class="{{(Request::segment(4)=="Liste_Utilisateurs")?"current-page":""}}">Utilisateurs</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- sidebar menu end -->
        </div>
        <!-- Sidebar content end -->
    </nav>
    <!-- Sidebar wrapper end -->
    @section('script')
    
    @endsection
    