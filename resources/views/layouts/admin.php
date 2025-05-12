<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="/css/admin/admin.css">
    <link rel="stylesheet" href="/css/admin/article.css">
    <link rel="stylesheet" href="/css/variables.css">

    <script src="https://cdn.tiny.cloud/1/cxo081aih7070hyvrgp4ucekaabfqxydyshjomahmo5jgnh2/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="/js/admin/tinymce.js" referrerpolicy="origin"></script>
</head>
<body>

<div class="dashboard">
    <aside class="sidebar">
        <h2>Admin Panel</h2>
        <nav>
            <ul>
                <li class="cursor-pointer"><a href="/dashboard">Dashboard</a></li>
                <li class="cursor-pointer"><a href="/articles">Articles</a></li>
                <li class="cursor-pointer"><a onclick="logout()">Logout</a></li>
            </ul>
        </nav>
    </aside>

    <form id="logout-form" action="/logout" method="POST" style="display: none;"></form>

    <main class="main-content">
        <?= $content ?? '' ?>
    </main>
</div>

</body>
</html>

<script>
    function logout() {
        document.getElementById('logout-form').submit();
    }
</script>