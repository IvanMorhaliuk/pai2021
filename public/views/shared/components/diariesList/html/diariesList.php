<div class="books__header">
    <h2>My diaries</h2>
    <div class="books__view">
        <button class="list-view" id="list-view">
            <img src="/public/img/icons/icon-list-view_inactive.svg" alt="list view button" id="list-view-img">
        </button>
        <button class="grid-view" id="grid-view">
            <img src="/public/img/icons/icon-grid-view.svg" alt="grid view button" id="grid-view-img">
        </button>
    </div>
    <!-- /.books__view -->
</div>
<!-- /.books__header -->

<div class="books" id="books">

    <?php foreach ($user->getPrivateBooksList() as $book ): ?>
    <div class="books__item">
        <img src="<?= $book->getCoverSrc() ?>" alt="book cover">
        <div class="item-info">
            <p class="item-caption"><?= $book->getTitle() ?></p>
            <p class="item-desc"><?= $book->getDescription() ?></p>
            <p class="item-date"><?= $book->getDate() ?></p>
        </div>
        <!-- /.item-info -->
    </div>
    <!-- /.books__item -->
    <?php endforeach; ?>
</div>
<!-- /.books-grid -->
