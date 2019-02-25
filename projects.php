<?php
require 'gitHubData.php';
$connexion = new \Website\GitHubData();
$apiKey = include 'config.php';
$projects = $connexion->getGitHubData($apiKey);
?>

<!DOCTYPE html>
<html lang="fr">
<?php include('components/head.html'); ?>
<body>
<?php include('components/header.html'); ?>
<div class="project-wrapper">
    <h2>PROJETS</h2>
        <div class="projects-list">
            <ul class="item-list">
                <?php foreach ($projects as $project) {?>
                    <li id="<?php echo $project['name'];?>" class="project-item"><?php echo $project['name'];?></li>
                <?php } ?>
                <li id="stats" class="project-item">Stats</li>
            </ul>
        </div>
        <?php foreach ($projects as $project) {?>
            <div id="show-<?php echo $project['name'];?>" class="projects-description">
               <div class="back-to-list"><a  href="projects.php"><i class="fas fa-long-arrow-alt-left"></i>  Back to list</a></div>
                <h2><?php echo $project['name'];?></h2>
                <p class="description"><?php echo $project['description'];?></p>
                <p class="commit-date">Pushed at : <?php echo $project['pushed_at'];?></p>
                <div class="tags">
                    <ul>
                        <?php foreach ($project['topics'] as $topic) { ?>
                        <li><?php echo $topic; } ?></li>
                    </ul>
                </div>
                <div class="source">
                    <a href="<?php echo $project['html_url'];?>" target="_blank">Go to GitHub</a>
                    <?php if(!empty($project['website'])) {?>
                        <a href="<?php echo $project['website'];?>" target="_blank">See project</a>
                    <?php } ?>
                </div>
                <div class="pictures">
                    <img src="assets/<?php echo $project['name'];?>.png" alt="project picture">
                </div>
            </div>
        <?php } ?>
        <div id="show-stats" class="projects-description">
            <div class="back-to-list"><a  href="projects.php"><i class="fas fa-long-arrow-alt-left"></i>  Back to list</a></div>
            <h2>Stats</h2>
            <p class="description">I worked on Stats during my internship at GFI Informatique. Stats is an app which shows the TMA department's activity with charts. Data are imported every day from the ticketing tool and filters allow to show data with different granularity</p>
            <p class="commit-date">Developped : from Feb-2018 to Jun-2018</p>
            <div class="tags">
                <ul>
                    <li>Php7</li>
                    <li>Symfony3</li>
                    <li>JQuery</li>
                    <li>HighCharts</li>
                </ul>
            </div>
            <div class="pictures">
                <img class="stats" src="assets/PECStats.png" alt="stats picture">
                <img class="stats" src="assets/filterStats.png" alt="stats picture">
                <img class="stats" src="assets/dateFilterStats.png" alt="stats picture">
                <img class="stats" src="assets/parametresStats.png" alt="stats picture">
                <img class="stats" src="assets/globalStats.png" alt="stats picture">
            </div>
        </div>
    <footer class="footer">
        <div class="footer-close"><a  href="index.php">Accueil</a></div>
        <div class="footer-about" ><a href="about.php">A propos</a></div>
    </footer>
</div>
<script src='script/script.js'></script>

</body>
</html>

