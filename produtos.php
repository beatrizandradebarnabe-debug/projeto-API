<?php

header("Content-Type: application/json");

require "conexao.php";

$metodo = $_SERVER["REQUEST_METHOD"];

if($metodo == "POST"){

    $json = file_get_contents("php://input");

    $dados = json_decode($json, true);

    $prioridades = ["baixa", "media", "alta"];

    $statusValidos = ["aberto", "em andamento", "concluido"];

    if(!in_array($dados["prioridade"], $prioridades)){
        echo json_encode([
            "erro" => "Prioridade inválida. Use: baixa, media ou alta."
        ]);
        exit;
    }

    if(!in_array($dados["status"], $statusValidos)){
        echo json_encode([
            "erro" => "Status inválido. Use: aberto, em andamento ou concluido."
        ]);
        exit;
    }

    $sql = "INSERT INTO manutencao 
    (equipamento, setor, descricao, prioridade, status) 
    VALUES (?, ?, ?, ?, ?)";

    $comando = $pdo->prepare($sql);

    $comando->execute([
        $dados["equipamento"],
        $dados["setor"],
        $dados["descricao"],
        $dados["prioridade"],
        $dados["status"]
    ]);

    echo json_encode([
        "Mensagem" => "Chamado cadastrado com sucesso!"
    ]);
}

if($metodo == "GET"){

    $sql = "SELECT * FROM manutencao ORDER BY id";

    $comando = $pdo->query($sql);

    $manutencao = $comando->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($manutencao);
}

if($metodo == "PUT"){

    $json = file_get_contents("php://input");

    $dados = json_decode($json, true);

    $prioridades = ["baixa", "media", "alta"];

    $statusValidos = ["aberto", "em andamento", "concluido"];


    if(!in_array($dados["prioridade"], $prioridades)){
        echo json_encode([
            "erro" => "Prioridade inválida. Use: baixa, media ou alta."
        ]);
        exit;
    }

    if(!in_array($dados["status"], $statusValidos)){
        echo json_encode([
            "erro" => "Status inválido. Use: aberto, em andamento ou concluido."
        ]);
        exit;
    }

    $sql = "UPDATE manutencao 
    SET equipamento=?, setor=?, descricao=?, prioridade=?, status=? 
    WHERE id=?";

    $comando = $pdo->prepare($sql);

    $comando->execute([
        $dados["equipamento"],
        $dados["setor"],
        $dados["descricao"],
        $dados["prioridade"],
        $dados["status"],
        $dados["id"]
    ]);

    echo json_encode([
        "Mensagem" => "Chamado atualizado com sucesso"
    ]);
}

if($metodo == "DELETE"){

    $json = file_get_contents("php://input");

    $dados = json_decode($json, true);

    $sql = "DELETE FROM manutencao WHERE id=?";

    $comando = $pdo->prepare($sql);

    $comando->execute([
        $dados["id"]
    ]);

    echo json_encode([
        "Mensagem" => "Chamado excluído com sucesso"
    ]);
}
