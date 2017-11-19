<script src="ckeditor/ckeditor.js"></script>
<h2 class="my-3">編輯文章</h2>
<form action="admin.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title" class="col-form-label sr-only">文章標題</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="請輸入文章標題" {if $article.title}value="{$article.title}"{/if}>
    </div>
    <div class="form-group">
        <label for="content" class="col-form-label sr-only">文章內容</label>
        <textarea name="content" id="content" rows="20" class="form-control" placeholder="請輸入文章內容">{if $article.content}{$article.content}{/if}</textarea>
    </div>
    <div class="form-group">
        <label for="content" class="col-form-label sr-only">封面圖</label>
        <input type="file" class="form-control" name="pic" id="pic" placeholder="上傳封面圖">
    </div>
    <div class="text-center">
        <input type="hidden" name="username" value="{$smarty.session.username}">
        {if $article.sn}
            <input type="hidden" name="sn" value="{$article.sn}">
            <input type="hidden" name="op" value="update">
        {else}
            <input type="hidden" name="op" value="insert">
        {/if}
        <button type="submit" class="btn btn-primary">儲存</button>
    </div>
</form>

<script>
    CKEDITOR.replace('content');

</script>