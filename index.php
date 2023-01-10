<?php include "db.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php include "header.php";?>
    
    <section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap -m-4">
      
    <?php
    $callingBooks = mysqli_query($con , "select * from books JOIN categories on books.category = categories.cat_id");
    while($row = mysqli_fetch_array($callingBooks)):
    ?>
    <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
        <a class="block relative h-96 rounded overflow-hidden">
          <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="bookImages/<?= $row['cover'];?>">
        </a>
        <div class="mt-4">
          <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1"><?= $row['cat_title'];?></h3>
          <h2 class="text-gray-900 title-font text-lg font-medium"><?= $row['title'];?></h2>
          <p class="mt-1">Rs. <?= $row['discount_price'];?><del>Rs. <?= $row['mrp'];?></del></p>
        </div>
      </div>
<?php endwhile;?>
  </div>
</section>

    <script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>
</body>
</html>