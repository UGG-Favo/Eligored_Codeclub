<?php
    session_start();
    include "../phpconnect.php";

  	class retObj {
    	var $status;
    	var $value;

    	function __construct($st, $v=null){
      		$this->status = $st;
      		$this->value = $v;
   		}
	}

	if((isset($_SESSION["id"]) && ($_SESSION["id"]>0))) {
        $user_id = $_SESSION["id"];

		$statement = $pdo->prepare("SELECT * FROM Favo_Eligored_user_world WHERE user_id = :user_id");
        $result = $statement->execute(array("user_id" => $user_id));
        $world = $statement->fetch();

        $world_id = $world["world_id"];

		if (isset($world_id)) {
			$toSend = array(
		    	'status' => 'success',
		        'world_id' => $world_id
			);

	    	echo json_encode($toSend);
	    } else {
			$toSend = array(
		    	'status' => 'fail'
			);

			echo json_encode($toSend);
	    }
    } else {
		$toSend = array(
			'status' => 'fail'
		);

		echo json_encode($toSend);
	}

?>
