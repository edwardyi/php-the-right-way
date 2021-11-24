test_model....
<hr>
<div>
    <?php if (!empty($invoice)): ?>
        Invoice ID: <?php echo htmlspecialchars($invoice['invoice_id'], ENT_QUOTES); ?> <br/>
        Invoice Amount: <?php echo htmlspecialchars($invoice['amount'], ENT_QUOTES); ?> <br/>
        Full Name: <?php echo htmlspecialchars($invoice['full_name'], ENT_QUOTES); ?> <br/>
    <?php endif ?>
</div>