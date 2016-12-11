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
	 * @param string $type ('success', 'error', '')
	 * @param $duration
	 */
	public function setNotif($msg, $type = 'success', $duration = 2000) {

		$_SESSION['notif']['message'] = $msg;
		$_SESSION['notif']['duration'] = (int) $duration;
		$_SESSION['notif']['icon'] = 'info_outline';

		if($type == 'success') {
			$_SESSION['notif']['type'] = '-success ';
			$_SESSION['notif']['icon'] = 'done';
		} elseif ($type == 'error') {
			$_SESSION['notif']['type'] = '-danger ';
			$_SESSION['notif']['icon'] = 'error_outline';
		} else {
			$_SESSION['notif']['type'] = '-info ';
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



	public function sanitize(array $data) {

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


	/**
	 * Vérifie qu'un utilisateur est connecté
	 */
	public function checkLogin() {

		$user = $this->getSessionAttribute('user');

		if ($user == null) {
			$this->redirect($this->link('login'));
		}

		return $this->getSessionAttribute('user');
	}


	/**
	 * Vérifie les droits d'un fichier ou d'un dossier
	 * @param $path
	 * @param bool $read = true
	 * @param bool $write = true
	 * @param bool $create = false // (true) création du fichier si n'existe pas
	 * @throws \Exception
	 */
	private function check_file ($path, $read = true, $write = true, $create = false) {

		if (!$create && !file_exists ($path)) {
			throw new \Exception('Le dossier "' . $path . '" est introuvable !');
		} elseif ($create && !file_exists ($path)) {
			mkdir ($path, 0755, true);
		}

		if (!is_readable ($path) || !is_writable ($path)) {
			chmod ($path, 0755);
		}

		if ($read && !is_readable ($path)) {
			throw new \Exception('Pas de permissions de lecture sur : ' . $path);
		}

		if ($write && !is_writable ($path)) {
			throw new \Exception('Pas de permissions d\'écriture sur : ' . $path);
		}

	}

	/**
	 * @return bool|string
	 */
	public function uploadPicture() {

		if(!isset($_FILES['file']) || $_FILES['file']['error'] != 0) {
			return false;
		}

		$allowed_extensions = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG');

		$filename = $_FILES['file']['name'];
		$file_infos = pathinfo($filename);
		$extension = $file_infos['extension'];

		if(!in_array($extension, $allowed_extensions)) {
			return false;
		}

		$hash_name = sha1($filename . uniqid(true));

		$picture = "file_".$hash_name.".".$extension;

		$dest_dir = dirname(getcwd()) . DS . 'uploads';
		//"/nfs/nas02a_etudiants/inf/uapv1702000/public_html/uploads/"

		$file_path = $dest_dir . DS . $picture;

		// $this->check_file($dest_dir, true, true, true);

		if(file_exists($file_path) || move_uploaded_file($_FILES["file"]["tmp_name"], $file_path)) {
			return $picture;
		}


		return false;
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
