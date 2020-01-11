


<!-- Header -->
<header id="header">

    <!-- Logo -->
    <h1 id="logo">
        <img src="img/logo.png" class="img-logo">
        <spam class="header-logo-line">SalaH</spam> 
    </h1>

    <!-- Nav -->
    <nav id="nav">
        <ul>
            <li><a href="#intro">About Salah</a></li>
            <li><a href="#one">Employees</a></li>
            <li><a href="#two">Clients</a></li>
            <li><a href="#work">Be Salah</a></li>
            <li><a href="home.php">  <?php
                    if (isset($userdata['username'])) {
                        echo $userdata['username'] . " : logout";
                    } else {
                        echo 'Login';
                    }
                    ?></a></li>
        </ul>
    </nav>
    <!-- Nav for clients -->
    <nav id="nav">
        <ul>
            <li><a href="#">Track Salah</a></li>
            <li><a href="#">previous visits</a></li>
            <li><a href="#">Top rated Salah</a></li>
            <li><a href="home.php">  <?php
                    if (isset($userdata['username'])) {
                        echo $userdata['username'] . " : logout";
                    } else {
                        echo 'Login';
                    }
                    ?></a></li>
        </ul>
    </nav>
    
    <!-- Nav for employee -->
    <nav id="nav">
        <ul>
            <li><a href="#">My visits</a></li>
            <li><a href="#">My Requests</a></li>
            <li><a href="#">previous visits</a></li>
            <li><a href="#">Top rated Salah</a></li>
            <li><a href="home.php">  <?php
                    if (isset($userdata['username'])) {
                        echo $userdata['username'] . " : logout";
                    } else {
                        echo 'Login';
                    }
                    ?></a></li>
        </ul>
    </nav>
</header>
