<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php">
            <img alt="Brand" src="images/logo.png" class="img-fluid">
        </a>
        <div class="collapse navbar-collapse" id="menu">
            <div class="navbar-nav mr-auto">
                <a href="index.php" class="nav-link text-white">編輯精選</a>
                <a href="index.php" class="nav-link text-white">街巷故事</a>
                <a href="index.php" class="nav-link text-white">市井觀點</a>
                <a href="index.php" class="nav-link text-white">私房知識塾</a>
            </div>
            <div class="navbar-nav mr-sm-0">
                {if isset($smarty.session.username)}
                <a href="admin.php?op=article_form" class="nav-link text-white">發布</a>
                <a href="logout.php" class="nav-link text-white">登出</a>
                {else}
                <a href="signup.php" class="nav-link text-white">註冊</a>
                <a href="main_login.php" class="nav-link text-white">登入</a>
                {/if}
            </div>
        </div>
    </div>
</nav>