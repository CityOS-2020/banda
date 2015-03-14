myApp.config(function($routeProvider)) {
	$routeProvider

	.when('/', 
	{
		controller:'index',
		template: ''
	});

	.when ('login',
	{
		controller:'login',
		template: ''
	})
}