<div class="footer"></div>
<footer class="bg-dark text-white fixed-bottom">
    <div class="container">
        <div class="mt-3 d-none d-sm-block py-3">以台南社大師生為主體寫作者的《巷集談-街道新聞》，秉持公民素人發聲 、開放以及非營利的宗旨，除希望培力更多公民記者、自由寫手之外，更希望以關注台南市未來城鄉永續發展過程中，保障公民參與審議的權利為精神，成為台南市公民傳播媒體的草根平台。</div>
        <div class="d-block d-sm-none text-center py-1">台南市公民傳播媒體的草根平台</div>
    </div>
</footer>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        var images = ['pic1.jpg', 'pic2.jpg'];
        $('.img-container').css({ 'background-image': 'url(images/' + images[Math.floor(Math.random() * images.length)] + ')' });

        // $('.img-container').css('width', $(window).width());
        $('.img-container').css('height', $(window).height());
    });

    $(window).resize(function () {
        // $('.img-container').css('width', $(window).width());
        $('.img-container').css('height', $(window).height());
    });

</script>
<!-- <script src="http://more.handlino.com/javascripts/moretext-1.2.js" type="text/javascript"></script> -->