<form method="POST">

    <input type="text" name="name" placeholder="Name" value="<?php echo $_POST['name'] ? $_POST['name'] : ""; ?>">
    <input type="text" name="age" placeholder="Age" value="<?php echo $_POST['age'] ? $_POST['age'] : ""; ?>">
    <input type="text" name="gender" placeholder="Gender" value="<?php echo $_POST['gender'] ? $_POST['gender'] : ""; ?>">
    <input type="text" name="color" placeholder="Color" value="<?php echo $_POST['color'] ? $_POST['color'] : ""; ?>">
    <input type="submit" name="submit" value="Submit">
    <input type="reset" name="reset" value="Reset">


</form>