<?php


function debug(array $data): void
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function get_products(): array
{
    global $conn;
    $res = $conn->query("SELECT * FROM pro");
    return $res->fetch_assoc();
}

function get_product(int $id): array|false
{
    global $conn;
    $stmt = $conn->query("SELECT * FROM pro WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}