<?php
/**
 * Created by PhpStorm.
 * User: alysenko
 */

namespace application\core;

use application;

/**
 * Class Router
 *
 * @package application\core
 */
class Router {

	/**
	 * @var string
	 */
	static protected $controllersNamespacePath = '\\application\\controllers\\';

	/**
	 * @var string
	 */
	static protected $modelsNamespacePath = '\\application\\models\\';

	/**
	 * @param Request $request
	 */
	public static function route(Request $request) {

		/** controller */
		$controllerClassName = $request->getControllerName() . 'Controller';
		$controllerClassFile = __DIR__ . '/../controllers/' . $controllerClassName . '.php';

		/** model */
		$modelClassName = $request->getControllerName() . 'Model';
		$modelClassFile = __DIR__ . '/../models/' . $modelClassName . '.php';

		/** action */
		$methodName = 'action' . $request->getMethodName ();

		if(is_readable($controllerClassFile)) {

			/** models */
			require_once $modelClassFile;
			$modelClassName = self::$modelsNamespacePath . $modelClassName;
			$model = new $modelClassName;

			/** controllers */
			require_once $controllerClassFile;
			$controllerClassName = self::$controllersNamespacePath . $controllerClassName;
			$controller = new $controllerClassName($model);

			/** check method */
			$method = (is_callable(array($controller,$methodName))) ? $methodName : self::$defaultActionName;

			/** call method */
			if(! empty($request->getArgs())){
				call_user_func_array(
					[$controller, $method],
					[$request->getArgs()]
				);
			} else {
				call_user_func(array($controller,$method));
			}

		} else {
			echo '-1-2-3-';
		}
	}

}