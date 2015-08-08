var opinionDefault = '機能の改善要望、使いにくい点など、ご意見ご感想をお聞かせください。';
;(function($) {
    $(function() {
        $('#sideOpinionForm textarea').val(opinionDefault);

        $('#opinion').click(function(e) {
            if (!window.confirm('この内容を送信してよろしいですか？')) {
                return;
            }
            var form = $('#sideOpinionForm');
            var textarea = form.find('textarea');
            $.ajax({
                type: 'post',
                url: '/home/opinion',
                data: form.serialize(),
                success: function(response) {
                    textarea.val('');
                    var popup = $('#opinionThanks');
                    popup.fadeIn();
                    setTimeout(function() {
                        popup.fadeOut();
                        textarea.val(opinionDefault);
                        $('#opinion').attr('disabled', false);
                    }, 3500);
                }
            });
            $('#opinion').attr('disabled', true);
            return false;
        });

        $('#sideOpinionForm textarea').focus(function(e) {
            if (this.value == opinionDefault) {
                this.value = '';
            }
        });

        $('#sideOpinionForm textarea').blur(function(e) {
            if (!this.value) {
                this.value = opinionDefault;
            }
        });
    });
})(jQuery);
