module.exports = {
  build: [

    // Frontend - See includes/enqueue.php

    // {
    //   src: 'assets/src/index.js',
    //   dest: 'assets/build/tangible-loops-and-logic-pro.min.js'
    // },
    // {
    //   src: 'assets/src/index.scss',
    //   dest: 'assets/build/tangible-loops-and-logic-pro.min.css'
    // },

    // Admin

    {
      src: 'assets/src/admin.scss',
      dest: 'assets/build/admin.min.css'
    },
  ],
  format: [
    '**/*.{php,js,json,scss}',
    '!assets/build'
  ]
}