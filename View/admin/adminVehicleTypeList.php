<?php
include("../../header.php");
?>
<main>
    <p class="font-bold text-orange-400 text-xl text-left text-nowrap my-4">Vehicle Types List</p>

    <!-- Responsive table -->
    <section id="customer-vehicle-table" class="text-nowrap overflow-auto scrollbar-thumb-gray-400 scrollbar-track-gray-300">
        <table class="table-auto w-3/12 border-collapse border border-slate-600">
            <thead>
                <tr class="bg-slate-800 text-white">
                    <th class="px-2 py-2">Type</th>
                    <th class="px-2 py-2">Action</th>
                </tr>
            </thead>
            <tbody class="bg-orange-300">
                <?php foreach ($types as $type) { ?>
                <tr>
                    <td class="px-4 py-2 border border-slate-600"><?= htmlspecialchars($type["type"]) ?></td>
                    <td class="px-4 py-2 border border-slate-600">
                        <form action="types.php" method="POST">
                            <input type="hidden" name="type_id" value="<?= $type['id'] ?>">
                            <input type="hidden" name="action" value="delete_type">
                            <button class="bg-red-500 rounded-lg drop-shadow-lg py-1 px-3" type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
    <p class="font-bold text-orange-400 text-xl text-left text-nowrap my-4">Add Vehicle Types </p>
    <form action="types.php" method="POST">
        <input type="hidden" name="action" value="add_type">
        <input type="text" name="type_name" placeholder="Type Name" required class="block w-48 mb-3 mt-2 py-1 px-3 border border-gray-300 bg-white rounded shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        <button class="bg-blue-300 rounded-lg drop-shadow-lg py-1 px-3" type="submit">Submit</button>
    </form>
</main>



<footer class="w-full text-center border-t border-grey p-4 pin-b">
    <!-- Link to View/Edit Vehicles Page -->
    <p><a class="text-blue-500 underline" href="../admin_controller.php?action=list_vehicle">Click Here to view Vehicle List</a></p>

    <!-- Link to Add Vehicles Page -->
    <p><a class="text-blue-500 underline" href="../admin_controller.php?action=show_add_form">Click Here to add a Vehicle</a></p>

    <!-- Link to View/Edit Class Page -->
    <p><a class="text-blue-500 underline" href="../controllers/classes.php?action=list_classes">Click Here to view Vehicle Class List</a></p>

    <!-- Link to View/Edit Make Page -->
    <p><a class="text-blue-500 underline" href="../controllers/makes.php?action=list_makes">Click Here to view Vehicle Make List</a></p>
</footer>
<?php
include("../../footer.php");
?>