<?php
$title = "Admin Page";
ob_start();
?>

<h1 class="display-4">Admin Page</h1>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link btn btn-success m-3 text-light" href="index.php?action=routeindex">Route</a></li>
            <li class="nav-item"><a class="nav-link  btn-primary m-3 text-light" href="index.php?action=busindex">Bus</a></li>
            <li class="nav-item"><a class="nav-link btn-danger m-3 text-light" href="index.php?action=scheduleindex">Schedule</a></li>
        </ul>
    </div>
</nav>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>