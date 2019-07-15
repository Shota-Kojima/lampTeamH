//お支払方法確認画面
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
        default:
          error.insertAfter(element);
        }
    }
});

//お問い合わせ画面
$('#contact').validate({
    rules: {
        customer_email: {
            required: true,
            email:true
        },
        contact_text: {
            required: true 
        }
    },
    messages: {
        customer_email: {
            required: "メールアドレスが入力されていません",
            email:"メールアドレスの形式で入力してください"
        },
        contact_text: {
            required: "お問い合わせ内容が入力されていません"
        }
    },
    //エラーメッセージの表示場所を設定
    //表示位置指定
    errorPlacement: function(error, element) {
        switch(element.attr('name')) {
        case "customer_email":
          error.insertAfter($('#customer_email_error'));
          break;
        case "contact_text":
          error.insertAfter($('#contact_text_error'));
          break;
        default:
          error.insertAfter(element);
        }
    }
});

$('#register').validate({
    rules: {
        sex: {
            required: true
        },
        contact_text: {
            required: true 
        },
        customer_email: {
            required: true,
            email:true
        },
        contact_text: {
            required: true 
        },
        customer_email: {
            required: true,
            email:true
        },
        contact_text: {
            required: true 
        },customer_email: {
            required: true,
            email:true
        },
        contact_text: {
            required: true 
        }
    },
    messages: {
        customer_email: {
            required: "メールアドレスが入力されていません",
            email:"メールアドレスの形式で入力してください"
        },
        contact_text: {
            required: "お問い合わせ内容が入力されていません"
        }
    },
    //エラーメッセージの表示場所を設定
    //表示位置指定
    errorPlacement: function(error, element) {
        switch(element.attr('name')) {
        case "customer_email":
          error.insertAfter($('#customer_email_error'));
          break;
        case "contact_text":
          error.insertAfter($('#contact_text_error'));
          break;
        default:
          error.insertAfter(element);
        }
    }
});
