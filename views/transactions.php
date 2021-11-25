<?php 
use App\Format;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($transactions) > 0):?>
                    <?php foreach ($transactions as $rowTransaction): ?>
                        <tr>
                            <td>
                                <?php echo Format::date($rowTransaction['date']); ?>
                            </td>
                            <td>
                                <?php echo $rowTransaction['check_number']; ?>
                            </td>
                            <td>
                                <?php echo $rowTransaction['description']; ?>
                            </td>
                            <td>
                                <span <?php echo Format::rowStyle($rowTransaction['amount']); ?>>
                                    <?php echo Format::money($rowTransaction['amount']); ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td>
                        <span <?php echo Format::rowStyle($totals['income']); ?> >
                            <?php echo Format::money($totals['income']); ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td>
                        <span <?php echo Format::rowStyle($totals['expense']); ?> >
                            <?php echo Format::money($totals['expense']); ?>
                        </span>
                     </td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td>
                        <span <?php echo Format::rowStyle($totals['net']); ?> >
                            <?php echo Format::money($totals['net']); ?> 
                        </span>
                    </td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
