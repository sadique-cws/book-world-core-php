<?php include "db.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>you search with "<?= $_GET['search'];?>" </title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include "header.php"; 
    
    if(isset($_GET['search'])):
        $search = $_GET['search'];
        $title = $search;
        $callingBooks = mysqli_query($con, "select * from books JOIN categories on books.category = categories.cat_id where isbn='$search' OR (title LIKE '%$search%' OR author LIKE '%$search%')");
    elseif(isset($_GET['cat_id'])):
        $cat_id = $_GET['cat_id'];
        $title = $_GET['name'];
        $callingBooks = mysqli_query($con, "select * from books JOIN categories on books.category = categories.cat_id where category='$cat_id'");
    endif;
    
    $count = mysqli_num_rows($callingBooks);
    ?>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex justify-between items-center">
                <h2 class="flex-1 my-3 text-2xl font-semibold">Search term is <strong>"<?= $title; ?>"</strong>  and find <?= $count;?> Books</h2>
            </div>
            <div class="grid grid-cols-6 gap-3">

                <?php

               
                while ($row = mysqli_fetch_array($callingBooks)) :
                ?>
                    <div class="p-4 w-full shadow-md">
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
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
    </section>

</body>

</html>