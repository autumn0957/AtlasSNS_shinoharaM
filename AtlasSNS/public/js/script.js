$(function(){
    $('.js-menu__item__link').each(function(){
        $(this).on('click',function(){
            $(this).next().slideToggle(300);
            $(this).toggleClass("open", 300);
            return false;
        });
    });
});



$(function(){
    $('.js-modal-open').on('click', function(){ //編集ボタンが押されたら発火
        $('.js-modal').fadeIn(); //モーダルの中身の表示
        var post = $(this).attr('post'); //押されたボタンから投稿内容を取得し変数へ収納
        var post_id = $(this).attr('post_id'); //押されたボタンから投稿のidを取得し変数へ格納

        $('.modal_post').text(post); //取得した投稿内容をモーダルの中身へ渡す
        $('.modal_id').val(post_id); //取得した投稿のidをモーダルの中身へ渡す
        return false;
    });   
    
    $('.js-modal-close').on('click', function(){ //背景や閉じるボタンを押されたら発火
        $('.js-modal').fadeOut(); //モーダルの中身を非表示
        return false;
    });
});