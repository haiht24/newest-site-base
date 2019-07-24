	function execScript(scripts) {
		var exec = require('child_process').exec;
		exec(scripts, function(err, stdout, stderr) {
		  if (err) {
			  console.error(err);
			// should have err.code here?  
		  }
		  console.log(stdout);
		});
		
	}
	
	execScript("npm run development");
	//gulp --tasks