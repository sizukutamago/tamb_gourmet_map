exports.config = {
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
  mocha: {},
  bootstrap: null,
  teardown: null,
  hooks: [],
  gherkin: {
    features: './tests/E2E/features/*.feature',
    steps: ['./tests/E2E/step_definitions/steps.js']
  },
  plugins: {
    screenshotOnFail: {
      enabled: true
    },
    retryFailedStep: {
      enabled: true
    }
  },
  tests: './tests/E2E/*_test.js',
  name: 'tamb_gourmet_map',
  translation: 'ja-JP'
}
