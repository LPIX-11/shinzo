<?php

    namespace libraries\components;

	/**
	 * Booststrap Class
	 * @author Mohamed Johnson
	 * This class handles the default behavior of the project
	 * - It handles the url rerouting and load
	 * - The existance of controllers
	 * - The existance of the controller's default method
	 * - The existance of method in a controller
	 */
    class Bootstrap {

        public function __construct() {

			if(filter_input(INPUT_GET, 'url')) {

                $url = explode('/', filter_input(INPUT_GET, 'url'));

                $file = 'src/controller/' . $url[0] . 'Controller.php';

                if(file_exists($file)) {
                    require_once $file;

                    $controller = new $url[0]();

					// When landing on the controller, testing if the default index method exist
                    if(isset($url[1])) {

                        if($url[1] == "") {
                            $url[1] = "index";
                        }

                        if(method_exists($controller, $url[1])) {
                            $method = $url[1];
                            
							require_once "DatabaseConnection.php";
                            
                            $request = paramsMethods($url[0],$url[1]);

                            $params = $request->getParameters();

                            if(count($params)== 0)
                            {
                                $controller->$method();

                            } else {
                                if(isset($url[2])) {
                                    $controller->{$url[1]}($url[2]);
                                } else {
                                    $msg = $url[1]."()</b> expects a parameter";
                                    $this->error_Message($msg);
                                }
                            }

                        } else {
                            $msg = $url[1]."() does not exist in the controller <b>".$url[0]."</b>!";
							$this->error_Message($msg);
                        }

                    } else {

						if(method_exists($controller, "index")) {
							$controller->{"index"}();
						} else {
							$msg = "Default index method does not exist in <b>".$url[0]."</b>!";
							$this->error_Message($msg);
						}
					}
                } else {
                    $msg = $url[0] . " Controller does not exist";
					$this->error_Message($msg);
                }

            } else {
                //require_once 'controller/Accueil.class.php';
				$file = 'src/controller/'.welcome_params()['welcome_controller'].'.php';
				if(file_exists($file))
				{
					require_once $file;
					//echo welcome_params()['welcome_controller'];
					$controller = welcome_params()['welcome_controller'];
					$controller = new $controller();
				
					if(method_exists($controller, "index")) {
						$controller->{"index"}();
					} else {
						$msg = "Index method does not exist in <b>".welcome_params()['welcome_controller']."</b>!";
						$this->error_Message($msg);
					}
                    
				} else {
					$msg = "The welcome controller <b>" . welcome_params()['welcome_controller'] . "</b> is not found !";
					$msg = $msg. "<br/>Please review the config in <b>config/welcome_controller.php</b>!";
					$this->error_Message($msg);
				}
            }
        }

		private function error_Message($message)
		{
			$msg = '<html>
						<head>
							<meta charset="UTF-8">
							<title>Error</title>
							<link type="text/css" rel="stylesheet" href="../public/css/bootstrap.min.css"/>
							<link type="text/css" rel="stylesheet" href="public/css/bootstrap.min.css"/>
						</head>
						<body>
							<div class="alert alert-danger" style="font-size:18px; text-align:justify;">
							'.
								$message
							.'</div>
						</body>
					</html>';
					
			die($msg);
		}
    }