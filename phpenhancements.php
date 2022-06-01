<?php include("logout.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>IoT Enhancements</title>
    <meta charset="UTF-8" />
    <meta name="description" content="IoT Enhancements" />
    <meta name="keywords" content="IoT, Enhancements" />
    <meta name="author" content="Group 3" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/style.css" />
  </head>

  <body>
    <?php $active = "phpenhancements";?>
    <?php include 'header.inc';?>
    <main>
      <h1>PHP Enhancements</h1>
      <h2>Login System</h2>
      <p>The attempts manager is accessed through a login page. Theoretically, this would secure the page as only an authorised teacher could access the manage page, but here there is also the option to register a new user to immediately access the page. This bypass was made available so the page can actually be assessed, but in practice an authorised user would have to be the one to create new users. This feature facilitated the need for another table, which is the users table and stores the usernames and passwords of users. The password is hashed using password_hash() and validated on login using password_verify(). Users remain logged in using session variables, which persist between pages. Users are automatically logged out when they leave the manage page.</p>
      <h2>Enhanced attempts manager</h2>
      <p>Beside the outputted table of attempts are links to edit and delete attempts. Delete will delete all attempts for that student. Edit will turn the static output of the score into an input which can be edited. Entering a new value and hitting enter will update the score for that attempt. The get array is used to reload the page with the previous query and remember which row to change. In this way, all queries can be run while staying on the same page. The user doesn't have to directly type in the student ID to delete or edit, you can just click a button which makes it much more intuitive.</p>
    </main>
    <?php include 'footer.inc';?>
  </body>
</html>