<section class="text-gray-600 body-font bg-[url('images/bg.jpg')] bg-cover">
  <div class="container mx-auto flex px-5 py-36 items-center justify-center flex-col">
    <h1 class="text-white text-6xl m-3 font-semibold" style="text-shadow: 3px 2px 4px black;">Welcome in Book World</h1>
    <form action="filter.php"  method="get" >
        <div class="flex">
            <input type="search" name="search" size="60" placeholder="Enter Title, author, ISBN to Search " class="rounded-l-md px-4 py-3 text-2xl focus:outline-0 border-0 outline-0"/>
            <input type="submit" name="go" class="bg-teal-700 px-4 py-3 text-2xl text-white border-0 outline-0 rounded-r-md" value="Go"/>
        </div>
    </form>
  </div>
</section>