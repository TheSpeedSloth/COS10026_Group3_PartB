<?php include("logout.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>IoT Quiz</title>
    <meta charset="UTF-8" />
    <meta name="description" content="IoT Quiz" />
    <meta name="keywords" content="IoT, Quiz" />
    <meta name="author" content="Group 3" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/style.css" />
  </head>
  <body>
    <?php $active = "quiz";?>
    <?php include 'header.inc';?>
    <main>
      <h1>IoT Quiz</h1>
      <p>Test your knowledge. Can you get them all right?</p>
      <form
        method="post"
        action="markquiz.php"
      >
        <fieldset>
          <legend>Student Details</legend>
          <p>
            <label for="studentID">Student ID</label>
            <input
              pattern="\d{7,10}"
              type="text"
              name="studentID"
              id="studentID"
              maxlength="10"
              size="10"
              required="required"
            />
          </p>
          <p>
            <label for="givenName">Given Name</label>
            <input
              pattern="[A-Za-z-( )]+$"
              type="text"
              name="givenName"
              id="givenName"
              maxlength="30"
              size="10"
              required="required"
            />
            <label for="familyName">Family Name</label>
            <input
              pattern="[A-Za-z-( )]+$"
              type="text"
              name="familyName"
              id="familyName"
              maxlength="30"
              size="10"
              required="required"
            />
          </p>
        </fieldset>
        <fieldset>
          <legend>The History and Popularisation of IoT</legend>
          <p>
            <label class="quizQuestion">
              What was the first real world application of IoT?
            </label>
          </p>
          <p>
            <input
              type="radio"
              id="vendingMachine"
              name="history1"
              value="vendingMachine"
              required="required"
            />
            <label for="vendingMachine">Coke Vending Machine</label>
          </p>
          <p>
            <input
              type="radio"
              id="coffeeMachine"
              name="history1"
              value="coffeeMachine"
            />
            <label for="coffeeMachine">Coffee Machine</label>
          </p>
          <p>
            <input type="radio" id="sdCar" name="history1" value="sdCar" />
            <label for="sdCar">Self-driving Car</label>
          </p>
          <p>
            <input type="radio" id="jetpack" name="history1" value="jetpack" />
            <label for="jetpack">Jetpack</label>
          </p>
          <p>
            <label class="quizQuestion"> Who coined the term IoT? </label>
          </p>
          <p>
            <input
              type="radio"
              id="kevin"
              name="history2"
              value="kevin"
              required="required"
            />
            <label for="kevin">Kevin Ashton</label>
          </p>
          <p>
            <input type="radio" id="ashton" name="history2" value="ashton" />
            <label for="ashton">Ashton Kutcher</label>
          </p>
          <p>
            <input type="radio" id="steve" name="history2" value="steve" />
            <label for="steve">Steve Jobs</label>
          </p>
          <p>
            <label class="quizQuestion">
              How many connected devices are there estimated to be in 2020?
            </label>
          </p>
          <p>
            <input
              type="radio"
              id="million"
              name="history3"
              value="million"
              required="required"
            />
            <label for="million">500 Million</label>
          </p>
          <p>
            <input
              type="radio"
              id="50billion"
              name="history3"
              value="50billion"
            />
            <label for="50billion">50 Billion</label>
          </p>
          <p>
            <input
              type="radio"
              id="10billion"
              name="history3"
              value="10billion"
            />
            <label for="10billion">10 Billion</label>
          </p>
        </fieldset>
        <fieldset>
          <legend>Smart Cities</legend>
          <p>Which of these cities are smart cities? (Multiple checks)</p>
          <p>
            <input
              type="checkbox"
              id="london"
              name="smartCity1[]"
              value="london"
              required="required"
            />
            <label for="london">London, England</label>
          </p>
          <p>
            <input
              type="checkbox"
              id="dubai"
              name="smartCity1[]"
              value="dubai"
            />
            <label for="dubai">Dubai, United Arab Emirates </label>
          </p>
          <p>
            <input
              type="checkbox"
              id="darwin"
              name="smartCity1[]"
              value="darwin"
            />
            <label for="darwin">Darwin, Australia </label>
          </p>
          <p>
            <input
              type="checkbox"
              id="melbourne"
              name="smartCity1[]"
              value="melbourne"
            />
            <label for="melbourne">Melbourne, Australia </label>
          </p>
          <p>
            <input
              type="checkbox"
              id="houston"
              name="smartCity1[]"
              value="houston"
            />
            <label for="houston">Houston, USA </label>
          </p>
          <p>
            <label class="quizQuestion">
              How is the data for smart cities gathered?
            </label>
          </p>
          <p>
            <input
              type="radio"
              id="letters"
              name="smartCity2"
              value="letters"
              required="required"
            />
            <label for="letters">Written letters from citizens </label>
          </p>
          <p>
            <input type="radio" id="phone" name="smartCity2" value="phone" />
            <label for="phone">Mobile phones/sensors/cameras</label>
          </p>
          <p>
            <input type="radio" id="street" name="smartCity2" value="street" />
            <label for="street">Data analysts standing on the street </label>
          </p>
          <p>
            <label class="quizQuestion" for="smartCity3">
              Which of these services are <b>NOT</b>
              currently encompassed by smart city innovation?
            </label>
            <select name="smartCity3" id="smartCity3" required>
              <option value="">Please Select</option>
              <option value="waste">Waste Management</option>
              <option value="traffic">Traffic Management</option>
              <option value="streetlights">Streetlights</option>
              <option value="footpaths">Moving Footpaths</option>
            </select>
          </p>
        </fieldset>
        <fieldset>
          <legend>Smart Vehicles</legend>
          <p>
            <label class="quizQuestion" for="smartVehicle1">
              What is the name of the American study on the effects of
              autonomous vehicles for the disabled community?
            </label>
            <input
              type="text"
              name="smartVehicle1"
              id="smartVehicle1"
              required="required"
            />
          </p>
          <p>
            <label class="quizQuestion">
              Which of the following is a benefit of self-driving vehicles?
            </label>
          </p>
          <p>
            <input
              type="radio"
              id="hackers"
              name="smartVehicle2"
              value="hackers"
              required="required"
            />
            <label for="hackers">Hackers</label>
          </p>
          <p>
            <input
              type="radio"
              id="saferRoads"
              name="smartVehicle2"
              value="saferRoads"
            />
            <label for="saferRoads">Safer Roads</label>
          </p>
          <p>
            <input
              type="radio"
              id="jobLoss"
              name="smartVehicle2"
              value="jobLoss"
            />
            <label for="jobLoss">Job Loss</label>
          </p>
          <p>
            <input
              type="radio"
              id="moralDilemma"
              name="smartVehicle2"
              value="moralDilemma"
            />
            <label for="moralDilemma">The moral dilemma</label>
          </p>
          <p>
            <label for="smartVehicle3">
              There are fully autonomous vehicles driving around on our roads
              today
            </label>
            <select name="smartVehicle3" id="smartVehicle3" required>
              <option value="">Please Select</option>
              <option value="true">True</option>
              <option value="false">False</option>
            </select>
          </p>
          <p>
            <label for="smartVehicle4">
              How many people living with disability could be affected by the
              implementation of autonomous vehicles? </label
            ><br />
            <label>1,000,000</label>
            <input
              type="range"
              min="1000000"
              max="2000000"
              value="1000500"
              name="smartVehicle4"
              id="smartVehicle4"
            />
            <label>2,000,000</label>
          </p>
          <p>
            <label for="smartVehicle5">
              What is the biggest factor stopping the development of
              self-driving vehicles?
            </label>
            <input
              type="text"
              name="smartVehicle5"
              id="smartVehicle5"
              required="required"
            />
          </p>
        </fieldset>
        <fieldset>
          <legend>IoT Vulnerabilities</legend>
          <p></p>
          <p>
            <label for="iotVul1">
              What are the concerns surrounding IoT devices?
            </label>
            <input
              type="text"
              name="iotVul1"
              id="iotVul1"
              required="required"
            />
          </p>
          <p>
            <label for="iotVul2">
              IoT devices often have security vulnerabilities.
            </label>
            <select name="iotVul2" id="iotVul2" required>
              <option value="">Please Select</option>
              <option value="true">True</option>
              <option value="false">False</option>
            </select>
          </p>
        </fieldset>
        <input type="submit" name="submit" value="Submit" />
        <input type="reset" value="Reset Form" />
      </form>
    </main>
    <?php include 'footer.inc';?>
  </body>
</html>