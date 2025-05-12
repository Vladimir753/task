<header>
    <h1>Articles</h1>
</header>

<section class="articles">
    <?php foreach ($articles as $article): ?>
        <div class="article">
            <div class="title">
                <h2><?= htmlspecialchars($article['title']) ?></h2>
            </div>
            <div class="actions">
                <a href="articles/<?= htmlspecialchars($article['id']) ?>/edit"
                   class="action cursor-pointer text-decoration-none text-black">Edit</a>
                 |

                <form id="delete-form-<?= $article['id'] ?>"
                      action="/articles/<?= $article['id'] ?>/delete" method="POST" style="display: none;">
                </form>

                <p class="action cursor-pointer text-danger">
                    <a onclick="deleteArticle(<?= $article['id'] ?>)">Delete</a>
                </p>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<section>
    <div class="btn-align-right">
        <a href="/articles/create" class="btn btn-primary text-white text-decoration-none">Create</a>
    </div>
</section>

<script>
    function deleteArticle(id) {
        if (confirm('Do you want to delete this article?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>