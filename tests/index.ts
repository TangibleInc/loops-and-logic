import { test, is, ok, run } from 'testra'
import { getServer } from '../vendor/tangible/template-system/framework/env'

async function ensurePlugin({ wpx }) {
  return wpx/* php */ `

if (!function_exists('tangible_template')) {
  if (!function_exists('activate_plugin')) {
    require ABSPATH . 'wp-admin/includes/plugin.php';
  }
  $result = activate_plugin(ABSPATH . 'wp-content/plugins/tangible-loops-and-logic/tangible-loops-and-logic.php');
  if (is_wp_error($result)) return $result;
}

if ( !get_option('site_init_done') ) {

  global $wp_rewrite;
  $wp_rewrite->set_permalink_structure('/%postname%/');
  $wp_rewrite->flush_rules();

  update_option('site_init_done', 1);
}

return true;
`
}

/**
 * For syntax highlight of PHP in template strings, install:
 * https://marketplace.visualstudio.com/items?itemName=bierner.comment-tagged-templates
 */
export default run(async () => {
  // Set up server before running tests in Framework
  const {
    php,
    request,
    wpx,
    documentRoot,
    setSiteTemplate,
    resetSiteTemplate,
  } = await getServer({
    phpVersion: process.env.PHP_VERSION || '7.4',
    mappings: process.env.TEST_ARCHIVE
      ? {
          'wp-content/plugins/tangible-loops-and-logic':
            '../publish/tangible-loops-and-logic',
        }
      : {},
    reset: true,
  })

  let result: any

  test('Plugin - Activate', async () => {
    let result = await ensurePlugin({ wpx })
    is(true, result, 'activate plugin')
  })

  await import(`../vendor/tangible/template-system/tests/index.ts`)
})
