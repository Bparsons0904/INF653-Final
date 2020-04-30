<section id="quotes-display">
    <div class="container">
        <form action="index.php" method="GET" id="form-change" class="">
            <div id="filter-grp" class="select-container">
                <div class="select-wrapper">
                    <div class="select-group">
                        <select class="select-dropdown" id="categoryID" name="categoryID" onchange="formChange()">
                            <option class="option-dropdown" value="0">All Categories</option>
                            <!-- Loop through each category  -->
                            <?php foreach ($categories as $category) : ?>
                                <option class="option-dropdown" value="
                            <?php echo $category['categoryID']; ?>" <?= ($category['categoryID'] == $categoryID) ? 'selected' : ''; ?>><?php echo $category['categoryName']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="select-group">
                        <select class="select-dropdown" id="authorID" name="authorID" onchange="formChange()">
                            <option value="0">All Authors</option>
                            <!-- Loop through each author  -->
                            <?php foreach ($authors as $author) : ?>
                                <option value="
                            <?php echo $author['authorID']; ?>" <?= ($author['authorID'] == $authorID) ? 'selected' : ''; ?>><?php echo $author['authorName']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div onclick="clearFilters()" class="btn btn-clear"><i class="fas fa-filter"></i> Clear Filters</div>
                    <div onclick="openSubmit()" class="btn btn-clear toggle-btn"><i class="fas fa-plus"></i> Add Quote</div>
                </div>
            </div>
            <div id="submit-grp" class="select-container">
                <div class="select-wrapper">
                    <div class="select-group">
                        <select class="select-dropdown" id="categoryIDSubmit" name="categoryIDSubmit" onchange="checkValid()">
                            <option class="option-dropdown" value="0">Select Category</option>
                            <!-- Loop through each category  -->
                            <?php foreach ($categories as $category) : ?>
                                <option class="option-dropdown" value="
                            <?php echo $category['categoryID']; ?>" <?= ($category['categoryID'] == $categoryID) ? 'selected' : ''; ?>><?php echo $category['categoryName']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="select-group">
                        <select class="select-dropdown" id="authorIDSubmit" name="authorIDSubmit" onchange="checkValid()" >
                            <option value="0">Select Author</option>
                            <!-- Loop through each author  -->
                            <?php foreach ($authors as $author) : ?>
                                <option value="
                            <?php echo $author['authorID']; ?>" <?= ($author['authorID'] == $authorID) ? 'selected' : ''; ?>><?php echo $author['authorName']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="textarea">
                        <textarea name="textsubmit" id="textsubmit" placeholder="Enter Quote" onkeyup="checkValid()"></textarea>
                    </div>
                    <div onclick="checkValid(true)" class="btn btn-clear toggle-btn disabled" id="submit-quote-btn">Submit New Quote</div>
                    <div onclick="closeSubmit()" class="btn btn-clear toggle-btn cancel-btn"><i class="fas fa-ban"></i> Cancel Submition</div>
                </div>
                <div id="warning"></div>
            </div>
        </form>
        <!-- <div id="submit-form-container">
            <form action="POST">

            </form>
        </div> -->
        <div id="quote-container">
            <?php foreach ($quotes as $quote) : ?>
                <div class="quote-container">
                    <div class="card">

                        <blockquote>
                            <?php echo $quote['text']; ?>
                        </blockquote>
                        <p><?php echo $quote['authorName']; ?> on <?php echo $quote['categoryName']; ?></p>

                    </div>
                </div>

            <?php endforeach; ?>
        </div>
        <?php
        // If the vehicle table is empty diplay message
        if (count($quotes) == 0) {
        ?>
            <div id="no-match">
                <h2>No Quotes found with the current search criteria</h2>
                <h4>Please adjust your selections</h4>
            </div>
        <?php } ?>

    </div>
</section>



<!-- <p><?php echo $quote['categoryName']; ?> Quote</p>
<div class="quote-wrapper">
    <img src="https://picsum.photos/id/<?php echo $quote["quoteID"] ?>/400/" alt="">
    <div class="text-wrapper">
        <blockquote>
            <?php echo $quote['text']; ?>
        </blockquote>
    </div>
    <cite><?php echo $quote['authorName']; ?></cite>
</div> -->