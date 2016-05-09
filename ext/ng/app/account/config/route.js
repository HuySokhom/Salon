app.config([
	'$stateProvider',
	'$urlRouterProvider',
	function($stateProvider, $urlRouterProvider) {
		$stateProvider.
			state('/', {
				url: '/',
				templateUrl: 'ext/ng/app/account/partials/manage.html',
                controller: 'manage_ctrl'
			})
			.state('/edit/:id', {
				url: '/edit/:id',
				templateUrl: 'ext/ng/app/account/partials/account.html',
                controller: 'account_ctrl'
			})
		;
		$urlRouterProvider.otherwise('/');
	}
]);
