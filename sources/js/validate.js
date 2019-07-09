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
            required: "チェックしてない",
            email: "....?"
        },
        survival: {
            required: "チェックしてない",
            dateISO: "....?"
        }
    }
});