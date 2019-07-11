$('#purchase').validate({
    rules: {
        trigger: {
            required: true 
        },
        survival: {
            required: true 
        },
        usepoint:{

        },
    },
    messages: {
        trigger: {
            required: "お支払方法を選択してください"
        },
        survival: {
            required: "ポイント利用を選択してください"
        }
    },
    //エラーメッセージの表示場所を設定
    //表示位置指定
    errorPlacement: function(error, element) {
        switch(element.attr('name')) {
        case "trigger":
          error.insertAfter($('#trigger_error'));
          break;
        case "survival":
          error.insertAfter($('#survival_error'));
          break;
        case "field3":
          error.insertAfter($('#field3_error'));
          break;
        case "field4":
          error.insertAfter($('#field4_error'));
          break;
        default:
          error.insertAfter(element);
        }
    }
});