<!--Header Section-->
<?php include_once 'views/template/header.php' ?>

<div class="container">
    <table class="table">
        <tr>
            <td>Hello <?= $_SESSION['name'] ?? null ?></td>
        </tr>
    </table>

    <h3>Sales Campaign Data:</h3>
    <table class="table">
        <tr>
            <td>Campaign Id</td>
            <td>Campaign Name</td>
            <td>Total Revenue</td>
        </tr>
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $item): ?>
                <tr>
                    <td><?= $item->id ?></td>
                    <td><?= $item->title ?></td>
                    <td><?= $item->total_revenue ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">No data found</td>
            </tr>
        <?php endif; ?>
    </table>

</div>
<!--Footer Section-->
<?php include_once 'views/template/footer.php' ?>