jQuery(function($){
    $('.tab').click(function(){
        $('.tab.is-active').removeClass('is-active');
        $(this).addClass('is-active');
        $('.panel.is-show').removeClass('is-show');
        // クリックしたタブからインデックス番号を取得
        const index = $(this).index();
        // クリックしたタブと同じインデックス番号をもつコンテンツを表示
        $('.panel').eq(index).addClass('is-show');
    });
});