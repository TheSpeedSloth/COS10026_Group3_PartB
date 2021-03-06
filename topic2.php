<?php include("logout.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ways that IoT has been adopted and privacy fears">
    <meta name="keywords"    content="IoT, self-driving cars, smart cities, privacy">
    <meta name="author"      content="Group 3">
    <meta name="viewport"    content="width=device-width, initial-scale=1.0"> <!-- For a responsive website -->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">--> <!-- Placeholder stylesheet -->
    <link rel="stylesheet" href="styles/style.css">
    <title>IoT adoption & concerns</title>
</head>
<body>
<?php $active = "topic2";?>
<?php include 'header.inc';?>

    <main>
        <h1>IoT adoption & concerns</h1>
        <section>
            <h2>Self-driving vehicles</h2>

            <aside>
                <h3>Fun Fact</h3>
                <p>The first "Autonomous" vehicle to be created was made in 1939 by General Motors<sup><a href="#foot1">1</a></sup></p>
            </aside>

            <p>While fully autonomous, self-driving cars are not driving the streets just yet, IoT has brought the dream closer to reality. Vehicles are now able to take partial control, preventing accidents and creating safer roads. This is helped along by the numerous amounts of sensors and cameras that have been built in.<sup><a href="#foot2">2</a></sup> As well as safer roads, they will also create more efficient travel and decreased traffic, no more being stuck in crazy traffic jams.</p>

            <p>Something that is often overlooked is how autonomous vehicles could create a more accessible world. According to a study done in America by the Ruderman Foundation, autonomous vehicles would "enable new employment opportunities for approximately 2 million individuals with disabilities." <sup><a href="#foot3">3</a></sup></p>

            <p>While there are many benefits to autonomous vehicles, there is still a long way before we will see them on our roads. The biggest factor stopping the development of self-driving vehicles is the moral dilemma. While we may be able to choose between different unfavourable actions, the idea that a robot can do the same is highly contentious.<sup><a href="#foot4">4</a></sup></p>
        </section>

        <section>
            <h2>Smart cities</h2>

            <p>Smart cities are areas in which the infrastructure is built specifically to incorporate the interconnectivity of various devices. This is then used to gather data to improve and innovate in areas such as waste management, traffic control, and the use of other electronic services. Data for smart cities is often gathered by the use of phone locations, this allows people to see which areas have a dense population and could most benefit from an upgrade in facilities.</p>
            <p>The concept of a smart city has already been adapted and implemented by many major tech driven cities such as Dubai, Melbourne, New York, and London.</p>
            <p>Although innovation can come in many forms, smart cities usually opt to innovate the automation of its facilities. This can be in the form of something convenient and not too challenging such as motion sensor streetlights to save energy, or traffic lights that consider traffic levels before changing, thus decreasing congestion. Alternatively, this could be in the form of something more complicated such as fully automated waste management or public transport.</p>
            <p>The future of smart cities is predicted to involve millions of sensors and devices incorporated into a multitude of different services, in order to deliver a comprehensive living experience in every aspect of a citizen's life.</p>
        </section>

        <section>
            <h2>Ethical and legal concerns</h2>

            <p>IoT devices have come under scrutiny for putting people's privacy at risk. Here are some examples:</p>

            <h3>My Friend Cayla</h3>

            <p>My Friend Cayla was a smart doll from 2014. Its speech recognition software allowed children to converse with the doll. The doll could access the internet and be controlled through an app.</p>

            <p>A German student discovered that the doll could be accessed from 15 metres away with no password protecting the connection. This would allow a hacker to listen to children's conversations with the doll and to directly speak to the child playing with it.</p>

            <p>With risk to children's safety and privacy, My Friend Cayla was banned in Germany.<sup><a href="#foot5">5</a></sup></p>

            <h3>Amazon's Ring cameras</h3>

            <p>Devices which are meant to be a home security solution have instead been some people's home invasion nightmare.</p>

            <p>A 2020 class action lawsuit alleged that Ring's negligence in security allowed hackers to take over cameras and harass people inside their homes. Ring had responded to the hacks by blaming the victims for having weak passwords.<sup><a href="#foot6">6</a></sup></p>

            <figure>
                <img src="images/ring1.jpg" width="500" height="283" alt="The hacker says to the girl &quot;I&apos;m your best friend. You can do whatever you want right now... you can break your TV...&quot;">
                <figcaption>A hacker talks an 8-year-old girl and plays music from a horror film through the camera her parents installed in her bedroom (<a href="https://www.theguardian.com/technology/2020/dec/23/amazon-ring-camera-hack-lawsuit-threats">Source</a>)</figcaption>
            </figure>

            <figure>
                <img src="images/ring2.jpg" width="500" height="283" alt="The hacker says to the old woman &quot;Tonight you die.&quot;">
                <figcaption>A hacker threatened an old woman through the camera her family installed after she entered assisted living (<a href="https://www.theguardian.com/technology/2020/dec/23/amazon-ring-camera-hack-lawsuit-threats">Source</a>)</figcaption>
            </figure>

            <div class="clear"></div>

            <p>In another case, a man in the UK was fined ??100,000 after a neighbour complained about his Ring cameras. The cameras captured parts of her house and garden and could capture conversations up to 20 metres away.<sup><a href="#foot7">7</a></sup></p>
        </section>
    </main>
    <hr>
    <ul class="footnotes">
        <li id="foot1"><sup>1</sup> <a href="https://www.tomorrowsworldtoday.com/2021/08/09/history-of-autonomous-cars/">The History of Autonomous Vehicles</a></li>
        <li id="foot2"><sup>2</sup> <a href="https://www.biz4intellia.com/blog/iot-applications-in-automotive-industry/ ">IoT applications in automotive industry</a></li>
        <li id="foot3"><sup>3</sup> <a href="https://rudermanfoundation.org/white_papers/self-driving-cars-the-impact-on-people-with-disabilities/ ">Self driving cars, the impact on people with disabilities</a></li>
        <li id="foot4"><sup>4</sup> <a href="https://negrettilaw.com/news/self-driving-cars-pros-and-cons/ ">Self driving cars: Pros and Cons</a></li>
        <li id="foot5"><sup>5</sup> <a href="https://www.theguardian.com/world/2017/feb/17/german-parents-told-to-destroy-my-friend-cayla-doll-spy-on-children">German parents told to destroy doll that can spy on children</a></li>
        <li id="foot6"><sup>6</sup> <a href="https://www.theguardian.com/technology/2020/dec/23/amazon-ring-camera-hack-lawsuit-threats">Dozens sue Amazon's Ring after camera hack leads to threats and racial slurs</a></li>
        <li id="foot7"><sup>7</sup> <a href="https://www.theguardian.com/uk-news/2021/oct/14/amazon-asks-ring-owners-to-respect-privacy-after-court-rules-usage-broke-law">Amazon asks Ring owners to respect privacy after court rules usage broke law</a></li>
    </ul>
    
    <?php include 'footer.inc';?>
</body>
</html>