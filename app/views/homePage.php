<?php
$title = "Home Page";
ob_start();
?>

<h1 class="mt-5">Welcome</h1>
<p>Visit Morocco</p>

<!-- Search Form -->
<h2 class="mt-4">Search for Bus Trips</h2>
<form action="index.php?action=searchPage" method="POST">
    <div class="form-group">
        <label for="departureCity">Departing City:</label>
        <select class="form-control" name="departureCity" id="departureCity">
            <!-- Populate with dynamic data from your database -->
            <?php foreach ($Cites->getAllCities() as $city): ?>
                <option value="<?= $city->getCityID() ?>">
                    <?= $city->getCityName() ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="arrivalCity">Arrival City:</label>
        <select class="form-control" name="arrivalCity" id="arrivalCity">
            <!-- Populate with dynamic data from your database -->
            <?php foreach ($Cites->getAllCities() as $city): ?>
                <option value="<?= $city->getCityID() ?>">
                    <?= $city->getCityName() ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="travelDate">Travel Date:</label>
        <input type="date" class="form-control" name="travelDate" id="travelDate">
    </div>

    <div class="form-group">
        <label for="numPeople">Number of People:</label>
        <input type="number" class="form-control" name="numPeople" id="numPeople" min="1">
    </div>

    <button type="submit" class="btn btn-success">Go to Search Page</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>