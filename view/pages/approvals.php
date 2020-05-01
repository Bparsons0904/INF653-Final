
<div id="quote-container">
            <?php foreach ($quotes as $quote) : ?>
                <div class="quote-container">
                    <div class="card">

                        <blockquote>
                            <?php echo $quote['text']; ?>
                        </blockquote>
                        <div class="bottom-row">
                            <?php if ($loggedIn) { ?>

                                <div class="btn delete-btn" onclick="deleteEntry(<?php echo $quote['quoteID'] ?>, 'delete')">Delete</div>
                            <?php } ?>
                            <p><?php echo $quote['authorName']; ?> on <?php echo $quote['categoryName']; ?></p>
                        </div>


                    </div>
                </div>

            <?php endforeach; ?>
        </div>