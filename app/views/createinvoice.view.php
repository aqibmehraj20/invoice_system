<?php require('partials/head.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



<div class="container" style="margin-top:150px;">

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 class=text-center><img src="images/invoice.png" class="rounded  pt-2 pb-2" alt="Product" style="height: 52px; width: 41px;    margin-left: 10px; "> Create Invoice</h1>
            <hr>
            <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            </div>
            <form action="" method="POST">
                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Customer Name</label>
                        <select class="form-control " name="customer" id="customer">
                            <option hidden>Select</option>

                            <?php foreach ($customer as $cust) : ?>
                                <option value="<?php echo $cust->id; ?>"><?php echo $cust->cname; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Product</label><br>
                        <?php foreach ($product as $pro) : ?>
                            <input class="" type="checkbox" name="product[]" id="product<?php echo $pro->id; ?>" value="<?php echo $pro->id; ?>" onclick="total(`<?php echo $pro->pprice; ?>`,`product<?php echo $pro->id; ?>`)"> <span><?php echo $pro->pname; ?></span><br>

                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="form-group  col-md-12">
                    <label for="inputAddress">Amount</label>
                    <input type="number" name="amount" id="amount" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary mt-4" name="submit">Add</button>
            </form>
            <hr>
        </div>
        <div class="col-2"></div>
    </div>

</div>
<script>
    let tot = 0;

    function total(price, id) {
        let check = document.getElementById(id).checked;
        if (check) {
            tot = +tot + +price;
        } else {
            tot = +tot - +price;
        }
        document.getElementById("amount").value = tot;
    }
</script>



<?php require('partials/footer.php'); ?>