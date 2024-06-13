import templateSystemConfig from './vendor/tangible/template-system/tangible.config.js'

const relativeToTemplateSystem = pattern => `./vendor/tangible/template-system/${
  pattern.replace('^\/', '')
}`

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
      dest: 'assets/build/admin.min.css'
    },
  ],
  install: [
    {
      git: 'git@github.com:tangibleinc/template-system',
      branch: 'main'
    }
  ],
  format: [
    '**/*.{php,js,json,scss}',
    '!assets/build'
  ],
  archive: {
    src: [
      '*.php',
      'readme.txt',
      'assets/**',
      'includes/**',
      ...templateSystemConfig.archive.src.map(relativeToTemplateSystem),
    ],
    dest: 'publish/tangible-loops-and-logic.zip',
    exclude: [
      ...templateSystemConfig.archive.exclude.map(relativeToTemplateSystem),
    ],
    rootFolder: 'tangible-loops-and-logic'
  }
}
