const { setHeadlessWhen } = require('@codeceptjs/configure');

// turn on headless mode when running with HEADLESS=true environment variable
// HEADLESS=true npx codecept run
setHeadlessWhen(process.env.HEADLESS);

exports.config = {
  tests: './tests/E2E/*_test.js',
  output: './tests/E2E/output',
  helpers: {
    Puppeteer: {
      url: 'http://localhost:3000',
      show: true
    }
  },
  include: {
    I: './tests/E2E/steps_file.js'
  },
  bootstrap: null,
  mocha: {},
  name: 'tamb_gourmet_map',
  translation: 'ja-JP',
  plugins: {
    retryFailedStep: {
      enabled: true
    },
    screenshotOnFail: {
      enabled: true
    }
  }
}
