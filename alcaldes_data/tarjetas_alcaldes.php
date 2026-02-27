<?php
include 'PHP/config.php';
?>

<section class="tarjetas-alcaldes">
  <?php
  $query = "
    SELECT a.*, r.resumen 
    FROM alcaldes a
    LEFT JOIN res_alcaldes r ON a.id = r.id_alcalde
    WHERE a.nombre NOT LIKE '%Alexander%'
    ORDER BY a.orden ASC
  ";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    $id = (int)$row['id'];
    $archivoPhp = $row['archivo'];
  ?>
    <div class="tarjeta">
      <img src="<?php echo htmlspecialchars($row['imagen']); ?>" alt="Alcalde <?php echo htmlspecialchars($row['nombre']); ?>" onclick="abrirImagenModal(this.src)" style="cursor: pointer" />
      <h4><?php echo htmlspecialchars($row['nombre']); ?></h4>
      <p>Periodo: <?php echo htmlspecialchars($row['periodo']); ?></p>
      <div class="decoracion"></div>
      <button onclick="abrirModal(<?php echo $id; ?>)">Ver más</button>

      <div id="contenido-alcalde-<?php echo $id; ?>" style="display: none;">
        <h3><?php echo htmlspecialchars($row['nombre']); ?></h3>
        <p><strong>Período:</strong> <?php echo htmlspecialchars($row['periodo']); ?></p>
        <p><?php echo !empty($row['resumen']) ? htmlspecialchars($row['resumen']) : 'Resumen no disponible.'; ?></p>
        <p><em><?php echo htmlspecialchars($row['frase']); ?></em></p>

        <?php if (!empty($archivoPhp)): ?>
          <a href="PaginaWebAlcaldes/<?php echo htmlspecialchars($archivoPhp); ?>" class="btn-ver-mas">Ver más detalles</a>
        <?php else: ?>
          <p style="color: red;">Archivo no asignado.</p>
        <?php endif; ?>
      </div>
    </div>
  <?php } ?>
</section>
