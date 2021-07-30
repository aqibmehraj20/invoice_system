<?php
include 'base.php';
?>
<div class="container" style="margin-top:150px;">
    <h3 class="text-center">Invoices</h3>
    <div style="height:50px;background:#78C2AD;width:100%;">


        <img src="images/invoice.png" class="rounded  pt-2 pb-2" alt="Product" style="height: 50px; width: 30px;    margin-left: 10px; ">


        <a href="createinvoice.php" class="btn btn-light float-right mt-2 mb-1 " style="color:black;text-decoration: none!important; float:right;    margin-right: 10px;">Create Invoice</a>

    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Invoice No.</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Product</th>
                <th scope="col">Amount</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'dbcon.php';

            $selectquery = "select * from invoice";
    
            $query = mysqli_query($con, $selectquery);


            while ($result = mysqli_fetch_assoc($query)) {


            ?>
                <tr>
                    <td><?php echo $result['timestamp'];   ?></td>
                    <td><?php $cid = $result['customer'];
                    $selectque = "select cname from customer WHERE cid= $cid";
    
                    $que = mysqli_query($con, $selectque);
                    $resu = mysqli_fetch_assoc($que);
                    echo $resu['cname'];

                    ?>
                    </td>

                    <td><?php
                        $prod = explode(",",$result['product']);
                        $items="";
                        foreach($prod as $value){
                            $selectquer = "select pname from product WHERE pid= $value";
    
                            $quer = mysqli_query($con, $selectquer);
                
                
                            while ($resul = mysqli_fetch_assoc($quer)) {
                                $items .= $resul['pname']." , ";
                        }}
                        echo substr($items,0,-3);

                    ?></td>

                    <td><?php echo $result['amount'];   ?></td>
                    <td class="text-center">
                        <div class="row">
                            <div class="col-12">
                            <a href="invoiceview.php?id=<?php echo $result['id'];   ?>"><i class="fas fa-eye"></i> View</a>
                                
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