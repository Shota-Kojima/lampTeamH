document.addEventListener("DOMContentLoaded", function(){
    
    // ▼①ファイル選択フォームの更新イベントに処理を追加
    document.getElementById("filesend1").addEventListener('change', function(e) {
        window.alert("呼ばれた");
           var files = e.target.files;
           previewUserFiles1(files);
        });
    // ▼①ファイル選択フォームの更新イベントに処理を追加
    document.getElementById("filesend2").addEventListener('change', function(e) {
           var files = e.target.files;
           previewUserFiles2(files);
    });
    // ▼①ファイル選択フォームの更新イベントに処理を追加
    document.getElementById("filesend3").addEventListener('change', function(e) {
           var files = e.target.files;
           previewUserFiles3(files);
        });
}, false);
// ▼②選択画像をプレビュー
function previewUserFiles1(files) {
    window.alert("previewUserFiles1来た");
   // 一旦リセットする
    resetPreview1();
   // 選択中のファイル1つ1つを対象に処理する
   for (var i = 0; i < files.length; i++) {
      // i番目のファイル情報を得る
      var file = files[i];
      // 選択中のファイルが画像かどうかを判断
      if( file.type.indexOf("image") < 0 ) {
         /* 画像以外なら無視 */
         continue;
      }
      // ファイル選択ボタンのラベルに選択個数を表示
      document.getElementById("selectednum1").innerHTML = /*(i+1) +*/ "選択中";
      // 画像プレビュー用のimg要素を動的に生成する
      var img = document.createElement("img");
      img.classList.add("previewImage");
      img.file = file;
      img.height = 100;   // プレビュー画像の高さ
      // 生成したimg要素を、プレビュー領域の要素に追加する
      document.getElementById('previewbox1').appendChild(img);
      // 画像をFileReaderで非同期に読み込み、先のimg要素に紐付けする
      var reader = new FileReader();
      reader.onload = (function(tImg) { return function(e) { tImg.src = e.target.result; }; })(img);
      reader.readAsDataURL(file);
   }
}
// ▼③プレビュー領域をリセット
function resetPreview1() {
   // プレビュー領域に含まれる要素のすべての子要素を削除する
   var element = document.getElementById("previewbox1");
   while (element.firstChild) {
      element.removeChild(element.firstChild);
   }
   // ファイル選択ボタンのラベルをデフォルト状態に戻す
   document.getElementById("selectednum1").innerHTML = "選択";
}

//---------------------------



// ▼②選択画像をプレビュー
function previewUserFiles2(files) {
   // 一旦リセットする
    resetPreview2();
   // 選択中のファイル1つ1つを対象に処理する
   for (var i = 0; i < files.length; i++) {
      // i番目のファイル情報を得る
      var file = files[i];
      // 選択中のファイルが画像かどうかを判断
      if( file.type.indexOf("image") < 0 ) {
         /* 画像以外なら無視 */
         continue;
      }
      // ファイル選択ボタンのラベルに選択個数を表示
      document.getElementById("selectednum2").innerHTML = "選択中";
      // 画像プレビュー用のimg要素を動的に生成する
      var img = document.createElement("img");
      img.classList.add("previewImage");
      img.file = file;
      img.height = 100;   // プレビュー画像の高さ
      // 生成したimg要素を、プレビュー領域の要素に追加する
      document.getElementById('previewbox2').appendChild(img);
      // 画像をFileReaderで非同期に読み込み、先のimg要素に紐付けする
      var reader = new FileReader();
      reader.onload = (function(tImg) { return function(e) { tImg.src = e.target.result; }; })(img);
      reader.readAsDataURL(file);
   }
}
// ▼③プレビュー領域をリセット
function resetPreview2() {
   // プレビュー領域に含まれる要素のすべての子要素を削除する
   var element = document.getElementById("previewbox2");
   while (element.firstChild) {
      element.removeChild(element.firstChild);
   }
   // ファイル選択ボタンのラベルをデフォルト状態に戻す
   document.getElementById("selectednum2").innerHTML = "選択";
}

//---------------------------


// ▼②選択画像をプレビュー
function previewUserFiles3(files) {
   // 一旦リセットする
    resetPreview3();
   // 選択中のファイル1つ1つを対象に処理する
   for (var i = 0; i < files.length; i++) {
      // i番目のファイル情報を得る
      var file = files[i];
      // 選択中のファイルが画像かどうかを判断
      if( file.type.indexOf("image") < 0 ) {
         /* 画像以外なら無視 */
         continue;
      }
      // ファイル選択ボタンのラベルに選択個数を表示
      document.getElementById("selectednum3").innerHTML = "選択中";
      // 画像プレビュー用のimg要素を動的に生成する
      var img = document.createElement("img");
      img.classList.add("previewImage");
      img.file = file;
      img.height = 100;   // プレビュー画像の高さ
      // 生成したimg要素を、プレビュー領域の要素に追加する
      document.getElementById('previewbox3').appendChild(img);
      // 画像をFileReaderで非同期に読み込み、先のimg要素に紐付けする
      var reader = new FileReader();
      reader.onload = (function(tImg) { return function(e) { tImg.src = e.target.result; }; })(img);
      reader.readAsDataURL(file);
   }
}
// ▼③プレビュー領域をリセット
function resetPreview3() {
   // プレビュー領域に含まれる要素のすべての子要素を削除する
   var element = document.getElementById("previewbox3");
   while (element.firstChild) {
      element.removeChild(element.firstChild);
   }
   // ファイル選択ボタンのラベルをデフォルト状態に戻す
   document.getElementById("selectednum3").innerHTML = "選択";
}