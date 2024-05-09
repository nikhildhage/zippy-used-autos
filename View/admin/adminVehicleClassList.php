<?php
include("../../header.php");
?>
<main>
    <p class="font-bold text-orange-400 text-xl text-left text-nowrap my-4">Vehicle Class List</p>

    <!-- Responsive table -->
    <section id="customer-vehicle-table" class="text-nowrap overflow-auto scrollbar-thumb-gray-400 scrollbar-track-gray-300">
        <table class="table-auto w-3/12 border-collapse border border-slate-600">
            <thead>
                <tr class="bg-slate-800 text-white">
                    <th class="px-2 py-2">Class</th>
                    <th class="px-2 py-2">Action</th>
                </tr>
            </thead>
            <tbody class="bg-orange-300">
                <?php foreach ($classes as $class) { ?>
                <tr>
                    <td class="px-4 py-2 border border-slate-600"><?= htmlspecialchars($class["class"]) ?></td>
                    <td class="px-4 py-2 border border-slate-600">
                        <form action="classes.php" method="POST">
                            <input type="hidden" name="class_id" value="<?= $class['id'] ?>">
                            <input type="hidden" name="action" value="delete_class">
                            <button class="bg-red-500 rounded-lg drop-shadow-lg py-1 px-3" type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
    <p class="font-bold text-orange-400 text-xl text-left text-nowrap my-4">Add Vehicle Classes</p>
    <form action="classes.php" method="POST">
        <input type="hidden" name="action" value="add_class">
        <input type="text" name="class_name" placeholder="Class Name" required class="block w-48 mb-3 mt-2 py-1 px-3 border border-gray-300 bg-white rounded shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        <button class="bg-blue-300 rounded-lg drop-shadow-lg py-1 px-3" type="submit">Submit</button>
    </form>
</main>

<footer class="w-full text-center border-t border-grey p-4 pin-b">
    <!-- Link to View/Edit Vehicles Page -->
    <p><a class="text-blue-500 underline" href="../admin_controller.php?action=list_vehicle">Click Here to view Vehicle List</a></p>

    <!-- Link to Add Vehicles Page -->
    <p><a class="text-blue-500 underline" href="../admin_controller.php?action=show_add_form">Click Here to add a Vehicle</a></p>

    <!-- Link to View/Edit Type Page -->
    <p><a class="text-blue-500 underline" href="../controllers/types.php?action=list_types">Click Here to view Vehicle Type List</a></p>

    <!-- Link to View/Edit Make Page -->
    <p><a class="text-blue-500 underline" href="../controllers/makes.php?action=list_makes">Click Here to view Vehicle Make List</a></p>
</footer>
<?php
include("../../footer.php");
?>