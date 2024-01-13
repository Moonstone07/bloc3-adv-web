<form method="POST" action="?action=addToy">
    <label for="name">Toy Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" step="0.01" required><br><br>

    <input type="submit" name="submit_toy" value="Add Toy">
</form>