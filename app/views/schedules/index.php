


<div class="container">
    <?php foreach($data['schedules'] as $schedule): ?>
        <div class="container-item">
            <h2>
                <?= $schedule->name; ?>
            </h2>
        </div>
    <?php endforeach; ?>
</div>