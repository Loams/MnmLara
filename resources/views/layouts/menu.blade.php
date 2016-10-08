<div id="under-top">
    <div class="row text-center">

                <div class="navbar navbar-inverse navbar-fixed-left text-center">



                    <ul class="nav navbar-nav">
                        <li>

                      
                                <a href="#"><i class="fa fa-tachometer"></i></i>Tableau de Bord</a>
           

                        </li>
                        <li><a href="#"><i class="fa fa-plus "></i>
                                Générer un ticket</a></li>
                        <li class="dropdown active"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tag"></i>
    Vos tickets <span class="caret"></span></a>


                            <ul class="dropdown-menu slide" role="menu">
                                <li class="text-center"><a href="#">Tous les tickets<span class="badge "></span></a></li>

                                <li class="text-center"><a href="#">En attente PEC<span class="badge "></span></a></li>

                                <li class="text-center"><a href="#">En cours<span class="badge"></span></a></li>

                                <li class="text-center"><a href="#">Attente retour<span class="badge"></span></a></li>

                                <li class="text-center"><a href="#">Clôts<span class="badge"></span></a></li>

                                <li class="text-center"><a href="#">Rejeté<span class="badge"></span></a></li>

                            </ul>

                        </li>
                       
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tags"></i>Tous les tickets <span class="caret"></span></a>

                            <ul class="dropdown-menu slide" role="menu">
                                <li class="text-center"><a href="#">Tous les tickets<span class="badge "></span></a></li>

                                <li class="text-center"><a href="#">En attente PEC<span class="badge "></span></a></li>

                                <li class="text-center"><a href="#">En cours<span class="badge"></span></a></li>

                                <li class="text-center"><a href="#">Attente retour<span class="badge"></span></a></li>

                                <li class="text-center"><a href="#">Clôts<span class="badge"></span></a></li>

                                <li class="text-center"><a href="#">Rejeté<span class="badge"></span></a></li>

                            </ul>

                        </li>
                       
                        <li><a href="#"><i class="fa fa-calendar"></i>Calendrier</a></li>
                       
                        <li><a href="#"><i class="fa fa-bar-chart"></i>Statistiques</a></li>
                        



                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i>Administration<span class="caret"></span></a>

                            <ul class="dropdown-menu slide" role="menu">

                                <li class="text-center"><a href="#">Utilisateurs</a></li>

                                <li class="text-center"><a href="#">Droits</a></li>

                                <li class="text-center"><a href="#">Listes</a></li>

                                <li class="text-center"><a href="#">Sauvegarde</a></li>
                            </ul>

                        </li>

                        
                        <li class="hidden-lg hidden-md">

                            
                                <a href="#"><i class="fa fa-user"></i></i>Mon Compte</a>
                           

                        </li>
                        <li>

                       			
                               
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                       <i class="fa fa-sign-out"></i>Déconnexion
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                               
                            
                              
                         

                        </li>

                    </ul>

                </div>

            </div>

</div>