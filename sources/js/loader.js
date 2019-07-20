// 読み込んだらフェードアウト
$(window).on('load', function () {
    // 消えるタイミングはお好みで
    $('.loading').delay(1000).fadeOut(500);
});

// 10秒待っても読み込みが終わらない時は強制的にローディング画面をフェードアウト
function stopload(){
    $('.loading').delay(1000).fadeOut(500);
}
setTimeout('stopload()',10000);

//機能してないfadein
window.onload = function(){
    // ページ読み込み時に実行したい処理
    $('.wrap').delay(4000).fadeIn(1000);
}

