<section class="billings">
    <div class="container">
        <div class="row">
            <div class="col m4 offset-m4 s12">
                <div class="section-title center-align">
                  
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col m12 s12">
                <div style="overflow-x:auto;">
                <table class="billing">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>UserID.</th>
                            <th>ProductID</th>
                            <th>Stock Available</th>
                            <th>Debited Amount <p> (₹ 20/- for new) OR (₹ 5/- pm)</p>
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bill as $val) { ?>


                            <tr>
                                <td><?php echo $val->Date ?></td>
                                <td><?php echo $val->UserID ?></td>
                                <td><?php echo $val->ProductID ?></td>

                                <td><?php echo $val->StockAvailable ?></td>
                                <td><?php echo $val->Debit ?></td>

                            </tr>
                        <?php   } ?>
                    </tbody>
                </table>        
                </div>
            </div>
        </div>
    </div>
</section>
