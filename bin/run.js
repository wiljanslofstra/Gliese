
function format(time) {
  return time.toTimeString().replace(/.*(\d{2}:\d{2}:\d{2}).*/, '$1');
}

function run(fn, options) {
  const start = new Date();
  console.log(`[${format(start)}] Starting '${fn.name}'...`);
  fn(options);
  const end = new Date();
  const time = end.getTime() - start.getTime();
  console.log(`[${format(end)}] Finished '${fn.name}' after ${time} ms`);
}

if (process.argv.length > 2) {
  delete require.cache[__filename];
  run(require('./' + process.argv[2] + '.js'));
}

module.exports = run;
