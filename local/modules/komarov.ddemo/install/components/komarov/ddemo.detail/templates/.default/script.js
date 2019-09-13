$(document).ready(function () {

    $('.comments-button').click(function () {
        if (!$(this).hasClass('active')) {
            var request = BX.ajax.runComponentAction('komarov:ddemo.detail', 'getComments', {
                mode: 'class',
                data: {
                    showComments: true,
                    params: params.signedParameters
                }
            });

            request.then(function (response) {
                console.log(response);
                showComments(response);
                $('.comments-button').addClass('active');
                $('.comments-button').attr('value', 'Скрыть комментарии');
                console.log($(document).find('.form-wrapper'));
                $(document).find('.form-wrapper')[0].style.display = 'block';
            });

        } else {
            document.getElementsByClassName('comments-wrapper')[0].innerHTML = '';
            $(this).attr('value', 'Показать комментарии');
            $(this).removeClass('active');
            $(document).find('.form-wrapper')[0].style.display = 'none';
        }
    });

    function showComments(comments) {
        if(Array.isArray(comments.data)){
            document.getElementsByClassName('comments-wrapper')[0].innerHTML = '';
            comments.data.forEach(function (comment) {
                document.getElementsByClassName('comments-wrapper')[0].innerHTML += '' +
                    '<div class="comment-block">' +
                    '<div class="comment-author">'
                    + comment.UF_NAME +
                    '</div>' +
                    '<div class="comment-date">'
                    + formatDate(comment.UF_DATE) +
                    '</div>' +
                    '<div class="comment-text">'
                    + comment.UF_COMMENT +
                    '</div>' +
                    '</div>';
            });
        }
    }

    function formatDate(date) {
        let options = {
            year: '2-digit',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
        };

        let date1 = new Date(date);
        let result = date1.toLocaleString("ru", options);

        return result;
    }

    $('.comments-form-button').click(function () {
        event.preventDefault();
        var data = [];
        data["name"] = $( ".comments-name" ).val();
        data["text"] = $( ".comments-text" ).val();
        var request = BX.ajax.runComponentAction('komarov:ddemo.detail', 'addComment', {
            mode: 'class',
            data: {
                comment: data,
                params: params.signedParameters
            }
        });

        request.then(function (response) {
            $( ".comments-name" ).val("");
            $( ".comments-text" ).val("");
            showComments(response)
        });

    });
});
