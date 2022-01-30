<div class="overlay" id="overlay">
    <div class="pop-up">
        <div class="pop-up__book">
            <div class="pop-up__book-cover">
                <img src="/public/img/book-cover.png" alt="book cover">
            </div>
            <!-- /.pop-up__book-cover -->
            <div class="pop-up__book-title">
                <p>TITLE 1</p>
                <button class="close pop-up__book-close"></button>
            </div>
            <!-- /.pop-up__book-title -->
            <div class="pop-up__book-controls">
                <button class="read">Read</button>
                <button class="edit btn-o">Edit</button>
                <button class="delete btn-o">Delete</button>
            </div>
            <!-- /.pop-up__book-controls -->
        </div>
        <!-- /.pop-up__book -->
        <div class="pop-up__desc">
            <h4>Description</h4>
            <p>Amet, nisl orci quis feugiat sed iaculis lectus nibh. Nibh gravida ornare sollicitudin habitant massa volutpat risus cursus urna. Risus morbi quis ullamcorper cras urna.</p>
        </div>
        <!-- /.pop-up__desc -->
    </div>
    <!-- /.pop-up -->

    <div class="book-entity">
        <div class="close book-entity__close"></div>
        <?php include __DIR__ . "/../../book/html/book.php" ?>
        <div class="book-entity__edit-panel">
            <div id="toolBar1">
                <select id="format-block">
                    <option selected>- formatting -</option>
                    <option value="h1">Title 1 &lt;h1&gt;</option>
                    <option value="h2">Title 2 &lt;h2&gt;</option>
                    <option value="h3">Title 3 &lt;h3&gt;</option>
                    <option value="h4">Title 4 &lt;h4&gt;</option>
                    <option value="h5">Title 5 &lt;h5&gt;</option>
                    <option value="h6">Subtitle &lt;h6&gt;</option>
                    <option value="p">Paragraph &lt;p&gt;</option>
                    <option value="pre">Preformatted &lt;pre&gt;</option>
                </select>
                <select id="font-name">
                    <option class="heading" selected>- font -</option>
                    <option>Arial</option>
                    <option>Arial Black</option>
                    <option>Courier New</option>
                    <option>Times New Roman</option>
                </select>
                <select id="font-size">
                    <option class="heading" selected>- size -</option>
                    <option value="1">Very small</option>
                    <option value="2">A bit small</option>
                    <option value="3">Normal</option>
                    <option value="4">Medium-large</option>
                    <option value="5">Big</option>
                    <option value="6">Very big</option>
                    <option value="7">Maximum</option>
                </select>
                <select id="forecolor">
                    <option class="heading" selected>- color -</option>
                    <option value="red">Red</option>
                    <option value="blue">Blue</option>
                    <option value="green">Green</option>
                    <option value="black">Black</option>
                </select>
                <select id="backcolor">
                    <option class="heading" selected>- background -</option>
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="black">Black</option>
                    <option value="white">White</option>
                </select>
            </div>
        </div>
    </div>

</div>
<!-- /.overlay -->