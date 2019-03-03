<?php

namespace App\Controller;

use App\Controller\AppController;

class TestController extends AppController {

	public function index() {
		$keyword = $this->request->query('keyword');
		if(isset($_POST['checkFirst']) && $_POST['checkLast']) {
	        $var1 = $_POST['checkFirst'];
	        $var2 = $_POST['checkLast'];
	        $var = $var2 - $var1;
	        echo $var;
		}
	}

	public function ajax() {
		// $keyword = $this->request->query('keyword');
		// if(isset($_POST['checkFirst']) && $_POST['checkLast']) {
	 //        $var1 = $_POST['checkFirst'];
	 //        $var2 = $_POST['checkLast'];
		// 	if($var1 != null && $var2 != null) {
		//         $var = $var2 - $var1;
		//         echo $var;
		//     }
		// }

		die(json_encode($_POST));
		// if(isset($_POST['soft'])) {
		// 	$s = $_POST['soft'];
		// 	echo $s;
		// }
	}
}