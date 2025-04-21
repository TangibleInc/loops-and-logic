# Loops & Logic

All plugin features have been moved into the [Template System module](https://github.com/tangibleinc/template-system).

Website: https://loopsandlogic.com/

Documentation: https://docs.loopsandlogic.com/

Source code: https://github.com/tangibleinc/loops-and-logic

## Develop

Prerequisites: [Git](https://git-scm.com/), [Node](https://nodejs.org/en/) (version 18 and above)

Clone the repository and install dependencies.

```sh
git clone git@github.com:tangibleinc/loops-and-logic.git
cd loops-and-logic
npm install
```

### JS and CSS

Frontend and admin assets are compiled and bundled using [`Roller`](https://github.com/tangibleinc/roller).

Build for development - watch files for changes and rebuild

```sh
npm run dev
```

Build for production

```sh
npm run build
```

Format to code standard

```sh
npm run format
```

### Local dev site

Start a local dev site using [`wp-now`](https://github.com/WordPress/playground-tools/blob/trunk/packages/wp-now/README.md).

```sh
npm run now
```

The default user is `admin` with `password`. Press CTRL + C to stop.

#### Dev dependencies

Optionally, install dev dependencies such as third-party plugins before starting the site.

```sh
npm run install:dev
```

To keep them updated, run:

```sh
npm run update:dev
```

#### Customize environment

Create a file named `.wp-env.override.json` to customize the WordPress environment. This file is listed in `.gitignore` so it's local to your setup.

Mainly it's useful for mounting local folders into the virtual file system. For example, to link another plugin in the parent directory:

```json
{
  "mappings": {
    "wp-content/plugins/example-plugin": "../example-plugin"
  }
}
```

## Tests

This plugin comes with a suite of unit and integration tests.

The test environment is started by running:

```sh
npm run start
```

This uses [`wp-env`](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/) to quickly spin up a local dev and test environment, optionally switching between multiple PHP versions. It requires **Docker** to be installed. There are instructions available for installing Docker on [Windows](https://docs.docker.com/desktop/install/windows-install/), [macOS](https://docs.docker.com/desktop/install/mac-install/), and [Linux](https://docs.docker.com/desktop/install/linux-install/).

Visit [http://localhost:8888](http://localhost:8888) to see the dev site, and [http://localhost:8889](http://localhost:8880) for the test site, whose database is cleared on every run.

Before running tests, install PHPUnit as a dev dependency using Composer inside the container.

```sh
npm run composer:install
```

Composer will add and remove folders in the `vendor` folder, based on `composer.json` and `composer.lock`. If you have any existing Git repositories, ensure they don't have any work in progress before running the above command.

Run the tests:

```sh
npm run test
```

For each PHP version:

```sh
npm run test:7.4
npm run test:8.2
```

The version-specific commands take a while to start, but afterwards you can run `npm run test` to re-run tests in the same environment.

Run tests for all PHP versions and end-to-end tests (see below).

```sh
npm run test:all
```

To stop the Docker process:

```sh
npm run stop
```

To remove Docker containers, volumes, images associated with the test environment.

```sh
npm run env:destroy
```

#### Notes

To run more than one instance of `wp-env`, set different ports for the dev and test sites:

```sh
WP_ENV_PORT=3333 WP_ENV_TESTS_PORT=3334 npm run env:start
```

---

This repository includes NPM scripts to run the tests with PHP versions 7.4 and 8.x. We need to maintain compatibility with PHP 7.4, as WordPress itself only has “beta support” for PHP 8. See https://make.wordpress.org/core/handbook/references/php-compatibility-and-wordpress-versions/ for more information.

---

If you’re on Windows, you might have to use [Windows Subsystem for Linux](https://learn.microsoft.com/en-us/windows/wsl/install) to run the tests (see [this comment](https://bitbucket.org/tangibleinc/tangible-fields-module/pull-requests/30#comment-389568162)).

### End-to-end tests

The folder `/tests/e2e` contains end-to-end-tests using [Playwright](https://playwright.dev/docs/intro) and [WordPress E2E Testing Utils](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-e2e-test-utils-playwright/).

#### Prepare

Before the first time you run it, install the browser engine.

```sh
npx playwright install chromium
```

#### Run

Run the tests. This will start the local WordPress environment with `wp-env` as needed. Then Playwright starts a browser engine to interact with the test site.

```sh
npm run test:e2e
```

#### Watch mode

There is a "Watch mode", where it will watch the test files for changes and re-run them. 
This provides a helpful feedback loop when writing tests, as a kind of test-driven development. Press CTRL + C to stop the process.

```sh
npm run test:e2e:watch
```

A common usage is to have terminal sessions open with `npm run dev` (build assets and watch to rebuild) and `npm run tdd` (run tests and watch to re-run).

#### UI mode

There's also "UI mode" that opens a browser interface to see the tests run.

```sh
npm run test:e2e:ui
```

#### Utilities

Here are the common utilities used to write the tests.

- `test` - https://playwright.dev/docs/api/class-test
- `expect` - https://playwright.dev/docs/api/class-genericassertions
- `admin` - https://github.com/WordPress/gutenberg/tree/trunk/packages/e2e-test-utils-playwright/src/admin
- `page` - https://playwright.dev/docs/api/class-page
- `request` - https://playwright.dev/docs/api/class-apirequestcontext

#### References

Examples of how to write end-to-end tests:

- WordPress E2E tests - https://github.com/WordPress/wordpress-develop/blob/trunk/tests/e2e
- Gutenberg E2E tests - https://github.com/WordPress/gutenberg/tree/trunk/test/e2e
