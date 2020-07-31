<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark nav-custom">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link <?php echoActiveIfRequestMatches('index'); ?>" href="./">CV</a>
                <a class="nav-item nav-link <?php echoActiveIfRequestMatches('portfolio'); ?>" href="portfolio.php">Portfolio</a>
            </div>
        </div>
        <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
            <li id="login" class="dropdown order-1<?php if(isset($_SESSION['username'])) { echo ' d-none'; } ?>">
                <button type="button" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">Log in<span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-menu-right mt-2">
                    <li class="px-3 py-2">
                        <form class="form" role="form" action="db_functions/authenticate.php?goto=<?php echo urlencode($_SERVER['PHP_SELF']); ?>" method="post">
                            <div class="form-group">
                                <input id="username" name="username" placeholder="Username" class="form-control form-control-sm" type="text" required>
                            </div>
                            <div class="form-group">
                                <input id="password" name="password" placeholder="Password" class="form-control form-control-sm" type="password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                    </li>
                </ul>
            </li>
            <li id="logout" class="order-1<?php if(!isset($_SESSION['username'])) { echo ' d-none'; } ?>">
                <form action="db_functions/logout.php?goto=<?php echo urlencode($_SERVER['PHP_SELF']); ?>">
                    <p><?php if(isset($_SESSION['username'])) { echo $_SESSION['username']; } ?></p>
                    <button type="submit" class="btn btn-outline-secondary">Log out</button>
                </form>
            </li>
        </ul>
    </nav>
</header>