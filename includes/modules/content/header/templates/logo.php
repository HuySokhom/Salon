<nav class = "navbar navbar-default" role = "navigation">

    <div class = "navbar-header">
        <button type = "button" class = "navbar-toggle"
                data-toggle = "collapse" data-target = "#example-navbar-collapse">
            <span class = "sr-only">Toggle navigation</span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
        </button>

        <?php
            echo '<a href="' . tep_href_link('index.php') . '">
                            <img src="' . DIR_WS_IMAGES . STORE_LOGO .'"class="img-responsive" /></a>';
        ?>
    </div>

    <div class ="collapse navbar-collapse" id = "example-navbar-collapse">

        <ul class = "nav navbar-nav navbar-right">
            <li>
                <a href = "index.html?language=kh">Khmer</a>
            </li>
            <li>
                <a href = "index.html?language=en">English</a>
            </li>
        </ul>
    </div>

    <div class ="collapse navbar-collapse" id = "example-navbar-collapse">

        <ul class = "nav navbar-nav">
            <li class = "active">
                <a href = "index.html"><?php echo HOME?></a>
            </li>
            <li>
                <a href = "about.html"><?php echo ABOUT?></a>
            </li>
            <li>
                <a href = "group.html"><?php echo GROUP?></a>
            </li>
            <li>
                <a href = "career.html"><?php echo CAREER?></a>
            </li>
        </ul>
        <ul class = "nav navbar-nav navbar-right">
            <li><input type="text" class="form-control" placeholder="search..."/></li>
        </ul>
    </div>

</nav>