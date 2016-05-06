Interstate Industrial Instrumentation, Inc.


Development Tools:

-	[Bootstrap](http://getbootstrap.com/)
-	[Bower](http://bower.io/)
-	[SASS](http://sass-lang.com/)
-	[Gulp](http://gulpjs.com/)
-	[Nunjucks](https://mozilla.github.io/nunjucks/)
-	LiveReload browser [extension](https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei)


Directory Structure
-------------------

```
.
├── public/               # The built website - this is what gets posted online
	├── js/
	├── css/
	├── fonts/
	├── images/
	└── index.html
├── source/               # The pre-built website - SASS files mainly at the moment.
	├── images/
	├── js/
	├── php/              # PHP for the application form
	├── scss/             # SASS files
	└── templates/        # Nunjucks HTML templates
	└── course-data.json
├── bower.json            # The information on which client-side packages are needed
├── package.json          # The information on which node packages are needed
├── gulpfile.js           # The gulp script that defines various automation tasks 
└── README.md
```
