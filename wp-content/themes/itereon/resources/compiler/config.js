module.exports = {
  context: 'assets',
  entry: {
    styles: './styles/main.scss',
    bs: './styles/bs.scss',
    fa: './styles/fa.scss',
    scripts: './scripts/main.js'
  },
  devtool: 'cheap-module-eval-source-map',
  outputFolder: '../assets',
  publicFolder: 'assets',
  proxyTarget: 'http://wp.test',
  watch: [
    '../**/*.php'
  ]
}
