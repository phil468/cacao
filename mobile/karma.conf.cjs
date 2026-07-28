module.exports = function (config) {
  config.set({
    frameworks: ['jasmine', '@angular-devkit/build-angular'],
    plugins: [
      require('karma-jasmine'),
      require('karma-chrome-launcher'),
      require('karma-jasmine-html-reporter'),
      require('karma-coverage'),
      require('@angular-devkit/build-angular/plugins/karma'),
    ],
    reporters: ['progress'],
    customLaunchers: {
      ChromeHeadlessLocal: {
        base: 'ChromeHeadless',
        flags: ['--disable-gpu', '--disable-dev-shm-usage', '--no-sandbox'],
      },
    },
  });
};
