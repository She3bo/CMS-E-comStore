<?php
function query($query){
    global $connection;
    $result = mysqli_query($connection,$query);
    confirm($result);
    return $result;
}
function confirm($result){
    global $connection;
    if(!$result){
        die("Query Field" . mysqli_query($connection));
    }
}
function escape($string){
    global $connection;
    return mysqli_real_escape_string($connection,$string);
}

function fetch($query){
    return mysqli_fetch_array($query);
}
function redirect($loc){
    return header("Location:$loc");
}


function getCategory(){
    $sql = query("select * from categories");
    //$result = fetch($sql);

    while($row = fetch($sql)){
        $category = '<a href="category.php?id='.$row['cat_id'].'" class="list-group-item">'.$row["cat_title"].'</a>';
        echo $category;
    }
}
function getProduct(){
    $sql = query("select * from products");
    while($row = fetch($sql)){
        $product = '<div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="item.php?id='.$row['product_id'].'"> <img src="'.$row['product_image'].'"alt=""></a>
                            <div class="caption">
                                <h4 class="pull-right">&#36;'.$row['product_price'].'</h4>
                                <h4><a href="item.php?id='.$row['product_id'].'">'.$row['product_title'].'</a></h4>
                                <p>'.$row['product_description'].'</p>
                            </div>
                            <a class="btn btn-primary" target="_blank" href="item.php?id='.$row['product_id'].'">Add to cart</a>
                        </div>
                    </div>';
        echo $product;
    }

}
?>