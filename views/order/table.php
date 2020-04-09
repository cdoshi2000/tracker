<?php
/* @var $this yii\web\View */

?>
<div class="row">
    <div class="col-xs-12">
        <table class="table table-head-fixed text-nowrap table-striped">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($orderData as $key => $data) { ?>
                <tr>
                    <td><?= $data['first_name'] ?></td>
                    <td><?= $data['last_name'] ?></td>
                    <td><?= $data['scheduled_date'] ?></td>
                    <td><?= $data['order_status_id'] ?><a href="#" class="btn btn-danger"><i class="fas fa-times-circle"></i></a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
