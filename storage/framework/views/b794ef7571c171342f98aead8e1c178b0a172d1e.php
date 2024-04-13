<h6>Đánh giá sao</h6>

<!-- Rating Stars Box -->
<input type="hidden" class="star_rating_value">


<ul class="ratingW">
    <?php if($starRating): ?>
        <?php
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $starRating->star) {
                echo '<li class="on"><a href="javascript:void(0);"><div class="star"></div></a></li>';
            } else {
                echo '<li><a href="javascript:void(0);"><div class="star"></div></a></li>';
            }
        }
        ?>
    <?php else: ?>
        <li class="on"><a href="javascript:void(0);"><div class="star"></div></a></li>
        <li class="on"><a href="javascript:void(0);"><div class="star"></div></a></li>
        <li class="on"><a href="javascript:void(0);"><div class="star"></div></a></li>
        <li><a href="javascript:void(0);"><div class="star"></div></a></li>
        <li><a href="javascript:void(0);"><div class="star"></div></a></li>
    <?php endif; ?>  
</ul>
<?php /**PATH C:\xampp\htdocs\TLCN_Laravel\resources\views/ajax/ajax_star_rating.blade.php ENDPATH**/ ?>