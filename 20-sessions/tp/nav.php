<nav>
    <a href="page-a.php">Page A</a> - 
    <a href="page-b.php">Page B</a> - 
    <a href="page-c.php">Page C</a> 

    <?php if ( isset($_SESSION['name_d']) ): ?>
        - <a href="logout.php">Logout</a>
    <?php endif; ?>
</nav>