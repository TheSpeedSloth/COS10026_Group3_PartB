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
    <?php $active = "enhancements";?>
    <?php include 'header.inc';?>
    <main>
      <h1>Our Website Enhancements</h1>
      <h2>Interactive Timeline</h2>
      <p>
        The interactive timeline allows for users to hover over the different
        points on the timeline to understand more about the history of IoT.
        <strong>&lt;aside&gt;</strong> and the <strong>:hover</strong> feature
        were used to hide and display the information box below the timeline.
      </p>
      <p>
        Additional code that was used to implement the time line were the CSS
        adjacent sibling selectors to display the hidden feature and
        <strong>transform</strong> to position the images correctly.
      </p>
      <p>Two sources were used to create this enhancement.</p>
      <ol>
        <li>
          <a href="https://codeconvey.com/simple-horizontal-timeline-css/"
            >Horizontal Timeline</a
          >
        </li>
        <li>
          <a
            href="https://www.w3schools.com/howto/howto_css_display_element_hover.asp"
            >Display element with Hover</a
          >
        </li>
      </ol>
      <a href="topic1.html #timeline">Click here to see the timeline.</a>
      <h2>Responsiveness</h2>
      <p>
        A media query was used to create what is essentially two alternate
        stylesheets depending on the width of the screen. For a narrower screen
        - i.e. that of a phone - the text size is increased, images will stack
        on top of each other, and the timeline images will be positioned closer
        together. Overall, this greatly improves the usability of the website.
      </p>
    </main>
    <?php include 'footer.inc';?>
  </body>
</html>
