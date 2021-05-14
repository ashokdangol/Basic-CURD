<?php include 'parts/header.php'; ?>

<div class="container mt-5">

<?php 


$id = $_GET['id'];
//echo $id;

$stmt = $con->prepare("DELETE from users where uid = ?"); 
$stmt->execute([$id]);
header("location:index.php?delete=true"); 

 ?>
</div>
<?php include 'parts/footer.php'; ?>