<link rel="stylesheet" href="/public/views/shared/components/add-book/css/add-book.css">
<div class="add-book-overlay">
    <div class="add-book">
        <div class="messages_tmp">
            <?php if(isset($messages)){
                foreach ($messages as $message){
                    echo $message;
                }
            }
            ?>
        </div>

        <form action="/addBook" method="post" enctype="multipart/form-data" class="add-book__form">
            <div class="add-book__form-upper-wrapper">
                <input class="add-book__cover" name="cover" type="file" id="cover">
                <div class="add-book__form-title-wrapper">
                    <label for="title">Title: </label>
                    <input class="add-book__title" name="title" type="text" id="title">
                    <label for="description">Description: </label>
                </div>
            </div>
            <!-- /.add-book__form-upper-wrapper -->
            <textarea class="add-book__desc" name="description" type="text" id="description" cols="10" rows="3"></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
    <!-- /.add-book -->
</div>
<!-- /.add-book-overlay -->

