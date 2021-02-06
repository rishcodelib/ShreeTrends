<style>
    .print {
        margin: auto;
        width: 30%;
        text-align: left;
        padding-left: 20px;

    }
</style>
<!-- <script src="<?php echo base_url(); ?>assets/js/html2canvas.min.js"></script> -->


<?php 
// print_r($details);
// die();

foreach ($details as $val) { ?>

    <hr> 

    <div class="print" id="capture">
        <div class="htmlData">

           
            <?php echo $val->ProductName . "(" . $val->size . ")   x ". $val->quantity . " Qty." ?>
            <p>To <br>
                <?php echo $val->Cust_Address ?> <br>
                Contact: <?php echo $val->Cust_phone ?> <br>
            </p>
        </div>
    </div>
    <!-- <hr> -->
    <script>
        $(document).ready(function() {

            html2canvas(document.querySelector("#capture")).then(canvas => {
                canvas.id = "mycanvas";
                document.body.appendChild(canvas)
                $(".htmlData").hide();
                downloadCanvas();

            });
        });

        function downloadCanvas() {

            var canvas = document.getElementById("mycanvas");
            image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
            var link = document.createElement('a');
            link.download = "<?php echo $val->OrderID . "(" . $val->ProductName . ")" ?>.png";
            link.href = image;
            link.click();
        }
    </script>
<?php } ?>