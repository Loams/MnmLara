<div class="container-fluide">
        <!--        top menu-->

        <header>

            <div class="row">
                
                <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                     
                    <div id="menu-button"> <img src="{{ url('/') }}/images/icons/menu.png" alt="icon responsive"> </div>
                     
                    
                    
                     <div class="col-xs-12 col-sm-8 col-md-5 col-lg-5 col-sm-offset-1 col-xs-offset-1 ">

                         <a class="navbar-brand" href="{{ url('/') }}dashboard"><img id="top-left" src="{{ url('/') }}/images/logo.png" alt="logo mnm's ticket">Bienvenue dans MnM's</a>

                    </div>



                    <!--                Champ de recherche      -->

                     <div class="col-xs-3 col-sm-4 col-md-3 col-md-offset-0 col-lg-3 col-lg-offset-0 col-xs-offset-1 col-sm-offset-3 col-md-offset-1 ">

                        <form action="#" method="POST" role="form">

                            <div class="form-group">

                                <div class="input-group">

                                    <input type="search" name="search" id="input" class="form-control" value="" required="required" title="">

                                    <span class="input-group-btn">

                                        <button class="btn btn-default" type="submit">

                                            <span class="glyphicon glyphicon-search"></span>

                                    </button>

                                    </span>

                                </div>

                            </div>

                        </form>

                    </div>

                    <!--                Fin champ de recherche-->

                    <!--                gestion utilisateur  -->

                     <div id="user" class="col-xs-1 col-sm-8 col-md-7 col-lg-4 col-lg-offset-8 text-right col-lg-offset-8 col-sm-offset-5 col-xs-offset-2">

                        <a href="#" id="newTicket">

                            <span class="glyphicon glyphicon-bell">

                            
                            <span class="badge"></span>

                            </span>

                        </a>

                        <a href="{{ url('/') }}/Profile/displayUser?id_utilisateur={$smarty.session.id_utilisateur}">

                            <img src="{{ url('/') }}/upload/{$utilisateur_logged->mini_photo}" class="img-circle" alt="Cinque Terre" width="60" height="60">

                            <i class="fa fa-ellipsis-v"></i>

                        </a>

                    </div>

                    <!--                Fin gestion utilisateur-->

                </nav>

            </div>

        </header>