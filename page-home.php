<?php
// Template Name: Home
get_header(); ?>


<?php
$products_slide = wc_get_products([
  'limit' => 6,
  'tag' => ['slide'],
]);

function format_products($products, $img_size)
{
  $products_final = [];
  foreach ($products as $product) {
    $products_final[] = [
      'name' => $product->get_name(),
      'price' => $product->get_price_html(),
      'img' => wp_get_attachment_image_src($product->get_image_id(), $img_size)[0],
      'link' => $product->get_permalink(),
    ];
  }
  return $products_final;
}

$data['slide'] = format_products($products_slide, 'slide');
?>

<ul class="vantagens">
  <li>Frete Grátis</li>
  <li>Troca Fácil</li>
  <li>Até 12x</li>
</ul>

<section class="slide-wrapper">
  <ul class="slide">
    <?php foreach ($data['slide'] as $product) { ?>
      <li class="slide-item">
        <img src="<?= $product['img']; ?>" alt="<?= $product['name']; ?>">
        <div class="slide-info">
          <span class="slide-price"><?= $product['price']; ?></span>
          <h2 class="slide-name"><?= $product['name']; ?></h2>
          <a class="slide-link" href="<?= $product['link']; ?>">Ver Produto</a>
        </div>
      </li>
    <?php } ?>
  </ul>
</section>



<?php if (have_posts()) {
  while (have_posts()) {
    the_post(); ?>

<?php }
} ?>



<?php get_footer(); ?>