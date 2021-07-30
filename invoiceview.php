<?php
include 'base.php';
?>


<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .invoice-box.rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .invoice-box.rtl table {
        text-align: right;
    }

    .invoice-box.rtl table tr td:nth-child(2) {
        text-align: left;
    }
</style>



<div class="invoice-box" style="margin-top:150px;" id="ConsutaBPM">
    <table border='1' cellpadding='1' id='Tablbpm1' style="width:100%; ">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img src="images/logo.PNG" style="width: 100%; max-width: 150px" />
                        </td>

                        <td>
                            Invoice #: 123<br />
                            Created: <br />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            Sparksuite, Inc.<br />
                            12345 Sunny Road<br />
                            Sunnyville, CA 12345
                        </td>

                        <td>
                            Acme Corp.<br />
                            John Doe<br />
                            john@example.com
                        </td>
                    </tr>
                </table>
            </td>
        </tr>



        <tr class="heading">
            <td>Item</td>

            <td>Price</td>
        </tr>




        <?php
        include 'dbcon.php';
        $id = $_GET['id'];
        $selectquery = "select * from invoice where id=$id";

        $query = mysqli_query($con, $selectquery);

        $result = mysqli_fetch_assoc($query);



        ?>
        <?php

        ?>

        <tr class="item">
            <td>
                <?php
                $prod = explode(",", $result['product']);

                foreach ($prod as $value) {
                    $selectquer = "select pname from product WHERE pid= $value";

                    $quer = mysqli_query($con, $selectquer);


                    while ($resul = mysqli_fetch_assoc($quer)) {
                        echo $resul['pname'] . " <br> ";
                    }
                }


                ?>



            </td>

            <td> <?php
                    $pricee = explode(",", $result['product']);

                    foreach ($pricee as $valuee) {
                        $selectquerr = "select pprice from product WHERE pid= $valuee";

                        $querr = mysqli_query($con, $selectquerr);


                        while ($resull = mysqli_fetch_assoc($querr)) {
                            echo $resull['pprice'] . " ₹ <br> ";
                        }
                    }


                    ?>
            </td>
        </tr>


        <tr class="total">
            <td></td>

            <td>Total: ₹ <?php echo $result['amount'];   ?> </td>
        </tr>
    </table>

</div>
<div class="text-center">
    <button type="submit" onclick="imprimir()" class="btn btn-success col-2 mt-4">print</button>
    <a href="invoicelist.php" class="btn btn-danger col-2 mt-4">Cancel</a>
</div>
<script type="text/javascript">
    function imprimir() {
        var divToPrint = document.getElementById("ConsutaBPM");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }
</script>