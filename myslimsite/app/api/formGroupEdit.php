<?php
	// edita informações do grupo na bd
	$app->put('/api/formEditGroup/update', function($request, $response, $args) {

		require_once('dbconnect_teste.php');

		// recolhe informação do form
		$descricao = $request->getParsedBody()['descricao'];
		$ver = $request->getParsedBody()['ver'];
		$reservar = $request->getParsedBody()['reservar'];
		$ver_admin = $request->getParsedBody()['ver_admin'];
		$reservas = $request->getParsedBody()['reservas'];
		$criar_editar = $request->getParsedBody()['criar_editar'];
		$user_ver = $request->getParsedBody()['user_ver'];
		$user_editar = $request->getParsedBody()['user_editar'];
		$criar_msg = $request->getParsedBody()['criar_msg'];
		$id = $request->getParsedBody()['idgroup'];

		// actualiza o grupo com as novas informações
		$sql = "UPDATE `grupo` SET `descricao` = ?, `ver` = ?, `reservar` = ?, `ver_admin` = ?, `reservas` = ?, `criar_editar` = ?, `user_ver` = ?, `user_editar` = ?, `criar_msg` = ? WHERE `id` = ?";

		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("siiiiiiiii", $descricao, $ver, $reservar, $ver_admin, $reservas, $criar_editar, $user_ver, $user_editar, $criar_msg, $id);

		$stmt->execute();	
	});
?>