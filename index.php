<?php include "db.php"; ?>

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
  <?php include "header.php"; ?>
  <?php include "banner.php"; ?>

  <section class="text-gray-600 body-font">
    <?php
    $callingCategories = mysqli_query($con, "select * from categories");
    while ($cat = mysqli_fetch_array($callingCategories)) :
      $cat_id = $cat['cat_id'];
      $query = "select * from books JOIN categories on books.category = categories.cat_id where books.category='$cat_id'";
      $callingBooks = mysqli_query($con, $query . "LIMIT 6");
      $countBooks = mysqli_num_rows(mysqli_query($con, $query));

      if ($countBooks > 0) :
    ?>
        <div class="container px-5 py-24 mx-auto">
          <div class="flex justify-between items-center">
            <h2 class="flex-1 my-3 text-2xl font-semibold capitalize"><?= $cat['cat_title']; ?> Books</h2>
            
            <?php if($countBooks > 6): ?>
              <a href="filter.php?cat_id=<?= $cat['cat_id'];?>&name=<?= $cat['cat_title'];?>" class="bg-teal-600 text-white px-3 py-2 rounded shadow-lg">View All</a>
            <?php endif;?>
          </div>
          <div class="grid grid-cols-6 m-4 gap-4">

            <?php
            while ($row = mysqli_fetch_array($callingBooks)) :
            ?>
              <div class=" w-full shadow-md p-3">
                <a class="block relative h-auto rounded overflow-hidden">
                  <img alt="ecommerce" class="object-contain object-center w-full block" src="bookImages/<?= $row['cover']; ?>">
                </a>
                <div class="mt-4">
                  <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1"><?= $row['cat_title']; ?></h3>
                  <h2 class="text-gray-900 title-font text-xs truncate font-semibold" title="<?= $row['title']; ?>"><?= $row['title']; ?></h2>
                  <div class="mt-1 flex gap-3 items-end ">
                    <span class="text-xl text-green-700 font-semibold">Rs. <?= $row['discount_price']; ?></span>
                    <span class="text-sm"><del>Rs. <?= $row['mrp']; ?></del></span>
                  </div>
                  <div class="flex space-x-2 justify-center mt-2">
  <a href="view_books.php?id=<?= $row['id'];?>" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">View Book</a>
</div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
      <?php endif;
    endwhile; ?>
  </section>

</body>

</html>