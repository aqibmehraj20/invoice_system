<?php require('partials/head.php'); ?>

<div class="container" style="margin-top:150px;">

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 class=text-center><img src="images/customer.png" class="rounded  pt-2 pb-2" alt="Product" style="height: 52px; width: 41px;    margin-left: 10px; "> Create Customer</h1>
            <hr>
            <?php if (isset($cid)){ foreach($cid as $customer){
                $cname = $customer->cname;
                $caddress = $customer->caddress;
                $cnumber = $customer->cnumber;
                $id = $customer->id;
            }}
            ?>

            <form action="<?php if(isset($cid)){ ?>/updatecustomer <?php } ?>" method="POST">
                <input type="hidden" name="cid" value="<?php
                if(isset($id)){ 
                    echo "$id";
                }
                ?>" >
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Customer Name</label>
                        <input type="text" class="form-control" name="cname" id="inputEmail4"
                         value="<?php if (isset($cname)){
                            echo "$cname";
                        }?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Address</label>
                        <input type="text" class="form-control" name="caddress" id="inputPassword4"
                        value="<?php if (isset($caddress)){
                            echo "$caddress";
                        }?>"
                        >
                    </div>
                </div>
                <div class="form-group  col-md-12">
                    <label for="inputAddress">Contact No.</label>
                    <input type="number" class="form-control" name="cnumber" id="inputAddress"
                    value="<?php if(isset($cnumber)){
                        echo "$cnumber";
                    } ?>"
                    >
                </div>

                <button type="submit" class="btn btn-primary mt-4" name="submit">Add</button>
            </form>
            <hr>
        </div>
        <div class="col-2"></div>
    </div>

</div>
<?php require('partials/footer.php'); ?>