<?php
include("../header.php");
require_once('../../Model/make_db.php');
require_once('../../Model/type_db.php');
require_once('../../Model/class_db.php');

$makes = get_makes();
$types = get_types();
$classes = get_classes();
?>

<main>
    <h1>Add Vehicle</h1>
    <form action="admin_controller.php" method="post">
        <input type="hidden" name="action" value="add_vehicle">

        <!-- Vehicle Year -->
        <label for="year">Year:</label>
        <input type="text" id="year" name="year" required><br>

        <!-- Vehicle Model -->
        <label for="model">Model:</label>
        <input type="text" id="model" name="model" required><br>

        <!-- Vehicle Price -->
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required><br>

        <!-- Vehicle Make -->
        <label for="make_id">Make:</label>
        <select id="make_id" name="make_id" required>
            <?php foreach ($makes as $make) { ?>
                <option value="<?= $make['id'] ?>"><?= htmlspecialchars($make['make']) ?></option>
            <?php } ?>
        </select><br>

        <!-- Vehicle Type -->
        <label for="type_id">Type:</label>
        <select id="type_id" name="type_id" required>
            <?php foreach ($types as $type) { ?>
                <option value="<?= $type['id'] ?>"><?= htmlspecialchars($type['type']) ?></option>
            <?php } ?>
        </select><br>

        <!-- Vehicle Class -->
        <label for="class_id">Class:</label>
        <select id="class_id" name="class_id" required>
            <?php foreach ($classes as $class) { ?>
                <option value="<?= $class['id'] ?>"><?= htmlspecialchars($class['class']) ?></option>
            <?php } ?>
        </select><br>

        <!-- Submit Button -->
        <button type="submit">Add Vehicle</button>
    </form>
</main>

<?php
include("../footer.php");
?>
