<body>
		<!-- Navigation -->
    <nav class="navbar navbar-default navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="."> <?php echo siteTitle() ?> </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
				<ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="profil.php">My profil</a>
                    </li>
                    <li>
                        <a href='?deconnecte='>Sign out</a>
                    </li>
                </ul>
                <p class="navbar-text navbar-right"><?php echo pseudo($_SESSION['email'])." (".number_format(remaining_credits(pseudo($_SESSION['email'])), 2)." $)"?></p>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
