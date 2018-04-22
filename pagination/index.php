<!DOCTYPE html>
<?php
include 'db/db.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pagination with PHP, MYSQL and jQuery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <style href="assets/style.css" rel="stylesheet" ></style>
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
  </head>
<style>
/* these css code for changing pagination color */
.pagination > li > a{
  color: #777;
}
.pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover{
  background-color: #777;
  border-color: #777;
}
/*  these css code for atyling post articles*/
article {
  margin: auto auto 10px;
  max-width: 500px;
  border: 2px solid grey;
  padding: 10px;
  box-shadow: 10px 10px 5px;
}
.post {
  width: 100%;
  margin: auto;
}
</style>

  <body style="text-align: center;">
    <?php
    $limit = 4;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
		$start_from = ($page-1) * $limit;

     $sql = "SELECT * FROM `post` LIMIT $start_from, $limit";
     $result = mysqli_query($connection, $sql);
     while($row = mysqli_fetch_assoc($result)) {
     ?>
    <article>
      <h3><?php echo $row['post_name'] ?></h3>
      <p class="post"><?php echo $row['post_data'] ?></p>
    </article>
    <?php } ?>

      <div>
      <?php
        $sql = "SELECT COUNT(post_id) FROM post";
        $rs_result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_row($rs_result);
        $total_records = $row[0];
        $total_pages = ceil($total_records / $limit);
        $pagLink = "<nav style='margin-top: 10px;'><ul class='pagination'>";
        for ($i=1; $i<=$total_pages; $i++) {
                   $pagLink .= "<li><a href='index.php?page=".$i."'>".$i."</a></li>";
        };
        echo $pagLink . "</ul></nav>";
      ?>
      </div>

      <script type="text/javascript">
      $(document).ready(function(){
      $('.pagination').pagination({
              items: <?php echo $total_records;?>,
              itemsOnPage: <?php echo $limit;?>,
              cssStyle: 'light-theme',
      		currentPage : <?php echo $page;?>,
      		hrefTextPrefix : 'index.php?page='
          });
      	});
      </script>
</body>
  <script src="assets/jquery-pagination.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</html>
