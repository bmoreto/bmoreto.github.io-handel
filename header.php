<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php bloginfo('name') ?> <?php wp_title('|'); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php
  $img_url = get_stylesheet_directory_uri() . '/img';
  $cart_count = WC()->cart->get_cart_contents_count();
  ?>

  <header class="header container">
    <a href="/"><img src="<?= $img_url; ?>/handel.svg" alt="Handel" /></a>
    <div class="busca">
      <form action="<?php echo get_post_type_archive_link('product'); ?>" method="get">
        <input type="text" name="s" id="s" placeholder="Buscar" value="<?php the_search_query(); ?>">
        <input type="hidden" name="post_type" value="product">
        <input type="submit" id="searchbutton" value="Buscar">
      </form>
    </div>

    <nav class="conta">
      <a href="/my-account" class="minha-conta">Minha Conta</a>
      <a href="/cart" class="carrinho">Carrinho
        <?php if ($cart_count) { ?>
          <span class="carrinho-count"><?= $cart_count; ?></span>
        <?php } ?>
      </a>
    </nav>
  </header>

  <?php
  wp_nav_menu([
    'menu' => 'categorias',
    'container' => 'nav',
    'container_class' => 'menu-categorias'
  ])
  ?>