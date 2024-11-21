export default {
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
      dest: 'assets/build/admin.min.css',
    },
  ],
  format: ['**/*.{php,js,json,scss}', '!assets/build'],
  archive: {
    dest: 'publish/tangible-loops-and-logic.zip',
    root: 'tangible-loops-and-logic',
    src: [
      '*.php',
      'readme.txt',
      'assets/**',
      'includes/**',
    ],
    exclude: [
    ],
    configs: [
      './vendor/tangible/template-system/tangible.config.js'
    ]
  },
  /**
   * Dependencies for production are installed in `vendor/tangible`,
   * included in the zip package to publish. Those for development are
   * in `tangible-dev`, excluded from the archive.
   * 
   * In `.wp-env.json`, these folders are mounted to the virtual file
   * system for local development and testing.
   */
  install: [
    // Modules
    // {
    //   git: 'git@github.com:tangibleinc/fields',
    //   dest: 'vendor/tangible/fields',
    //   branch: 'main',
    // },
    // {
    //   git: 'git@github.com:tangibleinc/framework',
    //   dest: 'vendor/tangible/framework',
    //   branch: 'main',
    // },
    {
      git: 'git@github.com:tangibleinc/template-system',
      dest: 'vendor/tangible/template-system',
      branch: 'main',
    },
    // {
    //   git: 'git@github.com:tangibleinc/updater',
    //   dest: 'vendor/tangible/updater',
    //   branch: 'main',
    // },
  ],
  installDev: [
    // Third-party plugins
    {
      zip: 'https://downloads.wordpress.org/plugin/advanced-custom-fields.latest-stable.zip',
      dest: 'vendor/tangible-dev/advanced-custom-fields',
    },
    {
      zip: 'https://downloads.wordpress.org/plugin/beaver-builder-lite-version.latest-stable.zip',
      dest: 'vendor/tangible-dev/beaver-builder-lite-version',
    },
    {
      zip: 'https://downloads.wordpress.org/plugin/elementor.latest-stable.zip',
      dest: 'vendor/tangible-dev/elementor',
    },
  ]
}
