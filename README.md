## FOR INTERNAL USE. CAN BE USED FREELY. NO LICENSE NEEDED.

#### HOW TO USE :

For handling CVS creation on form submit, add the below code on top of your page :
```
<?php
include("csvmaker.php");

if(isset($_POST['submit'])){
  unset($_POST['submit']);
  $csv = new CSV();
  $csv->writeToFile("tester.csv", $_POST);
}
?>
```
NOTE TO SELF :
1) Changing the form fields will break the CSV.

