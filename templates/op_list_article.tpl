<div class="img-container">
    <div class="container">

    </div>
</div>

<div class="text-center">
    <h1 class="my-5">最新文章</h1>
</div>

<div class="container">
    <div class="row ">
        {foreach $all as $article}
            <div class="col-sm-4 mt-5">
                {assign var="cover" value="uploads/thumb_`$article.sn`.jpg"} 
                {if file_exists($cover)}
                    <a href="index.php?sn={$article.sn}"><img src="{$cover}" alt="{$article.title} " class="cover rounded"></a>
                {else}
                    <a href="index.php?sn={$article.sn}"><img src="https://picsum.photos/400/300?image={$article@index}" alt="{$article.title} " class="cover rounded"></a>
                {/if}

                <a href="index.php?sn={$article.sn}" class="h4 d-block my-2">{$article.title}</a>

                <p>{$article.summary}</p>


            </div>
        {foreachelse}
            <h1>尚無內容</h1>
        {/foreach}
        {$bar}
    </div>
</div>