<?php

class context{
    private $data;
    const SUCCESS="Success";
    const ERROR="Error";
    const NONE="None";
    private $name;
    private static $instance=null;
	
	 /**
     * @return context
     */
	public static function getInstance(){
		if(self::$instance==null)
		  self::$instance=new context();
		return self::$instance; 
	}
	
	private function __construct(){
	  			
	}
	
	public function init($name){
       $this->name=$name;
       
	}
	
	public function getLayout(){
		 return $this->layout;
	}

	public function setLayout($layout){
		$this->layout=$layout;
	}	
	
	public function redirect($url){
		header("location:".$url); 
	}

	public function executeAction($action,$request){

		$this->layout="layout";
		if(!method_exists('mainController',$action))
		  return false;

		if(isset($_POST) && !empty($_POST)) {
			$this->post = $this->a2o($this->sanitize($_POST));
		}

		return  mainController::$action($request,$this);

	}
	
	public function getSessionAttribute($attribute){
		if(array_key_exists($attribute, $_SESSION))		
			return $_SESSION[$attribute];
		else
			return NULL;
	}
	
	public function setSessionAttribute($attribute,$value){
		$_SESSION[$attribute]=$value;
	}

	/**
	 *
	 * @param $action
	 *
	 * @return string
	 */
	public function link($action) {

		if($action == '') {
			$action = 'index';
		}

		return ROUTE . $action;
	}


	/**
	 * Ajoute une notification
	 * @param $msg
	 * @param $duration
	 * @param string $type ('success', 'error', '')
	 */
	public function setNotif($msg, $duration = 2000,  $type = 'success') {

		$_SESSION['notif']['message'] = $msg;
		$_SESSION['notif']['duration'] = (int) $duration;

		if($type == 'success') {
			$_SESSION['notif']['type'] = ' teal accent-4 ';
		} elseif ($type == 'error') {
			$_SESSION['notif']['type'] = ' red ';
		} else {
			$_SESSION['notif']['type'] = ' blue ';
		}

	}

	/**
	 * Détruit une notification
	 */
	public function resetNotif() {
		if(isset($_SESSION['notif'])) {
			unset($_SESSION['notif']);
		}
	}



	protected function sanitize(array $data) {

		if(!is_array($data)) {
			return filter_var($data, FILTER_SANITIZE_STRING);
		}

		foreach ($data as $k => $item) {
			if(!is_array($item)) {
				$data[$k] = filter_var($item, FILTER_SANITIZE_STRING);
			}
		}

		return $data;
	}

	/**
	 * Convertion de tableau en objet
	 *
	 * @param array $array
	 *
	 * @return object
	 */
	protected function a2o( array $array ) {
		foreach ( $array as $key => $value ) {
			if ( is_array( $value ) ) {
				$array[ $key ] = $this->a2o( $value );
			}
		}

		return (object) $array;
	}
	
	public function __get($prop){
		if(array_key_exists($prop, $this->data))        	
			return $this->data[$prop];
		else
			return NULL;      
    }
    
   	public function __set($prop,$value) {
        $this->data[$prop]=$value;      
    }
	
		
}
