<?php
namespace Orm\Model;

use IWebUser;
use Orm\Exception\LogicException;
use Orm\Model\UserAbstract;

class User extends UserAbstract implements IWebUser
{

	public function init()
	{
		\Yii::app()->getSession()->open();
		if($this->getIsGuest() && $this->allowAutoLogin){
			$this->restoreFromCookie();
		}

		else if($this->autoRenewCookie && $this->allowAutoLogin)
			$this->renewCookie();
		if($this->autoUpdateFlash)
			$this->updateFlash();

		$this->updateAuthStatus();
	}
	/**
	 * Returns a value indicating whether the user is a guest (not authenticated).
	 * @return boolean whether the user is a guest (not authenticated)
	 */
	public function getIsGuest()
	{
		return $this->getState('__id')===null;
	}

	/**
	 * Performs access check for this user.
	 * @param string $operation the name of the operation that need access check.
	 * @param array  $params    name-value pairs that would be passed to business rules associated
	 *                          with the tasks and roles assigned to the user.
	 * @return boolean whether the operations can be performed by this user.
	 */
	public function checkAccess($operation, $params = array(), $allowCaching=true)
	{
		if($allowCaching && $params===array() && isset($this->_access[$operation]))
			return $this->_access[$operation];

		$access=Yii::app()->getAuthManager()->checkAccess($operation,$this->getId(),$params);
		if($allowCaching && $params===array())
			$this->_access[$operation]=$access;

		return $access;
	}

	/**
	 * Redirects the user browser to the login page.
	 * Before the redirection, the current URL (if it's not an AJAX url) will be
	 * kept in {@link returnUrl} so that the user browser may be redirected back
	 * to the current page after successful login. Make sure you set {@link loginUrl}
	 * so that the user browser can be redirected to the specified login URL after
	 * calling this method.
	 * After calling this method, the current request processing will be terminated.
	 */
	public function loginRequired()
	{
		$app=Yii::app();
		$request=$app->getRequest();

		if(!$request->getIsAjaxRequest())
			$this->setReturnUrl($request->getUrl());
		elseif(isset($this->loginRequiredAjaxResponse))
		{
			echo $this->loginRequiredAjaxResponse;
			Yii::app()->end();
		}

		if(($url=$this->loginUrl)!==null)
		{
			if(is_array($url))
			{
				$route=isset($url[0]) ? $url[0] : $app->defaultController;
				$url=$app->createUrl($route,array_splice($url,1));
			}
			$request->redirect($url);
		}
		else
			throw new CHttpException(403,Yii::t('yii','Login Required'));
	}

	public function getStateKeyPrefix()
	{
		if($this->_keyPrefix!==null){
			return $this->_keyPrefix;
		}else{
			try{
				return $this->_keyPrefix=md5('Orm.Model.User'.$this->getId());
			}catch (\Exception $ex){
				throw new LogicException("User state key prefix failed. Original message: " . $ex->getMessage());
			}
		}

	}

	public function getState($key,$defaultValue=null)
	{
		$key=$this->getStateKeyPrefix().$key;
		return isset($_SESSION[$key]) ? $_SESSION[$key] : $defaultValue;
	}

	protected function restoreFromCookie()
	{
		$app=Yii::app();
		$request=$app->getRequest();
		$cookie=$request->getCookies()->itemAt($this->getStateKeyPrefix());
		if($cookie && !empty($cookie->value) && is_string($cookie->value) && ($data=$app->getSecurityManager()->validateData($cookie->value))!==false)
		{
			$data=@unserialize($data);
			if(is_array($data) && isset($data[0],$data[1],$data[2],$data[3]))
			{
				list($id,$name,$duration,$states)=$data;
				if($this->beforeLogin($id,$states,true))
				{
					$this->changeIdentity($id,$name,$states);
					if($this->autoRenewCookie)
					{
						$cookie->expire=time()+$duration;
						$request->getCookies()->add($cookie->name,$cookie);
					}
					$this->afterLogin();
				}
			}
		}
	}



	public function afterLogin(){}
	public function beforeLogin(){}
}
