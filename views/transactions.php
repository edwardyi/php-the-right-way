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
                <?php if (count($transactions) > 0):  ?>
                    <?php foreach ($transactions as $row): ?>
                        <tr>
                            <td> <?php echo $row['date']; ?> </td>
                            <td> <?php echo $row['check']; ?> </td>
                            <td> <?php echo $row['name']; ?> </td>
                            <td>
                                <?php if ($row['amount'] > 0): ?>
                                    <span style="color: green;">
                                        <?php echo getFormattedPrice($row['amount']); ?> 
                                    </span>
                                <?php elseif ($row['amount'] < 0): ?>
                                    <span style="color: red;">
                                        <?php echo getFormattedPrice($row['amount']); ?> 
                                    </span>
                                <?php else: ?>
                                    <span>
                                        <?php echo getFormattedPrice($row['amount']); ?> 
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <?php if ( !empty($totals) ):?>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td>
                        <?php echo getFormattedPrice($totals['totalIncome']);?>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td>
                        <?php echo getFormattedPrice($totals['totalExpense']);?>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td>
                        <?php echo getFormattedPrice($totals['totalNet']);?>
                    </td>
                </tr>
                <?php endif;?>
            </tfoot>
        </table>
    </body>
</html>
