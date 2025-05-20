<?php
// Array com os dados para pesquisa (poderia ser nomes, títulos, etc.)
$dados = [
    "Maçã",
    "Banana",
    "Laranja",
    "Melancia",
    "Abacaxi",
    "Manga",
    "Morango",
    "Pera"
];

// Verifica se foi enviado algum termo de busca
$resultados = [];

if (isset($_GET['busca']) && !empty($_GET['busca'])) {
    $busca = strtolower($_GET['busca']); // Converte para minúsculas para facilitar a comparação

    // Percorre o array procurando correspondência
    foreach ($dados as $item) {
        if (strpos(strtolower($item), $busca) !== false) {
            $resultados[] = $item; // Adiciona aos resultados se encontrar correspondência
        }
    }
}
?>

<!-- Exibição dos resultados -->
<?php if (!empty($_GET['busca'])): ?>
    <h2>Resultados da pesquisa por: "<?php echo htmlspecialchars($_GET['busca']); ?>"</h2>

    <?php if (!empty($resultados)): ?>
        <ul>
            <?php foreach ($resultados as $resultado): ?>
                <li><?php echo htmlspecialchars($resultado); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Nenhum resultado encontrado.</p>
    <?php endif; ?>
<?php endif; ?>
