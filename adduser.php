

<?php include 'parts/header.php'; ?>


<?php 
if ($_SERVER["REQUEST_METHOD"]=="POST") {

  $fullname = $_POST['fname'];
  $addr     = $_POST['address'];
  $contact  = $_POST['contact'];
  $stmt = $con->prepare("INSERT INTO users values(?,?,?,?)"); 
  $stmt->execute(['',$fullname,$addr,$contact]);
  header("location:adduser.php?success=true");   
}
?>

<main class="container mt-5">
  <?php if(isset($_GET['success'])) { ?>
    <div class="alert alert-success" role="alert">
     Record has been inserted
    </div>
  <?php } ?>
  
  <h3 class="mt-5">Add a New user</h3>

  <form class="form-control mt-5" method="POST">
    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Name</span>
      <input type="text" class="form-control" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1" name="fname">
    </div>

    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Address</span>
      <input type="text" class="form-control" placeholder="Address" aria-label="Username" aria-describedby="basic-addon1" name="address">
    </div>

    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Contact</span>
      <input type="text" class="form-control" placeholder="Contact" aria-label="Username" aria-describedby="basic-addon1" name="contact">
    </div>
    <div class="input-group mb-3">
      <button class="btn btn-outline-success">Save</button>
    </div>

  </form>
  </main>
    
<?php include 'parts/footer.php'; ?>