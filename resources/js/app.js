require('./bootstrap');

new JustValidate('.register__form, .login__form', {
    rules: {
      email: {
        required: true,
        email: true,
        function: function(name, value) {
          $.ajax('/email-check', {
            data: {
              "_token": $('meta[name="csrf-token"]').attr('content'),
              email: 'kostya.saharoff262@yandex.',
            },
            method: 'POST',
            error: function(data1,data2,data3) {
              console.log(data1,data2,data3);
            },
            success: function(data) {

            }
          });
        }
      },
      password: {
        require: true,
        strength: {
          default: true,
        },
        minLength: 6,
        maxLength: 20,
      },
      passwordRepeat: {
        require: true,
        strength: {
          default: true,
        },
        minLength: 6,
        maxLength: 20,
        function: (name, value) => {
          let pass = document
            .getElementById('formPassword')
            .value;
          return pass === value;
        }
      },
      userName: {
          require: true,
          minLength: 3,
          maxLength: 50,
      }
    },
    messages: {
      passwordRepeat: {
        function: 'Passwords don\'t match'
      }
    },
});
