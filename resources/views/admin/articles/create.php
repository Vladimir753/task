<header>
    <h1>Articles / Create</h1>
</header>

<section class="article-create-container">
    <?php if (isset($error)): ?>
        <p class="text-center text-danger mb-20"><?= $error ?></p>
    <?php endif; ?>
    <form action="/articles/store" method="POST" enctype="multipart/form-data">
        <label for="title">Title</label>
        <input type="text" name="title" class="without-border border-bottom-ccc w-100 p-7 mb-20" required>

        <label for="image">Image</label>
        <input type="file" name="image" class="without-border border-bottom-ccc w-100 p-7 mb-20"
               accept=".png, .jpg, .jpeg" required>

        <label for="content">Content</label>
        <textarea id="default" name="content" class="without-border border-bottom-ccc w-100 p-7 mb-20" required>Hello, World!</textarea>

        <button type="submit" class="btn btn-primary mt-20">Create</button>
    </form>
</section>