<?php
include 'base.php';
?>

<div class="container" style="margin-top:150px;">
    <h3 class="text-center">Products</h3>
    <div style="height:50px;background:#78C2AD;width:100%;">


        <img src="images/product.png" class="rounded  pt-2 pb-2" alt="Product" style="height: 50px; width: 30px;    margin-left: 10px; ">


        <a href="createproduct.php" class="btn btn-light float-right mt-2 mb-1 " style="color:black;text-decoration: none!important; float:right;    margin-right: 10px;">Add Product</a>

    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Code</th>
                <th scope="col">Price</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'dbcon.php';

            $selectquery = "select * from product";

            $query = mysqli_query($con, $selectquery);


            while ($result = mysqli_fetch_assoc($query)) {

            ?>

                <tr>
                    <td><?php echo $result['pname'];   ?></td>
                    <td><?php echo $result['pcode'];   ?></td>
                    <td>₹ <?php echo $result['pprice'];   ?></td>
                    <td class="text-center">
                        <div class="row">
                            <div class="col-6 ">
                                <a href="updateproduct.php?id=<?php echo $result['pid'];   ?>"><i class="fas fa-pen-square"></i> Edit</a>
                            </div>
                            <div class="col-6">
                                <a href="deleteproduct.php?id=<?php echo $result['pid'];   ?>"><i class="fas fa-trash"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
</div>