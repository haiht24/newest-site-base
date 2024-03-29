const _ = require('lodash');
const glob = require('glob');
const path = require('path');

const MixMinifyTask = require('./MixMinifyTask');
//http://perfectionkills.com/experimenting-with-html-minifier
var minTemplate = function (src, output, pluginOptions = {}) {
  let options = _.merge({
    collapseInlineTagWhitespace: true,
    collapseWhitespace: true,
    minifyCSS: true,
    minifyJS: true,
    processConditionalComments: true,
    removeAttributeQuotes: true, //attr="one" to attr=one
    removeComments: true,
    removeTagWhitespace: false,
    trimCustomFragments: false, // remove space before after <?php ?>
	includeAutoGeneratedTags: false, // auto create tag if not close: (<p>) <p> ....</p>
  }, pluginOptions);

  let files = glob.sync(path.join(src));

  let task = new MixMinifyTask({ src, output, options, files });

  Mix.addTask(task);

  return this;
}

module.exports = minTemplate;
