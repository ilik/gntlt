<?php
Yii::setPathOfAlias(
	'Orm',
	dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'orm'
);
Yii::setPathOfAlias(
	'views',
	dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'views'
);
Yii::setPathOfAlias(
	'helpers',
	dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'helpers'
);

Yii::setPathOfAlias(
	'components',
	dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'components'
);

require dirname(
	__FILE__
) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'vendors' . DIRECTORY_SEPARATOR . 'autoload.php';
return array(
	'basePath'   => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name'       => 'VUZIA',
	'theme'      => 'dark',
	'preload'    => array('orm'),
	'import'     => array(
		'application.models.*',
		'application.components.*',
		/*
			'application.components.request',
			'application.components.user',
			'application.components.cache',
			'application.components.email',
			'application.components.db',
			'application.components.log',
			'application.components.errorHandler',
			'application.components.orm',
		*/
		'application.helpers.*',
		'application.extensions.EAjaxUpload.*',
	),
	'modules'    => array(
		'comments' => array( //'layoutPath' => 'protected/modules/comments/views/layouts',
			//'layout' => 'main'
		),
		'like'     => array( //'layoutPath' => 'protected/modules/like/views/layouts',
			//'layout' => 'main'
		),

	),
	// application components
	'components' => array(
		'photoService' => array(
			'class' => "components\\ExternalPhoto"
		),
		'request'      => array( //'enableCsrfValidation'=>true,
			//'enableCookieValidation'=>true
		),
		'user'         => array(
			//'class' => 'Orm\\Model\\User',
			'allowAutoLogin' => true,
		),
		'cache'        => array(
			//'class' => 'CMemCache',
			'class' => 'CApcCache',

			//'servers'=>array(
			//    array(
			//        'host'=>'localhost',
			//        'port'=>11211,
			//    ),
			//),
		),
		'email'        => array(
			'class'    => 'application.extensions.email.Email',
			'delivery' => 'php',
		),
		'db'           => array(
			'connectionString'   => 'mysql:host=localhost;dbname=vuzia',
			'emulatePrepare'     => true,
			'username'           => 'root',
			'password'           => '',
			'charset'            => 'utf8',
			'tablePrefix'        => 'yii_',
			'enableParamLogging' => false,
		),
		'errorHandler' => array(
			// use 'site/error' action to display errors
			'errorAction' => 'site/error',
		),
		'log'          => array(
			'class'   => 'CLogRouter',
			//'enabled' => true,
			'enabled' => false,
			'routes'  => array(
				array(
					'class'  => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
				array(
					'class'     => 'application.extensions.yii-debug-toolbar-master.yii-debug-toolbar.YiiDebugToolbarRoute',
					'ipFilters' => array('127.0.0.1', '::1'),
				),
				array(
					'class'   => 'CProfileLogRoute',
					'levels'  => 'profile',
					'enabled' => true,
				),
			),
		),
		'orm'          => array(
			'class' => 'Orm\OrmManager',
			'dbs'   => array(
				'sqlDb'  => 'db',
				'fastDb' => 'cache'
			),
		),
		//https://github.com/yiiext/twig-renderer
		'viewRenderer' => array(
			'class'         => 'ext.twig-renderer.ETwigViewRenderer',
			// All parameters below are optional, change them to your needs
			'fileExtension' => '.twig',
			//'fileExtension' => '.html.twig',
			'options'       => array(
				'autoescape' => true,
			),
			/*
			'extensions' => array(
				'My_Twig_Extension',
			),
			*/
			'globals'       => array(
				'html'  => 'CHtml',
				'photo' => 'CPhotoHelper',
				'audio' => 'CAudioHelper'
			),
			'functions'     => array(
				'rot13' => 'str_rot13',
			),
			'filters'       => array(
				'jencode' => 'CJSON::encode',
			),
			'lexerOptions'  => array(
				'tag_comment' => array('{#', '#}'),
				'tag_block'   => array('{%', '%}'),
			),
		),
		'urlManager'   => array(
			'urlFormat'      => 'path',
			'showScriptName' => false,
			'rules'          => array(
				""                                       => "digest",
				array('api/doc', 'pattern' => 'api/doc', 'verb' => 'GET'),
				array('api/list', 'pattern' => 'api/<entity:\w+>', 'verb' => 'GET'),
				array('api/view', 'pattern' => 'api/<entity:\w+>/<id:\d+>', 'verb' => 'GET'),
				array('api/update', 'pattern' => 'api/<entity:\w+>/<id:\d+>', 'verb' => 'PUT'),
				array('api/delete', 'pattern' => 'api/<entity:\w+>/<id:\d+>', 'verb' => 'DELETE'),
				array('api/create', 'pattern' => 'api/<entity:\w+>', 'verb' => 'POST'),
				'profile/<id:\d+>'                       => 'profile/view',
				'photoalbum/<id:\d+>'                    => 'photoalbum/view',
				'vuz/<id:\d+>'                           => 'vuz/view',
				'<controller:\w+>/<id:\d+>'              => '<controller>/view',
				'<controller:\w+>/<action:\w+>'          => '<controller>/<action>',
				'<controller:\w+>/<id:\d+>'              => '<controller>/index',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/index',
				'<controller:\w+>/<action:\w+>'          => '<controller>/<action>',

			),
		),
	),
	'params'     => array(
		'adminEmail' => 'webmaster@example.com',
	),

);