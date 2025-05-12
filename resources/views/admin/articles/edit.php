<header>
    <h1>Articles / Edit</h1>
</header>

<section class="article-create-container">
    <?php if (isset($error)): ?>
        <p class="text-center text-danger mb-20"><?= $error ?></p>
    <?php endif; ?>
    <form action="/articles/<?= htmlspecialchars($article['id']) ?>/update" method="POST" enctype="multipart/form-data">
        <label for="title">Title</label>
        <input type="text" name="title" class="without-border border-bottom-ccc w-100 p-7 mb-20"
               required value="<?= htmlspecialchars($article['title']) ?>">

        <label for="image" class="display-block">Image</label>
        <img src="<?= htmlspecialchars($article['image']) ?>" width="140">
        <input type="file" name="image" class="without-border border-bottom-ccc w-100 p-7 mb-20"
                accept=".png, .jpg, .jpeg">

        <label for="content">Content</label>
        <textarea id="default" name="content" class="without-border border-bottom-ccc w-100 p-7 mb-20" required>
            <?= htmlspecialchars($article['content']) ?>
        </textarea>

        <button type="submit" class="btn btn-primary mt-20">Update</button>
    </form>
</section>
