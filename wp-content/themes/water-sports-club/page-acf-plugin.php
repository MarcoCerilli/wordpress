<?php
/* Pagina ACF PLUGIN */
get_header(); ?>

<style>
  /* Stili personalizzati per la pagina Atleti */

  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f9;
  }

  h1 {
    text-align: center;
    color: #333;
    margin-top: 30px;
    font-size: 30px;
  }

  form {
    display: flex;
    justify-content: center;
    margin: 20px;
    gap: 15px;
    /* Aggiunta per uno spazio tra gli input */
  }

  form label {
    margin-right: 5px;
    font-weight: bold;
    font-size: 14px;
  }

  form input {
    padding: 6px 8px;
    /* Ridotto il padding per caselle più piccole */
    margin-right: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    width: 100px;
    /* Impostato una larghezza fissa per migliorare la consistenza */
  }

  form button {
    padding: 8px 15px;
    /* Ridotto il padding per pulsante più snodato */
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
  }

  form button:hover {
    background-color: #0056b3;
  }

  .row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-around;
    margin-top: 20px;
  }

  .column {
    flex: 1 1 calc(33% - 20px);
    /* Tre colonne */
    box-sizing: border-box;
    margin-bottom: 20px;
  }

  .card {
    background-color: white;
    border: 1px solid #ddd;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    text-align: center;
    transition: transform 0.3s ease;
    /* Aggiunto effetto hover sulla card */
  }

  .card:hover {
    transform: translateY(-5px);
    /* Effetto di sollevamento */
  }

  .card img {
    max-width: 100%;
    height: auto;
    margin-bottom: 15px;
  }

  .card h2 {
    font-size: 20px;
    color: #333;
    margin: 10px 0;
  }

  .card p {
    font-size: 16px;
    color: #666;
  }

  .button {
    background-color: #007bff;
    color: white;
    padding: 8px 15px;
    border: none;
    cursor: pointer;
    text-align: center;
    border-radius: 5px;
    margin-top: 10px;
    font-size: 14px;
  }

  .button:hover {
    background-color: #0056b3;
  }
</style>

<?php
// Ricerca articoli tramite ACF
if (isset($_POST['cerca'])) {
  $key = sanitize_text_field($_POST['cerca']);
  $paese = sanitize_text_field($_POST['paese']);
}

// Query personalizzata per gli articoli della categoria "atleti"
$args = array(
  'post_type'      => 'post',
  'posts_per_page' => -1, // Prendi tutti gli articoli disponibili
  'category_name'  => 'atleti',
  'orderby'        => 'title',
  'order'          => 'ASC',
  'meta_query' => array(
    'relation' => 'AND',
    array(
      'key'     => 'nazionalita',
      'value'   => $paese ? $paese : 'Francese', // Usa il valore dinamico di $paese
      'compare' => '=',
    ),
    array(
      'key'     => 'debutto',
      'compare' => 'BETWEEN',
      'type'    => 'numeric',
      'value'   => array(2000, 2020),
    ),
  ),
);

$acf_query = new WP_Query($args);
?>

<!-- Form di ricerca -->
<h1>Scopri i nostri Atleti</h1>
<form method="POST" action="">
  <label for="cerca">Cerca per nome: </label>
  <input type="text" name="cerca" id="cerca" value="<?php echo isset($key) ? esc_attr($key) : ''; ?>" />

  <label for="paese">Paese: </label>
  <input type="text" name="paese" id="paese" value="<?php echo isset($paese) ? esc_attr($paese) : ''; ?>" />

  <button type="submit">Cerca</button>
</form>

<div class="row"> <!-- Layout flexbox per gestione colonne -->

  <?php if ($acf_query->have_posts()) : ?>

    <?php while ($acf_query->have_posts()) : $acf_query->the_post(); ?>
      <div class="column">
        <div class="card">
          <div class="container">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('medium'); ?>
            <?php endif; ?>

            <h2><?php the_title(); ?></h2>

            <p class="title">Età: <?php the_field('eta'); ?></p>
            <p>Debutto: <?php the_field('debutto'); ?></p>
            <p>Nazionalità: <?php the_field('nazionalita'); ?></p>

            <a href="<?php the_permalink(); ?>">
              <button class="button">Scopri di più</button>
            </a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>

  <?php else : ?>
    <p>Nessun atleta trovato.</p>
  <?php endif; ?>

</div> <!-- Fine della riga -->

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>