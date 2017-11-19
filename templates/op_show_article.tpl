<div class="container">
    <h1 class="my-4">{$article.title}</h1>
    <p>{$article.content}</p>
    {if $smarty.session.username==$article.username}
    <div class="alert alert-secondary">
        <a href="admin.php?op=delete_article&sn={$article.sn}" class="btn btn-danger">刪除</a>
        <a href="admin.php?op=article_form&sn={$article.sn}" class="btn btn-warning">修改</a>
    </div>
    {/if}
</div>