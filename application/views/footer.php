<div class="footer">


    <div class="foo">


    </div>
</div>
</div>
</div>
<div class=""></div>
</div>
</div>
</div>
<script src="<?= base_url(); ?>assets/global/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/global/scripts/ajax.js"></script>
</body>
</html>
<script>
    $(window).load(function (e) {


        $("#bn4").breakingNews({
            effect: "slide-v",
            autoplay: true,
            timer: 3000,
            color: 'blue',
            border: true
        });
    });
    $('.item_nav').click(function () {
        $('li.active', $('#parent_nav')).removeClass('active');

        $(this).addClass('active');
    });
</script>