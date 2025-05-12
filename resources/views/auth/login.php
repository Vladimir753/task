<div class="login">
    <div class="header">
        <h1 class="text-white">Admin login</h1>
    </div>
    <div class="container">
        <form action="/login" method="POST">
            <label for="username">Username</label>
            <input type="text" name="username" class="without-border border-bottom-ccc" required>
            <label for="password">Password</label>
            <input type="password" name="password" class="without-border border-bottom-ccc" required>
            <?php if (isset($error)): ?>
                <p class="text-center text-danger mb-20"><?= $error ?></p>
            <?php endif; ?>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</div>