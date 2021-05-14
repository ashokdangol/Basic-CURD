

<?php 
include 'parts/header.php';
$id =  $_GET['id'];

if ($_SERVER["REQUEST_METHOD"]=="POST") {

  $fullname = $_POST['fname'];
  $addr     = $_POST['address'];
  $contact  = $_POST['contact'];
  $stmt = $con->prepare("UPDATE users set name=?,address=?,phone=? where uid=?"); 
  $stmt->execute([$fullname,$addr,$contact,$id]);
  header("location:index.php?success=true");   
}




$sql = "SELECT * FROM users where uid = ? ";
$stmt = $con->Prepare($sql);
$stmt->execute([$id]);

if ($stmt->rowCount()>0) {
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
 ?>

 <main class="container mt-5">
  <?php if(isset($_GET['success'])) { ?>
    <div class="alert alert-success" role="alert">
     Record has been updated successfully
    </div>
  <?php } ?>
  
  <h3 class="mt-5">Update Record</h3>

  <form class="form-control mt-5" method="POST">
    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Name</span>
      <input type="text" class="form-control" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1" name="fname" value="<?php 
      echo $row['name']; ?>" >
    </div>

    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Address</span>
      <input type="text" class="form-control" placeholder="Address" aria-label="Username" aria-describedby="basic-addon1" name="address" value="<?php echo $row['address']; ?>">
    </div>

    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Contact</span>
      <input type="text" class="form-control" placeholder="Contact" aria-label="Username" aria-describedby="basic-addon1" name="contact" value="<?php echo $row['phone']; ?>">
    </div>
    <div class="input-group mb-3">
      <button class="btn btn-outline-success">Update</button>
    </div>  
  </form>
  </main>


<?php }
}
 ?>
    
<?php include 'parts/footer.php'; ?>