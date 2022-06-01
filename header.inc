<header id=introheader>
    <a href="index.php">IoT</a>
    <nav>
        <a href="topic1.php" <?php if($active == "topic1") {echo " class='active' ";}?>>History</a> | 
        <a href="topic2.php" <?php if($active == "topic2") {echo " class='active' ";}?>>Adoption & Concerns</a> | 
        <a href="quiz.php" <?php if($active == "quiz") {echo " class='active' ";}?>>Quiz</a> | 
        <a href="enhancements.php" <?php if($active == "enhancements") {echo " class='active' ";}?>>HTML Enhancements</a> |
        <a href="phpenhancements.php" <?php if($active == "phpenhancements") {echo " class='active' ";}?>>PHP Enhancements</a> |
        <a href="manage.php" <?php if($active == "manage") {echo " class='active' ";}?>>Manage</a>
    </nav>
  </header>