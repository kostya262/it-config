require('./bootstrap');

// new JustValidate('.register__form', {
//     rules: {
//       email: {
//         required: true,
//         email: true
//       },
//       password: {
//         strength: {
//           default: true,
//         },
//         minLength: 6,
//         maxLength: 20,
//       },
//       passwordRepeat: {
//         strength: {
//           default: true,
//         },
//         minLength: 6,
//         maxLength: 20,
//         function: (name, value) => {
//           let pass = document
//             .getElementById('formPassword')
//             .value;
//           return pass === value;
//         }
//       },
//       userName: {
//           require: true,
//           minLength: 3,
//           maxLength: 50,
//       }
//     },
//     messages: {
//       name: {
//         minLength: 'My custom message about only minLength rule'
//       },
//       email: 'My custom message about error (one error message for all rules)'
//     },
// });
