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
        last_name: {
            required: true 
        },
        last_name_kana: {
            required: true
        },
        first_name: {
            required: true 
        },
        first_name_kana: {
            required: true
        },
        zip21: {
            required: true,
            maxlength: 3
        },
        zip22: {
            required: true,
            maxlength: 4
        },
        addr21: {
            required: true 
        },
        customer_email: {
            required: true,
            email: true
        },
        customer_id: {
            required: true
        },
        customer_password: {
            required: true,
            minlength:6,
            maxlength:15
        }
    },
    messages: {
        sex: {
            required: "性別が選択されていません。"
        },
        last_name: {
            required: "入力されていません。"
        },
        last_name_kana: {
            required: "入力されていません。"
        },
        first_name: {
            required: "入力されていません。"
        },
        first_name_kana: {
            required: "入力されていません。"
        },
        zip21: {
            required: "入力されていません。" ,
            maxlength: "3文字を超えています"
        },
        zip22: {
            required: "入力されていません。" ,
            maxlength: "4文字を超えています"
        },
        addr21: {
            required:"入力されていません。" 
        },
        customer_email: {
            required: "入力されていません。" ,
            email: "メールアドレスの形式で入力してください。" 
        },
        customer_id: {
            required:  "入力されていません。" 
        },
        customer_password: {
            required:  "入力されていません。" ,
            minlength:"6文字以上で入力してください。",
            maxlength:"15文字以下で入力してください。" 
        }
    },
    //エラーメッセージの表示場所を設定
    //表示位置指定
    errorPlacement: function(error, element) {
        switch(element.attr('name')) {

        case "sex":
          error.insertAfter($('#sex_error'));
          break;

        case "last_name":
          error.insertAfter($('#last_name_error'));
          break;

        case "last_name_kana":
          error.insertAfter($('#last_name_kana_error'));
          break;

        case "first_name":
          error.insertAfter($('#first_name_error'));
          break;

        case "first_name_kana":
          error.insertAfter($('#first_name_kana_error'));
          break;

        case "zip21":
          error.insertAfter($('#zip21_error'));
          break;

        case "zip22":
          error.insertAfter($('#zip22_error'));
          break;

        case "addr21":
          error.insertAfter($('#addr21_error'));
          break;

        case "customer_email":
          error.insertAfter($('#customer_email_register_error'));
          break;

        case "customer_id":
          error.insertAfter($('#customer_id_error'));
          break;
        
        case "customer_password":
          error.insertAfter($('#customer_password_error'));
          break;

        default:
          error.insertAfter(element);
        }
    }
});
$(document).ready(function () {
    $("#form-name").validationEngine('attach', {
      promptPosition: "bottomLeft" //アラートの吹き出しを左下に設定: 
    });
});